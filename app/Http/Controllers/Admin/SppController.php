<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::orderBy('tahun', 'asc')->get();
        return view('pages.admin.spp.index', ['spp'=> $spp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.spp.create');
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
            'tahun' => 'required',
            'nominal' => 'required'
        ]);
            $store = Spp::create([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
                
            ]);
            if ($store) {
                Alert::success('Berhasil', 'Data Berhasil ditambahkan');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan, data gagal ditambahkan');
            }
            return redirect()->route('data-spp.index');
    
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
    public function edit($id_spp)
    {
        $spp = Spp::find($id_spp);
        return view('pages.admin.spp.edit',[
            'spp' =>$spp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_spp)
    {
        $this->validate($request,[
            'nominal' => 'required',
            'tahun' => 'required',
        ]);
            $store = Spp::findOrfail($id_spp)->update([
                'nominal' => $request->nominal,
                'tahun' => $request->tahun,
            ]);
            if ($store) {
                Alert::success('Berhasil', 'Data Berhasil dirubah');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
            }
            return redirect()->route('data-spp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_spp)
    {
        $s = Spp::findorFail($id_spp);
        $s->delete();
        if($s){
            Alert::success('Berhasil', 'Data Berhasil di hapus');
        }else{
            Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
        }
        return redirect()->route('data-siswa.index'); 
    }
}
