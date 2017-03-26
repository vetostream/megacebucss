@extends('layouts.general')

@section('content')
<div class="container">
	<h3 class="center-align">Research Board</h3>

	<!-- SEARCH BAR -->
<!--     <div class="row dboard">
		<div class="col s6 m6 l6">
		  <div class="row">
			<div class="input-field col s12">
			  <i class="material-icons prefix">search</i>
			  <input type="text" id="autocomplete-input" class="autocomplete">
			  <label for="autocomplete-input">Research tags</label>
			</div>
		  </div>
		</div>    
		<div class="col s6 m6 l6">
			<h3 class="left-align">Ideas</h3>            
		</div>
	</div> -->

	<!-- ROW 1 -->
	<div class="pinterest-col">
	@foreach($researches as $research)
		<div class="col s12 m6 l6 no-pads">
			<a href="{{ url('research/detail') }}/{{ $research->id }}" class="black-text">
			<div class="card hoverable pin">
				<div class="cardpanel-research">
					<!-- <a href="{{ url('research/detail') }}/{{ $research->id }}" class="black-text"> -->
					<span class="card-title">{{$research->title}}</span>
						<p class="justify-align">
							{{$research->research_abstract}}       		
						</p>
					<!-- </a> -->
				</div>
			@if(!empty($research->Tag))
				<div class="card-action">
					@foreach($research->Tag as $tag)
					<div class="chip mini-chip">{{$tag->tag_name}}</div>
					@endforeach
				</div>
			@endif
			</div>
			</a>
		</div>
	@endforeach
	</div>
	<!-- ROW 3 -->

	<!-- PAGINATION STARTS HERE -->
<!--     <div class="row">
		<ul class="pagination center-align">
			<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			<li class="active"><a href="#!">1</a></li>
			<li class="waves-effect"><a href="#!">2</a></li>
			<li class="waves-effect"><a href="#!">3</a></li>
			<li class="waves-effect"><a href="#!">4</a></li>
			<li class="waves-effect"><a href="#!">5</a></li>
			<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
		</ul>
	</div> -->
	<!-- PAGINATION ENDS HERE -->

</div>
@endsection

