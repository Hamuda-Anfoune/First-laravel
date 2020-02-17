@extends('layouts.app')

@section('content')
    <h3>Create a New Post</h3>
    {{--Action sends an array, Using the id to know which post to edit --}}
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=> 'POST']) !!}
        <div class="form-group">
            {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea('body', $post->body, ['id' => 'editor1', 'class' => 'form-control', 'placeholder' => 'Post Body']) !!}
        </div>
        {{-- BELOW IS USED TO CHANGE THE ACTION OF THE FORM TO PUT --}}
        {{ Form::hidden('_method', 'PUT') }}
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
