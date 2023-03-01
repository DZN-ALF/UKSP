@extends('layouts.admin', ['title' => 'Edit Data Siswa'],['halaman' => 'Edit Data Siswa'])

@section('content')
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-siswa.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('data-siswa.update', $siswa->nisn) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ $siswa->nisn }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">NIS</label>
                        <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
                    </div>
                
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" id="" class="custom-select {{ count($kelas) == 0 ? 'disabled' : '' }}">
                            @if(count($kelas) == 0)
                            <option value="">Pilihan tidak ada</option>
                            @else
                            <option value="">Silahkan pilih</option>
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id_kelas }}"{{ $siswa->id_kelas == $kls->id_kelas ? 'selected' : ''}}>{{ $kls->nama_kelas }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value= "{{ $siswa->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">No.Tlp</label>
                        <input type="text" name="no_tlp" class="form-control" value="{{ $siswa->no_tlp }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">SPP</label>
                        <select name="id_spp" id="" class="form-control {{ count($spp) == 0 ? 'disabled' : '' }}">
                            @if(count($spp) == 0)
                            <option value="">Pilihan tidak ada</option>
                            @else
                            <option value="">Silahkan pilih</option>
                            @foreach ($spp as $s)
                            <option value="{{ $s->id_spp }}"{{ $s->id_spp == $s->id_spp ? 'selected' : ''}}>{{ "Tahun ".$s->tahun.' - '.'Rp. '.number_format($s->nominal) }}</option>
                            @endforeach
                            @endif
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
