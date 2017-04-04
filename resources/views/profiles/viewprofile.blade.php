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
					<h3>{{$first_name.' '.$middle_name.' '.$last_name}}</h3>
					<h6>{{$email}}</h6>
					<h6>{{$mobile_no}}</h6>
					<h6>{{$birthdate}}</h6>
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
<!--<div class="container">
	<div class="col s12 m7">
		<h2 class="header">{{$first_name.' '.$middle_name.' '.$last_name}}</h2>
		<div class="card horizontal">
			<div class="card-stacked">
				<img src="{{ asset('/images/usericoncolr.png') }}" class="responsive-img">
			</div>
			<div class="card-stacked">
				<div class="card-content">
					<h5 class="header">Personal Info:</h5>
					<p>Email: {{$email}}</p>
					<p>Mobile Number: {{$mobile_no}}</p>
					<p>Birthdate: {{$birthdate}}</p>
				</div>
			</div>
		</div>
	</div>
</div>-->
@endsection