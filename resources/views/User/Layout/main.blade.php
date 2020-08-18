@php
	use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE HTML>
<html>
	<head>
		<title>Projection</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        @yield('css')
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="#" class="logo"><strong>Projection</strong></a>
					<nav id="nav">
						<a href="{{ Route('user.home') }}" class="{{ Route::is('user.home') ? 'text-warning' : '' }}">Home</a>
						@if(Auth::user() && Auth::user()->user_type == 1)
							<a href="{{ Route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'text-warning' : '' }}">Admin Dashboard</a>
						@endif
						@if(Auth::user())
							<a href="{{ Route('user.index') }}" class="{{ Route::is('user.index') ? 'text-warning' : '' }}">User Dashboard</a>
						@endif
						@if(!Auth::user())
							<a href="{{ route('login') }}" class="{{ Route::is('login') ? 'text-warning' : '' }}">{{ __('Login') }}</a>
							@if (Route::has('register'))
                                <a href="{{ route('register') }}" class="{{ Route::is('register') ? 'text-warning' : '' }}">{{ __('Register') }}</a>
                            @endif
						@endif
						@if(Auth::user())
							<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="{{ Route::is('logout') ? 'text-warning' : '' }}">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
						@endif
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Welcome to Projection</h1>
					</header>
				</div>
			</section>

        @yield('content')

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<h3>Get in touch</h3>

					<form action="#" method="post">

						<div class="field half first">
							<label for="name">Name</label>
							<input name="name" id="name" type="text" placeholder="Name">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
						</div>
						<ul class="actions">
							<li><input value="Send Message" class="button alt" type="submit"></li>
						</ul>
					</form>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>