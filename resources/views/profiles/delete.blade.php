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
	<a href="{{url('/profile/deleteOption/1')}}">Delete Account Only</a>
	<a href="{{url('/profile/deleteOption/2')}}">Delete Account and Posts</a>
</div>
@endsection