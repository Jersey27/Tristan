@extends ('admintemplate')
@section ('contenu')
<div class="container">
    <a href="{{url('admin/project/add')}}" class="btn btn-success">nouveau projet</a>
    <li class="list-group border w-100">
        @foreach ($projects as $project)
        <ul class="list-group-item d-flex flex-row justify-content-around mb-0 py-0">
            <a class="d-flex flex-row w-100 text-body align-items-center" href="{{url('admin/project',$project->project_id)}}">
                <p class="mx-1 mb-0 w-25">{{$project->titre}}</p>
                <p class="mx-1 mb-0 w-100 flex-grow-1">{{$project->short_description}}</p>
            </a>
            {{Form::open(array('action'=>array('Admin\AdminProjectController@removeProject','id',$project->project_id), 'method' => 'DELETE', 'class' => 'ml-auto'))}}
                {{Form::submit('supprimer',['class' => 'btn btn-danger'])}}
            {{Form::close()}}
        </ul>
        @endforeach
    </li>
</div>
@endsection