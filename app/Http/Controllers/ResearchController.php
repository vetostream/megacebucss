<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use App\Http\Requests\StoreResearch;


class ResearchController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all research
        $researches = Research::all(); //SELECT * FROM RESEARCHES WHERE ID > 0;
        return view('research.index')->with('researches', $researches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('research.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearch $request)
    {
        $research = new Research;

        $research->title = $request->input('title');
        $research->research_abstract = $request->input('research_abstract');
        $path = $request->file('document_file_name')->storeAs('researches', $request->user()->id);
        $research->document_file_name = $path;
        $research->save();

        return redirect('/research');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try 
        {
            $research = Research::findOrFail($id);
            return view('research.detail')->with('research', $research);
        }
        catch(\Exception $e)
        {
            abort(404,"Research ID not Found!");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $research = Research::findOrFail($id);
            return view('research.edit')->with('research', $research);
        }
        catch(\Exception $e){
            abort(404,"Research ID not Found!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResearch $request, $id)
    {
        try{
            $research = Research::findOrFail($id);
            $research->title = $request->input('title');
            $research->research_abstract = $request->input('research_abstract');
            $research->save();

            return view('research.detail')->with('research',$research);
        }catch(\Exception $e){
            abort(404, $e);
        }
    }

    // public function upload(Request $request){


    //     return $path;
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        try
        {
            $research = Research::findOrFail($id);
            $research->delete();
        }
        catch(\Exception $e){
            abort(404, $e);
        }
    }
}
