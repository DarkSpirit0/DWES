<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'edad', 'position', 'height', 'weight', 'team_id'];
    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'player_team')
                    ->withTimestamps();
    }
}
