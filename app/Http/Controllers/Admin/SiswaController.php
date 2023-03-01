<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderBy('nama', 'asc')->get();
        return view('pages.admin.siswa.index', ['siswa'=> $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('pages.admin.siswa.create',[
            'kelas' =>$kelas,
            'spp' =>$spp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
     $this->validate($request,[
            'nisn' => 'required|numeric',
            'nis' => 'required|numeric',
            'nama' => 'required',
            'email'=> 'required',
            'id_kelas' => 'required|integer',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
            'id_spp' => 'required|integer',
]);
            $store = Siswa::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'email'  => $request->email,
                'id_kelas' => $request->id_kelas,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'id_spp' => $request->id_spp
                
            ]);
            if ($store) {
                Alert::success('Berhasil', 'Data Berhasil ditambahkan');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan, data gagal ditambahkan');
            }
            return redirect()->route('data-siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nisn)
    {
        $siswa = Siswa::find($nisn);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('pages.admin.siswa.edit',[
            'siswa' => $siswa,
            'kelas' =>$kelas,
            'spp' =>$spp
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {
        $this->validate($request,[
            'nisn' => 'required|numeric',
            'nis' => 'required|numeric',
            'nama' => 'required',
            'id_kelas' => 'required|integer',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
            'id_spp' => 'required|integer']);
            $store = Siswa::findOrfail($nisn)->update([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'password' => Hash::make($request->password),
                'id_kelas' => $request->id_kelas,
                'no_tlp' => $request->no_tlp,
                'alamat' => $request->alamat,
                'id_spp' => $request->id_spp
            ]);
            if ($store) {
                Alert::success('Berhasil', 'Data Berhasil dirubah');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
            }
            return redirect()->route('data-siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        $siwa = Siswa::findorFail($nisn);
        $siwa->delete();
        if($siwa){
            Alert::success('Berhasil', 'Data Berhasil di hapus');
        }else{
            Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
        }
        return redirect()->route('data-siswa.index');
    }
}
