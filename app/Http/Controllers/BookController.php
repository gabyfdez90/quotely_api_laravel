<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        $book = new Book;
        $book->author_id = $request->author_id;
        $book->save();
        return response()->json($book);
    }

    public function show(Book $book)
    {
        $book = Book::find($book);
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $book = Book::findOrFail($book);
        $book->name = $request->name;
        $book->year = $request->year;
        $book->save();
        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        $book = Book::findOrFail($book);
        $book->delete();
        return response()->json(['message' => 'Book deleted']);
    }
}
