<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Admin login
    public function adminLoginForm() {
        return view('admin.login');
    }

    public function adminLogin(Request $request) {
        if($request->username == 'admin' && $request->password == 'admin123'){
            Session::put('admin', true);
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Username atau password salah!');
    }

    // Siswa login
    public function siswaLoginForm() {
        return view('siswa.login');
    }

    public function siswaLogin(Request $request){
        $siswa = Siswa::where('username', $request->username)
                       ->where('password', $request->password)
                       ->first();
        if($siswa){
            Session::put('siswa', $siswa->id);
            return redirect()->route('siswa.dashboard');
        }
        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
