<?php
/**
 * Author: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 6, 2017
 * Additional Comments: 
 */
?>
@extends('layouts.general')

@section('title', 'My Posts')

@section('content')
<div class="container">
	<div class="row">
		<div class="col s12 m4 l4">
			<div class="card-panel" style="height: 340px;">
				<ul>
					<li style="text-align: center; padding:100px 100px 100px 100px;">
						<a class="btn-floating red" href="{{ url('/posts/insert') }}">
							<i class="material-icons">note_add</i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	@foreach($posts as $post)
		<div class="col s12 m4 l4">
			<div class="card">
				<div class="card-image">
					<div class="fixed-action-btn horizontal dboard-like" style="position: relative">
						<a class="" style="width: relative">
							<!-- <img src="{{ url('images/sample-1.jpg') }}"> -->
							@if ($post->document_file_name == true):
							<img src="{{ url('storage/'.$post->document_file_name) }}">
							@endif
							<span class="card-title">{{$post->title}}</span>
						</a>
						<ul>
							<li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content">
					<p class="justify-align">{{$post->content}} <a href="{{ url('/posts/postid/'.$post->id) }}">Read more</a></p>
				</div>
				<div class="card-action">
					<div class="chip mini-chip">lake</div>
					<div class="chip mini-chip">mountains</div>
					<div class="chip mini-chip">nature</div>
					<div class="chip mini-chip more">+3 more</div>
				</div>
			</div>
		</div>
	@endforeach
	</div>
</div>

<!-- <div class="container">
	<a href="{{url('/posts/insert')}}">Create Post</a>
@foreach($posts as $post)
	<div>
		<h3>Title: "{{$post->title}}"</h3>
		<p>Content: 
			{{$post->content}}
		</p>
		<a href="{{url('/posts/update/'.$post->id.'/'.$post->user_id)}}">Edit Post</a>
		<a href="{{url('/posts/delete/'.$post->id.'/'.$post->user_id)}}">Delete Post</a>
	</div>
	<hr>
@endforeach
</div> -->

@endsection