@extends('layouts.general')

@section('title', 'Create Post')

@section('content')
<!-- FORM START -->
<div class="container">
	<div class="row">
	<div class="col s12 m12">
	  <div class="card grey lighten-5">
		<div class="card-content black-text">
		  <span class="card-title">Post an Idea</span>
		  <!-- <hr> -->
		  <div class="row">
			<form class="col s12" method="post" action="{{ url('/posts/get') }}" enctype="multipart/form-data" id="createpostform" name="createpostform">
			{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12 {{ $errors->has('title') ? ' has-error' : '' }}">
					  <input id="title" type="text" class="validate" name="title" required>
					  <label for="title">Title</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 {{ $errors->has('content') ? ' has-error' : '' }}">
					  <textarea id="content" class="materialize-textarea" name="content"></textarea>
					  <label for="content">Description</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<div class="chips chips-initial" id="createpostchips">
							Tags
							<i class="close material-icons">close</i>
						</div>
						<label for="post_tags">Tags</label>
					</div>
					<!-- zafra edit -->
					<input type="hidden" id="tags" name="tags" value="">
				</div>
				<div class="row">
					<div class="file-field input-field {{ $errors->has('postimg') ? ' has-error' : '' }}">
					  <div class="btn">
						<span>Image</span>
						<input type="file" id="postimg" name="postimg">
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload file">
					  </div>
					@if ($errors->has('postimg'))
						<span class="help-block">
							<strong>{{ $errors->first('postimg') }}</strong>
						</span>
					@endif
					</div>
				</div>
		  </div>
		</div>
		<div class="card-action">
			<button class="btn waves-effect waves-light blue darken-3 submit-post" type="submit" id="action" name="action">Post
				<i class="material-icons right">send</i>
			</button>
			<!-- <a class="waves-effect waves-light btn blue darken-3"><i class="material-icons right">send</i>Post</a> -->
			<a class="waves-effect waves-light btn grey" href="{{ url('/posts') }}">Back</a>
		</div>
		</form>
	  </div>
	</div>
  </div>
  </div>
  <!-- FORM END -->

@endsection

@section('scripts')
  <!-- zafra edit -->
  <!-- <script src="{{ asset('/js/jquery.min.js') }}"></script> -->
  <script>
  	// $( document ).on("click", "form[name='createpostform']",function(e){
  	$( document ).on("click", "button[name='action']",function(e){
  		e.preventDefault();
  		$fulltags="";
  		$jsontags = $("#createpostchips").material_chip('data');
  		$.each($jsontags, function(key,value){
  			$fulltags += ";" + value.tag;
  		});
  		$("#tags").val( $fulltags );
  		$("form[name='createpostform']").submit();
  	});
  </script>
@endsection

