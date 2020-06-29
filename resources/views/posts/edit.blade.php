@extends('layout.main')

@section('main-content')

  <div class="container">
    <h2 class="text-success display-4 text-center mt-5">Edit Post</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
      @csrf
      @method('PATCH')

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" 
          value="{{ old('title', $post->title) }}">
      </div>
    
      <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" name="body" id="body">{{ old('body', $post->body) }}
        </textarea>
      </div>

      @foreach($tags as $tag)
        <div class="form-check">

          <input type="checkbox" class="form-check-input" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id}}"
          {{-- Checked dei tag che erano presenti nella show --}}
          @if ($post->tags->contains($tag->id)) 
            checked
          @endif>

          <label for="tag-{{ $loop->iteration }}">{{ $tag->name }}</label>
        </div>
      @endforeach
    
      <input type="submit" class="btn btn-success" value="Update">

    </form>

  </div>

@endsection