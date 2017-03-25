@extends('layouts.general')

@section('title', 'Edit Research')

@section('content')
<!-- FORM START -->
<div class="container">
	<div class="row">
	<div class="col s12 m12">
	  <div class="card grey lighten-5">
		<div class="card-content black-text">
		  <span class="card-title">Edit Research</span>
		  <hr>
		  <div class="row">
			<form class="col s12" role="form" method="post" action="{{ url('research/update') }}/{{ $research->id }}" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="row">
					<div class="input-field col s12 {{ $errors->has('title') ? ' has-error' : '' }}">
					  <input id="title" type="text" class="validate" name="title" value="{{ $research->title }}" required>
					  <label for="title">Research Title</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 {{ $errors->has('research_abstract') ? ' has-error' : '' }}">
					  <textarea id="research_abstract" class="materialize-textarea" name="research_abstract">{{ $research->research_abstract }}</textarea>
					  <label for="research_abstract">Research Abstract</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 {{ $errors->has('fund_goal') ? ' has-error' : '' }}">
					  <input id="fund-goal" type="number" class="validate" name="fund_goal" value="{{ $research->fund_goal }}" required>
					  <label for="fund-goal">Estimated cost</label>
					</div>
				</div>				
				<div class="row">
					<div class="input-field col s12">
						<div class="chips chips-initial" id = "createresearchchips">
							Tags
							<i class="close material-icons">close</i>
						</div>
						<label for="post_tags">Tags</label>
					</div>
					<!-- zafra edit -->
					<input type="hidden" id="tags" name="tags" value="">
				</div>
				<div class="row">
					<div class="file-field input-field {{ $errors->has('document_file_name') ? ' has-error' : '' }}">
					  <div class="btn">
						<span>File</span>
						<input type="file" id="document-file-name" name="document_file_name" value="{{ $research->document_file_name }}" required>
					  </div>
					  <div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload file">
					  </div>
					</div>
				</div>
		  </div>
		</div>
		<div class="card-action">
			<button class="btn waves-effect waves-light blue darken-3" type="submit" name="action">Post
				<i class="material-icons right">send</i>
			</button>
			<!-- <a class="waves-effect waves-light btn blue darken-3"><i class="material-icons right">send</i>Post</a> -->
			<a class="waves-effect waves-light btn grey" href="{{ url('research/') }}">Back</a>
		</div>
		</form>        
	  </div>
	</div>
  </div>
  </div>
  <!-- FORM END -->
  <!-- zafra edit -->
  <script src="{{ asset('/js/jquery.min.js') }}"></script>
  <script>
  	// $( document ).on("click", "button[name='action']",function(e){
  	// 	e.preventDefault();
  	// 	$fulltags="";
  	// 	$jsontags = $("#createresearchchips").material_chip('data');
  	// 	$.each($jsontags, function(key,value){
  	// 		$fulltags += ";" + value.tag;
  	// 	});
  	// 	$("#tags").val( $fulltags );
  	// 	$("form[name='createresearchform']").submit();
  	// });
  </script>
@endsection