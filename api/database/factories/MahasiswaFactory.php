<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->unique()->phoneNumber,
            'nama' => $this->faker->unique()->name(),
            'jenjang' => 'Sarjana',
            'fakultas' => 'FILKOM',
            'jurusan' => 'Sistem Informasi',
            'prodi' => 'Teknologi Informasi',
            'seleksi' => 'SBMPTN',
            'status' => 'aktif',
            'id_user' => \App\Models\User::factory(),
        ];
    }
}
