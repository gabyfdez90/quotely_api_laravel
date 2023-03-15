<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
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
