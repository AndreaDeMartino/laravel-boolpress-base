@extends('layout.main')

@section('main-content')
  <div class="container">
    <h1 class="text-center display-4 my-3">Users List</h1>


    <div class="container">

      @foreach($users as $user)
      <div class="row d-flex justify-content-center mb-5">
        
        {{-- User with info --}}
        <ul class="user col-6 m-4 list-group list-group-flush text-center">
          <li class="list-group-item active h6">{{ $user->name }}</li>
          <li class="list-group-item"><small>Email: {{ $user->email }}</small></li>
      
          {{-- Dettagli della tabella info joinata, richiamati tramite $user (nome public function del modello) --}}
          <li class="list-group-item"><small>Phone: {{ $user->info['phone'] }}</small></li>
          <li class="list-group-item"><small>Address: {{ $user->info['address'] }}</small></li>
        </ul>
        
        {{-- Posts of User --}}
        <div class="posts container text-center">
          <h5 class="mb-4 text-primary">Posts</h5>
          <div class="row d-flex justify-content-center">
            
            @foreach($user->posts as $key => $post)
            <div id="accordion" class="col-3">

              <div class="card mb-2">
        
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-{{$post['id']}}-{{$key+1}}" aria-expanded="true" aria-controls="collapseOne">
                      <span class="text-dark">{{ $post['title'] }}</span>
                    </button>
                  </h5>
                </div>
            
                <div id="collapse-{{$post['id']}}-{{$key+1}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <span class="text-muted">{{ $post['body'] }}</span> 
                  </div>
                </div>
        
              </div>

            </div>
            @endforeach
          </div>
        </div>
        
      </div>
      <hr>
      @endforeach

    </div>
  </div>

  {{-- Links --}}
  <div class="links d-flex justify-content-center">
    {{ $users->links() }}
  </div>
    
@endsection