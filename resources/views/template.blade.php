<!DOCTYPE html>
<html class="h-100"lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $title ?? 'Tristan Lefèvre' }}</title>
		{!! Html::style('/css/app.css') !!}
		<style> textarea { resize: none; } </style>
		<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
	<body class="bg-light" style="">
		<header class="mb-3 border0 shadow-sm">
			<nav class="navbar navbar-expand navbar-dark bg-dark">
				<a class="navbar-brand" href="{{route('welcome')}}">Tristan Lefèvre</a>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<!--<li class="nav-item"><a class="nav-link" href="{{ route('Articles') }}">Blog</a></li>-->
						<li class="nav-item"><a class="nav-link" href="{{ route('Project') }}">Projet</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('CV') }}">CV</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('Contact')}}">Contact</a></li>
						<div class="ml-auto">
							<li class="nav-item"></li>
						</div>
					</ul>
				</div>
				@guest
				<div class="nav-item"><a class="btn btn-primary" href="{{ route('login') }}">Connexion</a><div>
				@else
				<div class="nav-item d-flex flex-row">
					<a class="btn btn-success mx-1" href="{{url('admin')}}">Admin</a>
					{{Form::open(array('route' => 'logout', 'method' => 'post'))}}
						{{Form::submit('Deconnexion',['class' => 'btn btn-danger mx-1'])}}
					{{Form::close()}}
				</div>
				@endguest
			</nav>
		</header>
		<div class="main-page cover-body">
			@yield('contenu')
		</div>
	</body>
</html>