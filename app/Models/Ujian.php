<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    // Tambahkan field yang boleh di-mass assign
    protected $fillable = [
        'judul',      // <--- tambahkan judul
        'link',  // contoh field lain
        'tanggal',    // contoh field lain
    ];
}
