<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'profession'];
    public $timestamps = false;

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
}
