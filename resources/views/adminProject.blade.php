@extends ('admintemplate')
@section ('contenu')
<div class="container">
    <a href="{{url('admin/project/add')}}" class="btn btn-success">nouveau projet</a>
    <li class="list-group">
        @foreach ($projects as $project)
        <ul class="list-group-item d-flex flex-row justify-content-around" class="d-flex flex-row">
            <a class="border w-100" href="{{url('admin/project',$project->project_id)}}">
                <div class="flex-grow-2 d-flex flex-row justify-content-between px-3">
                    <div>
                        <p>{{$project->titre}}</p>
                    </div>
                    <div class="flex-grow-2">
                        <p>{{$project->short_description}}</p>
                    </div>
                </div>
            </a>
            {{Form::open(array('action'=>array('AdminController@removeProject','id',$project->project_id), 'method' => 'DELETE'))}}
                {{Form::submit('supprimer',['class' => 'btn btn-danger'])}}
            {{Form::close()}}
        <ul>
        @endforeach
    </li>
</div>
@endsection