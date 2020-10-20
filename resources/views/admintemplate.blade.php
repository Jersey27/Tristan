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
		<script src="https://cdn.tiny.cloud/1/28qqw6r88y9y8dzbmg7ne0re646s3wrif6812vypmit8dpqi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	</head>
    <body>
        <header>
			<nav class="navbar navbar-expand navbar-dark bg-dark">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item"><a class="nav-link" href="{{url('admin')}}">Acceuil</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('admin/cv')}}">CV</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('admin/contact')}}">messages</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('admin/project')}}">projets</a></li>
				</ul>
				<div class="nav-item">
					<a class="btn btn-warning" href="{{url('/')}}">retour sur le site</a>
				</div>
			</nav>
		</header>
		<main class="main-page cover-body m-4">
			@yield ('contenu')
		</main>
    </body>
</html>