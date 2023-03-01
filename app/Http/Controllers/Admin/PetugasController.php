<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('name', 'asc')->get();
        return view('pages.admin.petugas.index', ['user'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.petugas.create');
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
    
        if ($request->level == 'siswa') {
            $siswa = Siswa::where('email', $request->email)->first();
            if ($siswa) {
                $store = User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'level' => $request->level,
                    'id_siswa' => $siswa->nisn
                ]);
            } else {
                Alert::error('Gagal', 'Email yang dimasukkan tidak terkait dengan data siswa');
                return redirect()->route('data-siswa.create');
            }
        } else {
            $store = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level
            ]);
        }
    
        if ($store) {
            Alert::success('Berhasil', 'Data Berhasil ditambahkan');
        } else {
            Alert::error('Gagal', 'Terjadi kesalahan, data gagal ditambahkan');
        }
        return redirect()->route('data-petugas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = User::find($id);
        return view('pages.admin.petugas.edit',[
            'petugas' => $petugas,
        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
            $store = User::findOrfail($id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level,
            ]);
            if ($store) {
                Alert::success('Berhasil', 'Data Berhasil dirubah');
            } else {
                Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
            }
            return redirect()->route('data-petugas.index');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $use = User::findorFail($id);
        $use->delete();
        if($use){
            Alert::success('Berhasil', 'Data Berhasil di hapus');
        }else{
            Alert::error('Gagal', 'Terjadi kesalahan, data gagal dirubah');
        }
        return redirect()->route('data-petugas.index');
    }
}
