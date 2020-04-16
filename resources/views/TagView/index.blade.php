@extends('layouts.app')

@section('tag')
    <a type="button" class="btn btn-secondary" id="btn-create" href="{{ route('tags.create') }}">create</a>
   
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">@lang('tag.no')</th>
            <th scope="col">@lang('tag.list')</th>
            <th scope="col"></th>
            <th scope="col"></th>
            {{-- <th scope="col">Last</th>
            <th scope="col">Handle</th> --}}
          </tr>
        </thead>
        @foreach ($tags as $tag)
        <tbody>
          <tr>
            <th scope="row">
                {{ $tag->id }}
            </th>
            <td>
                <a type="button" class="btn btn-link" href="{{ route('tags.show', ['tag' => $tag ]) }}">{{ $tag->name }}</a>
            </td>
            <td style="padding-left:30%;">
                <a class="btn btn-info" style="color:white;" href="{{ route('tags.edit', ['tag' => $tag ]) }}">Edit</a> 
            </td>
            <td style="padding-left:20%;"> 
                <form action="/tags/{{ $tag->id }}" method="POST">
                    @method('DELETE')
                        <button class="btn btn-danger" type="submit" >Delete</button>
                </form>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      </div>

@endsection