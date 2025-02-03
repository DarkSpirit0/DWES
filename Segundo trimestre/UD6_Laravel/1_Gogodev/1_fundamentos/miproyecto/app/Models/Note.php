<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    protected $fillable =
    [
        'title',
        'description',
        'deadline',
        'done',
    ];  

    protected $cast = [
        'done' => 'boolean',
    ];

    protected $hidden = ['password'];
}
