@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Last update on {{$post->updated_at}}</small>
            </div>
            <br>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts submitted yet!</p>
    @endif


@endsection
