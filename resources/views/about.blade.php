@extends('layouts.general')

@section('content')
<div class="parallax-container">
	<div class="parallax">
		<!-- <img src="{{ asset('images/fire-african.jpg') }}" class="responsive-img" > -->
		<img src="{{ asset('images/engr-workplace.jpg') }}">
	</div>
</div>

<!-- <div class="parallax-container valign-wrapper">
	<div class="parallax">
		<img src="{{ asset('images/fire-african.jpg') }}" style="display: block; transform: translate3d(50%, 271px, 0px);">
	</div>
</div> -->

<div class="section white">
	<div class="row container" style="padding-top: 14px;">
		<h2 class="header">About Us</h2>
		<p class="grey-text text-darken-3 lighten-3">
		Ideas. We have plenty of them. There are good ideas and there are bad ideas. Nevertheless, we need ideas as they are the very foundation with which our society is built. As such, this system crowdsources ideas for the benefit of the Philippines from its citizens. 
		</p>
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
		<img src="{{ asset('images/fire-african.jpg') }}" >
		<!-- <img src="{{ asset('images/engr-workplace.jpg') }}" style="display: block; transform: translate3d(-50%, 271px, 0px);"> -->
	</div>
</div>
@endsection