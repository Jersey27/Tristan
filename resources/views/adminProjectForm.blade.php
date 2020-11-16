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
        {{Form::open(array('action' => 'Admin\AdminProjectController@confirmModifyProject','files' => true, 'method' => 'put'))}}
        {{Form::label('titre', 'titre du projet')}}
        {{Form::text('titre', $project->titre, ['class' => 'form-control'])}}

        {{Form::label('short_description', 'phrase descriptive du projet')}}
        {{Form::text('short_description', $project->short_description, ['class' => 'form-control'])}}

        {{Form::hidden('project_id', $project->project_id)}}
        {{Form::file('images', ['class' => 'form-control-file'])}}

        {{Form::label('description', 'description')}}
        {{Form::textarea('description', $project->description, ['class' => 'form-control description'])}}
        {{Form::submit('modifier',['class' => 'btn btn-warning'])}}
        {{Form::close()}}
    @else
        {{Form::open(array('action' => 'Admin\AdminProjectController@confirmCreateProject', 'method' => 'post', 'files' => true))}}
        {{Form::label('new_titre', 'titre du projet')}}
        {{Form::text('new_titre', null, ['class' => 'form-control'])}}

        {{Form::label('new_short_description', 'phrase descriptive du projet')}}
        {{Form::text('new_short_description', null, ['class' => 'form-control'])}}

        {{Form::file('new_images', ['class' => 'form-control-file'])}}

        {{Form::label('new_description', 'description')}}
        {{Form::textarea('new_description', null, ['class' => 'form-control description'])}}
        {{Form::submit('Ajouter',['class' => 'btn btn-success'])}}
        {{Form::close()}}
    @endif
</div>


<script>
    tinymce.init({
        selector: '.description',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        image_upload_url:"#",
        menubar: false,
        statusbar: false
    });
</script>
@endsection