@extends ('template')
@section ('contenu')
    <main class="container bg-transparent border-0 border-light shadow p-5 rounded rounded-lg">
        <div class="row">
            <div class="col-md-8 order-md-1">
                <div class="">
                    <h1>expérience</h1>
                    <li class="list-group">
                    @foreach ($experiences as $experience)
                        <ul class="list-group-item mb-0"> 
                            <h2>{{$experience->titre}}</h2>
                            <p class="font-weight-bold mb-0">{{$experience->date}}</p>
                            <p class="font-weight-bold text-secondary">{{$experience->company}}</p>
                            <hr>
                            <div class="">
                                <p>{{$experience->description}}</p>
                            </div>
                        </ul>
                    @endforeach
                    </li>
                </div>
                <div class="">
                <h1>compétences</h1>
                    <li class="list-group">
                        @foreach ($competences as $competence)
                            <ul class="list-group-item mb-0">
                                <h2>{{$competence->titre}}</h2>
                                <hr>
                                <div class="desc">
                                    <p>{{$competence->description}}</p>
                                </div>
                            </ul>
                        @endforeach
                    </li>    
                </div>
                <div class="">
                    <h1>formation/qualifications</h1>
                    <li class="list-group">
                        @foreach ($formations as $formation)
                        <ul class="list-group-item mb-0">
                            <div class='row mx-0 align-items-center justify-content-between'>
                                <div class='column align-items-center'>
                                    <h2 class="my-0">{{$formation->titre}}</h2>
                                    <p class="text-center">{{$formation->date}}</p>
                                </div>
                                <img class="my-auto" src="https://picsum.photos/64">
                            </div>
                            <hr>
                            <p>{{$formation->description}}</p>
                        </ul>
                        @endforeach
                    </li>
                </div>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
            <h1>Langue</h1>
            <li class="list-group">
            @foreach ($langages as $langage)
                <ul class="list-group-item mb-3">
                    <h2>{{$langage->titre}}</h2>
                    <p>{{$langage->description}}</p>
                </ul>
            @endforeach
            </li>
        </div>
    </div>
</main>
@endsection
