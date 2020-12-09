<!DOCTYPE html>
<html class="h-100"lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>{{ $title ?? 'Tristan Lefèvre' }}</title>
		<link rel="stylesheet" href="/css/app.css"></style>
		<style> textarea { resize: none; } </style>

		@yield('style')
		<script src="/js/app.js"></script>
	</head>
	<body class="bg-light" style="">
		<div id="app">
			<header class="border-0 shadow-sm">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="{{route('welcome')}}">Tristan Lefèvre</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="collapsibleNavbar">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item"><a class="nav-link" href="{{ route('Blog') }}">Blog</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('Project') }}">Projet</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('CV') }}">CV</a></li>
						<li class="nav-item"><a class="nav-link" href="{{ route('Contact')}}">Contact</a></li>
					</ul>
						@guest
						<!--<div class="nav-item"><a class="btn btn-primary" href="{{ route('login') }}">Connexion</a><div> -->
						<div class="nav-item"><button id="show-modal" class="btn btn-primary" @click="showModal">Connection</button></div>
						@else
							<div class="nav-item d-flex flex-row">
								<a class="btn btn-success" href="{{url('admin')}}">Admin</a>
								{{Form::open(array('route' => 'logout', 'method' => 'post'))}}
									{{Form::submit('Deconnexion',['class' => 'btn btn-danger mx-2'])}}
								{{Form::close()}}
							</div>
						@endguest
					</div>
				</nav>
			</header>
			<main>
				<div class="app main-page cover-body">
					@yield('contenu')
				</div>
			</main>
			<modal-form-component v-show="isModalVisible" @close="closeModal">
				<div slot="header">
					<h1>Connexion</h1>
				</div>
				<div slot="body">
				{{	Form::open(array('route' => 'vueLogin', 'method' => 'POST'))}}
					{{	Form::Label('email', 'identifiant / email')}}
					{{	Form::email('email', null, ['class' => 'form-control'])}}

					{{	Form::Label('password','Mot de passe')}}
					{{	Form::password('password', ['class'=>'form-control'])}}
					{{	Form::submit('se connecter', ['class' => 'btn btn-primary my-1'])}}
				{{	Form::close()}}
				</div>
			</modal-form-component>
		</div>	
		<script>
			new Vue({
			el: '#app',
			name: 'app',
			data () {
				return {
				isModalVisible: false,
				};
			},
			methods: {
				showModal() {
				this.isModalVisible = true;
				},
				closeModal() {
				this.isModalVisible = false;
				}
			},
			});

		</script>
	</body>
</html>