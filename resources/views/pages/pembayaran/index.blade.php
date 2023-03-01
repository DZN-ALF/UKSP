@extends('layouts.admin', ['title' => 'Pembayaran'],['halaman' => 'Pemabayaran'])
@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table id="dataTable2" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Nisn</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>Detail</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            @foreach ($siswa as $i => $sis)
            <tr>
                <td>{{ $i += 1}}</td>
                <td>{{ $sis->nama }}</td>
                <td>{{ $sis->nisn }}</td>
                <td>{{ $sis->kelas->nama_kelas }}</td>
                <td>{{ $sis->alamat }}</td>
                <td><a href="{{  route('pembayaran.bayar', ['nisn' => $sis->nisn]) }}" class="btn btn-primary btn-sm ml-2">Bayar</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@endsection