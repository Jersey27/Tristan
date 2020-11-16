@extends ('admintemplate')

@section ('contenu')
    <div class="container">
        <div class="card w-50 p-3">
            <p>vous avez {{$message}} non lus</p>
        </div>
        <div class="card">
            <div class="card-body">
            <h1 class="card-title">A propos de moi</h1>
            {{  Form::open(array('route' => 'modifyHome','method' => 'PUT', 'class' => 'd-flex flex-row'))}}
                @if (isset($home[0]))
                    {{  Form::textarea('information_data', $home[0]->information_data, ['class' => 'form form-control'] )}}
                @else
                    {{  Form::textarea('information_data', null, ['class' => 'form form-control'])}}
                @endif
                {{Form::hidden('information_key', 'aboutme')}}
                {{Form::hidden('id', $home[0]->id)}}
                {{  Form::submit('Mise a jour', ['class' => 'btn btn-warning align-self-end mx-1'])}}
            {{  Form::close()}}
            </div>
        </div>
    </div>
@endsection