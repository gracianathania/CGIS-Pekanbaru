<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;

    protected $table = 'klinik';
    protected $casts = [
        'data' => 'array', // Mengkonversi kolom json menjadi array
    ];

}
