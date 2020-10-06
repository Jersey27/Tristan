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
		
		<script src="https://unpkg.com/@popperjs/core@2"></script>
		<script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
		<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	</head>
	<body class="">
		<header class="mb-3 border-bottom shadow-sm">
			<nav class="navbar navbar-expand navbar-dark bg-dark">
				<a class="navbar-brand" href="{{route('welcome')}}">Tristan Lefèvre</a>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<!--<li class="nav-item"><a class="nav-link" href="{{ route('Articles') }}">Blog</a></li>
						<li class="nav-item"><a class="nav-link" href="">Projet</a></li>-->
						<li class="nav-item"><a class="nav-link" href="{{route('CV')}}">CV</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('Contact')}}">Contact</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="main-page cover-body">
			@yield('contenu')
		</div>
	</body>
</html>