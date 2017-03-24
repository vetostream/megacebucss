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
					<span class="card-title">{{ $research->title }}</span>
					<h5 class="header">Author: 
					<a href="{{ url('profile/profileid') }}/{{ $research->user[0]->id }}">{{ $research->user[0]->first_name.' '.$research->user[0]->last_name }}</a>
					</h5>
					<p>{{ $research->research_abstract }}</p>
					<span>Funds: P {{ $research->fund_total }}.00 </span>
					<br>
					<a href="{{ url('research/fund/history') }}/{{ $research->id }}" target="_blank">Fund history</a>
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
</div>

<!-- <div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $research->title }} by
					<a href="{{ url('profile/profileid') }}/{{ $research->user[0]->id }}">
						 {{ $research->user[0]->first_name.' '.$research->user[0]->last_name }}
					</a>
				</div>

				<div class="panel-body">
					{{ $research->research_abstract }}
				</div>

				<div class='panel-footer'>
					<span>Funds: P {{ $research->fund_total }}.00 </span>
					<br>
					<a href="{{ url('research/fund/history') }}/{{ $research->id }}">Fund history</a>
				</div>
			</div>
		</div>
	</div>
</div> -->
@endsection