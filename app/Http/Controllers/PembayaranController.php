<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Validator;
use App\Helpers\Universe;
use PDF;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;


class PembayaranController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();
    	return view('pages.pembayaran.index', ['siswa'=> $siswa]);
    }

    public function bayar($nisn)
    {	
    	$siswa = Siswa::with(['kelas'])
            ->where('nisn', $nisn)
            ->first();

        $spp = Spp::all();
        $kull = Universe::bulanAll();
    	return view('pages.pembayaran.bayar', compact('siswa', 'spp', 'kull'));
    }
//membantu melakukan event onchange pada pembayaran
    public function spp($tahun)
    {
        $spp = Spp::where('tahun', $tahun)->first();
        return response()->json([
            'data' => $spp,
            'tahun' => $spp->tahun,
            'nominal' => 'Rp '.number_format($spp->nominal, 0, 2, '.'),
            'jumlah_bayar' => $spp->nominal
        ]);
    }

    public function prosesBayar(Request $request, $nisn)
    {

        {
            $request->validate([
                'nisn' => 'required'
            ]);
        
            $petugas = User::where('id', Auth::user()->id)->first();
            $pembayaran = Pembayaran::whereIn('bulan_bayar', $request->bulan_bayar)
                ->where('tahun_bayar', $request->tahun_bayar)
                ->where('nisn', $request->nisn)
                ->get();
            $spp = Spp::where('tahun', $request->tahun_bayar)->first();
        
            DB::transaction(function () use ($request, $petugas, $pembayaran, $spp) {
                if ($pembayaran->isEmpty()) {
                    foreach ($request->bulan_bayar as $bulan) {
                        Pembayaran::create([
                            'id_pembayaran' => mt_rand(100000, 999999),
                            'id_petugas' => $petugas->id,
                            'nisn' => $request->nisn,
                            'tgl_bayar' => now()->timezone('Asia/Jakarta')->format('Y-m-d'),
                            'tahun_bayar' => $request->tahun_bayar,
                            'bulan_bayar' => $bulan,
                            'id_spp' => $spp->id_spp,
                            'jumlah_bayar' => $request->jumlah_bayar,
                        ]);
                    }
                    Alert::success('Berhasil', 'Data Berhasil ditambahkan');
                }else {
                        $pembayaran_bulan = $pembayaran->pluck('bulan_bayar')->toArray();
                        $bulan_bayar = implode(', ', $pembayaran_bulan);
                        Alert::warning('Siswa Dengan Nama: ' . $request->nama_siswa . ', NISN: ' . $request->nisn . ' Tahun ' . $request->tahun_bayar . ' Bulan ' . $bulan_bayar . ' Sudah Dibayar');
                    }
            });
        
            return redirect()->route('pembayaran-spp.index');
        }

    }

    
    public function statusPembayaran(Request $request)
    {
        $siswa = Siswa::with(['kelas'])->latest()->get();
        return view('pages.pembayaran.status-pembayaran', compact('siswa'));
    }

    public function statusPembayaranShow(Siswa $siswa)
    {
        $spp = Spp::all();
        return view('pages.pembayaran.status-pembayaran-tahun', compact('siswa', 'spp'));
    }

    public function statusPembayaranShowStatus($nisn, $tahun)
    {
        $siswa = Siswa::where('nisn', $nisn)
            ->first();
        
        $spp = Spp::where('tahun', $tahun)
            ->first();
        $petugas = User::where('id', Auth::user()->id)
        ->first();
        
        $pembayaran = Pembayaran::with(['siswa'])
            ->where('nisn', $siswa->nisn)
            ->where('tahun_bayar', $spp->tahun)
            ->get();

        return view('pages.pembayaran.status-pembayaran-show', compact('siswa', 'spp', 'pembayaran','petugas'));
    }
    public function generatelapor()
    {    
    $spp = Spp::all();
    $petugas = User::all();
    $siswa = Siswa::with(['kelas'])->get();
    $pembayaran = Pembayaran::with(['siswa', 'petugas'])->get();
    $pdf = PDF::loadView('laporan', compact('spp', 'pembayaran','siswa', 'petugas'));
    return $pdf->stream(); 
    }

    public function laporan()
    {
        return view('pages.pembayaran.laporan');
    }
}