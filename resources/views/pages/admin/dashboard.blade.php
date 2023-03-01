@extends('layouts.admin', ['title' => 'Dashboard'],['halaman' => 'Dashboard'])

@section('content')
@if (Auth::user()->level == 'admin')
<div class="col-lg-3 col md-3"><a href="{{ route('pembayaran.generate.print') }}"class="btn btn-primary btn-sm">Print Laporan</a></div>
      <div class="row">
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Siswa</h4>
              </div>
              <div class="card-body">
                {{ $total_siswa }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>kelas</h4>
              </div>
              <div class="card-body">
               {{ $total_kelas }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Petugas</h4>
              </div>
              <div class="card-body">
                {{ $total_petugas }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Admin</h4>
              </div>
              <div class="card-body">
                {{ $total_admin }}
              </div>
            </div>
          </div>
        </div>                 
      </div>
      @endif
      @if (Auth::user()->level == 'siswa')
      <div class="row">
        <div class="col-lg-6">
            <div class="callout callout-success">
                <h5>Info Siswa:</h5>
      
                <p>	
                  Nama Siswa : <b>{{ $siswa->nama }}</b><br>
                  Nisn : <b>{{ $siswa->nisn }}</b><br>
                  Kelas : <b>{{ $siswa->kelas->nama_kelas }}</b>
              </p>
              </div>
              <div class="callout callout-danger">
                <h5>Pemberitahuan!</h5>
      
                <p>Garis biru pada list tahun menandakan tahun aktif / tahun sekarang.</p>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <a href="javascript:void(0)" class="btn btn-primary btn-sm">
                  <i class="fas fa-circle fa-fw"></i> PILIH TAHUN
                </a>
              </div>
              <div class="card-body">
                <div class="list-group">
                  @foreach($spp as $row)
                    @if($row->tahun == date('Y'))
                    <a href="{{ route('pembayaran.status-pembayaran.show-status', [$siswa->nisn,$row->tahun]) }}" class="list-group-item list-group-item-action active">
                      {{ $row->tahun }}
                    </a>
                    @else
                    <a href="{{ route('pembayaran.status-pembayaran.show-status', [$siswa->nisn,$row->tahun]) }}" class="list-group-item list-group-item-action">
                      {{ $row->tahun }}
                    </a>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
@endsection