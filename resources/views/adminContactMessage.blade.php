@extends ('admintemplate')
@section ('contenu')
<div>
<div class="container">
  <a ></a>     
  <table class="table table-dark table-bordered">
    <tbody>
      <tr class="bg-dark text-light">
        <th>Expéditeur</th>
        <td>{{$contact->name}}</td>
        <th>Société</th>
        <td>{{$contact->society}}</td>
      </tr>
      <tr class="bg-light text-dark">
        <td>adresse</td>
        <td colspan="3">{{$contact->mail}}</td>
      </tr>
      <tr class="bg-light text-dark">
        <td>sujet</td>
        <td colspan="3">{{$contact->subject}}</td>
      </tr>
      <tr class="bg-light text-dark">
        <td colspan="4">{{$contact->message}}</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
@endsection