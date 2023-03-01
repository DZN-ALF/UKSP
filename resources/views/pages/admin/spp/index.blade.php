@extends('layouts.admin', ['title' => 'Spp'],['halaman' => 'Dahsboard Spp'])

@section('content')
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <a href="{{ route('data-spp.create') }}" class="btn btn-primary">Tambah Spp</a>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive px-3">
                <table class="table table-striped" id="sppTable">
                    <thead>
                  <tr>
                      <th>#</th>
                    <th>Tahun</th>
                    <th>Nominal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($spp as $i => $sis)
                    <tr>
                        <td>{{ $i += 1}}</td>
                        <td>{{ $sis->tahun }}</td>
                        <td>{{ 'Rp. '.number_format($sis->nominal).','.'00' }}</td>
                        <td><a href="{{ route('data-spp.edit', $sis->id_spp) }}" class="btn btn-warning">edit</a>
                            <form action="{{ url('data-spp', $sis->id_spp) }}" class="d-inline" method="POST" id="delete{{ $sis->id_spp }}">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger" onclick="deleteData({{ $sis->id_spp }})">Hapus</button>
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
