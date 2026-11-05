@extends('layouts.app')

@section('content')
    <section class="book-collection">
        <h1>Books Collection</h1>
        <p>Browse and manage books in our database.</p>
        <a class="button" href="{{ route('books.create') }}">Add New Book</a>
        @session('success')
            <p class="alert alert-success">
                {{ session('success') }}
            </p>
        @endsession
        <div class="book-grid">
            @foreach ($books as $book)
                <div class="book-card">
                    <span class="tag">{{$book->genre}}</span>
                    <img src="{{ asset($book->cover) }}" alt="{{ $book->title }} cover" class="book-cover">
                    <h2>{{ $book->title }}</h2>
                    <p>Author: {{ $book->author }}</p>
                    <p>Published By: {{$book->publisher?->name ?? 'Unknown'}}</p>
                    <div class="book-actions">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-primary">View Details</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </div>
                    
                </div>
            @endforeach
        </div>
    </section>
@endsection