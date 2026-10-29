@extends('layouts.app')

@section('content')
    <h1>Books Collection</h1>
    <p>Browse and manage books in our database.</p>
    <div class="book-grid">
        @foreach ($books as $book)
            <div class="book-card">
                <span class="tag">{{$book->genre}}</span>
                <img src="{{ asset($book->cover) }}" alt="{{ $book->title }} cover" class="book-cover">
                <h2>{{ $book->title }}</h2>
                <p>Author: {{ $book->author }}</p>
                <a href="{{ route('books.show', $book) }}" class="btn btn-primary">View Details</a>
            </div>
        @endforeach
    </div>
@endsection