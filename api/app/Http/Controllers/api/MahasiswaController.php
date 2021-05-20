<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function get($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        if (!$mahasiswa) {
            return response()->json([
                'code' => 404,
                'data' => null,
                'message' => 'Mahasiswa tidak ditemukan!',
                'success' => false,
            ]);
        }

        return response()->json([
            'code' => 200,
            'data' => $mahasiswa,
            'message' => 'Berhasil mengambil data mahasiswa!',
            'success' => true
        ]);
    }

    public function update(Request $request, $id)
    {
        [
            'nama' => $nama,
            'jenjang' => $jenjang,
            'fakultas' => $fakultas,
            'jurusan' => $jurusan,
            'prodi' => $prodi,
            'email' => $email,
            'agama' => $agama,
            'alamat' => $alamat,
            'noHp' => $noHp
        ] = $request;

        if (!$nama || !$jenjang || !$fakultas || !$jurusan || !$prodi) {
            return response()->json([
                'code' => 400,
                'data' => null,
                'message' => 'Nama, jenjang, fakultas, jurusan dan prodi tidak boleh kosong',
                'success' => false,
            ]);
        }

        try {
            $mahasiswa = Mahasiswa::where('id', $id)->first();
            if ($request->user->id != $mahasiswa->user->id) {
                return response()->json([
                    'code' => 403,
                    'data' => null,
                    'message' => 'Anda tidak berhak mengedit data ini',
                    'success' => false,
                ]);
            }

            $mahasiswa->nama = $nama;
            $mahasiswa->jenjang = $jenjang;
            $mahasiswa->fakultas = $fakultas;
            $mahasiswa->jurusan = $jurusan;
            $mahasiswa->prodi = $prodi;
            $mahasiswa->agama = $agama;
            $mahasiswa->alamat = $alamat;
            $mahasiswa->no_hp = $noHp;
            $mahasiswa->user->email = $email;
            $mahasiswa->save();

            return response()->json([
                'code' => 200,
                'data' => $mahasiswa,
                'message' => 'Sukses mengupdate data mahasiswa',
                'success' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'data' => null,
                'message' => 'Terjadi kesalahan pada server',
                'success' => false,
            ]);
        }
    }

    public function profile()
    {
        $mahasiswa = Mahasiswa::where('id_user', request()->user->id)->with(['user'])->first();
        if (!$mahasiswa) {
            return response()->json([
                'code' => 404,
                'data' => null,
                'message' => 'Mahasiswa tidak ditemukan!',
                'success' => false,
            ]);
        }

        return response()->json([
            'code' => 200,
            'data' => $mahasiswa,
            'message' => 'Berhasil mengambil data mahasiswa!',
            'success' => true
        ]);
    }
}
