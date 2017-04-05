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
@extends('layouts.publicgeneral')

@section('title', 'Post')

@section('content')
<div class="container">
	<div class="row" id="post-title">
		<div class="col s12">
			<h4>{{ $post[0]->title }}</h4>
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
		<div class="collapsible-header"><i class="material-icons">comments</i>Comments</div>
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
						<div class="col s1">
						<img src="{{ asset('images/usericon.png') }}" alt="" class="circle responsive-img">
						</div>
						<div class="col s11">
						<span class="black-text">
							<p><b>{{ $c->name }}</b> says:<br>{{$c->content}}</p>
						</span>
						</div>
					</div>
					</div>
				</div>
				@endforeach
			@endif
			</div>
		</div>
		</li>
		</ul>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	 // $(document).ready(function(){
		// $('.modal').modal();
	 //  });

	 // $(document).ready(function(){
  //     $('.carousel').carousel();
  //    });

	  $(document).ready(function(){
		$('.collapsible').collapsible();
	  });

</script>
@endsection