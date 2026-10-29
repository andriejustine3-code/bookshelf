@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p>Author: {{ $book->author }}</p>
    <p>Genre: {{ $book->genre }}</p>
    <img src="{{ asset($book->cover) }}" alt="{{ $book->title }} cover" class="book-cover">
    <p>{{ $book->description }}</p>
    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books Collection</a>
@endsection
