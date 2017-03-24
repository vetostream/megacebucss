<?php
/**
 * Author: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 12, 2017
 * Additional Comments: 
 */
?>
@extends('layouts.general')

@section('title', 'Profile')

@section('content')
<div class="container">
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
</div>
@endsection