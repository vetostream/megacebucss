@extends('layouts.general')

@section('content')
<div class="container">

	<div class="row">
		<div class="col s12">

			<div class='card'>
				<div class="card-content">
					<div class='card-title'><i class='small material-icons'>gavel</i> Reports</div>
					<table id="table-users" class="responsive-table highlight">
						<thead>
							<tr>
						        <th>Reporter Name</th>
						        <th>Reason</th>
						        <th>Post Title</th>
						        <th>Poster</th>
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
						        <!-- <td><a onclick='return confirm("Really delete post?")' href="{{ url('posts/reportDelete') }}/{{ $report->Post()->first()->id }}/{{ $report->User[$i]->id }}" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td> -->
							    </tr>
								    @else
								<tr>
								    <td>{{ $report->User[$i]->name }}</td>
							        <td>{{ $report->User[$i]->pivot->message }}</td>
							        <td>{{ $report->Post()->first()->title }}</td>
							        <td>{{ $report->Post()->first()->User()->first()->name }}</td>
							        <td>{{ $report->created_at }}</td>
						        <!-- <td><a onclick='return confirm("Really delete post?")' href="{{ url('posts/reportDelete') }}/{{ $report->Post()->first()->id }}/{{ $report->User[$i]->id }}" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></a></td> -->
								</tr>
								    @endif
							    @endfor
					    	@endforeach
						</tbody>				

					</table>
				</div>
			</div>

		</div>
	</div>

</div>
@endsection

