@extends('layouts.admin', ['title' => 'Petugas'],['halaman' => 'pengguna'])

@section('content')
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-petugas.create') }}" class="btn btn-primary">Tambah Petugas</a>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive px-3">
                <table class="table table-striped" id="petugasTable">
                    <thead>
                  <tr>
                      <th>#</th>
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($user as $i => $sis)
                    <tr>
                        <td>{{ $i += 1}}</td>
                        <td>{{ $sis->name }}</td>
                        <td>{{ $sis->username }}</td>
                        <td>{{ $sis->level }}</td>
                        <td><a href="{{ route('data-petugas.edit', $sis->id) }}" class="btn btn-warning">edit</a>
                            <form action="{{ url('data-petugas', $sis->id) }}" class="d-inline" method="POST" id="delete{{ $sis->id }}">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" onclick="deleteData({{ $sis->id }})">Hapus</button>
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
