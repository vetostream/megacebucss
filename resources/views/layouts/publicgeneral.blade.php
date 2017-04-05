<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title></title>

		<!-- Styles -->
<!--		<link href="{{ asset('/css/materialize.min.css') }}" rel="stylesheet">-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.css" rel="stylesheet"/>
		<link href="{{ asset('/css/general.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/home.css') }}" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Raleway" rel="stylesheet">

		<!-- Scripts -->
		<script>
				window.Laravel = <?php echo json_encode([
						'csrfToken' => csrf_token(),
				]); ?>
		</script>
</head>
<body>
		<div class="navbar-fixed">
				<nav>
						<div class="nav-wrapper">
						<a href="{{ url('/') }}" class="brand-logo center"><img src="{{ asset('/images/logo.png') }}" id="brand-pic"/></a>
								<ul id="nav-mobile" class="left hide-on-med-and-down">
								@if (Auth::guest())
										<li><a href="{{ url('login') }}">Login</a></li>
										<li><a href="{{ url('register') }}">Register</a></li>
								
								</ul>
									<!-- <li>
										<form name="search-form" action="{{ url('/search/everything') }}" method="get">
											<div class="input-field">
												<input id="search-auto" type="search" name="keyword" required>
												<label class="label-icon" for="search"><i class="material-icons">search</i></label>
												<i class="material-icons">close</i>
											</div>
										</form> 
									</li> -->
								@endif
				</nav>   
		</div>
		@yield('content')

<!-- 		<footer class="page-footer">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Footer Content</h5>
						<p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job.
						</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Connect</h5>
						<ul>
							<li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Gmail</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
				© 2017 Copyright Text
				<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer> -->

		<!-- Scripts -->
		
@if(!Auth::guest())
  <div class="fixed-action-btn horizontal" style="padding-bottom:10px; padding-right: 10px;">
    <a class="btn-floating btn-large orange accent-4 pulse">
      <i class="large material-icons">view_headline</i>
    </a>
    <ul>
      <li><a class="btn-floating red" href="#search-modal"><i class="material-icons">search</i></a></li>
      <li><a class="btn-floating green" href="{{ url('/posts/insert') }}"><i class="material-icons">mode_edit</i></a></li>
    </ul>
  </div>
@endif
	
  <div id="search-modal" class="modal bottom-sheet">
    <div class="modal-content">
    <form class="col s12" name="search-form" action="{{ url('/search/everything') }}" method="get">
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <i class="material-icons prefix">search</i>
          <input id="icon_prefix" type="text" class="validate" name="keyword">
          <label for="icon_prefix">Search</label>
        </div>
      </div>
    </form>	
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>	
        	
		<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
		<!-- <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
		<script type="text/javascript" src="{{ asset('/js/general.js') }}"></script>
		<script type="text/javascript">
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 300, // Creates a dropdown of 15 years to control year
				format: 'yyyy-mm-dd'
			});

			$('.modal').modal();
			$('.tooltipped').tooltip({delay: 50});
			

		    $('.parallax').parallax();

			$('.chips').material_chip();
			$('.chips-initial').material_chip({
				data: [{
					tag: 'add',
				}, {
					tag: 'tags',
				}, {
					tag: 'here',
				}],
			});
			$('.chips-placeholder').material_chip({
				placeholder: 'Enter a tag',
				secondaryPlaceholder: '+Tag',
			});

			var chip = {
				tag: 'chip content',
				image: '', //optional
				id: 1, //optional
			};

			$('.chips').on('chip.add', function(e, chip){
				// you have the added chip here
			});

			$('.chips').on('chip.delete', function(e, chip){
				// you have the deleted chip here
			});

			$('.chips').on('chip.select', function(e, chip){
				// you have the selected chip here
			});

			$('.chips-initial').material_chip('data'); //get json data of chips.

		  $(document).ready(function(){
		    $('ul.tabs').tabs('select_tab', 'tab_id');

		    $('.dropdown-button').dropdown();
		  });
		</script>
		@yield('scripts')	
</body>
</html>