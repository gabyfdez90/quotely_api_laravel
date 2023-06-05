<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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


    public function toArray()
    // This function is overwritten to reformat the automatic string value of datetime to another one shorter and more manageable
    {
        $attributes = parent::toArray();

        if (isset($attributes['created_at'])) {
            $attributes['created_at'] = Carbon::parse($attributes['created_at'])->format('Y-m-d');
        }

        if (isset($attributes['updated_at'])) {
            $attributes['updated_at'] = Carbon::parse($attributes['updated_at'])->format('Y-m-d');
        }

        return $attributes;
    }
}
