@extends('layouts.app')

@section('createpost')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/posts" method="POST">
    <div class="jumbotron" id="mar-l-and-r">
        <h5 class="display">Post :: {{ Auth::user()->name }} </h5>
        <div class="form-group" id="mar-l-and-r">
            <label for="exampleFormControlSelect1">Tags</label>
            <select multiple class="form-control @error('selectTag') is-invalid @enderror" id="exampleFormControlSelect1" name="selectTag[]" required>
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
        {{-- <h1 class="display-4">{{ $create }}</h1> --}}
        <div class="form-group">
            <textarea name="text" id="text" class="form-control @error('text') is-invalid @enderror" rows="3" placeholder="คุณกำลังคิดอะไรอยู่" required></textarea>
            
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn btn-primary btn-md" type="submit" style="width:100%">POST</button>
    </div>
</form>

@endsection