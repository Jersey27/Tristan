@extends ('admintemplate')
@section ('contenu')
<div class="container">
    <a href="{{route('newBlog')}}" class="btn btn-success">nouveau projet</a>
    @if (isset($articles))
        <li class="list-group">

            @foreach ($articles as $article)
            <ul class="list-group-item d-flex flex-row justify-content-around" class="d-flex flex-row">
                <a class="border w-100" href="{{url('admin/blog',$article->id)}}">
                    <div>
                        <p>{{$article->name}}</p>
                    </div>
                </a>
                {{Form::open(array('route'=>array('removeBlog','id' => $article->id), 'method' => 'DELETE'))}}
                    {{Form::submit('supprimer',['class' => 'btn btn-danger'])}}
                {{Form::close()}}
            <ul>
            @endforeach
        </li>
    @else
        <p class="my-3">pas d'article de blog disponible</p>
    @endif
</div>
@endsection