@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form class='form' action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            <label for="genre">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="{{ $book->genre }}" required>
            <label for="cover">Cover Image URL</label>
            <input type="url" class="form-control" id="cover" name="cover" value="{{ $book->cover }}">
            <button type="submit" class="btn btn-primary">Update Book</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
