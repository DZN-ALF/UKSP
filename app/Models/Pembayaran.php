<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = [
        'id_pembayaran',
        'id_petugas',
        'nisn',
        'tgl_bayar',
        'bulan_bayar',
        'tahun_bayar',
        'id_spp',
        'jumlah_bayar'

    ];
    public function getTanggalBayarAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getJumlahBayarAttribute($value)
    {
        return "Rp ".number_format($value, 0, 2, '.');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
   
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn');
    }
}
