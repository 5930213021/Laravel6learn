@extends('layouts.app')

@section('post')
   
      <div class="container">
        <div class="row">
          <div class="col-2">
            <a type="button" class="btn btn-info btn-block" style=" margin-bottom: 2rem;" href="{{ route('posts.create') }}">create</a>
          </div>

          <div class="col-8">
            @foreach ($posts as $post)
              <div class="card" style="margin-bottom: 2rem;">
                <div class="card-header">
                  Post {{ $post->id }} :: {{ $post->user->name }} :: {{ $post->created_at->diffForHumans() }}
                </div>

              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <a type="button" class="btn btn-link" href="{{ route('posts.show', ['post' => $post ]) }}">{{ $post->post }}</a>
                  <hr>
                  <div class="row">
                    <div class="col-2">
                      @if(Auth::check() && (Auth::user()->id == $post->user_id))
                        <a class="btn btn-info" type="submit" href="{{ route('posts.edit', ['post' => $post]) }}">Edit</a>
                      @else
                        <button class="btn btn-info" type="button" disabled>Edit</button>
                      @endif
                    </div>

                    <div class="col-3">
                      @if(Auth::check() && (Auth::user()->id == $post->user_id))
                        <form action="/posts/{{ $post->id }}" method="POST">
                        @method('DELETE')
                          <button class="btn btn-danger" type="submit" >Delete</button>
                        </form>
                      @else
                        <button class="btn btn-danger" type="submit" disabled>Delete</button>
                      @endif
                    </div>

                  </div>
                </blockquote>
              </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    

@endsection


