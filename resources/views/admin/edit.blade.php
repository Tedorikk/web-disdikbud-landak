@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Article</h1>
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $article->author }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $article->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Article</button>
        <a href="{{ route('articles.manage') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection