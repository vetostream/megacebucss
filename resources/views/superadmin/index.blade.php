@extends('layouts.general')

@section('content')
<div class="container">
	<h3 class="center-align">Administrator</h3>

	<div class="row">
		<div class="col s12">
			<ul class="collection">
				<a href="{{ url('superadmin/viewAllUsers') }}" class="collection-item">Users</a> 
				<a href="#" class="collection-item">Reports</a>
			</ul>
		</div>
	</div>

</div>
@endsection

