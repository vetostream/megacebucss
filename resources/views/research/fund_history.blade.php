@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Fund History</div>

				<div class="panel-body">
					<table class="table table-striped table-bordered">
						<thead>
							<th>Date</th>
							<th>Funder</th>
							<th>Amount</th>
						</thead>
						<tbody>
							@foreach($history as $hist)
							<tr>
								<td> {{ $hist->created_at }} </td>
								<td><a href="{{ url('profile/profileid') }}/{{ $hist->funder_id }}"> {{ $hist->first_name }} {{ $hist->middle_name }} {{ $hist->last_name }} </a></td>
								<td> {{ $hist->amount_given }} </td>
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