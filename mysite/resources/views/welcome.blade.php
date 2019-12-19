  
@extends('layout') <!-- se dentro de pasta: layouts/app -->

@section('title', $title)

@section('content')
<h1>My {{ $text }} website! url data: {{ $title }} {{--!! $escaped !!--}} </h1>

    <ul>
    @foreach ($tasks as $task)
        <li>{{ $task }}</li>
    @endforeach
    </ul>

@endsection