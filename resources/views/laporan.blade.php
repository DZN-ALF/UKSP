<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h5>Laporan Pembayaran SPP.</h5>
<hr>
<table border="1" class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>No</th>
      <th>Nama Siswa</th>
      <th>Kelas</th>
      <th>Nisn</th>
      <th>Tanggal Bayar</th>
      <th>Nama Petugas</th>
      <th>Untuk Bulan</th>
      <th>Untuk Tahun</th>
      <th>Nominal</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pembayaran as $row)
    <tr>
        <td>{{ $loop->iteration }}</td>
      <td>{{ $row->siswa->nama }}</td>
      <td>{{ $row->siswa->kelas->nama_kelas }}</td>
      <td>{{ $row->nisn }}</td>
      <td>{{ $row->tanggal_bayar }}</td>
      <td>{{ $row->petugas->name }}</td>
      <td>{{ $row->bulan_bayar }}</td>
      <td>{{ $row->tahun_bayar }}</td>
      <td>{{ $row->jumlah_bayar }}</td>
    </tr>
         @endforeach
    </tbody>
  </table>
</body>
</html>
