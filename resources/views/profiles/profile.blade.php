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
@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
	<h1>User: {{$first_name.' '.$middle_name.' '.$last_name}}</h1>
	<a href="{{url('/posts/insert')}}">Create Post</a>
	<a href="{{url('/profile/edit')}}">Edit Profile</a>
	<a href="{{url('/profile/delete')}}">Delete Profile</a>
	<h1>Contact Info:</h1>
	<h2>Email: {{$email}}</h2>
	<h2>Mobile Number: {{$mobile_no}}</h2>
	<h1>Personal Info:</h1>
	<h2>Birthdate: {{$birthdate}}</h2>
</div>
@endsection