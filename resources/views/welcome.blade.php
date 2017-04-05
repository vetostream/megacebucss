@extends('layouts.general')

@section('content')
<div class="parallax-container">
	<div class="parallax">
		<!-- <img src="{{ asset('images/fire-african.jpg') }}" class="responsive-img" > -->
		<img src="{{ asset('images/home1.jpg') }}" style="width: 100%;">
	</div>
</div>

<!-- <div class="parallax-container valign-wrapper">
	<div class="parallax">
		<img src="{{ asset('images/fire-african.jpg') }}" style="display: block; transform: translate3d(50%, 271px, 0px);">
	</div>
</div> -->
<!-- <div class='separator-black'></div> -->
<div class="row row-no-margin home-wrapper">
	<div class="center home-bg-1" style="background-image: url('{{ asset("images/home-ideas.png") }}');">
		<!-- <h3 class="grey-text text-darken-3"><b>Have an idea? Share it here!</b></h3> -->
		<a href='register' class='waves-effect waves-light btn btn-jumbo amber accent-3'>Share Your Idea <!-- 	 --></a>
		<a href='publicposts' class='waves-effect waves-light btn btn-jumbo blue accent-3'>Browse Ideas <!-- 	 --></a>
	</div>
</div>
<!-- <div class='separator-black'></div> -->
<!-- 
<div class="parallax-container">
	<div class="parallax">
		<img src="{{ asset('images/engr-workplace.jpg') }}" class="responsive-img" style="display: block;top: 0;right: 0;">
	</div>
</div> -->
<div class="parallax-container valign-wrapper">
	<div class="parallax">
		<img src="{{ asset('images/home2.jpg') }}" style="width: 100%;">
		<!-- <img src="{{ asset('images/engr-workplace.jpg') }}" style="display: block; transform: translate3d(-50%, 271px, 0px);"> -->
	</div>
</div>


@endsection