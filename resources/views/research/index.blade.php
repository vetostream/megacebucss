@extends('layouts.general')

@section('content')
<div class="container">
	<h3 class="center-align dboard-head">Researches</h3>

	<!-- SEARCH BAR -->
    <div class="row dboard">
        <div class="col s6 m6 l6">
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">search</i>
              <input type="text" id="autocomplete-input" class="autocomplete">
              <label for="autocomplete-input">Research tags</label>
            </div>
          </div>
        </div>    
<!--         <div class="col s6 m6 l6">
            <h3 class="left-align">Ideas</h3>            
        </div> -->
    </div>

	<!-- ROW 1 -->
	<?php $count=1; $length=count($researches);?>
	@foreach($researches as $research)

	@if ($count === 1 | $count%2 === 0)
	<div class="row dboard">
	@endif
        <div class="col s12 m12 l6">
          	<div class="card hoverable">
	            <div class="cardpanel-research">
		            <a href="{{ url('research/detail') }}/{{ $research->id }}" class="black-text">
		            <span class="card-title">{{$research->title}}</span>
		          		<p class="justify-align">
		          			{{$research->research_abstract}}       		
		          		</p>
		          	</a>
	        	</div>
	    		<div class="card-action">
					<div class="chip mini-chip">lake</div>
					<div class="chip mini-chip">mountains</div>
					<div class="chip mini-chip">nature</div>
					<div class="chip mini-chip more">+3 more</div>
	    		</div>
          	</div>
        </div>
    @if ($count%2 === 0 | $count === $length)
    </div>
    @endif
    <?php $count++; ?>
    @endforeach
	<!-- ROW 3 -->

    <!-- PAGINATION STARTS HERE -->
    <div class="row">
	    <ul class="pagination center-align">
			<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
			<li class="active"><a href="#!">1</a></li>
			<li class="waves-effect"><a href="#!">2</a></li>
			<li class="waves-effect"><a href="#!">3</a></li>
			<li class="waves-effect"><a href="#!">4</a></li>
			<li class="waves-effect"><a href="#!">5</a></li>
			<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
		</ul>
	</div>
	<!-- PAGINATION ENDS HERE -->

</div>
@endsection

