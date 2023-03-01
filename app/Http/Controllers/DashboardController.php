<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
public function index(Request $request)
{
    $user = $request->user();
    $pembayaran = null;
	$siswa = null;
    $spp = null;


    if ($user->level === 'siswa') {
        $nisn = $user->id_siswa;
		$siswa = Siswa::where('nisn', $nisn)->first();
		$spp = Spp::all();
    }

    return view('pages.admin.dashboard', [
        'total_siswa' => Siswa::count(),
        'total_kelas' => Kelas::count(),
        'total_admin' => DB::table('users')->where('level', 'admin')->count(),
        'total_petugas' => DB::table('users')->where('level', 'petugas')->count(),
        'pembayaran' => $pembayaran,
		'siswa' => $siswa,
        'spp' => $spp
    ]);
}
}

