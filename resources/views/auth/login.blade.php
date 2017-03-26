@extends('layouts.general')

@section('content')
    <center>
      <div class="container" style="padding-top: 200px;">
        <div class="col s12 m12 l12">
            <p>Please login using correct credentials</p>    
        </div>

        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; height: 100%; width: 600px;">
        <div class="col s12 m12 l12">
                    @if ($errors->has('email'))
                        <div class="col s12 m12 l12 center-align error-block">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                    @if ($errors->has('password'))
                        <div class="col s12 m12 l12 center-align error-block">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif         
                    <form class="col s12 m12 l12" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="row left-align">
                            <div class="input-field col s12 m12 l12{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email">Email</label>
                            </div>                            
                        </div>


                        <div class="row">
                            <div class="input-field col s12 m12 l12{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="validate" name="password" required autofocus>
                            </div>                            
                        </div>


                        <div class="row">
                            <div class="col s12 m12 l12">
                              <button class="btn waves-effect waves-light" type="submit" name="action">LOGIN
                              </button>                              
                            </div>
                        </div>
                    </form>
        </div>
        </div>
      </div>
    </center>
@endsection
