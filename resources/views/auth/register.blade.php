@extends('layouts.general')

@section('content')
<div class="container" style="padding-top: 75px;">
<h5 class='center'>Registration</h5><br>
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
            <div class='card'>
                <div class='card-content'>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s6 m6 l6{{ $errors->has('name') ? ' has-error' : '' }}">
                                <i class="material-icons prefix">assignment_ind</i>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name">Username</label>
                            </div>
                            <div class="input-field col s6 m6 l6{{ $errors->has('email') ? ' has-error' : '' }}">
                                <i class="material-icons prefix">email</i>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                                <label for="email">E-Mail Address</label>

                            </div>         
                        </div>

                        <div class="row">
                            <div class="input-field col s6 m6 l6{{ $errors->has('password') ? ' has-error' : '' }}">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password" type="password" name="password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s6 m6 l6{{ $errors->has('password') ? ' has-error' : '' }}">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>                                
                        </div>

                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">person</i>
                                <input id="first-name" type="text" name="first_name" required>
                                <label for="first_name" class="col-md-4 control-label">First Name</label>
                            </div>

                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">person</i>
                                <input id="last-name" type="text" name="last_name" required>
                                <label for="last-name" class="col-md-4 control-label">Last Name</label>
                            </div>             
                        </div>

                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">person</i>
                                <input id="middle-name" type="text" name="middle_name" required>
                                <label for="middle-name" class="col-md-4 control-label">Middle Name</label>
                            </div>

                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">phone</i>
                                <input id="mobile-no" type="text" name="mobile_no" required>
                                <label for="mobile-no" class="col-md-4 control-label">Mobile No.</label>
                            </div>             
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <i class="material-icons prefix">date_range</i>
                                <input id="birth-date" type="date" class="datepicker" name="birth_date" required>
                                <label for="birth-date" class="col-md-4 control-label">Birthdate</label>
                            </div>
                            <div class="input-field col s6 m6 l6 center-align">
                                <a href='#modal-request-desc' class='tooltipped right' data-position='right' data-delay='50' data-tooltip='Click for help'>
                                    <i class='material-icons small red-text'>report</i>
                                </a>
                                <input id='request-student' type="checkbox" name="request_student">
                                <label for='request-student'>Request to have student functionality.</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l12 right-align">
                                <button type="submit" class="btn btn-large waves-effect waves-light amber">
                                    Register
                                </button>
                            </div>
                        </div>

                        <div id="modal-request-desc" class="modal">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <h5><i class='material-icons'>error</i> User Role Information</h5>
                                        <hr><br>
                                        <span>Check the box if you are a student in need of funds for your research. A request will be sent for the administrator to approve. For users with pending requests, you will remain registered as Citizens. Citizens can only share ideas.</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
    </div>

</div>
@endsection
