<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Quote;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::with(['book', 'author', 'genre'])->get();

        return response()->json($quotes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
            'author_name' => 'required|string',
            'genre_name' => 'required|string',
            'book_name' => 'required|string',
            'book_year' => 'required|integer',
            'author_profession' => 'sometimes|string'
        ]);

        $book = Book::updateOrCreate(['name' => $validatedData['book_name'], 'year' => $validatedData['book_year']]);
        $author = Author::updateOrCreate(['name' => $validatedData['author_name'], 'profession' => $validatedData['author_profession']]);
        $genre = Genre::updateOrCreate(['name' => $validatedData['genre_name']]);
        $quote = Quote::updateOrCreate([
            'text' => $validatedData['text'],
            'book_ID' => $book->id,
            'author_ID' => $author->id,
            'genre_ID' => $genre->id,
        ]);

        if ($quote) {
            return response()->json(['message' => 'Records updated successfully']);
        } else {
            return response()->json(['message' => 'Failed to update records'], 500);
        }
    }

    public function show($quoteID)
    {
        $quote = Quote::with(['book', 'author', 'genre'])->find($quoteID);

        if ($quote) {
            return response()->json($quote->toArray());
        } else {
            return response()->json(['message' => 'Quote not found'], 404);
        }
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
            'author_name' => 'required|string',
            'genre_name' => 'required|string',
            'book_name' => 'required|string',
            'book_year' => 'required|integer',
            'author_profession' => 'sometimes|string'
        ]);

        $book = Book::updateOrCreate(['name' => $validatedData['book_name'], 'year' => $validatedData['book_year']]);
        $author = Author::updateOrCreate(['name' => $validatedData['author_name'], 'profession' => $validatedData['author_profession']]);
        $genre = Genre::updateOrCreate(['name' => $validatedData['genre_name']]);

        $quote = Quote::find($id);

        if (!$quote) {
            return response()->json(['message' => 'Quote not found'], 404);
        }

        $quote->update([
            'text' => $validatedData['text'],
            'book_ID' => $book->id,
            'author_ID' => $author->id,
            'genre_ID' => $genre->id,
        ]);

        return response()->json(['message' => 'Record updated successfully']);
    }



    public function destroy(int $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();
        return response()->json(['message' => 'Quote deleted']);
    }
}
