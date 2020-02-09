@extends('layouts.app')

@section('content')
    <H1>{{$title}}</H1>
    @if(count($services) > 0)
    <ul>
        @foreach ($services as $service)
            <li>{{$service}}</li>
        @endforeach
    </ul>
    @endif
@endsection
