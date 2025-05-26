<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use HasFactory;
    protected $fillable =['name', 'position', 'height', 'weight', 'team_id'];
    protected $table = 'players';

    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_player' , 'player_id', 'team_id')
            ->withTimestamps();
    }
}
