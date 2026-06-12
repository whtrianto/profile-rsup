<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TindakanController extends Controller
{
    /**
     * Display a listing of treatments.
     */
    public function index()
    {
        try {
            $list_tindakan = DB::table('tindakan')
                ->join('tindakan_jenis', 'tindakan.tindakan_jenis_id', '=', 'tindakan_jenis.id')
                ->select(
                    'tindakan.id',
                    'tindakan.nama',
                    'tindakan_jenis.nama AS nama_jenis'
                )
                ->whereNull('tindakan.deleted_at')
                ->orderBy('tindakan_jenis.nama')
                ->orderBy('tindakan.nama')
                ->get();

            $connectionError = null;
        } catch (\Exception $e) {
            $list_tindakan = collect();
            $connectionError = "Gagal memuat data tindakan dari database. Silakan periksa koneksi jaringan server database.";
            if (config('app.debug')) {
                $connectionError .= " [Detail Error: " . $e->getMessage() . "]";
            }
        }

        return view('tindakan', compact('list_tindakan', 'connectionError'));
    }

    /**
     * Get detail of a specific treatment including class and price.
     */
    public function getDetail($id)
    {
        try {
            $details = DB::table('tindakan_detail')
                ->join('kelas', 'tindakan_detail.kelas_id', '=', 'kelas.id')
                ->select(
                    'kelas.nama AS nama_kelas',
                    'tindakan_detail.jasa_rs',
                    'tindakan_detail.jasa_dokter',
                    'tindakan_detail.jasa_anastesi'
                )
                ->where('tindakan_detail.tindakan_id', $id)
                ->whereNull('tindakan_detail.deleted_at')
                ->get();

            if ($details->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Detail tarif untuk tindakan ini tidak ditemukan.'
                ], 404);
            }

            $formattedDetails = $details->map(function ($item) {
                $total = ($item->jasa_rs ?? 0) + ($item->jasa_dokter ?? 0) + ($item->jasa_anastesi ?? 0);
                return [
                    'kelas' => $item->nama_kelas,
                    'harga' => $total,
                    'harga_formatted' => 'Rp ' . number_format($total, 0, ',', '.')
                ];
            });

            return response()->json([
                'success' => true,
                'details' => $formattedDetails
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat detail tindakan: ' . $e->getMessage()
            ], 500);
        }
    }
}
