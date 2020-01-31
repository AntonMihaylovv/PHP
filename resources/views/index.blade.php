@extends('layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <h1>Student graduation system</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ action('PostController@create') }}" class="btn btn-primary">Add student</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Coursework</th>
            <th>Supervisor</th>
            <th width="230">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->coursework }}</td>
                <td>{{ $post->supervisor }}</td>
                <td>
                    <form action="{{ action('PostController@destroy', $post->id) }}" method="post">
                        <a href="{{ action('PostController@show', $post->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ action('PostController@edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
