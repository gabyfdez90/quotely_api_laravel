<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'book_ID', 'author_ID', 'genre_ID'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_ID');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_ID');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_ID');
    }
}
