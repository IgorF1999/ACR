@extends('layout')

@section('content')
    <h1 class="title">Destaques (Articles)</h1>

    <ul>
        @foreach ($articles as $article)
            <li class="@if ($article->featured)has-text-weight-bold @endif"><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></li>
        @endforeach
    </ul>

@endsection