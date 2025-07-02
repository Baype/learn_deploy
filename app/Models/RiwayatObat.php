<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatObat extends Model
{
    protected $table = 'riwayat_obat';
    use HasFactory;

    protected $fillable = [
        'id_pasien',
        'id_user',
        'jenis_racikan',
    ];

    // App\Models\Racik.php

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function racikan_details()
    {
        return $this->hasMany(RacikanDetail::class, 'riwayat_obat_id');
    }

}
