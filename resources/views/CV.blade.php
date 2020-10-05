@extends ('template')
@section ('contenu')
    <main class="container border border-light shadow p-5 rounded rounded-lg">
        <div class="row">
            <div class="col-md-8 order-md-1">
                <div class="">
                    <h1>expérience</h1>
                    <li class="list-group">
                    @foreach ($experiences as $experience)
                        <ul class="list-group-item mb-3 {{$experience['id']}}"> 
                            <h2>{{$experience["name"]}}</h2>
                            <hr>
                            <div class="desc desc-{{$experience['id']}}" style='display:none'>
                                <p>{{$experience["description"]}}</p>
                            </div>
                            <a href="#" class="desc-btn">montrer détails</a>
                        </ul>
                    @endforeach
                    </li>
                </div>
                <div class="">
                <h1>compétences</h1>
                    <li class="list-group">
                        @foreach ($competences as $competence)
                            <ul class="list-group-item mb-3">
                                <h2>{{$competence["name"]}}</h2>
                                <progress class="progress-bar" max="100" value="{{$competence['level']}}"></progress>
                                <hr>
                                <div class="desc" style="display:none">
                                    <p>{{$competence["description"]}}</p>
                                </div>
                                <a href="#" class="desc-btn">montrer détails</a>
                            </ul>
                        @endforeach
                    </li>    
                </div>
                <div class="">
                    <h1>formation/qualifications</h1>
                    <li class="list-group">
                        <ul class="list-group-item mb-3">
                            <div class='row mx-0 align-items-center justify-content-between'>
                                <div class='column align-items-center'>
                                    <h2 class="my-0">Titre Formation</h2>
                                    <p class="text-center">date</p>
                                </div>
                                <img class="my-auto" src="https://picsum.photos/64">
                            </div>
                            <hr>
                            <p>Lorem Issou</p>
                        </ul>
                    </li>
                </div>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
            <h1>Langue</h1>
            <li class="list-group">

                <ul class="list-group-item mb-3">
                    <h2>Anglais</h2>
                    <progress class="progress-bar" mas="100"></progress>
                    <p>niveau C1</p>
                </ul>
            </li>
        </div>
    </div>
    </main>
    <script>
        $(".desc-btn").click(function(event) {
            $target = $(event.target).parent().find(".desc");
            if ($target.is(':hidden'))
            {
                $target.show();
                $(event.target).html('masquer détails');
            } 
            else
            {
                $target.hide();
                $(event.target).html('montrer détails');
            }
        })
    </script>
@endsection
