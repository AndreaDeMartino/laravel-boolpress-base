@extends('layout.main')

@section('main-content')
  <div class="container">
    <h1 class="display-4 my-4 text-center">Create new Post</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.store') }}" method="post">
      @csrf
      @method('POST')

      <div class="form group">
        <label for="title">Title</label>
        <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" >
        <label for="body" class="mt-4">Body</label>
      </div>

      <div class="form group mb-3">
        <textarea class="form-control" name="body" id="body">{{ old('body') }}</textarea>
      </div>

      @foreach ($tags as $tag)
        <div class="form-check">
          {{-- Si usa name= tag[] perchè diventa un array contenente i check selezionati --}}
          <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id }}">
          <label for="tag-{{ $loop->iteration }}">{{ $tag->name }}</label>
        </div>
      @endforeach
      <input class="btn btn-success btn-sm my-3" type="submit" value="Create">
    </form>
  </div>
  


@endsection