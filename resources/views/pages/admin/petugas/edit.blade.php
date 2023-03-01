@extends('layouts.admin', ['title' => 'Ubah Petugas'],['halaman' => 'Ubah Data Petugas'])

@section('content')
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-petugas.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('data-petugas.update', $petugas->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $petugas->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">username</label>
                        <input type="text" name="username" class="form-control" value="{{ $petugas->username }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" name="email" class="form-control" value="{{ $petugas->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="text" name="password" class="form-control" value="{{ old('password') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">level</label>
                        <select name="level" class="custom-select">
                            <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ $petugas->level == 'petugas' ? 'selected' : '' }}>petugas</option>
                            <option value="siswa" {{ $petugas->level == 'siswa' ? 'selected' : '' }}>Siswa</option>
                          </select>
                          
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
