@extends('layout.main')

@section('main-content')

  <div class="container d-flex-column justify-content-center">

    @if (session('post-deleted'))
      <div class="alert alert-success">
        <p>Post {{ session('post-deleted') }} eliminated</p>
      </div>
    @endif

    @foreach ($posts as $post)
    <div class="container mb-5">

      <div class="post text-center mt-5">
        <a class="text-primary mb-0 h2" href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
        <small class="text-muted d-block">by: {{ ($post->user['name']) }}</small>
        <h5 class="mt-4">Message:</h5>
        <p>{{ $post->body }}</p>
        <a class="btn btn-sm btn-info mb-5" href="{{ route('posts.edit', $post->slug) }}">Edit Post</a>
        
        {{-- Comments --}}
        @foreach ($post->comment as  $key => $comment)
        <div class="comments card text-center text-muted my-3">
          <h5 class="text-info border">Comment {{ $key+1 }}</h5>
          <small class="mb-1">By: {{ $comment['author'] }}</small>
          <small class="mb-1">Message:</small>
          <small class="mb-1">{{ $comment['message'] }}</small>
          <small class="mb-1">Vote: <b>{{ $comment['vote'] }}</b></small>
        </div>
        @endforeach
      </div>

    </div>
    @endforeach
  </div>

  {{-- Links --}}
  <div class="links d-flex justify-content-center">
    {{ $posts->links() }}
  </div>
@endsection