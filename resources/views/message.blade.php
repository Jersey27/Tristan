@extends ('template')
@section ('contenu')

    @if ($type === 'success')
    <div class="alert alert-success">
        <p>{{$message}}</p>
    @endif
@endsection