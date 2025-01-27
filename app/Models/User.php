<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'address',
        'zip_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function index(){

        $users = User::all();
        // dd("Hello World");
        //como segundo parámetro se le pasa un array con los datos que se quieren pasar a la vista

        //Se puede hacer de la siguiente manera
       // return view('user.index', ['users' => $users]);
        //pero cuando la clave y el valor son iguales se puede SIMPLIFICAR con compact de la siguiente manera
        return view('user.index', compact('users'));

        //return view('user.index');
      }
      
}
