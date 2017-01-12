<?php
/**
 * Author: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 6, 2016
 * Additional Comments: 
 */
?>
@extends('layouts.app')

@section('title', 'My Posts')

@section('content')
<div class="container">
	<a href="{{url('/posts/insert')}}">Create Post</a>
@foreach($posts as $post)
	<div>
		<h3>{{$post->title}}</h3>
		<p>
			{{$post->content}}
		</p>
		<a href="{{url('/posts/update/'.$post->id.'/'.$post->user_id)}}">Edit Post</a>
		<a href="{{url('/posts/delete/'.$post->id.'/'.$post->user_id)}}">Delete Post</a>
	</div>
	<hr>
@endforeach
</div>
@endsection