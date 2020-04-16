@extends('layouts.app')

@section('edittag')
    <div class="top" style="margin-top: 100px;">
        <form action="/tags/{{ $tag->id }}" method="POST">
            @method('PATCH')
                <div class="jumbotron" style="margin-left: 20%; margin-right: 20%;">
                    <div class="form-group">
                        <textarea class="form-control" name="edittext" id="exampleFormControlTextarea1" rows="3" placeholder="คุณกำลังคิดอะไรอยู่">{{ $tag->name }}</textarea>
                    </div>
                    <button class="btn btn-primary btn-md" type="submit" style="width:100%">EDIT</button>
                </div>
        </form>
    </div>
@endsection
    
