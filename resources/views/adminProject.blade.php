@extends ('admintemplate')
@section ('contenu')
<div class="container">
    <a href="{{url('admin/project/add')}}" class="btn btn-success">nouveau projet</a>
    <li class="list-group">
        @foreach ($projects as $project)
        <ul class="list-group-item d-flex flex-row justify-content-around" class="d-flex flex-row">
            <a class="border w-100" href="{{url('admin/project',$project->project_id)}}">
                <div class="flex-grow-2 d-flex flex-row justify-content-around">
                    <p>{{$project->titre}}</p>
                    <p>{{$project->short_description}}</p>
                </div>
            </a>
            <a href="#" class="btn btn-danger">supprimer</a>
        <ul>
        @endforeach
    </li>
</div>
@endsection