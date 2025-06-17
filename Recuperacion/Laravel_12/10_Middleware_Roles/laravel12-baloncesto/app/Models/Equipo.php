<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Jugador;
class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    /**
     * The jugadores that belong to the equipo.
     */
    public function jugadores(): BelongsToMany
    {
        return $this->belongsToMany(Jugador::class, 'equipo_jugador');
    }
}