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
	</head>
    </head>
    <body>
        <header>
			<nav class="navbar">
				<ul>
					<li><a href="{{url('admin/cv')}}">CV</a></li>
					<li><a href="{{url('admin/contact')}}">messages</a></li>
					<!--<li></li>-->
				</ul>
		</header>
		<main class="container">
			@yield ('contenu')
		</main>
    </body>
</html>