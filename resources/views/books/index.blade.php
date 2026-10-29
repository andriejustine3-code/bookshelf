@extends('layouts.app')

@section('content')
    <h1>Books Collection</h1>
    <p>Browse and manage books in our database.</p>
    <div class="book-grid">
        @foreach ($books as $book)
            <div class="book-card">
                <span class="tag">{{$book->genre}}</span>
                <img src="{{ asset('images/' . $book->cover_image) }}" alt="{{ $book->title }} cover" class="book-cover">
                <h2>{{ $book->title }}</h2>
                <p>Author: {{ $book->author }}</p>
                <p>Published: {{ $book->published_year }}</p>
            </div>
        @endforeach
    </div>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->title }} by {{ $book->author }}</li>
        @endforeach
    </ul>
@endsection