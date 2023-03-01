@extends('layouts.admin', ['title' => 'Pembayaran'],['halaman' => 'Status Pembayaran'])
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
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
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

@push('js')
<!-- DataTables  & Plugins -->
<script type="text/javascript">
$(function () {
  
  var table = $("#dataTable2").DataTable({
      processing: true,
      serverSide: true,
      "responsive": true,
      ajax: "{{ route('pembayaran.status-pembayaran') }}",
      columns: [
        {data: 'DT_RowIndex' , name: 'id_siswa'},
        {data: 'nama', name: 'nama'},
        {data: 'nisn', name: 'nisn'},
        {data: 'kelas.nama_kelas', name: 'kelas.nama_kelas'},
        {data: 'action', name: 'action', orderable: false, searchable: true},
       ]
  });

});
</script>
@endpush