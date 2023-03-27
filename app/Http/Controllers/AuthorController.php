<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Quote;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index(Request $request)
    {
        $authorName = $request->input('name');

        $query = Quote::query();

        if ($authorName) {
            $query->whereHas('author', function ($query) use ($authorName) {
                $query->where('name', 'like', '%' . $authorName . '%');
            });
        }

        $quotes = $query->with(['book', 'author', 'genre'])->get();

        return response()->json($quotes);
    }


    public function filterByAuthorName($name)
    {
        $quotes = Quote::whereHas('author', function ($query) use ($name) {
            $query->where('name', 'like', "%$name%");
        })->with(['book', 'author', 'genre'])->get();

        return response()->json($quotes);
    }


    public function store(Request $request)
    {
        $author = new Author;
        $author->name = $request->name;
        $author->profession = $request->profession;
        $author->save();
        return response()->json($author);
    }

    public function show($authorId)
    {
        $author = Author::findOrFail($authorId);
        if ($author) {
            return response()->json($author->toArray());
        } else {
            return response()->json(['message' => 'Author not found'], 404);
        }
    }

    public function update(Request $request, Author $author)
    {
        $author = Author::findOrFail($author);
        $author->name = $request->name;
        $author->profession = $request->profession;
        $author->save();
        return response()->json($author);
    }

    public function destroy(Author $author)
    {
        $author = Author::findOrFail($author);
        $author->delete();
        return response()->json(['message' => 'Author deleted']);
    }
}
