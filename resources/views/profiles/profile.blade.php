@extends('layouts.general')

@section('title', 'Profile')

@section('content')
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
					<a href="{{url('/posts/insert')}}">Share Idea</a>
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
				<li id="profile-li"><a href="#profile" id="a-profile"><i class="fa fa-chevron-left" aria-hidden="true"></i>Profile</a></li>
				<li><a href="#Ideas" id="a-ideas"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Your Ideas</a></li>
				<li><a href="#Research" id="a-research"><i class="fa fa-book" aria-hidden="true"></i>Your Researches</a></li>
				<!-- <li><a href="{{ url('/profile') }}" id="a-top"><i class="fa " aria-hidden="true"></i>Top</a></li> -->
			</ul>
		</div>
		</header>	
	</div>

	<div class="board-profile">
		<div class="ideas-profile pinterest-col">
			@foreach($posts as $post)
			<!-- <div class="col s12 m12 l6"> -->
			<div class="col s12 m4 l4">
				<a href="{{ url('/posts/postid/'.$post->id) }}" class="black-text">	
				<div class="card hoverable pin">
					<div class="card-content">
						@if ($post->document_file_name == true)
						<img src="{{ url('storage/'.$post->document_file_name) }}" class="responsive-img">
						@endif
						<span class="card-title">{{$post->title}}</span>
						<p class="justify-align">{{$post->content}}</p>
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

		<div class="research-profile pinterest-col">
			@foreach($researches as $research)
			<div class="col s12 m12 l6">
				<a href="{{ url('research/detail') }}/{{ $research->id }}" class="black-text">
				<div class="card hoverable pin">
					<div class="cardpanel-research">
						<span class="card-title">{{$research->title}}</span>
							<p class="justify-align">
								{{$research->research_abstract}}
							</p>
					</div>
					<div class="card-action">
						@foreach($research->Tag as $tag)
						<div class="chip mini-chip">{{$tag->tag_name}}</div>
						@endforeach
					</div>
				</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
