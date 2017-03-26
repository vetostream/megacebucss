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
		<!-- <div class="col s12 m12 l6"> -->
		<div class="col s12 m4 l4">
			<a href="{{ url('/posts/postid/'.$post->id) }}" class="black-text">	
			<div class="card hoverable">
				<div class="card-content">
					<!-- <a href="{{ url('/posts/postid/'.$post->id) }}" class="" style="width: relative"> -->
						@if ($post->document_file_name == true)
						<img src="{{ url('storage/'.$post->document_file_name) }}" class="responsive-img">
						@endif
					<!-- </a> -->
					<!-- <a href="{{ url('/posts/postid/'.$post->id) }}" class="black-text"> -->
					<span class="card-title">{{$post->title}}</span>
					<p class="justify-align">{{$post->content}}</p>
					<!-- </a> -->
				</div>
<!-- 					<div class="card-content">
					<p class="justify-align">{{$post->content}} <a href="{{ url('/posts/postid/'.$post->id) }}">Read more</a></p>
				</div> -->
	@if(isset($tagnames[$post->id]))
				<div class="card-action">
		@foreach($tagnames as $key => $value)
			@foreach($value as $v)
				@if($key == $post->id)
					<div class="chip mini-chip">{{ $v[0]->tag_name }}</div>
				@endif
			@endforeach
		@endforeach
				</div>
	@endif
			</div>
			</a>
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