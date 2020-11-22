@extends ('template')
@section ('contenu')
	<div class="text-center my-auto d-flex align-item-center mx-auto flex-column" style="min-height: 100vh;">
		<div class="my-auto" role="main">
			<h1 class="cover-heading">Bonjour</h1>
			<p class="lead">Bienvenue sur mon site professionnel.</p>
			<a class="btn btn-primary" href="{{route('CV')}}">Consulter mon CV</a>
		</div>
	</div>
		<div class="container">
			<h1>A propos de moi</h1>
			<p>{{$presentation}}</p>
		</div>
@endsection