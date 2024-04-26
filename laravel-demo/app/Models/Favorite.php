<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['favorite_name', 'favorite_description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_favorite');
    }
}
