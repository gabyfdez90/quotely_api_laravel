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

    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        if ($book) {
            return response()->json($book->toArray());
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function update(Request $request, Book $book)
    {
        $book = Book::findOrFail($book);
        $book->name = $request->name;
        $book->year = $request->year;
        $book->save();
        return response()->json($book);
    }

    public function destroy(int $bookID)
    {
        $book = Book::findOrFail($bookID);
        $book->delete();
        return response()->json(['message' => 'Book deleted']);
    }
}
