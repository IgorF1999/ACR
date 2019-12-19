@extends('layout')

@section('content')
    <h1 class="title">Create a new Article</h1>

    <form method="POST" action="/articles">
        @csrf

        <div class="field">
            <label  class="label" for="title">Title</label>
            <div class="control">
                <input type="text" name="title" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Article title" value="{{ old('title') }}" >
            </div>
        </div>

        <div class="field">
            <label  class="label" for="content">Content</label>

            <div class="control">
                <textarea class="textarea" name="content">{{ old('content') }}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="checkbox" for="featured">
                <input type="checkbox" name="featured" {{ old('featured') ? 'checked' : '' }}>
                Em Destaque
            </label>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create article</button>
            </div>
        </div>

        @include('errors')
    </form>
@endsection