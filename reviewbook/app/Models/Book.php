<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['tittle', 'summary', 'image', 'stok', 'genre_id'];

    public function Genre() 
    {
        return $this->belongsTo(Genre::class, 'genre_id'); 
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class, 'book_id');
    }
}
