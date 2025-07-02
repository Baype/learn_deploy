<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Signa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        #menambahkan data dummy pasien
        Pasien::factory()->count(10)->create(); // 9 pasien random
        #menambahkan data dummy akun
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => '123'
        ]);
        #menambahkan data signa
        $signas = [
            ['kode_signa' => 'A1', 'nama_signa' => '1 x 1'],
            ['kode_signa' => 'A2', 'nama_signa' => '2 x 1'],
            ['kode_signa' => 'A3', 'nama_signa' => '3 x 1'],
            ['kode_signa' => 'B1', 'nama_signa' => '1 x 2'],
            ['kode_signa' => 'C1', 'nama_signa' => '1 x 3'],
            ['kode_signa' => 'D1', 'nama_signa' => 'Pagi - Malam'],
            ['kode_signa' => 'E1', 'nama_signa' => 'Setiap 8 jam'],
            ['kode_signa' => 'F1', 'nama_signa' => 'Sebelum Makan'],
            ['kode_signa' => 'G1', 'nama_signa' => 'Sesudah Makan'],
            ['kode_signa' => 'H1', 'nama_signa' => 'Setiap 6 Jam'],
            ['kode_signa' => 'I1', 'nama_signa' => 'Satu Kali Sehari'],
        ];
        foreach ($signas as $signa) {
            Signa::create($signa);
        }
        #menambah data obat
        $obats = [
            ['kode_obat' => 'B1', 'nama_obat' => 'Bodrexin', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B2', 'nama_obat' => 'Paracetamol', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B3', 'nama_obat' => 'Panadol', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B4', 'nama_obat' => 'Mixagrip', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B5', 'nama_obat' => 'Tolak Angin', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B6', 'nama_obat' => 'Rhinos', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B7', 'nama_obat' => 'Dulcolax', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B8', 'nama_obat' => 'Antangin', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B9', 'nama_obat' => 'Imboost', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B10', 'nama_obat' => 'Promag', 'stok_obat' => '1000', 'harga_obat' => '1000'],
            ['kode_obat' => 'B11', 'nama_obat' => 'Neurobion', 'stok_obat' => '1000', 'harga_obat' => '1000'],
        ];
        foreach ($obats as $obat) {
            Obat::create($obat);
        }
    }
}
