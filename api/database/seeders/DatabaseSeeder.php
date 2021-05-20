<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new \App\Models\Mahasiswa([
            'nim' => '10238710238102',
            'nama' => 'Tini',
            'jenjang' => 'Sarjana',
            'fakultas' => 'FILKOM',
            'jurusan' => 'Sistem Informasi',
            'prodi' => 'Teknologi Informasi',
            'seleksi' => 'SNMPTN',
            'status' => 'aktif',
            'id_user' => (new \App\Models\User([
                'email' => 'nurekaht@student.ub.ac.id',
                'password' => password_hash("secret", null),
            ]))->save(),
        ]))->save();

        \App\Models\Mahasiswa::factory(50)->create();
        \App\Models\Dosen::factory(3)->create();

        (new \App\Models\MataKuliah([
            'dosen_id' => 1,
            'kode_matkul' => 'ADSI',
            'nama' => 'Analisis dan Desain Sistem Informasi',
            'semester' => 'ganjil'
        ]))->save();

        (new \App\Models\MataKuliah([
            'dosen_id' => 1,
            'kode_matkul' => 'TIS',
            'nama' => 'Teknologi Integrasi Sistem',
            'semester' => 'ganjil'
        ]))->save();

        (new \App\Models\MataKuliah([
            'dosen_id' => 2,
            'kode_matkul' => 'TBC',
            'nama' => 'Tehnologi Berbasis Cloud',
            'semester' => 'ganjil'
        ]))->save();

        (new \App\Models\MataKuliah([
            'dosen_id' => 3,
            'kode_matkul' => 'IPSI',
            'nama' => 'Implementasi dan Pengujian Sistem Informasi',
            'semester' => 'ganjil'
        ]))->save();
    }
}
