<?php
/**
 * Author: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 12, 2016
 * Additional Comments: 
 */
?>
@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
	<h1>User: {{$data[0]->first_name.' '.$data[0]->middle_name.' '.$data[0]->last_name}}</h1>
	<a href="{{url('/posts/insert')}}">Create Post</a>
	<h1>Contact Info:</h1>
	<h2>Email: {{$data[0]->email}}</h2>
	<h2>Mobile Number: {{$data[0]->mobile_no}}</h2>
	<h1>Personal Info:</h1>
	<h2>Birthdate: {{$data[0]->birthdate}}</h2>
</div>
@endsection