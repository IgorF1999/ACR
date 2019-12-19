@extends('layout')

@section('content')
    <h1 class="title">Articles</h1>

    <div class="field">
        <div class="control">
            <a href="/articles/sort/1" class="button">Mais antigas</a>
            <a href="/articles/sort/0" class="button">Mais recentes</a>
        </div>
    </div>

    <form method="GET" action="/articles">
        @csrf

        <div class="field">
            <div class="control">
                <input type="text" name="search" class="input" placeholder="Search"/>
                <button type="submit" class="button">Search</button>
            </div>
        </div>
    </form>

    <ul>
        @foreach ($articles as $article)
            <li class="@if ($article->featured)has-text-weight-bold @endif"><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></li>
        @endforeach
    </ul>

    <div class="field">
        <div class="control">
            <a href="/articles/create" class="button">add new</a>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <a href="/articles/featured" class="button is-link">Destaques</a>
        </div>
    </div>

@endsection