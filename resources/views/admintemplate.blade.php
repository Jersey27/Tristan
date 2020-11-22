<!DOCTYPE html>
<html class="h-100"lang="fr">
    <head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $title ?? 'Tristan Lefèvre' }}</title>
		{!! Html::style('/css/app.css') !!}
		{!! Html::script('/js/app.js')	!!}
		<style> textarea { resize: none; } </style>
		<script src="https://cdn.tiny.cloud/1/28qqw6r88y9y8dzbmg7ne0re646s3wrif6812vypmit8dpqi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	
		@yield('scripts')
		</head>
    <body>
        <header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="{{url('admin')}}">Admin</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="collapsibleNavbar">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item"><a class="nav-link" href="{{url('admin/blog')}}">blog</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('admin/cv')}}">CV</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('admin/contact')}}">messages</a></li>
						<li class="nav-item"><a class="nav-link" href="{{url('admin/project')}}">projets</a></li>
					</ul>
					<div class="nav-item">
						<a class="btn btn-warning" href="{{url('/')}}">retour sur le site</a>
					</div>
				</div>
			</nav>
		</header>
		<main class="main-page cover-body m-4">
			@yield ('contenu')
		</main>
    </body>
</html>