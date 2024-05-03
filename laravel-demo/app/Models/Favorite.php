<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['favorite_id', 'favorite_name', 'favorite_description'];

    /**
     * Relationship
     * @return BelongsToMany
     */
    public function favorities(): BelongsToMany
    {
        return $this->belongsToMany(User_favorite::class);
    }
}
