@extends ('template')

@section ('contenu')
    <div class="container border border-light shadow p-5 rounded rounded-lg">
        <div class="">
            <h1>{{$project->titre}}</h1>
            <quote class="text-secondary">{{$project->short_description}}</quote>
        </div>
        <hr>
        <div class="d-flex flex-row justify-content-between">
            <div>
                {!! $project->description !!}
            </div>
            <div class="w-50">
                @if (isset($project->image))
                <a href="{{Storage::disk('photos')->url($project->image)}}"><img class="w-100" src="{{Storage::disk('public')->url($project->image)}}"></a>
                @else
                <img src="https://picsum.photos/500/250"/>
                @endif
            </div>
        </div>
    </div>
@endsection