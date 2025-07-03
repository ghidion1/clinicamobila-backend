<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programare extends Model
{
   protected $table = 'programari'; // Adaugă asta!
    protected $fillable = [
        'nume',
        'prenume',
        'specialitate',
        'medic',
        'data',
        'ora',
        'telefon',
        'email',
        'motiv',
        'mesaj'
    ];
}
