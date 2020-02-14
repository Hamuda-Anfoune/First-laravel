@extends('layouts.app')

@section('content')
    @if(count($posts) >1)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <h3>{{$post->title}}</h3>
                <small>Last update on {{$post->updated_at}}</small>
            </div>
            <br>
        @endforeach
    @else
        <p>No posts submitted yet!</p>
    @endif


@endsection
