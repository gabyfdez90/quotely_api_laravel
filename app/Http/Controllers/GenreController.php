<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }


    public function store(Request $request)
    {
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();
        return response()->json($genre);
    }

    public function show(Genre $genre)
    {
        $genre = Genre::find($genre);
        return $genre;
    }

    public function update(Request $request, Genre $genre)
    {
        $genre = Genre::findOrFail($genre);
        $genre->name = $genre->name;
        $genre->save();
        return response()->json($genre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre = Genre::findOrFail($genre);
        $genre->delete();
        return response()->json(['message' => 'Genre deleted']);
    }
}
