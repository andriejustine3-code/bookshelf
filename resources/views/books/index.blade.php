@extends('layouts.app')


@section('button')
    <a class="btn btn-primary" href="{{ route('books.create') }}">Add New Book</a>
@endsection

@section('content')
    <section class="book-collection">
        <section class="book-collection-header">
            <h1>Books Collection</h1>
            <p>Browse and manage books in our database.</p>
        </section>
        @session('success')
            <p class="alert alert-success">
                {{ session('success') }}
            </p>
        @endsession
        <div class="book-grid">
            @foreach ($books as $book)
                <div class="book-card">
                    <span class="tag">{{$book->genre}}</span>
                    <img src="{{ str_starts_with($book->cover, 'http') ? $book->cover : Storage::url($book->cover) }}" alt="{{ $book->title }} cover" class="book-cover">
                    <h2>{{ $book->title }}</h2>
                    <p>Author: {{ $book->author }}</p>
                    <p>Published By: {{$book->publisher?->name ?? 'Unknown'}}</p>
                    <ul class="book-actions">
                        <li><a href="{{ route('books.show', $book) }}" class="btn btn-primary">View Details</a></li>
                        <li><a href="{{ route('books.edit', $book) }}" class="btn btn-secondary">Edit</a></li>
                        <li>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form></li>
                    </ul>
                    
                </div>
            @endforeach
        </div>
    </section>
    @if($books->total() > 0)
        <p>
            Showing {{ $books->firstItem() }} - {{ $books->lastItem() }} 
            of {{ $books->total() }} books
        </p>
    @endif
    @if($books->hasPages())
        <nav class="pagination">
            @if($books->onFirstPage())
                <span class="page-disabled">Previous</span>
            @else
                <a class="button" href="{{ $books->previousPageUrl() }}">Previous</a>
            @if($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}" class="page-disabled">Next</a>
            @else
                <span class="page-disabled">Next</span>
        </nav>
    @endif
@endsection