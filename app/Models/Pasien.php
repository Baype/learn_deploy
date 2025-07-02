<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory; // WAJIB ADA
    protected $fillable = [
        'nama_pasien',
    ];
    public function transaksi_obat()
    {
        return $this->hasMany(RiwayatObat::class);
    }


}
