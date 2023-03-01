@extends('layouts.admin', ['title' => 'Dashboard'],['halaman' => 'Data Siswa'])

@section('content')
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-siswa.create') }}" class="btn btn-primary">Tambah Siswa</a>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive px-3">
                <table class="table table-striped" id="siswaTable">
                    <thead>
                  <tr>
                      <th>#</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>No.Tlp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $i => $sis)
                    <tr>
                        <td>{{ $i += 1}}</td>
                        <td>{{ $sis->nisn }}</td>
                        <td>{{ $sis->nis }}</td>
                        <td>{{ $sis->nama }}</td>
                        <td>{{ $sis->kelas->nama_kelas }}</td>
                        <td>{{ $sis->no_tlp }}</td>
                        <td>{{ $sis->alamat }}</td>
                        <td><a href="{{ route('data-siswa.edit', $sis->nisn) }}" class="btn btn-warning">edit</a>
                            <form action="{{ url('data-siswa', $sis->nisn) }}" class="d-inline" method="POST" id="delete{{ $sis->nisn }}">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" onclick="deleteData({{ $sis->nisn }})">Hapus</button>
                        </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 
@endsection
