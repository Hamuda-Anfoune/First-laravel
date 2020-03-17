@extends('layouts.app')

@section('content')
    <!-- This page can be viewed at lsapp.local/about-->
    <H1>Welcome to laravel</H1>
    <p>this is the about page in a laravel app from a youtube series!</p>
    <h4>return shortened email</h4>
    {!! Form::open(['action' => 'PostsController@email', 'method'=> 'POST']) !!}
        <div class="form-group">
            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
