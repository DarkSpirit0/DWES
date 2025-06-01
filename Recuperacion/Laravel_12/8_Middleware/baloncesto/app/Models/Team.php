<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'city', 'founded'];

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'player_team')
                    ->withTimestamps();
    }
    
}
