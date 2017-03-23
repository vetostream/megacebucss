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
	<h2 class="header">{{$first_name.' '.$middle_name.' '.$last_name}}</h2>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/deleteOption') }}">
		{{ csrf_field() }}
		<!-- <div class="form-group">
			<input type="radio" name="option" id="delete1" value="1" checked>
			<label for="delete1" class="col-md-4 control-label">Delete Account Only</label>
		</div> -->
		<div class="form-group">
			<input type="radio" name="option" id="delete2" value="2">
			<label for="delete2" class="col-md-4 control-label">Delete Account and Posts</label>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					Confirm
				</button>
			</div>
		</div>
	</form>
</div>
@endsection