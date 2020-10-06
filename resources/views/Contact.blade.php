@extends ('template')

@section ('contenu')
    <div class="w-50 container">   
    <h1 class="h3 mb-3 font-weight-normal text-center">Contactez-moi</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut dictum nisi. Aliquam et ex in orci semper mattis ac ut nisi. Nullam scelerisque congue tristique.</p>
        <div class="row">
            <div class="col-md-8 order-md-1">
            {{  Form::open(array('route' => 'postContact', 'files' => true))}}
                <div class="mb-3">
                    {{Form::label('name', 'Prénom NOM')}}
                    {{Form::text('name', null,['class' => 'form-control'])}}
                    {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="mb-3">
                    {{Form::label('society', 'Société')}}
                    {{Form::text('society', null,['class' => 'form-control'])}}
                    {!! $errors->first('society', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="mb-3">
                    {{Form::label('mail', 'E-mail')}}
                    {{Form::email('mail', null, ['class' => 'form-control'])}}
                    {!! $errors->first('mail', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="mb-3">
                    {{Form::label('subject', 'sujet')}}
                    {{Form::text('subject', null, ['class' => 'form-control'])}}
                    {!! $errors->first('subject', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="mb-3">
                    {{Form::label('message','Message')}}
                    {{Form::textarea('message', null,['class' => 'form-control'])}}
                    {!! $errors->first('message', '<small class="help-block">:message</small>') !!}
                </div>
                <hr class="mb-4"/>
                <div class="mb-3">
                    {{Form::label('files','Fichier complémentaire')}}
                    {{Form::file('files', null, ['class' => 'form-control'])}}
                </div>
                <div class='mb-3'>
                    {{Form::submit('Envoyer',['class' => 'btn btn-primary btn-lg btn-block'])}}
                </div>
                {{  Form::close()}}
            </div>
            <div class="col-md-4 order-md-2 mb-4">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <h4>téléphone</h4>
                        <a href="tel:+33602247468">06.02.24.74.68</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <h4>email</h4>
                        <a href="mailto:tristan.lefevre@viacesi.fr">tristan.lefevre@viacesi.fr</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
@endsection