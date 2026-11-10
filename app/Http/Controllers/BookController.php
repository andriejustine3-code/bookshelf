<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Relationship;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('publisher')->paginate(5);
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $publishers = Publisher::all();
        return view('books.create', compact('publishers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string', 'max:50'],
            'cover' => ['nullable', 'url', 'max:2048'],
            'publisher_id' => ['required', 'integer', 'exists:publishers,id'],
        ]);

        $book = Book::create($validated);
        return redirect()
            ->route('books.index', $book)
            ->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $publishers = Publisher::all();
        return view('books.edit', compact('book', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string', 'max:50'],
            'cover' => ['nullable', 'image','mimes:jpg, jpeg, png, webp', 'max:2048'],
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover')->store('cover', 'public');
        }

        $validated['cover'] = $cover;

        $book->update($validated);
        return redirect()
            ->route('books.index', $book)
            ->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
