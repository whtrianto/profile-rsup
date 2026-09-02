<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class HasilMCUController extends Controller
{
    private function getApiUrl($endpoint)
    {
        return env('MCU_API_URL', 'https://api.rsumumpekerja-kbn.com/api') . $endpoint;
    }

    /**
     * Display the Hasil MCU filter form and results.
     */
    public function index(Request $request)
    {
        $results = collect();
        $connectionError = null;
        $nasabahList = collect();

        $tanggal_awal  = $request->input('tanggal_awal', now()->startOfMonth()->toDateString());
        $tanggal_akhir = $request->input('tanggal_akhir', now()->endOfMonth()->toDateString());
        $nasabah_ids   = array_filter((array) $request->input('nasabah_ids', []));

        try {
            $response = Http::withoutVerifying()->post($this->getApiUrl('/mcu/index'), [
                'tanggal_awal'  => $tanggal_awal,
                'tanggal_akhir' => $tanggal_akhir,
                'nasabah_ids'   => $nasabah_ids,
            ]);

            if ($response->successful() && $response->json('success')) {
                $data = $response->json('data');
                $nasabahList = collect($data['nasabahList'] ?? []);
                
                if ($request->isMethod('post') || $request->filled('tanggal_awal')) {
                    // map array to objects to match blade template expectations
                    $results = collect($data['results'] ?? [])->map(function ($item) {
                        return (object) $item;
                    });
                }
                
                // If it's a GET request and not a search, we just want to populate nasabahList
                if (!$request->isMethod('post') && !$request->filled('tanggal_awal')) {
                     // Provide nasabah mapping to objects
                     $nasabahList = collect($data['nasabahList'] ?? [])->map(function ($item) {
                        return (object) $item;
                    });
                } else {
                    $nasabahList = collect($data['nasabahList'] ?? [])->map(function ($item) {
                        return (object) $item;
                    });
                }
            } else {
                $connectionError = "Gagal memuat data MCU dari API Backend.";
            }
        } catch (\Exception $e) {
            $connectionError = "Gagal menghubungi server API Backend.";
            if (config('app.debug')) {
                $connectionError .= " [Detail Error: " . $e->getMessage() . "]";
            }
        }

        return view('hasil-mcu', compact('results', 'connectionError', 'nasabahList'));
    }

    public function validateCaptcha(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha'
        ], [
            'captcha.captcha' => 'Jawaban Captcha tidak valid.'
        ]);

        session(['captcha_passed' => true]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Generate & download PDF Resume MCU for a single registrasi.
     */
    public function generatePDF(Request $request, $registrasi_id)
    {
        if (!auth()->check()) {
            if (!session('captcha_passed')) {
                abort(403, 'Silakan validasi Captcha terlebih dahulu.');
            }
            
            // Hapus session setelah berhasil lewat agar user harus mengisi captcha lagi untuk PDF berikutnya
            session()->forget('captcha_passed');
        }
        try {
            $registrasi_id = decrypt($registrasi_id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404, 'Data MCU tidak valid atau tidak ditemukan.');
        }

        try {
            $response = Http::withoutVerifying()->timeout(120)->get($this->getApiUrl('/mcu/pdf/' . $registrasi_id));

            if ($response->successful()) {
                $contentType = $response->header('Content-Type');
                if (strpos($contentType, 'application/pdf') !== false) {
                    $nama_file = 'Resume MCU - ' . $registrasi_id . '.pdf';
                    
                    // Coba ambil nama file dari header Content-Disposition jika ada
                    $contentDisposition = $response->header('Content-Disposition');
                    if ($contentDisposition && preg_match('/filename="([^"]+)"/', $contentDisposition, $matches)) {
                        $nama_file = $matches[1];
                    }

                    return response($response->body())
                        ->header('Content-Type', 'application/pdf')
                        ->header('Content-Disposition', 'inline; filename="'.$nama_file.'"');
                } else {
                    // Kemungkinan return JSON error dari API
                    $json = $response->json();
                    if (isset($json['message'])) {
                        abort(404, $json['message']);
                    }
                    abort(500, 'Format response API tidak valid.');
                }
            } else {
                if ($response->status() == 500) {
                    abort(500, 'Anda sudah melakukan generate MCU tadi, tunggu 1 menit lagi untuk generate ulang');
                }
                $json = $response->json();
                $msg = $json['message'] ?? 'Gagal mengambil PDF dari API Backend. Status: ' . $response->status();
                abort($response->status() == 404 ? 404 : 500, $msg);
            }
        } catch (\Exception $e) {
            abort(500, 'Anda sudah melakukan generate MCU tadi, tunggu 1 menit lagi untuk generate ulang');
        }
    }

    public function pasienMCU(Request $request)
    {
        if ($request->isMethod('post')) {
            // Kombinasi IP dan User Agent (agar device yang berbeda di jaringan yang sama memiliki limit masing-masing)
            $key = 'pasien_mcu_' . md5($request->ip() . $request->userAgent());

            if (RateLimiter::tooManyAttempts($key, 5)) {
                $seconds = RateLimiter::availableIn($key);
                $minutes = ceil($seconds / 60);
                return back()->withInput()->with('error', "Anda telah mencoba 5 kali. Silakan tunggu {$minutes} menit untuk mencoba lagi.");
            }

            $request->validate([
                'tanggal_lahir' => 'required|date',
                'no_mr'         => 'required|string',
            ]);

            RateLimiter::hit($key, 300); // 300 detik = 5 menit

            $tanggal_lahir = $request->input('tanggal_lahir');
            $no_mr         = trim($request->input('no_mr'));

            try {
                $response = Http::withoutVerifying()->post($this->getApiUrl('/mcu/search'), [
                    'tanggal_lahir' => $tanggal_lahir,
                    'no_mr'         => $no_mr,
                ]);

                if ($response->successful() && $response->json('success')) {
                    $data = $response->json('data');
                    $registrasi_list = collect($data ?? [])->map(function ($item) {
                        return (object) $item;
                    });

                    if ($registrasi_list->count() > 0) {
                        return view('pasien-mcu', [
                            'visits' => $registrasi_list,
                            'no_mr' => $no_mr,
                            'tanggal_lahir' => $tanggal_lahir
                        ]);
                    } else {
                        return back()->withInput()->with('error', 'Data MCU tidak ditemukan. Harap pastikan Tanggal Lahir dan Nomor MR Anda sudah benar.');
                    }
                } else {
                    $json = $response->json();
                    return back()->withInput()->with('error', $json['message'] ?? 'Gagal mencari data MCU dari API.');
                }
            } catch (\Exception $e) {
                $msg = 'Gagal menghubungi server API Backend.';
                if (config('app.debug')) {
                    $msg .= ' [' . $e->getMessage() . ']';
                }
                return back()->withInput()->with('error', $msg);
            }
        }

        return view('pasien-mcu');
    }
}
