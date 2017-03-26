<?php
/**
 * Author: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 16, 2017
 * Additional Comments: 
 */
?>
@extends('layouts.general')

@section('title', 'Post')

@section('content')
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-action">
					<a href="{{url('/posts/insert')}}">Create Post</a>
					<a href="{{url('/posts/self')}}">My Posts</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					@if ($post[0]->document_file_name == true)
					<img src="{{ url('storage/'.$post[0]->document_file_name) }}">
					@endif
					<span class="card-title">{{ $post[0]->title }}</span>
					<h5 class="header">Author: 
					<a href="{{url('/profile/profileid/'.$post[0]->user_id)}}">{{ $post[0]->name }}</a>
					</h5>
					<!-- <p>Post id: {{ $post[0]->id }}</p> -->
					<p>{{ $post[0]->content }}</p>
				</div>
				<div class="card-action">
				@foreach($tagnames as $tagname)
					<div class="chip mini-chip">{{ $tagname[0]->tag_name }}</div>
				@endforeach
				</div>
				<div class="card-action">
				@if ($userid == $post[0]->user_id)
					<a href="{{url('/posts/update/'.$post[0]->id.'/'.$post[0]->user_id)}}">Edit Post</a>
					<a href="{{url('/posts/delete/'.$post[0]->id.'/'.$post[0]->user_id)}}">Delete Post</a>
				@endif
					<a href="{{url('/posts/reportPostdb/'.$post[0]->id.'/'.$post[0]->user_id)}}">Report Post</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection