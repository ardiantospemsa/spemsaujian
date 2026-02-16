<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Ujian;

class AdminController extends Controller
{
    public function dashboard() {
        $ujians = Ujian::all();
        $siswas = Siswa::all();
        return view('admin.dashboard', compact('ujians', 'siswas'));
    }

    public function tambahSiswa(Request $request){
        Siswa::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => $request->password
        ]);
        return back()->with('success', 'Siswa berhasil ditambahkan!');
    }
    public function hapusSiswa($id)
{
    $siswa = Siswa::findOrFail($id);
    $siswa->delete();

    return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
}
    public function tambahUjian(Request $request){
        Ujian::create([
            'judul' => $request->judul,
            'link'  => $request->link
        ]);
        return back()->with('success', 'Ujian berhasil ditambahkan!');
    }

    public function hapusUjian($id){
    $ujian = Ujian::findOrFail($id);
    $ujian->delete();
    return back()->with('success', 'Ujian berhasil dihapus!');
}
}