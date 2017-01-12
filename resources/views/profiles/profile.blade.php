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
	<h1>User: {{$userinfo[0]->first_name.' '.$userinfo[0]->middle_name.' '.$userinfo[0]->last_name}}</h1>
	<a href="{{url('/posts/insert')}}">Create Post</a>
	<a href="{{url('/profile/edit')}}">Edit Profile</a>
	<h1>Contact Info:</h1>
	<h2>Email: {{$userinfo[0]->email}}</h2>
	<h2>Mobile Number: {{$userinfo[0]->mobile_no}}</h2>
	<h1>Personal Info:</h1>
	<h2>Birthdate: {{$userinfo[0]->birthdate}}</h2>
</div>
@endsection