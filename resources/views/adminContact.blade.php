@extends ('admintemplate')
@section ('contenu')
<div class="container">
  <table class="table table-dark">
    <thead>
      <tr>
        <th>#</th>
        <th>Prénom Nom</th>
        <th>Adresse</th>
        <th>Sujet</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($contacts as $contact)
        <tr data-href="{{url('/admin/contact', $contact->id)}}">
            <th>{{$contact->id}}</th>
            <td>{{$contact->name}}</td>
            <td>{{$contact->mail}}</td>
            <td>{{$contact->subject}}</td>
        </tr>
    @endforeach
    </tbody>
  </table>
</div>
<script>
$('tr[data-href]').on("click", function() {
    document.location = $(this).data('href');
});
</script>
@endsection