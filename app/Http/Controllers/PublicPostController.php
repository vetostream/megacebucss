<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Tag;
use App\Report;

class PublicPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = app('App\Http\Controllers\PostController')->read();
        $ptags = app('App\Http\Controllers\PostController')->getTagsAllPosts($posts);
        return view('posts.showpublicposts', ['posts' => $posts, 'tagnames' => $ptags]);
    }
    

    /**
     * Show the individual post
     * @param $postid
     * @return \Illuminate\Http\Response
     */
    public function showPublicPost($postid) {
        $post = app('App\Http\Controllers\PostController')->readUserPost($postid);
        $tagnames = app('App\Http\Controllers\PostController')->readTagByPostId($postid);
        $comments = DB::table('postscom')->join('users', 'postscom.user_comment', '=', 'users.id')->where('post_id', '=', $postid)->get();
        $likes = DB::table('likedtl')->where('post_id','=',$postid)->get();
        $report = Report::where('post_id','=', $postid)->first();
        // $checkStat = DB::table('likedtl')->where([['post_id', '=', $postid],['user_id','=',Auth::user()->id]])->first();
        $ableLike = 1;
        
        // if(!empty($checkStat)){
            $ableLike = 0; //only unlike
        // }
        $userid = 1;
        return view('posts.showpublicpost', ['post' => $post, 'tagnames' => $tagnames, 'comments' => $comments,'likes' => count($likes),'ableLike' => $ableLike, 'report' => $report]);
    }
}
