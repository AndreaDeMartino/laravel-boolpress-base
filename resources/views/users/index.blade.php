@extends('layout.main')

@section('main-content')

  <h1>Users List</h1>


  @foreach($users as $user)
  <div class="user">
    <h2>{{ $user->name }}</h2>
    <h5>{{ $user->email }}</h5>

    {{-- Dettagli della tabella info joinata, richiamati tramite $user (nome public function del modello) --}}
    <p>Phone: {{ $user->info['phone'] }}</p>
    <p>Address: {{ $user->info['address'] }}</p>

    {{-- Titoli della tabella post joinata --}}
    @foreach($user->posts as $post)
    <h3>Titolo Post: {{ $post['title'] }}</h3>
    @endforeach

  </div>
  @endforeach

@endsection