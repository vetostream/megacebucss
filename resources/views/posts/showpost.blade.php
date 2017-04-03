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
			<p>Posted by
				<a href="{{url('/profile/profileid/'.$post[0]->user_id)}}">{{ $post[0]->name }}</a>
				on <span id="post-date">2017/08/05</span>
				<span class="new badge blue" style="float:none;" data-badge-caption="Likes" id="likecount">{{ $likes }}</span>
				@if(!empty($report))
				<span class="new badge red" style="float:none;" data-badge-caption="Reports">{{ $report->number_of_reps}}</span>
				@endif
			</p>
		</div>
<!--		<input type="text" value='{{ $likes }}' name="number_likes" hidden>-->
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
	<div class="col s12">
		<ul class="collapsible" data-collapsible="accordion">
		<li class="active">
		<div class="collapsible-header"><i class="material-icons">whatshot</i>Comments</div>
		<div class="collapsible-body">
			<div class="row">
			@if(empty($comments))
				<div class="col s12 m12 l12">
					<p>No comments yet.</p>
				</div>
			@else
				@foreach($comments as $c)
				<div class="col s12 m12 l12">
					<div class="card-panel grey lighten-5 z-depth-1">
					<div class="row valign-wrapper">
						<div class="col s2">
						<img src="{{ asset('images/usericon.png') }}" alt="" class="circle responsive-img">
						</div>
						<div class="col s10">
						<span class="black-text">
							<p><b>{{ $c->name }}</b> says:<br>{{$c->content}}</p>
						</span>
						</div>
					</div>
					</div>
				</div>
				@endforeach
			@endif
				<div class="col s12 m12 l12">
					<form class="col s12 m12 l12" name="comment-form" method="POST" action="{{ url('posts/postcomment') }}">
					{{ csrf_field() }}
						<div class="input-field col s12 m12 l12">
						<input type="text" name="post_id" value="{{ $post[0]->id }}" hidden="true">
						<textarea id="textarea1" class="materialize-textarea" name="comment_content"></textarea>
						<label for="textarea1">Leave a comment</label>
						</div>
					<div class="col s12 m12 l12">
						<button class="btn waves-effect waves-light" type="submit" name="post-comment">Submit<i class="material-icons right">send</i></button>
					</div>
					</form>
				</div>
			</div>
		</div>
		</li>
		</ul>
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
				@if($ableLike !== 0)
				<a href="#post-like" class="blue waves-effect waves-light btn" id="post-like-a"><i class="material-icons left">thumb_up</i>Like</a>
				<a style="display:none;" href="#post-unlike" class="grey waves-effect waves-light btn" id="post-unlike-a"><i class="material-icons left">thumb_down</i>Unlike</a>
				@else
				<a style="display:none;" href="#post-like" class="blue waves-effect waves-light btn" id="post-like-a"><i class="material-icons left">thumb_up</i>Like</a>
				<a href="#post-unlike" class="grey waves-effect waves-light btn" id="post-unlike-a"><i class="material-icons left">thumb_down</i>Unlike</a>
				@endif
				<form name="like-form" style="display:none">
				<input type="text" value='{{ $post[0]->id }}' name="post_id" hidden/>
				<input type="text" value='{{ Auth::user()->id }}' name="user_id" hidden/>
				</form>
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
				<form class="col s12" method="post" action="{{ url('/posts/report') }}" >
					{{csrf_field()}}
				   <div class="row">
					<div class="input-field col s12">
					  <textarea id="postreporttext" name="postreporttext" class="materialize-textarea"></textarea>
					<input type="hidden" id="postid" name="postid" value="{!!$post[0]->id!!}">
					<input type="hidden" id="userid" name="userid" value="{!!$post[0]->user_id!!}">
					  <label for="post-report-text">Comments</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
					<button class="red modal-action modal-close waves-effect waves-light btn-flat" style="color: #fff;" type="submit" id="action" name="action">Report Post
						<i class="material-icons right"></i>
					</button>
						<!--<a href="{{url('/posts/reportPostdb/'.$post[0]->id.'/'.$post[0]->user_id.'/')}}" class="red modal-action modal-close waves-effect waves-light btn-flat" style="color: #fff;">Report Post</a>-->
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