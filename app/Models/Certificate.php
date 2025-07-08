<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates'; 

    protected $fillable = [
        'nama',
        'img',
        'tanggal_keluar',
        'penerbit',
        'guna',
    ];
}
