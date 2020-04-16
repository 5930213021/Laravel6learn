@extends('layouts.app')

@section('createtag')
    <form action="/tags" method="POST">
    <div class="jumbotron" id="mar-l-and-r">
        {{-- <h1 class="display-4">{{ $create }}</h1> --}}
        <div class="form-group">
            <textarea class="form-control" name="text_tag" id="exampleFormControlTextarea1" rows="3" placeholder="คุณกำลังคิดอะไรอยู่"></textarea>
        </div>
        <button class="btn btn-info btn-md" type="submit" style="width:100%">save</button>
    </div>
</form>
@endsection


