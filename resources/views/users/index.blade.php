@extends('layout.main')

@section('main-content')

  <h1>Users List</h1>


  @foreach($users as $user)
  <div class="user">
    <h2>{{ $user->name }}</h2>
    <h5>{{ $user->email }}</h5>

    {{-- Dettagli della tabella joinata, richiamati tramite $user (nome public function del modello) --}}
    <p>Phone: {{ $user->info['phone'] }}</p>
    <p>Address: {{ $user->info['address'] }}</p>
  </div>
  @endforeach

@endsection