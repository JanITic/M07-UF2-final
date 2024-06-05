<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    use HasFactory;

    protected $table = 'usuaris';

    // S'indiquen les dades que es volen omplir amb $fillable
    protected $fillable = [
        'nom',
        'cognoms',
        'contrasenya',
        'email',
        'rol',
        'actiu'
    ];

    protected $hidden = [];
}
