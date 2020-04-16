@extends('layouts.app')
@section('showpost')

    <div class="card" style="margin-top:4rem;">
        <div class="card-header">
            {{ $post->user->name }}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            {{ $post->post }}
            <footer class="blockquote-footer">tag :
                <cite title="Source Title">
                    @foreach ($tags as $tag)
                        {{ $tag->name }},
                    @endforeach
                </cite>:: {{ $post->created_at->diffForHumans() }}
            </footer>
          </blockquote>

          <form action="{{ route('comments.store', ['post' => $post ]) }}" method="POST" style="margin-top:3rem;">
            <div class="form-group">
                {{ Auth::user()->name }} ::
                <textarea class="form-control" name="txtcomment" rows="2"></textarea>
                    <div class="button2" style="padding-left:70%; margin-top: 5%;">
                        <button class="btn btn-primary btn-md" type="submit">COMMENT</button>
                    </div>
            </div>
        </form>

        @foreach ($comments as $comment)

        <div class="card" style="margin-bottom: 2rem;">
            <div class="card-body">
               {{ $comment->user->name }}  :  {{ $comment->comment }}   
              <hr>
                {{ $post->created_at->diffForHumans() }}
            </div>    
            
            <div class="edit_btn" id="com_btn" style="margin-bottom: 2rem;">
            <div class="row">
            <div class="col-2">
                @if(Auth::check() && (Auth::user()->id == $comment->user_id))
                    <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#exampleModal" 
                        data-action="{{ route('comments.update',['comment' => $comment, 'post' => $post ]) }}" 
                            data-text="{{ $comment->comment }}">
                        Edit 
                    </button>
                @else
                    <button class="btn btn-primary" type="button" disabled>Edit</button>
                @endif
                 
            </div>
            <div class="col-3">
                @if(Auth::check() && (Auth::user()->id == $comment->user_id))
                    <form action="{{ route('comments.destroy', ['comment' => $comment, 'post' => $post ]) }}" method="POST">
                        @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                @else
                    <button class="btn btn-danger" type="submit" disabled>Delete</button>
                @endif
            </div>

           </div>
        </div> 
        </div> 
        
        @endforeach

        </div>
      </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">

                <form id="upComment" action="" method="POST">
                    @method('PATCH')
                        <div class="form-group">
                        <textarea class="form-control" id="message-text" name="uptextCom"></textarea>
                        </div>
                
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                        </div>
                </form>
            </div>
          </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
    $('#exampleModal').on('show.bs.modal', function (event){
        var button = $(event.relatedTarget)
        var action = button.data('action')
        var text =  button.data('text')
        console.log(text)
        $('#upComment').attr('action', action );

        $('#message-text').html(text);
    });
</script>
@endsection
