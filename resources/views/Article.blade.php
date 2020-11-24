@extends ('template')
@section ('contenu')
	<div class="container">
        <div class="card my-3">
            <div class="card-header px-4 d-flex flex-row align-items-center">
                <h2 class="mb-0">{{$article->name}}</h2>
                <p class="mb-0 ml-auto">{{$postTime}} </p>
            </div>
            <div class="mx-4 mt-2 py-2">{!! $article->text !!}</div>
        </div>
	</div>
@endsection