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
	<div class="row" id="post-title">
		<div class="col s12">
			<h3>{{ $post[0]->title }}</h3>
			<p>Posted by <a href="{{url('/profile/profileid/'.$post[0]->user_id)}}">{{ $post[0]->name }}</a> on <span id="post-date">2017/08/05</span>
		</div>
	</div>
	<div class="row" id="post-content"> 
		<div class="col s12">
			@if ($post[0]->document_file_name == true)
			<img src="{{ url('storage/'.$post[0]->document_file_name) }}" class="responsive-img">
			@endif
			<p>{{ $post[0]->content }}</p>
		</div>
	</div>
	<div class="row" id="post-tags">
		<div class="col s12">
			Tagged under: 
			@if(!empty($tagnames))
				@foreach($tagnames as $tagname)
					<a href="#">
					<span class="chip">{{ $tagname[0]->tag_name }}</span>
					</a>
				@endforeach
			@endif
		</div>
	</div>
	@if ($userid == $post[0]->user_id)
		<div class="row right-align hide-on-med-and-down" id="post-options">
			<div class="col s12">
				<a href="{{url('/posts/update/'.$post[0]->id.'/'.$post[0]->user_id)}}" class="yellow darken-3 waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Edit</a>
				<a href="#post-delete" class="red waves-effect waves-light btn"><i class="material-icons left">delete</i>Delete</a>
			</div>
		</div>
		<!-- mobile -->
		<div class="row right-align hide-on-large-only" id="post-options">
			<div class="fixed-action-btn horizontal click-to-toggle">
				<a class="btn-floating btn-large red">
					<i class="material-icons">menu</i>
				</a>
				<ul>
					<li><a href="{{url('/posts/update/'.$post[0]->id.'/'.$post[0]->user_id)}}" class="btn-floating yellow darken-3"><i class="material-icons">mode_edit</i></a></li>
					<li><a href="#post-delete" class="btn-floating red"><i class="material-icons">delete</i></a></li>
				</ul>
			</div>
		</div>
	@else
		<div class="row right-align hide-on-med-and-down" id="post-options">
			<div class="col s12">
				<a href="#post-like" class="blue waves-effect waves-light btn"><i class="material-icons left">thumb_up</i>Like</a>  
				<a href="#post-report" class="red waves-effect waves-light btn"><i class="material-icons left">report_problem</i>Report</a>
			</div>
		</div>
		<!-- mobile -->
		<div class="row right-align hide-on-large-only" id="post-options">
			<div class="fixed-action-btn horizontal click-to-toggle">
				<a class="btn-floating btn-large red">
					<i class="material-icons">menu</i>
				</a>
				<ul>
					<li><a href="#post-like" class="btn-floating blue"><i class="material-icons">thumb_up</i></a></li>
					<li><a href="#post-report" class="btn-floating red"><i class="material-icons">report_problem</i></a></li>
				</ul>
			</div>
		</div>
	@endif
	<!-- MODALS -->
	<!-- delete post -->
	<div id="post-delete" class="modal">
		<div class="modal-content">
			<h4>Delete post</h4>
			<p>Are you sure you want to delete this post? This cannot be undone.</p>				 
		</div>
		<div class="modal-footer">
			<a href="{{url('/posts/delete/'.$post[0]->id.'/'.$post[0]->user_id)}}" class="modal-action modal-close waves-effect waves-light btn-flat">Yes, Delete</a>
			<a href="#!" class="blue modal-action modal-close waves-effect waves-lgiht btn-flat" style="color: #fff;">No, go back</a>
		 </div>
	</div>
	<!-- report post -->
	<div id="post-report" class="modal">
		<div class="modal-content">
			<h4>Report post</h4>
			 <div class="row">
				<form class="col s12">
				   <div class="row">
					<div class="input-field col s12">
					  <textarea id="post-report-text" class="materialize-textarea"></textarea>
					  <label for="post-report-text">Comments</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
						<a href="{{url('/posts/reportPostdb/'.$post[0]->id.'/'.$post[0]->user_id)}}" class="red modal-action modal-close waves-effect waves-light btn-flat" style="color: #fff;">Report Post</a>
						<a href="#!" class="modal-action modal-close waves-effect waves-lgiht btn-flat" >Cancel</a>
					</div>
				  </div>
				</form>
			  </div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	 $(document).ready(function(){
	    $('.modal').modal();
	  });

	 // $(document).ready(function(){
  //     $('.carousel').carousel();
  //    });

      $(document).ready(function(){
	    $('.collapsible').collapsible();
	  });

</script>
@endsection