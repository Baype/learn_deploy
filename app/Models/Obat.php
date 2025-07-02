<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat_master';
    use HasFactory;

    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stok_obat',
        'harga_obat',
    ];


    public function racikan_details()
    {
        return $this->hasMany(RacikanDetail::class);
    }
}
