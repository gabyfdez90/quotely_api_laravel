<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;
use App\Models\Book;
use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function filterByGenreName($name)
    {
        $quotes = Quote::whereHas('genre', function ($query) use ($name) {
            $query->where('name', 'like', "%$name%");
        })->with(['book', 'author', 'genre'])->get();

        return response()->json($quotes);
    }

    public function store(Request $request)
    {
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();
        return response()->json($genre);
    }

    public function show($genreId)
    {
        $genre = Genre::findOrFail($genreId);
        if ($genre) {
            return response()->json($genre->toArray());
        } else {
            return response()->json(['message' => 'Genre not found'], 404);
        }
    }

    public function update(Request $request, Genre $genre)
    {
        $genre = Genre::findOrFail($genre);
        $genre->name = $genre->name;
        $genre->save();
        return response()->json($genre);
    }

    public function destroy(int $genreID)
    {
        $genre = Genre::findOrFail($genreID);
        $genre->delete();
        return response()->json(['message' => 'Genre deleted']);
    }
}
