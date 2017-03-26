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

@section('content')
<div class="container">
	<h3 class="center-align dboard-head">Ideas</h3>

  <!-- SEARCH BAR -->
<!--     <div class="row dboard">
		<div class="col s6 m6 l6">
		  <div class="row">
			<div class="input-field col s12">
			  <i class="material-icons prefix">search</i>
			  <input type="text" id="autocomplete-input" class="autocomplete">
			  <label for="autocomplete-input">Ideas tags</label>
			</div>
		  </div>
		</div>    
	</div> -->
		
	<!-- ROW1 -->       
<!--     <div class="row dboard"> -->
	<?php $count = 1; $length = count($posts)+1; $addpostcard=0; ?>

	@if ($count === 1 | $count%3 === 0)
	<div class="row">
	@endif
	@if ($addpostcard === 0)
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
		<?php $addpostcard = 1; ?>
	@endif
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
					<?php 
						// @foreach($post->Tag as $tag)
						// <a href="#"><span class="chip">{{$tag->tag_name}}</span></a>
						// @endforeach
					// var_dump($tagnames);
					?>
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
	@if ($count%3 === 0 | $count+1 === $length)
	</div>
	@endif
	<?php $count++; ?>
<!--     </div>     -->
	<!-- ROW3 --> 

	<!-- PAGINATION STARTS HERE -->
	<div class="row">
		<ul class="pagination center-align">
			<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			<li class="active"><a href="#!">1</a></li>
			<li class="waves-effect"><a href="#!">2</a></li>
			<li class="waves-effect"><a href="#!">3</a></li>
			<li class="waves-effect"><a href="#!">4</a></li>
			<li class="waves-effect"><a href="#!">5</a></li>
			<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
		</ul>
	</div>
	<!-- PAGINATION ENDS HERE -->

</div>
@endsection
