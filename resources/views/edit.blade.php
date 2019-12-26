@extends('layouts.app')
@section('editpost')
    <div class="top">
    <form action="/posts/{{ $post->id }}" method="POST">
    @method('PATCH')
    <div class="jumbotron" style="margin-left: 20%; margin-right: 20%;">
        <div class="form-group" id="mar-l-and-r">
            <label for="exampleFormControlSelect1">Tag</label>
            <select multiple class="form-control @error('selectTag') is-invalid @enderror" id="exampleFormControlSelect1" name="selectTag[]">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('selectTag')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="exampleFormControlTextarea1" rows="3" placeholder="คุณกำลังคิดอะไรอยู่">{{ $post->post }}</textarea>
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn btn-primary btn-md" type="submit" style="width:100%">EDIT</button>
    </div>
</form>
</div>

@endsection