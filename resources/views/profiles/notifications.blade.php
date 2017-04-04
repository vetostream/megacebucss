@extends('layouts.general')

@section('content')
<div class="container">
	<h3 class="center-align">Notifications</h3>

	<div class="row">
		<div class="col s12">
        
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><span class="new badge">4</span><i class="material-icons">account_circle</i>User status</div>
                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                </li>
                <li>
                    <div class="collapsible-header"><span class="badge">1</span><i class="material-icons">place</i>Second</div>
                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                </li>
            </ul>
		</div>
	</div>

</div>
@endsection