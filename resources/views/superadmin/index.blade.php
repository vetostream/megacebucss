@extends('layouts.general')

@section('content')
<div class="container">
	<h4 class="center-align">Administrator</h4>

	<div class="row">
		<div class="col s12">
			<ul class="collection">
				<a href="{{ url('superadmin/viewAllUsers') }}" class="collection-item">Users</a> 
				<a href="{{ url('superadmin/viewAllReports') }}" class="collection-item">Reports</a>
				<a href="{{ url('superadmin/viewAllRequests') }}" class="collection-item">@if($reqs > 0)<span class="new badge">{{$reqs}}</span>@endif User Requests</a>
			</ul>
		</div>
	</div>

</div>
@endsection

