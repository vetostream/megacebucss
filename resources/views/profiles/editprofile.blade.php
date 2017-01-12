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

@section('title', 'Edit Profile')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">Register</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/editCheck') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name" class="col-md-4 control-label">Username</label>

					<div class="col-md-6">
						<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

						@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="col-md-4 control-label">E-Mail Address</label>

					<div class="col-md-6">
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="col-md-4 control-label">Password</label>

					<div class="col-md-6">
						<input id="password" type="password" class="form-control" name="password" required>

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

					<div class="col-md-6">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
					</div>
				</div>

				<div class="form-group">
					<label for="first_name" class="col-md-4 control-label">First Name</label>

					<div class="col-md-6">
						<input id="first-name" type="text" class="form-control" name="first_name" required>
					</div>
				</div>

				<div class="form-group">
					<label for="last-name" class="col-md-4 control-label">Last Name</label>

					<div class="col-md-6">
						<input id="last-name" type="text" class="form-control" name="last_name" required>
					</div>
				</div>

				<div class="form-group">
					<label for="middle-name" class="col-md-4 control-label">Middle Name</label>

					<div class="col-md-6">
						<input id="middle-name" type="text" class="form-control" name="middle_name" required>
					</div>
				</div>

				<div class="form-group">
					<label for="mobile-no" class="col-md-4 control-label">Mobile No.</label>

					<div class="col-md-6">
						<input id="mobile-no" type="text" class="form-control" name="mobile_no" required>
					</div>
				</div>

				<div class="form-group">
					<label for="birth-date" class="col-md-4 control-label">Birthdate</label>

					<div class="col-md-6">
						<input id="birth-date" type="date" class="form-control" name="birth_date" required>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Register
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection