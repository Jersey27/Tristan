@extends ('admintemplate')
@section ('contenu')

<div class="">
    <p>
    @if (isset($article->id))
        <h2>modifier l'article {{$article->id}}</h2>
    @else
        <h2>ajouter l'article</h2>
    @endif
    </p>
</div>
<div>
    @if (isset($article->id))
        {{Form::open(array('route' => 'postBlog', 'method' => 'put'))}}
            {{Form::label('nameArticle', 'titre de l\'article')}}
            {{Form::text('nameArticle', $article->name, ['class' => 'form-control'])}}

            {{Form::hidden('id', $article->id)}}

            {{Form::label('textArticle', 'Texte de l\'article')}}
            {{Form::textarea('textArticle', $article->text, ['class' => 'form-control text'])}}

            {{Form::submit('modifier',['class' => 'btn btn-warning'])}}
        {{Form::close()}}
    @else
        {{Form::open(array('route' => 'postNewBlog', 'method' => 'post'))}}
            {{Form::label('nameNewArticle', 'titre de l\'article')}}
            {{Form::text('nameNewArticle', null, ['class' => 'form-control'])}}

            {{Form::label('textNewArticle', 'Texte de l\'article')}}
            {{Form::textarea('textNewArticle', null, ['class' => 'form-control text'])}}

            {{Form::submit('Ajouter',['class' => 'btn btn-success'])}}
        {{Form::close()}}
    @endif
</div>


<script>
    tinymce.init({
        selector: '.text',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        image_upload_url:"#",
        menubar: false,
        statusbar: false
    });
</script>
@endsection