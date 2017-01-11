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
@extends('layouts.korminapp')

@section('title', 'My Posts')

@section('body')
<div class="container">
@foreach($posts as $post)
	<div>
		<h3>{{$post->title}}</h3>
		<p>
			{{$post->content}}
		</p>
		<a href="{{url('/posts/update/'.$post->id)}}">Edit Post</a>
		<a href="{{url('/posts/delete/'.$post->id)}}">Delete Post</a>
	</div>
	<hr>
@endforeach
</div>
@endsection