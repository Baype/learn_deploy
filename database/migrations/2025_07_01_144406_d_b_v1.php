<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Buat tabel pasien dulu
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->timestamps();
        });

        // 2. Buat tabel obat_master
        Schema::create('obat_master', function (Blueprint $table) {
            $table->id();
            $table->string('kode_obat');
            $table->string('nama_obat');
            $table->integer('stok_obat');
            $table->integer('harga_obat');
            $table->timestamps();
        });

        // 3. Buat tabel signa_master
        Schema::create('signa_master', function (Blueprint $table) {
            $table->id();
            $table->string('kode_signa');
            $table->string('nama_signa');
            $table->timestamps();
        });

        // 4. Buat tabel riwayat_obat (relasi ke pasien, obat, signa, user)
        Schema::create('riwayat_obat', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_racikan', ['racikan', 'non-racikan'])->default('non-racikan');
            $table->foreignId('id_pasien')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
        // 5. Buat tabel list_detail_obat
        Schema::create('racikan_details', function (Blueprint $table) {
            $table->id();
            $table->string('nama_racikan')->nullable();
            $table->foreignId('riwayat_obat_id')->constrained('riwayat_obat')->onDelete('cascade'); // relasi ke riwayat racikan
            $table->foreignId('id_obat')->constrained('obat_master')->onDelete('cascade');
            $table->foreignId('id_signa')->constrained('signa_master')->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('catatan');
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_obat');
        Schema::dropIfExists('signa_master');
        Schema::dropIfExists('obat_master');
        Schema::dropIfExists('pasiens');
        Schema::dropIfExists('racikan_details');
    }
};
