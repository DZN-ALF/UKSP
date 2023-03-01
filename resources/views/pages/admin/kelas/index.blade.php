@extends('layouts.admin', ['title' => 'Kelas'],['halaman' => 'Dahsboard Kelas'])

@section('content')
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive px-3">
                <table class="table table-striped" id="kelasTable">
                    <thead>
                  <tr>
                      <th>#</th>
                    <th>Nama Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $i => $sis)
                    <tr>
                        <td>{{ $i += 1}}</td>
                        <td>{{ $sis->nama_kelas }}</td>
                        <td>{{ $sis->kompetensi_keahlian }}</td>
                        <td><a href="{{ route('data-kelas.edit', $sis->id_kelas) }}" class="btn btn-warning">edit</a>
                            <form action="{{ url('data-kelas', $sis->id_kelas) }}" class="d-inline" method="POST" id="delete{{ $sis->id_kelas }}">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" onclick="deleteData({{ $sis->id_kelas }})">Hapus</button>
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
