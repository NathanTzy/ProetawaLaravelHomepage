<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimonies';

    protected $fillable = [
        'nama',
        'umur',
        'asal',
        'foto',
        'testimoni',
    ];
}
