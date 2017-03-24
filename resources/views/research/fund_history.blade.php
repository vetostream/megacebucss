@extends('layouts.general')

@section('content')

<div class="container">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Fund History</span>
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
			<div class="card-action">
				<div class="chip mini-chip">lake</div>
				<div class="chip mini-chip">mountains</div>
				<div class="chip mini-chip">nature</div>
				<div class="chip mini-chip more">+3 more</div>
			</div>
		</div>
	</div>
</div>
<!-- <div class="container">
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
</div> -->

@endsection