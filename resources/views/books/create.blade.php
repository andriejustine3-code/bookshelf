@extends('layouts.app')

@section('content')
    <h1 class='addTitle'>Add a New Book</h1>
    <p class='addSubtitle'>Fill out the form below to add a new book to the collection.</p>
    <form class="form" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Book Title:</label>
        <input type="text" name="title" id="title" required maxlength="150" value="{{ old('title') }}"><br>
        {{-- FIX: Not showing --}}
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
        <label for="author">Book Author:</label>
        <input type="text" name="author" id="author" required maxlength="100" value="{{ old('author') }}"><br>
        {{-- FIX: Not showing --}}
        @error('author')
            <p class="error">{{$message}}</p>
        @enderror
        

        <label for="genre">Book Genre:</label>
        <input type="text" name="genre" id="genre" required maxlength="50" value="{{ old('genre') }}"><br>
        {{-- FIX: Not showing --}}
        @error('genre')
            <p class="error">{{$message}}</p>
        @enderror
        <label for="cover">Book Cover:</label>
        <input type="file" name="cover" id="cover" accept="image/*">
        <button type="submit" class="btn btn-primary" redirect="books.index">Add Book</button>
    </form>
@endsection
