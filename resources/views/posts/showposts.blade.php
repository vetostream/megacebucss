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
	<h4 class="center-align">Ideaboard</h4>

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

	<div class='row'>
		<div class='col s12'>

			<form name="search-form" action="{{ url('/search/everything') }}" method="get">
				<div class="input-field">
					<input id="search-auto" type="search" name="keyword" required>
					<label class="label-icon" for="search"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</form>

		</div>
	</div>
		
	<!-- ROW1 -->
	<div class="pinterest-col">
		@foreach($posts as $post)
		<div class="col s12 m4 l4">
			<a href="{{ url('/posts/postid/'.$post->id) }}" class="black-text">	
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
<!--     </div>     -->
	<!-- ROW3 --> 

	<!-- PAGINATION STARTS HERE -->
<!-- 	<div class="row">
		<ul class="pagination center-align">
			<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			<li class="active"><a href="#!">1</a></li>
			<li class="waves-effect"><a href="#!">2</a></li>
			<li class="waves-effect"><a href="#!">3</a></li>
			<li class="waves-effect"><a href="#!">4</a></li>
			<li class="waves-effect"><a href="#!">5</a></li>
			<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
		</ul>
	</div> -->
	<!-- PAGINATION ENDS HERE -->

</div>
@endsection
