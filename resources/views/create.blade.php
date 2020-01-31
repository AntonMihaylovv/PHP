@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if($message = Session::get('danger'))
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
           <form action="{{ action('PostController@store') }}" method="post">
               @csrf
               <div class="form-group">
                   <label>Name</label>
                   <input class="form-control" type="text" name="name" placeholder="Name">
               </div>
               <div class="form-group">
                   <label>Coursework</label>
                   <textarea class="form-control" name="coursework" placeholder="Coursework"></textarea>
               </div>
               <div class="form-group">
                   <label>Supervisor</label>
                   <input class="form-control" type="text" name="supervisor" placeholder="supervisor">
               </div>
               <button class="btn btn-primary" type="submit">Submit</button>
           </form>
        </div>
    </div>
@endsection
