@extends('layouts.admin', ['title' => 'Ubah Spp'],['halaman' => 'Ubah Data Spp'])

@section('content')
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-spp.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('data-spp.update', $spp->id_spp) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" class="form-control" value="{{ $spp->tahun }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nominal</label>
                        <input type="text" name="kompetensi_keahlian" class="form-control" value="{{ $spp->nominal}}" required>
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
