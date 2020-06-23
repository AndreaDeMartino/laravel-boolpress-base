@extends('layout.main')

@section('main-content')


  @foreach ($posts as $post)
    <hr>
    <div class="post">
      <h3>{{ $post->title }}</h3>
      <h4>{{ ($post->user['name']) }}</h4>
      <p>{{ $post->body }}</p>

      <h3>Comments</h3>
      
      
      @foreach ($post->comment as $comment)
      <h5>{{ $comment['author'] }}</h5>
      <h5>{{ $comment['message'] }}</h5>
      <h5>{{ $comment['vote'] }}</h5>
      @endforeach
  
    </div>
  @endforeach
    
  <h5>Navigation</h5>
  {{ $posts->links() }}
@endsection