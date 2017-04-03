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
		<link href="{{ asset('/css/materialize.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/general.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
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
								@else
										<li><a href="{{ url('posts') }}">Ideas</a></li>
										<li><a href="{{ url('research') }}">Research</a></li>
										<li><a href="{{ url('profile') }}">Profile</a></li>
										<li><a href="{{ url('about') }}">About</a></li>
										
										<li><a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
										</li>
<!--                     <li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
														{{ Auth::user()->name }} <span class="caret"></span>
												</a>

												<ul class="dropdown-menu" role="menu">
														<li>
																<a href="{{ url('/logout') }}"
																		onclick="event.preventDefault();
																						 document.getElementById('logout-form').submit();">
																		Logout
																</a>

														</li>
												</ul>
										</li> -->
								</ul>
								<ul id="nav-mobile" class="right">
									@if (Auth::user()->user_type_id == 3)
										<li><a href="{{ url('admin') }}">Admin</a></li>
									@endif

									@if (Auth::user()->user_type_id == 4)
										<li><a href="{{ url('superadmin') }}">Admin</a></li>
									@endif
									<li>
										<a class="dropdown-button" href='#!' data-activates='dropdown1'>
											Dropdown
										</a>
									</li>

								</ul>

								<ul id='dropdown1' class='dropdown-content'>
									<li><a href="#"><i class="material-icons">settings</i></a></li>
									<li><a href="#"><i class="material-icons">power_settings_new</i></a></li>
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
		<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/general.js') }}"></script>
		<script type="text/javascript">
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 300, // Creates a dropdown of 15 years to control year
				format: 'yyyy-mm-dd'
			});

			 $(document).ready(function(){
			    $('.modal').modal();
			  });

		    $('.parallax').parallax();

			$('.chips').material_chip();
			$('.chips-initial').material_chip({
				data: [{
					tag: 'Apple',
				}, {
					tag: 'Microsoft',
				}, {
					tag: 'Google',
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