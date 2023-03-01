<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('pages.admin.kelas.index', ['kelas'=> $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);
            $store = Kelas::create([
                'nama_kelas' => $request->nama_kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian,
                
            ]);
            if ($store) {
                Alert::success('Berhasil', 'Data Berhasil ditambahkan');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan, data gagal ditambahkan');
            }
            return redirect()->route('data-kelas.index');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kelas)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        return view('pages.admin.kelas.edit',[
            'kelas' =>$kelas,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelas)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);
            $store = Kelas::findOrfail($id_kelas)->update([
                'nama_kelas' => $request->nama_kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian,
            ]);
            if ($store) {
                Alert::success('Berhasil', 'Data Berhasil dirubah');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
            }
            return redirect()->route('data-kelas.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kelas)
    {
        $kelas = Kelas::findorFail($id_kelas);
        $kelas->delete();
        if($kelas){
            Alert::success('Berhasil', 'Data Berhasil di hapus');
        }else{
            Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
        }
        return redirect()->route('data-kelas.index');
    }
}
