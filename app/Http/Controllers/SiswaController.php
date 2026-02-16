<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function dashboard() {
        $ujians = Ujian::all();
        return view('siswa.dashboard', compact('ujians'));
    }
}
