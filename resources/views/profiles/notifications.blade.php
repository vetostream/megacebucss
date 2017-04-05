@extends('layouts.general')

@section('content')
<div class="container">
	<h3 class="center-align">Notifications</h3>

	<div class="row">
		<div class="col s12">
        
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header">@if($reqs === 1)<span class="new badge">1</span>@endif<i class="material-icons">account_circle</i>User status</div>
                    <div class="collapsible-body">
                        <div class="row" id="user-type-ack">
                        <div class="col s6 m6 l6">
                            <p>@if($reqs === 1)You now have student privileges, Congratulations! @else No notifications. @endif</p>
                        </div>
                        <div class="col s6 m6 l6 right-align">
                            @if($reqs === 1)<a onclick="acknowledge(40,'user_type')" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">done</i></a>@endif
                        </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">@if(!empty($funders))<span class="new badge">{{ count($funders) }}</span>@endif<i class="material-icons">attach_money</i>Funds</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="col s12 m12 l12">
					<table id="table-users" class="responsive-table highlight">
						<thead>
							<tr>
								<th>Email Address</th>
						        <th>Username</th>
						        <th>First N.</th>
						        <th>Last N.</th>
                                <th>Amount given</th>
                                <th>Research ID</th>                                    
						    </tr>
						</thead>						
						<tbody>
						@foreach($funders as $user)
							<tr data-name='{{$user->name}}' data-id='{{$user->id}}' data-research='{{$user->research_id}}'>
							<td>{{$user->email}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->first_name}}</td>
							<td>{{$user->last_name}}</td>
							<td>{{$user->amount_given}}</td>
                            <td>{{$user->research_id}}</td>
                            <td><a id="btn-accept-fund" class="waves-effect waves-light btn blue accent-4"><i class="material-icons">done</i></a></td>
							</tr>
						@endforeach
						</tbody>				
					</table>                                
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
		</div>
	</div>

</div>
@endsection