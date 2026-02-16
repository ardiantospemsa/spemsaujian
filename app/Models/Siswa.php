<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Tambahkan $fillable
    protected $fillable = [
        'username', // <--- tambahkan username
        'nama',
        'password',
    ];
}
