@extends ('template')
@section ('contenu')
	<div class="text-center my-auto d-flex align-item-center mx-auto flex-column" style="min-height: 100vh;">
		<main class="my-auto" role="main">
			<h1 class="cover-heading">Bonjour</h1>
			<p class="lead">Bienvenue sur mon site professionnel.</p>
			<a class="btn btn-primary" href="{{route('CV')}}">Consulter mon CV</a>
		</main>
	</div>
		<div class="container">
			<p>{{$presentation}}</p>
		</div>
@endsection