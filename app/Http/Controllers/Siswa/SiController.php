<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class SiController extends Controller
{ 
    public function login(Request $request)
    {
        $nisn = $request->input('nisn');
        $nis = $request->input('nis');
        $siswa = Siswa::where('nisn', $nisn)->first();

        if ($siswa && Hash::check($nis, $siswa->password)) {
            // Autentikasi berhasil
            session()->put('siswa', $siswa);
         return redirect('/home');
        } else {
            // Autentikasi gagal
            return redirect('/login'); }
    }
}
