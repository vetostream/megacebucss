@extends('layouts.general')

@section('content')
<div class="container" style="padding-top: 100px;">
<p>Please correctly fill up the form</p>
<div class="card-panel">
    @if ($errors->has('name'))
        <div class="col s6 m6 l6 center-align error-block">
            <p>{{ $errors->first('name') }}</p>
        </div>
    @endif
    @if ($errors->has('email'))
        <div class="col s6 m6 l6 center-align error-block">
            <p>{{ $errors->first('email') }}</p>
        </div>
    @endif    
    @if ($errors->has('password'))
        <div class="col s6 m6 l6 center-align error-block">
            <p>{{ $errors->first('password') }}</p>
        </div>
    @endif    
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col s6 m6 l6{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    <label for="name">Username</label>
                </div>
                <div class="input-field col s6 m6 l6{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <label for="email">E-Mail Address</label>

                </div>         
            </div>

            <div class="row">
                <div class="input-field col s6 m6 l6{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <label for="password">Password</label>
                </div>

                <div class="input-field col s6 m6 l6{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    <label for="password-confirm">Confirm Password</label>
                </div>                                
            </div>

            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <input id="first-name" type="text" class="form-control" name="first_name" required>
                    <label for="first_name" class="col-md-4 control-label">First Name</label>
                </div>

                <div class="input-field col s6 m6 l6">
                    <input id="last-name" type="text" class="form-control" name="last_name" required>
                    <label for="last-name" class="col-md-4 control-label">Last Name</label>
                </div>             
            </div>

            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <input id="middle-name" type="text" class="form-control" name="middle_name" required>
                    <label for="middle-name" class="col-md-4 control-label">Middle Name</label>
                </div>

                <div class="input-field col s6 m6 l6">
                    <input id="mobile-no" type="text" class="form-control" name="mobile_no" required>
                    <label for="mobile-no" class="col-md-4 control-label">Mobile No.</label>
                </div>             
            </div>

            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <input id="birth-date" type="date" class="datepicker" name="birth_date" required>
                    <label for="birth-date" class="col-md-4 control-label">Birthdate</label>
                </div>           
            </div>            

            <div class="row">
                <div class="input-field col s12 m12 l12 right-align">
                    <button type="submit" class="btn waves-effect waves-light">
                        Register
                    </button>
                </div>
            </div>

        </form>    
</div>

</div>
@endsection
