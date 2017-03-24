@extends('layouts.general')

@section('title', 'Profile')

@section('content')
<div class="container">
	<div class="row">
	  <div class="col s12 m12 l12">
	    <div class="card horizontal">
	      <div class="card-image">
	        <img src="{{ asset('/images/avatar.jpg') }}" class="responsive-img">
	      </div>
	      <div class="card-stacked">
				<div class="card-content">
					<h5 class="header">Personal Info:</h5>
					<p>Email: {{$email}}</p>
					<p>Mobile Number: {{$mobile_no}}</p>
					<p>Birthdate: {{$birthdate}}</p>
				</div>
				<div class="card-action">
					<a href="{{url('/posts/insert')}}">Create Post</a>
					<a href="{{url('/posts/self')}}">My Posts</a>
				</div>
				<div class="card-action">
					<a href="{{url('/profile/edit')}}">Edit Profile</a>
					<a href="{{url('/profile/delete')}}">Delete Profile</a>
				</div>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="row nav-prof">
	    <div class="col s12 l12 m12">
	      <ul class="tabs">
	        <li class="tab col s3"><a href="#test1">Ideas</a></li>
	        <li class="tab col s3"><a class="active" href="#test2">Researches</a></li>
	        <li class="tab col s3"><a href="#test4">Funders</a></li>
	      </ul>
	    </div>
	</div>

	<div class="row">
	    <div id="test1" class="col s12">Test 1</div>
	    <div id="test2" class="col s12">Test 2</div>
	    <div id="test4" class="col s12">Test 4</div>			
	</div>
</div>
@endsection
