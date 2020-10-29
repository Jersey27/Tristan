@extends ('template')
@section ('contenu')
<div class="container">
    <div class="row justify-content-around">
        @foreach ($projects as $project)
        <div class="card m-2" style="width: 18rem;">
            @if (isset($project->image))
                <img src="{{$project->image}}" alt="not working" class="card-img-top">
            @else
                <img src="https://picsum.photos/288/144" alt="" class="card-img-top">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{$project->titre}}</h5>
                <p class="card-text">{{$project->short_description}}</p>
                <a class="btn btn-primary" href="{{url('project', $project->project_id)}}">détail</a>

            </div>
        </div>
        @endforeach
        
    </div>
</div>
@endsection