@extends('layout.main')

@section('main-content')

  <div class="container d-flex-column justify-content-center">

    <div class="container mb-5">

      <div class="post text-center mt-5 border p-4">
        <h2 class="text-info mb-0">{{ $post->title }}</h2>
        <small class="text-muted d-block">by: {{ ($post->user['name']) }}</small>

        @forelse ($post->tags as $tag)
          <span class="badge badgepill badge-warning">{{ $tag->name }}</span>
          @empty
          <p class="text-muted">No Tags</p>
        @endforelse

        <h5 class="my-3">Post Message:</h5>
        <small class="d-block">{{ $post->body }}</small>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
          @csrf
          @method('DELETE')

          <input type="submit" class="btn btn-danger btn-sm mt-2" value="Delete Post">
        </form>

        <small class="text-muted mt-3 d-block">Created at: {{ $post->created_at }}</small>
        <small class="text-muted d-block mb-3">Updated at: {{ $post->updated_at }}</small>
        <a href="{{ route('posts.index') }}" class="btn btn-info w-75">Return to Posts Lists</a>
      </div>

    </div>

  </div>

@endsection