@extends('layouts.general')

@section('content')
<div class="parallax-container">
	<div class="parallax">
		<!-- <img src="{{ asset('images/fire-african.jpg') }}" class="responsive-img" > -->
		<img src="{{ asset('images/second.jpg') }}">
	</div>
</div>

<!-- <div class="parallax-container valign-wrapper">
	<div class="parallax">
		<img src="{{ asset('images/fire-african.jpg') }}" style="display: block; transform: translate3d(50%, 271px, 0px);">
	</div>
</div> -->
<div class="row row-no-margin home-wrapper">
	<div class="center home-bg-1" style="background-image: url('{{ asset("images/home.png") }}');">
		<!-- <h3 class="grey-text text-darken-3"><b>Have an idea? Share it here!</b></h3> -->
		<a href='#' class='waves-effect waves-light btn btn-jumbo amber accent-3'>Share Your Idea <!-- 	 --></a>
	</div>
</div>
<!-- 
<div class="parallax-container">
	<div class="parallax">
		<img src="{{ asset('images/engr-workplace.jpg') }}" class="responsive-img" style="display: block;top: 0;right: 0;">
	</div>
</div> -->
<div class="parallax-container valign-wrapper">
	<div class="parallax">
		<img src="{{ asset('images/first.jpg') }}">
		<!-- <img src="{{ asset('images/engr-workplace.jpg') }}" style="display: block; transform: translate3d(-50%, 271px, 0px);"> -->
	</div>
</div>


@endsection