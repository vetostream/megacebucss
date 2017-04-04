@extends('layouts.general')

@section('content')
<div class="container">

	<div class="row">
		<div class="col s12">

			<div class='card'>
				<div class="card-content">
					<div class='card-title'><i class='small material-icons'>supervisor_account</i> User Roles</div>
					<table id="table-users" class="responsive-table highlight">
						<thead>
							<tr>
						        <th>Email</th>
						        <th>First N.</th>
						        <th>Last N.</th>
						        <th>Mobile No.</th>
						        <th>Birthdate</th>
						        <th>Type</th>
						    </tr>
						</thead>
						
						<tbody>
							@foreach ($users as $user)
						    <tr data-id='{{ $user->id }}' data-name='{{ $user->name }}'>
						        <td>{{ $user->email }}</td>
						        <td>{{ $user->first_name }}</td>
						        <td>{{ $user->last_name }}</td>
						        <td>{{ $user->mobile_no }}</td>
						        <td>{{ $user->birthdate }}</td>
						        <td>
						        	<select class="browser-default">
						        		<option @if($user->user_type_id == 1) selected @endif value="1">Citizen</option>
						        		<option @if($user->user_type_id == 2) selected @endif value="2">Student</option>
						        		<option @if($user->user_type_id == 3) selected @endif value="3">Admin</option>
						        		<option @if($user->user_type_id == 4) selected @endif value="4">Superadmin</option>
						        	</select>
						        </td>
						        <td><a onclick='return confirm("Really delete user?")' href="{{ url('superadmin/deleteUser') }}/{{ $user->id }}" class="waves-effect waves-light btn red accent-4"><i class="material-icons">delete</i></a></td>
						        <td><a id="btn-edit-user-type" class="waves-effect waves-light btn blue accent-4"><i class="material-icons">done</i></a></td>
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

