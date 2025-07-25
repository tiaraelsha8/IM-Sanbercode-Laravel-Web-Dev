<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['user_id', 'book_id', 'content'];

     public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
