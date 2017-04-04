<?php
/**
 * Author: 
 * Revised by: Tom Abao
 *   Github: https://github.com/kormin
 *   Email: abaotom14@gmail.com
 * Description: 
 * Created On: March 24, 2017
 * Additional Comments: 
 */
?>
@extends('layouts.general')

@section('content')

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<span class="card-title"><i class='material-icons'>history</i> Fund History</span>
					<table class="responsive-table highlight">
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
								<td>PHP {{ $hist->amount_given }} </td>
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