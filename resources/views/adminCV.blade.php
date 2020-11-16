@extends ('admintemplate')
@section ('contenu')
<aside class="float-left position-fixed border rounded-right border-dark">
    <div class="d-flex flex-column">
        <a href="#experiences">experiences<a>
        <a href="#competences">compétences<a>
        <a href="#formations">formations<a>
        <a href="#langages">langages<a>
    </div>
</aside>
<div class="container">
    <div class="border border-secondary bg-light p-5 rounded rounded-lg">
        <h1 id="experiences">experiences</h1>
        <div class="form-add mb-3">
            {{  Form::open(array('route' => 'addCV', 'class' => 'd-flex flex-row', 'id' => 'cvForm'))}}
            <div class="flex-grow-1 d-flex justify-content-around px-1">
                <div class="flex-grow-1 mx-2">
                    <div class="d-flex flex-row">
                        <div class="mx-1 w-100">
                            {{Form::label('titre', 'titre')}}
                            {{Form::text('titre', null,['class' => 'form-control'])}}
                        </div>
                        <div class="mx-1 w-50">
                            {{Form::label('date','période')}}
                            {{Form::text('date',null,['class' => 'form-control'])}}
                        </div>
                        <div class="mx-1 w-100">
                            {{Form::label('company','companie')}}
                            {{form::text('company',null,['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="flex-grow-1 mx-1">
                    {{Form::label('description', 'description')}}
                    {{Form::textarea('description', null,['class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            {{Form::hidden('section','experience')}}
            {{Form::submit('ajouter',['class' => 'btn btn-success btn-block w-auto align-self-end'])}}
            {{  Form::close()}}
        </div>
        <li class="list-group">
            @foreach($experiences as $experience)
                <ul class="list-group-item mb-0">
                    <div id="exp{{$experience->id}}" class="d-flex">
                        <div class="flex-grow-1 d-flex justify-content-around mx-1 flex-column">
                            {{  Form::open(array('route' => 'modifyCV', 'method' => 'put', 'id' => 'cvForm'))}}
                            <div>
                            {{$experience->id}}
                            </div>
                            <div class="d-flex flex-row">
                                <div class="mx-1 w-100">
                                    {{Form::label('titre', 'titre')}}
                                    {{Form::text('titre', $experience->titre ,['class' => 'form-control'])}}
                                </div>
                                <div class="mx-1 w-50">
                                    {{Form::label('date','période')}}
                                    {{Form::text('date',$experience->date,['class' => 'form-control'])}}
                                </div>
                                <div class="mx-1 w-100">
                                    {{Form::label('company','companie')}}
                                    {{form::text('company',$experience->company,['class' => 'form-control'])}}
                                </div>
                                <div class="">
                                    {{Form::label('place','place')}}
                                    {{Form::select('place', $places, $experience->place)}}
                                </div>
                            </div>
                            <div class="flex-grow-1 mx-1">
                                {{Form::label('description', 'description')}}
                                {{Form::textarea('description', $experience->description ,['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="row ml-auto mx-1 align-self-end">
                            {{Form::hidden('section','experience')}}
                            {{Form::hidden('id', $experience->id)}}
                            {{Form::submit('Modifier',['class' => 'btn btn-warning btn-block w-auto mx-1'])}}
                            {{  Form::close()}}
                            {{Form::open(array('route' => 'removeCV', 'method' => 'delete'))}}
                            {{Form::hidden('section','experience')}}
                            {{Form::hidden('id', $experience->id)}}
                            {{Form::submit('supprimer',['class' => 'btn btn-danger btn-block w-auto mx-1'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                </ul>
            @endforeach
        </li>
    </div>
    <div class="border border-secondary bg-light p-5 rounded rounded-lg">
        <h1 id="competences">competences</h1>
        <div class="form-add mb-3">
            {{  Form::open(array('route' => 'addCV', 'id' => 'cvForm'))}}
            <div class="d-flex justify-content-around px-1">
                <div class="mx-1">
                {{Form::label('titre', 'titre')}}
                {{Form::text('titre', null,['class' => 'form-control'])}}
                </div>
                <div class="flex-grow-1 w-100 mx-1">
                {{Form::label('description', 'description')}}
                {{Form::text('description', null,['class' => 'form-control'])}}
                </div class="mx-1 flex-grow-0">
                {{Form::hidden('section','competence')}}
                {{Form::submit('ajouter',['class' => 'btn btn-success btn-block w-auto align-self-end'])}}
            {{  Form::close()}}
            </div>
        </div>
        <li class="list-group">
            @foreach($competences as $competence)
            <ul class="list-group-item mb-0">
                <div id="exp{{$competence->id}}">
                    {{  Form::open(array('route' => 'modifyCV', 'method' => 'put', 'id' => 'cvForm'))}}
                    <div class="d-flex justify-content-between mx-1">
                        <div class="mx-1">
                        {{Form::label('titre', 'titre')}}
                        {{Form::text('titre', $competence->titre ,['class' => 'form-control'])}}
                        </div>
                        <div class="flex-grow-1 mx-1">
                        {{Form::label('description', 'description')}}
                        {{Form::text('description', $competence->description ,['class' => 'form-control'])}}
                        </div>
                        <div class="row ml-auto mx-1 flex-grow-0 align-self-end">
                        {{Form::hidden('section','competence')}}
                        {{Form::hidden('id', $competence->id)}}
                        {{Form::submit('Modifier',['class' => 'btn btn-warning btn-block w-auto mx-1'])}}
                        {{  Form::close()}}
                        {{Form::open(array('route' => 'removeCV', 'method' => 'delete', 'id' => 'cvForm'))}}
                            {{Form::hidden('section','competence')}}
                            {{Form::hidden('id', $competence->id)}}
                            {{Form::submit('supprimer',['class' => 'btn btn-danger btn-block w-auto mx-1'])}}
                        {{  Form::close()}}
                        </div>
                    </div>
                </div>
            </ul>
            @endforeach
        </li>
    </div>
    <div class="border border-secondary bg-light p-5 rounded rounded-lg">
        <h1 id="formations">formations</h1>
        <div class="form-add mb-3">
            {{  Form::open(array('route' => 'addCV', 'class' => 'd-flex flex-row', 'id' => 'cvForm'))}}
                <div class="flex-grow-1 d-flex flex-column justify-content-around px-1">
                    <div class=d-flex>
                        <div class="mx-1 w-100">
                        {{Form::label('titre', 'titre')}}
                        {{Form::text('titre', null,['class' => 'form-control'])}}
                        </div>
                        <div class="mx-1">
                        {{Form::label('date','date')}}
                        {{Form::text('date',null, ['class'=> 'form-control', 'max' => '100', 'min' => '0'])}}
                        </div>
                    </div>
                    <div>
                    {{Form::label('description', 'description')}}
                    {{Form::textarea('description', null,['class' => 'form-control'])}}
                    </div>
                </div>
                {{Form::hidden('section','formation')}}
                {{Form::submit('ajouter',['class' => 'btn btn-success btn-block w-auto align-self-end'])}}
            {{Form::close()}}
        </div>
        <li class="list-group">
            @foreach($formations as $formation)
            <ul class="list-group-item mb-0">
                <div id="exp{{$formation->id}}">
                    {{  Form::open(array('route' => 'modifyCV', 'method' => 'put', 'id' => 'cvForm'))}}
                    <div class="d-flex">
                        <div class="flex-grow-1 mx-1">
                            <div class="d-flex justify-content-between mx-1">
                                <div class="mx-1 flex-grow-1">
                                    {{Form::label('titre', 'titre')}}
                                    {{Form::text('titre', $formation->titre ,['class' => 'form-control'])}}
                                </div>
                                <div class="mx-1">
                                    {{Form::label('date','date')}}
                                    {{Form::text('date',$formation->date, ['class'=> 'form-control', 'max' => '100', 'min' => '0'])}}
                                </div>
                            </div>
                            <div class="mx-1">
                                {{Form::label('description', 'description')}}
                                {{Form::textarea('description', $formation->description ,['class' => 'form-control'])}}
                            </div>
                        </div>
                        <div class="d-flex align-items-end mx-1">
                            {{Form::hidden('section','formation')}}
                            {{Form::hidden('id', $formation->id)}}
                            {{Form::submit('Modifier',['class' => 'btn btn-warning btn-block w-auto mx-1'])}}
                    {{  Form::close()}}
                        {{Form::open(array('route' => 'removeCV', 'method' => 'delete', 'id' => 'cvForm'))}}
                            {{Form::hidden('section','formation')}}
                            {{Form::hidden('id', $formation->id)}}
                            {{Form::submit('supprimer',['class' => 'btn btn-danger btn-block w-auto mx-1'])}}
                        {{Form::close()}}
                        </div>
                    </div>
                </div>
            </ul>
            @endforeach
        </li>
    </div>
    <div class="border border-secondary bg-light p-5 rounded rounded-lg">
        <h1 id="langages">langages</h1>
        <div class="form-add mb-3">
            {{  Form::open(array('route' => 'addCV', 'id' => 'cvForm'))}}
            <div class="d-flex justify-content-around px-1">
                <div class="mx-1">
                {{Form::label('titre', 'titre')}}
                {{Form::text('titre', null,['class' => 'form-control'])}}
                </div>
                <div class="flex-grow-1 w-100 mx-1">
                {{Form::label('description', 'description')}}
                {{Form::text('description', null,['class' => 'form-control'])}}
                </div class="mx-1 flex-grow-0">
                {{Form::hidden('section','langage')}}
                {{Form::submit('ajouter',['class' => 'btn btn-success btn-block w-auto align-self-end'])}}
            {{  Form::close()}}
            </div>
        </div>
        <li class="list-group">
            @foreach($langages as $langage)
            <ul class="list-group-item mb-0">
                <div id="exp{{$langage->id}}">
                    <div class="d-flex flex-row">
                        {{  Form::open(array('route' => 'modifyCV', 'method' => 'put', 'id' => 'cvForm', 'class' => 'flex-grow-1 d-flex justify-content-between mx-1'))}}
                            <div class="mx-1">
                                {{Form::label('titre', 'titre')}}
                                {{Form::text('titre', $langage->titre ,['class' => 'form-control'])}}
                            </div>
                            <div class="flex-grow-1 mx-1">
                                {{Form::label('description', 'description')}}
                                {{Form::text('description', $langage->description ,['class' => 'form-control'])}}
                            </div>
                            {{Form::hidden('section','langage')}}
                            {{Form::hidden('id', $langage->id)}}
                            {{Form::submit('Modifier',['class' => 'btn btn-warning btn-block w-auto mx-1'])}}
                        {{  Form::close()}}
                        {{Form::open(array('route' => 'removeCV', 'method' => 'delete'))}}
                            {{Form::hidden('section','langage')}}
                            {{Form::hidden('id', $langage->id)}}
                            {{Form::submit('supprimer',['class' => 'btn btn-danger btn-block w-auto mx-1'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </ul>
            @endforeach
        </li>
    </div>
</div>
@endsection