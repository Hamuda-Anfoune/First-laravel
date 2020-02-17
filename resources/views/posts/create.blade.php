@extends('layouts.app')

@section('content')
    <h3>Create a New Post</h3>
    {!! Form::open(['action' => 'PostsController@store', 'method'=> 'POST']) !!}
        <div class="form-group">
            {{-- STRUCTURE:
            {!! Form::label($for, $text, [$options]) !!}  --}}

            {{-- CHOSE NOT TO HAVE LABELS
            {!! Form::label('title', 'Title:') !!} --}}

            {{-- STRUCTURE:
            {!! Form::textarea($name, $value, [$options]) !!} --}}
            {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('body', '', ['id' => 'editor1', 'class' => 'form-control', 'placeholder' => 'Post Body']) !!}
        </div>
        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
