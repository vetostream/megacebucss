@extends('layouts.general')

@section('content')
<div class="container">
	<h3 class="center-align">Users</h3>

	<div class="row">
		<div class="col s12">

			<table id="table-users" class="responsive-table highlight">
				<thead>
					<tr>
				        <th>Reporter Name</th>
				        <th>Report Comment</th>
				        <th>Post Title</th>
				        <th>Poster Name</th>
				        <th>Timestamp</th>
				    </tr>
				</thead>
				
				<tbody>
					@foreach ($reports as $report)
				    <tr data-id='{{ $report->id }}'>
				    	@for ($i = 0; $i < $report->number_of_reps; $i++)
					    	@if ($loop->first)
					    	<td>{{ $report->User[$i]->name }}</td>
					        <td>{{ $report->User[$i]->pivot->message }}</td>
					        <td>{{ $report->Post()->first()->title }}</td>
					        <td>{{ $report->Post()->first()->User()->first()->name }}</td>
					        <td>{{ $report->created_at }}</td>
				        <td><a onclick='return confirm("Really delete post?")' href="#" class="waves-effect waves-light btn"><i class="material-icons">delete</i></a></td>
					    </tr>
						    @else
						<tr>
						    <td>{{ $report->User[$i]->name }}</td>
					        <td>{{ $report->User[$i]->pivot->message }}</td>
					        <td>{{ $report->Post()->first()->title }}</td>
					        <td>{{ $report->Post()->first()->User()->first()->name }}</td>
					        <td>{{ $report->created_at }}</td>
				        <td><a onclick='return confirm("Really delete post?")' href="#" class="waves-effect waves-light btn"><i class="material-icons">delete</i></a></td>
						</tr>
						    @endif
					    @endfor
			    	@endforeach
				</tbody>				

			</table>

		</div>
	</div>

</div>
@endsection

