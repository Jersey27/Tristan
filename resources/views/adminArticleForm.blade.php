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
        {{Form::open(array('route'=>array('postBlog'), 'method' => 'put'))}}
            {{Form::label('nameArticle', 'titre de l\'article')}}
            {{Form::text('nameArticle', $article->name, ['class' => 'form-control'])}}

            {{Form::hidden('id', $article->id)}}

            {{Form::label('textArticle', 'Texte de l\'article')}}
            {{Form::textarea('textArticle', $article->text, ['class' => 'form-control text'])}}

            {{Form::submit('modifier',['class' => 'btn btn-warning mt-3'])}}
        {{Form::close()}}
    @else
        {{Form::open(array('route' => 'postNewBlog', 'method' => 'post'))}}
            {{Form::label('nameNewArticle', 'titre de l\'article')}}
            {{Form::text('nameNewArticle', null, ['class' => 'form-control'])}}

            {{Form::label('textNewArticle', 'Texte de l\'article')}}
            {{Form::textarea('textNewArticle', null, ['class' => 'form-control text'])}}

            {{Form::submit('Ajouter',['class' => 'btn btn-success mt-3'])}}
        {{Form::close()}}
    @endif
</div>


<script>
var url = '{{route('uploadArticleImage')}}';
    tinymce.init({
        selector: '.text',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | alignleft aligncenter alignright alignjustify | link image media | removeformat help',
        quickbars_image_toolbar: 'alignleft aligncenter alignright | rotateleft rotateright | imageoptions',
        menubar: false,
        statusbar: false,
        image_dimensions: false,
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'w-100', value: 'w-100 h-auto'},
            {title: 'float left', value: 'w-50 h-auto float-left mr-3'},
            {title: 'float right', value: 'w-50 h-auto float-right ml-3'},
            {title: 'h-100', value: 'h-100 w-auto'},
            {title: 'h-50', value: 'h-50 w-auto'}
        ],
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
            let data = new FormData();
            data.append('file', blobInfo.blob(), blobInfo.filename());
            axios.post( url , data)
                .then(function (res) {
                    success(res.data.location);
                })
                .catch(function (err) {
                    failure('HTTP Error: ' + err.message);
                });
        }

    });
</script>
@endsection