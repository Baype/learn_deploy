<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pasien;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    // Tambahkan ini:
    protected $model = Pasien::class;

    public function definition(): array
    {
        return [
            'nama_pasien' => $this->faker->name,
        ];
    }
}
