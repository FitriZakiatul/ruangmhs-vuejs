<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $page = request()->query('page') ?? '1';
        $limit = request()->query('limit') ?? '10';
        $sort = request()->query('sort') ?? 'desc';
        $order = request()->query('order') ?? 'created_at';
        $search = request()->query('search') ?? '';

        $dosen = Dosen::where(function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->orderBy($order, $sort)
            ->offset(((int) $page - 1) * (int) $limit)
            ->limit($limit)
            ->get();

        $total = Dosen::get()->count();
        $last = round($total / (int) $limit);
        $last = $last <= 1 ? 1 : $last;
        $page = [
            'prev' => (int) $page <= 1 ? 1 : (int) $page - 1,
            'next' => (int) $page >= $last ? $last : (int) $page + 1,
            'last' => $last,
        ];

        return response()->json([
            'code' => 200,
            'data' => [
                'dosen' => $dosen,
                'page' => $page
            ],
            'message' => 'Sukses mengambil semua dosen!',
            'success' => true,
        ]);
    }

    public function get($id)
    {
        $dosen = Dosen::where('id', $id)->with(['mataKuliah'])->first();
        if (!$dosen) {
            return response()->json([
                'code' => 404,
                'data' => null,
                'message' => 'Dosen tidak ditemukan!',
                'success' => false,
            ]);
        }

        return response()->json([
            'code' => 200,
            'data' => $dosen,
            'message' => 'Berhasil mengambil data dosen!',
            'success' => true
        ]);
    }
}
