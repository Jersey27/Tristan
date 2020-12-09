@extends ('template')
@section ('contenu')
    <main class="container bg-transparent border-0 border-light shadow p-5 rounded rounded-lg">
        <div class="row">
            <div class="col-md-8 order-md-1">
                <div class="">
                    <h1>Expériences</h1>
                    <li class="list-group">
                    @foreach ($experiences as $experience)
                        @guest
                            @if ($experience->visible)
                            <ul class="list-group-item mb-0"> 
                                <h2 class="font-weight-bold">{{$experience->titre}}</h2>
                                <p class="font-weight-bold mb-0">{{$experience->date}}</p>
                                <p class="font-weight-bold text-secondary">{{$experience->company}}</p>
                                <hr>
                                <div class="">
                                    <p>{!! nl2br(e($experience->description)) !!}</p>
                                </div>
                            </ul>
                            @endif
                        @else
                        <ul class="list-group-item mb-0"> 
                                <h2 class="font-weight-bold">{{$experience->titre}}</h2>
                                <p class="font-weight-bold mb-0">{{$experience->date}}</p>
                                <p class="font-weight-bold text-secondary">{{$experience->company}}</p>
                                <hr>
                                <div class="">
                                    <p>{!! nl2br(e($experience->description)) !!}</p>
                                </div>
                                <div class="custom-control custom-switch">
                                    @if($experience->visible > 0)
                                        <input type="checkbox" value="visible" class="custom-control-input" id="switch-experience{{$experience->id}}" onClick="toggleVisible('experience', {{$experience->id}})" checked>
                                    @else
                                        <input type="checkbox" value="visible" class="custom-control-input" id="switch-experience{{$experience->id}}" onClick="toggleVisible('experience', {{$experience->id}})" >
                                    @endif
                                    <label class="custom-control-label" for="switch-experience{{$experience->id}}">Visible</label>
                                </div>
                            </ul>
                        @endguest
                    @endforeach
                    </li>
                </div>
                <div class="">
                <h1>Compétences</h1>
                    <li class="list-group">
                        @foreach ($competences as $competence)
                            @guest
                                @if ($competence->visible)
                                    <ul class="list-group-item mb-0">
                                        <h2 class="font-weight-bold">{{$competence->titre}}</h2>
                                        <hr>
                                        <div class="desc">
                                            <p>{!! nl2br(e($competence->description)) !!}</p>
                                        </div>
                                    </ul>
                                @endif
                            @else
                                <ul class="list-group-item mb-0">
                                    <h2 class="font-weight-bold">{{$competence->titre}}</h2>
                                    <hr>
                                    <div class="desc">
                                        <p>{!! nl2br(e($competence->description)) !!}</p>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        @if($competence->visible > 0)
                                            <input type="checkbox" value="visible" class="custom-control-input" id="switch-competence{{$competence->id}}" onClick="toggleVisible('competence', {{$competence->id}})" checked>
                                        @else
                                            <input type="checkbox" value="visible" class="custom-control-input" id="switch-competence{{$competence->id}}" onClick="toggleVisible('competence', {{$competence->id}})" >
                                        @endif
                                        <label class="custom-control-label" for="switch-competence{{$competence->id}}">Visible</label>
                                    </div>
                                </ul>
                            @endguest
                        @endforeach
                    </li>    
                </div>
                <div class="">
                    <h1>Formations / qualifications</h1>
                    <li class="list-group">
                        @foreach ($formations as $formation)
                            @guest
                                @if($formation->visible)
                                    <ul class="list-group-item mb-0">
                                        <div class='row mx-0 align-items-center justify-content-between'>
                                            <div class='column align-items-center'>
                                                <h2 class="my-0 font-weight-bold">{{$formation->titre}}</h2>
                                                <p class="text-capitalized">{{$formation->date}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>{!! nl2br(e($formation->description)) !!}</p>
                                    </ul>
                                @endif
                            @else
                                <ul class="list-group-item mb-0">
                                    <div class='row mx-0 align-items-center justify-content-between'>
                                        <div class='column align-items-center'>
                                            <h2 class="my-0 font-weight-bold">{{$formation->titre}}</h2>
                                            <p class="text-capitalized">{{$formation->date}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>{!! nl2br(e($formation->description)) !!}</p>
                                    <div class="custom-control custom-switch">
                                        @if($formation->visible > 0)
                                            <input type="checkbox" value="visible" class="custom-control-input" id="switch-formation{{$formation->id}}" onClick="toggleVisible('formation', {{$formation->id}})" checked>
                                        @else
                                            <input type="checkbox" value="visible" class="custom-control-input" id="switch-formation{{$formation->id}}" onClick="toggleVisible('formation', {{$formation->id}})" >
                                        @endif
                                        <label class="custom-control-label" for="switch-formation{{$formation->id}}">Visible</label>
                                    </div>
                                </ul>
                            @endguest
                        @endforeach
                    </li>
                </div>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
            <h1>Langues</h1>
            <li class="list-group">
            @foreach ($langages as $langage)
                @guest
                    @if($langage->visible)
                    <ul class="list-group-item mb-3">
                        <h2 class="font-weight-bold">{{$langage->titre}}</h2>
                        <p>{{$langage->description}}</p>
                    </ul>
                    @endif
                @else
                    <ul class="list-group-item mb-3">
                        <h2 class="font-weight-bold">{{$langage->titre}}</h2>
                        <p>{{$langage->description}}</p>
                        <div class="custom-control custom-switch">
                            @if($langage->visible > 0)
                                <input type="checkbox" value="visible" class="custom-control-input" id="switch-langage{{$langage->id}}" onClick="toggleVisible('langage', {{$langage->id}})" checked>
                            @else
                                <input type="checkbox" value="visible" class="custom-control-input" id="switch-langage{{$langage->id}}" onClick="toggleVisible('langage', {{$langage->id}})" >
                            @endif
                            <label class="custom-control-label" for="switch-langage{{$langage->id}}">Visible</label>
                        </div>
                    </ul>
                @endguest
            @endforeach
            </li>
        </div>
    </div>
</main>

@auth
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function toggleVisible(category, id) {
        $.ajax({
            url : '{{route("toggleVisible")}}',
            type : 'POST',
            data : { category : category, id : id },
            success : function(result, status) {
                console.log(result);
            },
            error : function(result, status, error) {
                console.log(result);
            }
        });
    }
    </script>
@endauth

@endsection

