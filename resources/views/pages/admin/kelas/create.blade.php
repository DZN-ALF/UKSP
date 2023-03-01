@extends('layouts.admin', ['title' => 'Tambah Kelas'],['halaman' => 'Tambah Data Kelas'])

@section('content')
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-kelas.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('data-kelas.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kompetensi Keahlian</label>
                        <input type="text" name="kompetensi_keahlian" class="form-control" value="{{ old('kompetensi_keahlian') }}" required>
                    </div>
                                          
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
 
@endsection
