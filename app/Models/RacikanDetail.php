<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RacikanDetail extends Model
{
    use HasFactory;

    protected $table = 'racikan_details';

    protected $fillable = [
        'riwayat_obat_id',
        'nama_racikan',
        'id_obat',
        'id_signa',
        'catatan',
        'jumlah',
    ];

    /**
     * Relasi ke tabel riwayat_obat (induk racikan)
     */
    public function riwayatObat()
    {
        return $this->belongsTo(RiwayatObat::class, 'riwayat_obat_id');
    }

    /**
     * Relasi ke tabel obat_master
     */
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    /**
     * Relasi ke tabel signa_master
     */
    public function signa()
    {
        return $this->belongsTo(Signa::class, 'id_signa');
    }


}
