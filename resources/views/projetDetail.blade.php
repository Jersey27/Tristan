@extends ('template')

@section ('style')
    <style> 
    @media (max-width: 768px) { .project-page { flex-direction : column;} .image-project { width: 100%; order: -1; margin-bottom: 10px;}
    }
    @media (min-width: 768px) { .project-page { flex-direction : row;} .image-project { width: 50%;}
    }
    </style>
@endsection

@section ('contenu')
    <div class="container border border-light shadow p-5 rounded rounded-lg">
        <div class="">
            <h1>{{$project->titre}}</h1>
            <quote class="text-secondary">{{$project->short_description}}</quote>
        </div>
        <hr>
        <div class="d-flex project-page justify-content-between">
            <div>
                {!! $project->description !!}
            </div>
            <div class="image-project">
                @if (isset($project->image))
                    <a href="{{Storage::disk('photos')->url($project->image)}}"><img class="w-100" src="{{Storage::disk('photos')->url($project->image)}}"></a>
                @endif
            </div>
        </div>
    </div>
@endsection