@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $research->title }} by
                    <a href="{{ url('profile/profileid') }}/{{ $research->user[0]->id }}">
                         {{ $research->user[0]->first_name.' '.$research->user[0]->last_name }}
                    </a>
                </div>

                <div class="panel-body">
                    {{ $research->research_abstract }}
                </div>

                <div class="panel-footer">

                    <span>Funds: P {{ $research->fund_total }}.00 </span>
                    <br>

                    <form method='POST' action="{{ url('research/fund') }}/{{ $research->id }}/{{ $user->id }}">
                        {{ csrf_field() }}
                        <input name='amount' type='number' min='500.00' step='100.00' required>
                        <input class="btn btn-primary" type='submit' value='Fund!'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection