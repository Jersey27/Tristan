@extends ('template')
@section ('contenu')
	<div class="container">
		<li class="list-group">
            @foreach($articles as $article )
            <ul class="list-group-item">
                <div>
                    <a href="{{route('getBlog', $article->id)}}">
                        <h2>{{$article->name}}</h2>
                    </a>
                </div>
            </ul>
            @endforeach
        </li>
	</div>
@endsection