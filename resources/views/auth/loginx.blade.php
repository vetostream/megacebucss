@extends('layouts.general')

@section('content')
<center>
<div class="container">

    <div class="card-panel">
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
        <div class="col s12 m12 l12 offset-s6">
                    <form class="col s12 m12 l12" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="input-field col s12 m6 l6{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email</label>
                            </div>                            
                        </div>


                        <div class="row">
                            <div class="input-field col s12 m6 l6{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="validate" name="password" required autofocus>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l6">
                                <p>
                                  <input type="checkbox" id="rem" name="remember" />
                                  <label for="rem">Remember Me</label>
                                </p>                                
                            </div>                        
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l6">
                              <button class="btn waves-effect waves-light" type="submit" name="action">LOGIN
                              </button>                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <a class="waves-effect waves-light btn">Forgot Password?</a>
                            </div>                            
                        </div>
<!-- 
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">


                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div> -->
                    </form>
        </div>
    </div>    
</div>
</center>
@endsection
