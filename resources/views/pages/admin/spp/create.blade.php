@extends('layouts.admin', ['title' => 'Tambah Spp'],['halaman' => 'Tambah Data Spp'])

@section('content')
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-spp.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('data-spp.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="text" name="nominal" class="form-control" value="{{ old('nominal') }}" required>
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
