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
					<span class="card-title">{{ $post[0]->title }}</span>
					<h5 class="header">Author: 
					<a href="{{url('/profile/profileid/'.$post[0]->user_id)}}">{{ $post[0]->name }}</a>
					</h5>
					<p>{{ $post[0]->content }}</p>
				</div>
				<div class="card-action">
					<div class="chip mini-chip">lake</div>
					<div class="chip mini-chip">mountains</div>
					<div class="chip mini-chip">nature</div>
					<div class="chip mini-chip more">+3 more</div>
				</div>
				@if ($userid == $post[0]->user_id)
				<div class="card-action">
					<a href="{{url('/posts/update/'.$post[0]->id.'/'.$post[0]->user_id)}}">Edit Post</a>
					<a href="{{url('/posts/delete/'.$post[0]->id.'/'.$post[0]->user_id)}}">Delete Post</a>
					<a href="{{url('/posts/reportPostdb/'.$post[0]->id.'/'.$post[0]->user_id)}}">Report Post</a>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection