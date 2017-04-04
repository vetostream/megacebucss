@extends('layouts.general')

@section('content')
<div class="container">

	<div class="row">
		<div class="col s12">

			<div class='card'>
				<div class="card-content">
					<div class='card-title'><i class='small material-icons'>supervisor_account</i>User Requests</div>
					<table id="table-users" class="responsive-table highlight">
						<thead>
							<tr>
								<th>Email Address</th>
						        <th>Username</th>
						        <th>First N.</th>
						        <th>Last N.</th>
                                <th>Type</th>
						    </tr>
						</thead>						
						<tbody>
						@foreach($users as $user)
							<tr data-name='{{$user->name}}' data-id='{{$user->id}}'>
							<td>{{$user->email}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->first_name}}</td>
							<td>{{$user->last_name}}</td>
							<td>@if($user->user_type_id === 1) Citizen @else Student @endif</td>
						    <td><a id="btn-accept-request" class="waves-effect waves-light btn blue accent-4"><i class="material-icons">done</i></a></td>
							</tr>
						@endforeach
						</tbody>				
					</table>
				</div>
			</div>

		</div>
	</div>

</div>
@endsection