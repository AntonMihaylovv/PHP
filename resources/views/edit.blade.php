@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <strong>{{  $message }}</strong>
                </div>
            @endif
            @foreach($posts as $post)
                <form action="{{ action('PostController@update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $post->name }}">
                    </div>
                    <div class="form-group">
                        <label>Coursework</label>
                        <textarea name="coursework" class="form-control">{{ $post->coursework }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Supervisor</label>
                        <input type="text" name="supervisor" class="form-control" value="{{ $post->supervisor }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ action('PostController@index') }}" class="btn btn-default">Back</a>
                </form>
            @endforeach
        </div>
    </div>
    @endsection
