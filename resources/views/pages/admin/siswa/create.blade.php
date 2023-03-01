@extends('layouts.admin', ['title' => 'Tambah Siswa'],['halaman' => 'Tambah Data Siswa'])

@section('content')
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-siswa.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('data-siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ old('nisn') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input type="text" name="nis" class="form-control" value="{{ old('nis') }}" required>
                    </div>
                
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    </div>
                
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="" class="custom-select {{ count($kelas) == 0 ? 'disabled' : '' }}">
                            @if(count($kelas) == 0)
                            <option value="">Pilihan tidak ada</option>
                            @else
                            <option value="">Silahkan pilih</option>
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id_kelas }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">No.Tlp</label>
                        <input type="text" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">SPP</label>
                        <select name="id_spp" id="" class="form-control {{ count($spp) == 0 ? 'disabled' : '' }}">
                            @if(count($spp) == 0)
                            <option value="">Pilihan tidak ada</option>
                            @else
                            <option value="">Silahkan pilih</option>
                            @foreach ($spp as $s)
                            <option value="{{ $s->id_spp }}">{{ "Tahun ".$s->tahun.' - '.'Rp. '.number_format($s->nominal) }}</option>
                            @endforeach
                            @endif
                            </select>
                            </div>  
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
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
