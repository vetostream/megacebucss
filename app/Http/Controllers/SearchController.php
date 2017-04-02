<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function searchTags(Request $request){
        $keyword = $request->input('keyword');
        $results = DB::table('tags')->where('tag_name','like','%'.$keyword.'%')->get();
        $arrId = array();
        $arrPost = array();
        $arrResearch = array();
        
        foreach($results as $r){
            array_push($arrId,$r->id); //get tags_id
        }
        
        $posts = DB::table('postdtl')->whereIn('tag_id', $arrId)->get(); //query post_id if in tag_ids
        $research = DB::table('researchdtl')->whereIn('tag_id', $arrId)->get();
        
        foreach($posts as $p){
            array_push($arrPost, $p->post_id);
        }
        
        foreach($research as $r){
            array_push($arrResearch, $r->research_id);
        }
        
        $postdtl = DB::table('posts')->whereIn('id',$arrPost)->get();
        $researchdtl = DB::table('researches')->whereIn('id',$arrResearch)->get();

        
        return view('search')->with('tags',$results)->with('posts',$postdtl)->with('researches',$researchdtl);
    }
}
