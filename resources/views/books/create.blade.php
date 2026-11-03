@extends('layouts.app')

@section('content')
    <h1>Add a New Book</h1>
    <form class="form" action="{{ route('books.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" required>
        </div>
        <div class="form-group">
            <label for="cover">Cover Image:</label>
            <input type="file" name="cover" id="cover" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
@endsection
