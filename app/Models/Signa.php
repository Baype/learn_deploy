<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signa extends Model
{
    protected $table = 'signa_master';
    use HasFactory;

    protected $fillable = [
        'kode_signa',
        'nama_signa',
    ];

    public function racikan_details()
    {
        return $this->hasMany(RacikanDetail::class);
    }
}
