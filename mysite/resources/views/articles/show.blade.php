@extends('layout')

@section('content')
    <h1 class="title">{{ $article->title }}</h1>

    <div class="content">
        {{ $article->content }}

        <p>
        <label class="checkbox" for="featured" disabled>
            <input type="checkbox" name="featured" {{ $article->featured ? 'checked' : '' }} disabled>
            Em Destaque
        </label>

        </p>

        <p>
            <a href="/articles/{{ $article->id }}/edit">Edit</a>
         </p>
    </div>

@endsection