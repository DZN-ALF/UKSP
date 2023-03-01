@extends('layouts.admin', ['title' => 'Pembayaran'],['halaman' => 'Status Pemabayaran'])
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
            <th>Detail</th>
          </tr>
          </thead>
          <tbody>
            @foreach($siswa as $i => $s)
          <tr>
            <td>{{ $i += 1 }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->nisn }}</td>
            <td>{{ $s->kelas->nama_kelas }}</td>
            <td><div class="row"><a href="{{ route('pembayaran.status-pembayaran.show',$s->nisn)}}"class="btn btn-primary btn-sm">DETAIL</a></td>
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
