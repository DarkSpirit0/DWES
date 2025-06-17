<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Equipo;
class Jugador extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    /**
     * The equipos that belong to the jugador.
     */
    public function equipos(): BelongsToMany
    {
        return $this->belongsToMany(Equipo::class, 'equipo_jugador');
    }
}