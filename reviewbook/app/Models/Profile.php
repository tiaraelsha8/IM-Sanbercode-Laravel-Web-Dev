<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile';
    protected $fillable = ['user_id', 'age', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
