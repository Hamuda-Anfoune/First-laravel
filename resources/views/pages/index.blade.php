@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Welcome To Laravel</h1>
    <p>This is a tutorial that i'm working on called laravael from scratch on youtube!</p>
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
</div>
    <br><br><br>
    <h4>{{$title}}</h4>
    <p>this is the home page is a laravel app from a youtube series!</p>
@endsection

@section('happy')
    <p>yeah H3 baby!</p>
@endsection
