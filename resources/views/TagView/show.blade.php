@extends('layouts.app')

@section('showtag')
    
    <div class="jumbotron" id="mar-l-and-r">
    <h5 class="display" style="margin-bottom: 1rem;">Tag :: {{ $tag->name }} </h5>
        {{-- <form action="{{ route('comments.store', ['post' => $post ]) }}" method="POST">
            <div class="form-group">
                <textarea class="form-control" name="txtcomment" rows="2"></textarea>
                    <div class="button2" style="padding-left:70%; margin-top: 5%;">
                        <button class="btn btn-primary btn-md" type="submit">COMMENT</button>
                    </div>
            </div>
        </form> --}}

        @foreach ($posts as $post)

        <div class="card" style="margin-bottom: 1rem;">
            <div class="card-body">
                {{ $post->post }}
            </div>        
        </div> 
        <div class="edit_btn" id="com_btn">
            <div class="row" style="padding-left:4s0%">
            <div class="col-3">
                 <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" 
                    data-action="{{ route('comments.update',['comment' => $comment, 'post' => $post ]) }}" 
            data-text="{{ $comment->comment }}"
                >Edit </a>
            </div>

            <div class="col-3">
                 <form action="{{ route('comments.destroy', ['comment' => $comment, 'post' => $post ]) }}" method="POST">
                @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </div>

           </div>
        </div> 


        
        @endforeach
        
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
    $( document ).ready(function() {
        $('#exampleModal').on('show.bs.modal', function (event){
            var button = $(event.relatedTarget)
            var action = button.data('action')
            var text =  button.data('text')
            console.log(text)
            $('#upComment').attr('action', action );

            $('#message-text').html(text);
        });
    });
    </script>
@endsection

