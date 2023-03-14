<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return response()->json($quotes);
    }

    public function store(Request $request)
    {
        $quote = new Quote;
        $quote->quote_text = $request->quote_text;
        $quote->author_id = $request->author_id;
        $quote->genre_id = $request->genre_id;
        $quote->book_id = $request->book_id;
        $quote->save();
        return response()->json($quote);
    }

    public function show(Quote $quote)
    {
        $quote = Quote::find($quote);
        return $quote;
    }


    public function update(Request $request, Quote $quote)
    {
        $quote = Quote::findOrFail($quote);
        $quote->quote_text = $request->quote_text;
        $quote->author_id = $request->author_id;
        $quote->genre_id = $request->genre_id;
        $quote->book_id = $request->book_id;
        $quote->save();
        return response()->json($quote);
    }


    public function destroy(Quote $quote)
    {
        $quote = Quote::findOrFail($quote);
        $quote->delete();
        return response()->json(['message' => 'Quote deleted']);
    }
}
