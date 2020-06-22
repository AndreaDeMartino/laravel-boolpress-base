@extends('layout.main')

@section('main-content')

  <h1>Users List</h1>


  @foreach($users as $user)
  <div class="user">
    <h2>{{ $user->name }}</h2>
    <h5>{{ $user->email }}</h5>
  </div>
  @endforeach

@endsection