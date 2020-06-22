@extends('layout.main')

@section('main-content')


  @foreach ($posts as $post)
    <div class="post">
      <h3>{{ $post->title }}</h3>
      <h4>{{ ($post->user['name']) }}</h4>
      <p>{{ $post->body }}</p>

    </div>
  @endforeach
    
  <h5>Navigation</h5>
  {{ $posts->links() }}
@endsection