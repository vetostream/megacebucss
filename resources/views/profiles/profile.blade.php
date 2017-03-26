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
					<a href="{{url('/profile/delete')}}">Delete Account</a>
					<a href="{{url('/research/create')}}">Exhibit Research</a>
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
				<!-- <li><a href="{{ url('/profile') }}" id="a-top"><i class="fa " aria-hidden="true"></i>Top</a></li> -->
			</ul>
		</div>
		</header>	
	</div>

	<div class="row board-profile">
		<div class="row ideas-profile dboard">
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
			<a href="{{ url('/profile') }}" class="waves-effect waves-light btn"><i class="material-icons">Top</i></a>
		</div>

		<div class="row research-profile dboard">
		<?php 
		// var_dump($researches);
		 ?>
			<a href="{{ url('/profile') }}" class="waves-effect waves-light btn"><i class="material-icons">Top</i></a>
		</div>
	</div>
</div>
@endsection
