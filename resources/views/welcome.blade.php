<!DOCTYPE html>
<html lang="en">
<head>    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.min.css') }}">
	<title></title>

	<style type="text/css">
			.nav-wrapper {	background-color: #235678; }
			.header { color: #ee6e73; }
			.parallax img {
				display: block;
				top: 0;
				right: 0;
			}
		</style>
</head>
<body>
		<!-- NAV BAR -->
		<nav>
			<div class="nav-wrapper">
			<a href="#" class="brand-logo" style="padding-left: 20px;">Project Cebu</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="{{ url('/login') }}">Login</a></li>
				<li><a href="{{ url('/register') }}">Register</a></li>
				</ul>
			</div>
		</nav>

		<!-- PARALLAX -->
		<div class="parallax-container">
			<div class="parallax"><img src="{{ URL::asset('images/04.jpg') }}"></div>
		</div>
		<div class="section white">
			<div class="row container">
				<h2 class="header">About Project Cebu</h2>
				<p class="grey-text text-darken-3 lighten-3">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis dui facilisis, posuere neque et, vestibulum dui. Donec aliquet in neque venenatis euismod. Donec tempor consectetur nunc ac elementum. Duis enim metus, ultrices in neque eget, aliquam posuere ante. Suspendisse ante nulla, tempor ac lobortis in, sodales nec massa.
				</p>
			</div>
		</div>


		<div class="parallax-container">
			<div class="parallax"><img src="{{ URL::asset('images/05.png') }}"></div>
		</div>
		<div class="section white">
			<div class="row container">
				<h2 class="header">Crowdsourcing and Project Funding</h2>
				<p class="grey-text text-darken-3 lighten-3">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis dui facilisis, posuere neque et, vestibulum dui. Donec aliquet in neque venenatis euismod. Donec tempor consectetur nunc ac elementum. Duis enim metus, ultrices in neque eget, aliquam posuere ante. Suspendisse ante nulla, tempor ac lobortis in, sodales nec massa.
				</p>
			</div>
		</div>

		<div class="parallax-container">
			<div class="parallax"><img src="{{ URL::asset('/images/06.png') }}"></div>
		</div>

		<div class="section white">
			<div class="row container center">
				<h3 class="header">Get started now!</h3>
				<a href="#register" class="waves-effect waves-light btn">Register</a>
			</div>
		</div>

		<!-- MODALS -->
		<div id="register" class="modal">
			<div class="modal-content">
				<h4>Registration</h4>
				<p>Please fill the fields below.</p>
				 <div class="row">
				    <form class="col s12">
				      <div class="row">        
				        <div class="input-field col s12">
				          <input id="username" type="text" class="validate">
				          <label for="username">Username*</label>
				        </div>
				      </div>     
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="password" type="password" class="validate">
				          <label for="password">Password*</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="cpassword" type="password" class="validate">
				          <label for="cpassword">Confirm Password*</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="email" type="email" class="validate">
				          <label for="email">Email*</label>
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <a href="#" class="waves-effect waves-light btn">Register</a>
				        </div>
				      </div>
				     
				    </form>
				  </div>
			</div>
		</div>

		<div id="login" class="modal">
			<div class="modal-content">
				<h4>Log In</h4>
				 <div class="row">
				    <form class="col s12" id="loginForm">
				      <div class="row">        
				        <div class="input-field col s12">
				          <input id="username" type="text" class="validate">
				          <label for="username">Username*</label>
				        </div>
				      </div>     
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="password" type="password" class="validate">
				          <label for="password">Password*</label>
				        </div>
				      </div>				      
				      <div class="row">
				        <div class="input-field col s12">
						  <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
				        </div>
				      </div>
				     
				    </form>
				  </div>
			</div>
		</div>
      

</body>
	<script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/materialize.min.js') }}"></script>
	<script type="text/javascript">
		 $(document).ready(function(){
		    $('.modal').modal();
		  });
	</script>
</html>