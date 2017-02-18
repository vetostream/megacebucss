<?php
/**
 * Author: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 16, 2016
 * Additional Comments: 
 */
?>
@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="container">
	<a href="{{url('/posts/insert')}}">Create Post</a>
	<a href="{{url('/posts/self')}}">My Posts</a>
	<div>
		<h3>Title: "{{$post[0]->title}}"</h3>
		<h4>Author: {{$post[0]->name}}</h4>
		<p>Content: 
			{{$post[0]->content}}
		</p>
		@if ($userid == $post[0]->user_id)
		<a href="{{url('/posts/update/'.$post[0]->id.'/'.$post[0]->user_id)}}">Edit Post</a>
		<a href="{{url('/posts/delete/'.$post[0]->id.'/'.$post[0]->user_id)}}">Delete Post</a>
		@endif
	</div>
	<hr>
</div>
@endsection