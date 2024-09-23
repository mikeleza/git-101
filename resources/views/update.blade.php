@extends('layout')

@section('title', 'Form')

@section('content')
    <h2 class="text text-center py-2">UPDATE</h2>
    <form method="POST" action="{{route('updates',$blog->id)}}">
        @csrf

        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="title" class="form-control" value="{{$blog->title}}">
        </div>

        @error('title')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror

        <div class="form-group">
            <label for="content">Detail</label>
            <textarea name="content" cols="30" rows="5" class="form-control">{{$blog->content}}</textarea>
        </div>

        @error('content')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror

        <input type="submit" value="update" class="btn btn-success my-2">
    </form>
@endsection
