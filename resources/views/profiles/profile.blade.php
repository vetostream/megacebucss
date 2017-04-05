@extends('layouts.general')

@section('title', 'Profile')

@section('content')
<div class="container">
	@if(session()->has('error'))
	<h6 class="center-align" style="color:red;">{{ session('error') }}</h6>
	@endif
	<div class="row header-profile">
	  <div class="col s12 m12 l12">
		<div class="card horizontal">
		  <div class="card-image">
			<img src="{{ asset('/images/avatar.jpg') }}" class="responsive-img">
		  </div>
		  <div class="card-stacked">
				<div class="card-content">
					<h5>{{$userinfo->first_name.' '.$userinfo->middle_name.' '.$userinfo->last_name}}</h5>						
					<h6>{{$userinfo->email}}</h6>
					<h6>{{$userinfo->mobile_no}}</h6>
					<h6>{{$userinfo->birthdate}}</h6>
					@if($userinfo->user_type_id === 1)
						<span class="new badge green left rm-margin" data-badge-caption="Citizen"></span>&nbsp;&nbsp;
						<a id='btn-request-student' data-id='{{ $userinfo->id }}' href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Request for student functionality"><i class="material-icons">school</i></a>
					@elseif($userinfo->user_type_id === 2)
						<span class="new badge blue left rm-margin" data-badge-caption="Student"></span>
					@elseif($userinfo->user_type_id === 3)
						<span class="new badge orange left rm-margin" data-badge-caption="Administrator"></span>
					@else
						<span class="new badge orange left rm-margin" data-badge-caption="Administrator"></span>						
					@endif						
				</div>
				<div class="card-action">
					<a href="{{url('/profile/edit')}}">Update</a>
					<a href="{{url('/profile/delete')}}">Deactivate</a>
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
				<li><a href="#Ideas" id="a-ideas"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>My Ideas</a></li>
				<li><a href="#Research" id="a-research"><i class="fa fa-book" aria-hidden="true"></i>My Researches</a></li>
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
