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
@extends('layouts.publicgeneral')

@section('content')
<div class="container">
	<h4 class="center-align">Ideaboard</h4>
		
	<!-- ROW1 -->
	<div class="pinterest-col">
		@foreach($posts as $post)
		<div class="col s12 m4 l4">
			<a href="{{ url('/publicposts/postid/'.$post->id) }}" class="black-text">	
			<div class="card hoverable pin">
				<div class="card-content">
					@if ($post->document_file_name == true)
					<img src="{{ url('storage/'.$post->document_file_name) }}" class="responsive-img">
					@endif
					<span class="card-title">{{$post->title}}</span>
					<p class="justify-align">{{ $post->content }}</p>
				</div>
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
@endsection
