@extends('layout.main')

@section('main-content')

  <div class="container d-flex-column justify-content-center">

    <div class="container mb-5">

      <div class="post text-center mt-5 border p-4">
        <h2 class="text-info mb-0">{{ $post->title }}</h2>
        <small class="text-muted">by: {{ ($post->user['name']) }}</small>
        <h5 class="my-3">Post Message:</h5>
        <small>{{ $post->body }}</small>
        <small class="text-muted mt-3 d-block">Created at: {{ $post->created_at }}</small>
        <small class="text-muted d-block mb-3">Updated at: {{ $post->updated_at }}</small>
        <a href="{{ route('posts.index') }}" class="btn btn-info w-75">Return to Posts Lists</a>
      </div>

    </div>

  </div>

@endsection