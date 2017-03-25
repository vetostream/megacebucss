@extends('layouts.general')

@section('title', 'Profile')

@section('content')
<?php 

?>
<div class="container">
	<div class="row header-profile">
	  <div class="col s12 m12 l12">
		<div class="card horizontal">
		  <div class="card-image">
			<img src="{{ asset('/images/avatar.jpg') }}" class="responsive-img">
		  </div>
		  <div class="card-stacked">
				<div class="card-content">
					<h3>{{$userinfo->first_name.' '.$userinfo->middle_name.' '.$userinfo->last_name}}</h3>
					<h6>{{$userinfo->email}}</h6>
					<h6>{{$userinfo->mobile_no}}</h6>
					<h6>{{$userinfo->birthdate}}</h6>
				</div>
				<div class="card-action">
					<a href="{{url('/profile/edit')}}">Edit Profile</a>
					<a href="{{url('/profile/delete')}}">Delete Profile</a>
				</div>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
	<div class="row nav-prof">
		<div class="col s12 l12 m12">
		  <ul class="tabs">
			<li class="tab col s3"><a class="" href="#test1">Ideas</a></li>
			<li class="tab col s3"><a class="active" href="#test2">Researches</a></li>
			<li class="tab col s3"><a href="#test4">Funders</a></li>
		  </ul>
		</div>
	</div>
 -->
 	<div class="row">
 		<header>
 		<div class="col s12 l12 m12 nav-prof">
 			<ul>
 				<li><a href="#Ideas" id="a-ideas"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Your Ideas</a></li>
 				<li><a href="#Research" id="a-research"><i class="fa fa-book" aria-hidden="true"></i>Your Researches</a></li>
 			</ul>
 		</div>
 		</header>	
 	</div>

	<div class="row board-profile">
		<div class="row ideas-profile">
			@foreach($posts as $post)
				<div class="col s12 m4 l4">
					<div class="card">
						<div class="card-image">
							<div class="fixed-action-btn horizontal dboard-like" style="position: relative">
								<a class="" style="width: relative">
									@if ($post->document_file_name == true):
									<img src="{{ url('storage/'.$post->document_file_name) }}">
									@endif
									<span class="card-title">{{$post->title}}</span>
								</a>
								<ul>
									<li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-content">
							<p class="justify-align">{{$post->content}} <a href="{{ url('/posts/postid/'.$post->id) }}">Read more</a></p>
						</div>
						<div class="card-action">
							<div class="chip mini-chip">lake</div>
							<div class="chip mini-chip">mountains</div>
							<div class="chip mini-chip">nature</div>
							<div class="chip mini-chip more">+3 more</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="row research-profile">
			@foreach($posts as $post)
				<div class="col s12 m4 l4">
					<div class="card">
						<div class="card-image">
							<div class="fixed-action-btn horizontal dboard-like" style="position: relative">
								<a class="" style="width: relative">
									<img src="{{ url('storage/'.$post->document_file_name) }}">
									<span class="card-title">{{$post->title}}</span>
								</a>
								<ul>
									<li><a class="btn-floating red"><i class="material-icons">thumb_up</i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-content">
							<p class="justify-align">{{$post->content}} <a href="{{ url('/posts/postid/'.$post->id) }}">Read more</a></p>
						</div>
						<div class="card-action">
							<div class="chip mini-chip">lake</div>
							<div class="chip mini-chip">mountains</div>
							<div class="chip mini-chip">nature</div>
							<div class="chip mini-chip more">+3 more</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>						
	</div>
</div>
@endsection
