@extends('layouts.admin', ['title' => 'Tambah User'],['halaman' => 'Tambah Data User'])

@section('content')
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-petugas.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('data-petugas.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="text" name="password" class="form-control" value="{{ old('password') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                       <select name="level" class="custom-select">
                           <option value="admin">Admin</option>
                           <option value="petugas">petugas</option>
                           <option value="siswa">Siswa</option>
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
