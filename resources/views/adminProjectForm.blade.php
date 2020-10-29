@extends ('admintemplate')
@section ('contenu')

<div class="">
    <p>
    @if (isset($project->project_id))
        <h2>modifier le projet {{$project->titre}}</h2>
    @else
        <h2>ajouter un projet</h2>
    @endif
    </p>
</div>
<div>
    @if (isset($project->project_id))
        {{Form::open(array('action' => 'AdminController@confirmModifyProject','files' => true, 'method' => 'put'))}}
        {{Form::label('titre', 'titre du projet')}}
        {{Form::text('titre', $project->titre, ['class' => 'form-control'])}}

        {{Form::label('short_description', 'phrase descriptive du projet')}}
        {{Form::text('short_description', $project->short_description, ['class' => 'form-control'])}}

        {{Form::hidden('project_id', $project->project_id)}}
        {{Form::file('images', ['class' => 'form-control-file'])}}

        {{Form::label('description', 'description')}}
        {{Form::textarea('description', $project->description, ['class' => 'form-control'])}}
        {{Form::submit('modifier',['class' => 'btn btn-warning'])}}
        {{Form::close()}}
    @else
        {{Form::open(array('action' => 'AdminController@confirmCreateProject', 'method' => 'post', 'files' => true))}}
        {{Form::label('titre', 'titre du projet')}}
        {{Form::text('titre', null, ['class' => 'form-control'])}}

        {{Form::label('short_description', 'phrase descriptive du projet')}}
        {{Form::text('short_description', null, ['class' => 'form-control'])}}

        {{Form::file('images', ['class' => 'form-control-file'])}}

        {{Form::label('description', 'description')}}
        {{Form::textarea('description', null, ['class' => 'form-control'])}}
        {{Form::submit('Ajouter',['class' => 'btn btn-success'])}}
        {{Form::close()}}
    @endif
</div>


<script>
    tinymce.init({
        selector: 'textarea#description',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        image_upload_url:"#",
        menubar: false,
        statusbar: false
    });
</script>
@endsection