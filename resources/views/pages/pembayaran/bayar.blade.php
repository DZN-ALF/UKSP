@extends('layouts.admin', ['title' => 'Bayar Spp'],['halaman' => 'Bayar Spp'])
@section('content')

<div class="row">
	<div class="col-lg">
		<div class="card">
			<div class="card-header">
				<a href="{{ route('pembayaran.index') }}" class="btn btn-danger btn-sm">
				<i class="fas fa-window-close fa-fw"></i> 
			      BATALKAN
			    </a>
			</div>
			<div class="card-body">
				<form method="POST" action="{{ route('berbayar', ['nisn' => $siswa->nisn]) }}" enctype="multipart/form-data">
					@csrf
	
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<label for="nama_siswa">Nama Siswa:</label>
								<input required type="text" name="nama_siswa" value="{{ $siswa->nama }}" readonly id="nama_siswa" class="form-control">
								<input type="hidden" value="{{ Auth::user()->id }}" name="id_petugas">
								@error('nama_siswa')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label for="nisn">Nisn</label>
								<input required="" type="text" name="nisn" value="{{ $siswa->nisn }}" readonly id="nisn" class="form-control">
								@error('nisn')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label for="nis">Nis:</label>
								<input required="" type="text" name="nis" value="{{ $siswa->nis }}" readonly id="nis" class="form-control">
								@error('nis')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label for="kelas">Kelas:</label>
								<input required="" type="text" name="kelas" value="{{ $siswa->kelas->nama_kelas }}" readonly id="kelas" class="form-control">
								@error('kelas')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
						</div>	
					</div>
					<div class="row">
						<div class="col-lg-3">
							<div class="form-group">
								<label for="tahun_bayar">Untuk Tahun:</label>
								<select required="" name="tahun_bayar" id="tahun_bayar" class="form-control select2bs4">
										<option>- PILIH TAHUN -</option>
									@foreach($spp as $row)
										<option value="{{ $row->tahun }}">{{ $row->tahun }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label for="jumlah_bayar" id="nominal_spp_label">Nominal Spp:</label>
								<input type="" name="nominal" readonly id="nominal" class="form-control">
								<input required type="hidden" name="jumlah_bayar" readonly id="jumlah_bayar" class="form-control">
								@error('jumlah_bayar')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group ">
								<label for="bulan_bayar">Untuk Bulan:</label>
								<select required="" name="bulan_bayar[]" id="bulan_bayar" class="select2" multiple="multiple" data-dropdown-css-class="select2-purple" data-placeholder="Pilih Bulan" style="width: 100%;">
                                    @foreach($kull as $bulan)
                                    <option value="{{ $bulan['nama_bulan'] }}">{{ $bulan['nama_bulan'] }}</option>
                                  @endforeach
								</select>
							</div>
						</div>	
						<div class="col-lg-3">
							<div class="form-group">
								<label for="total_bayar">Total Bayar:</label>
								<input required="" type="" name="total_bayar" id="hasil_bayar" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> 
							KONFIRMASI
						</button>
					</div>						
				</form>
			</div>
		</div>	
	</div>
</div>
@endsection
@push('js')
<script>
document.getElementById("tahun_bayar").addEventListener("change", function() {
    var tahun = $(this).val()
    	$.ajax({
    		url: "/spp/"+tahun,
    		method: "GET",
    		success:function(response){
    			$("#nominal_spp_label").html(`Nominal Spp Tahun `+response.tahun+':')
    			$("#nominal").val(response.nominal)
    			$("#jumlah_bayar").val(response.data.nominal)
    		}
    	})
    });
	</script>
	<script type="text/javascript">

$(document).ready(function() {
  $("#bulan_bayar").change(function() {
    var bulan = $(this).val();
    var total_bulan = bulan.length;
    var total_bayar = $("#jumlah_bayar").val();
    var hasil_bayar = total_bulan * total_bayar;
    var formatter = new Intl.NumberFormat("ID", {
      style: "currency",
      currency: "IDR",
    });
    $("#hasil_bayar").val(formatter.format(hasil_bayar));
  });
});

		</script>
		@endpush
