@extends ('template')
@section ('contenu')
	<div class="text-center my-auto d-flex mx-auto flex-column h-100">
		<main class="py-auto" role="main">
			<h1 class="cover-heading">Bonjour</h1>
			<p class="lead">Bienvenue sur mon site professionnel.</p>
			<a class="btn btn-primary" href="{{route('CV')}}">Consulter mon CV</a>
		</main>
	</div>
@endsection