<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PopupImageController;

Route::get('/linkstorage', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return 'Storage Link Berhasil Dibuat! Silakan cek kembali gambar dokternya.';
    } catch (\Exception $e) {
        return 'Gagal: ' . $e->getMessage();
    }
});

Route::get('/', function () {
    // Fetch doctor schedules from estes_care database
    $tanggal = date('Y-m-d');
    $no_hari = date('N', strtotime($tanggal));
    $nama_hari_map = [1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 7 => 'Minggu'];
    $nama_hari_ini = $nama_hari_map[(int)$no_hari] ?? '';

    try {
        $jadwal_dokter = \Illuminate\Support\Facades\DB::connection('estes')->select("SELECT
                    pegawai.id AS pegawai_id,
                    pegawai.nama AS nama_dokter,
                    pegawai.foto,
                    jadwal_dokter.waktu_mulai,
                    jadwal_dokter.waktu_selesai,
                    jadwal_dokter.nama_hari,
                    jadwal_dokter.no_hari,
                    bagian.nama AS nama_bagian,
                    bagian.id AS bagian_id
                FROM
                    pegawai
                JOIN
                    pegawai_bagian ON pegawai_bagian.pegawai_id = pegawai.id
                JOIN
                    bagian ON bagian.id = pegawai_bagian.bagian_id
                JOIN
                    jadwal_dokter ON jadwal_dokter.pegawai_id = pegawai.id
                    AND jadwal_dokter.bagian_id = bagian.id
                WHERE
                    pegawai.deleted_at IS NULL
                    AND jadwal_dokter.deleted_at IS NULL
                    AND bagian.id NOT IN (22,14,66,54,82)
                ORDER BY
                    pegawai.nama ASC");

        $localDoctors = \App\Models\Doctor::all()->keyBy('id_dokter');

        // Group schedules by pegawai_id
        $doctors_grouped = [];
        foreach ($jadwal_dokter as $row) {
            $pid = $row->pegawai_id;
            if (!isset($doctors_grouped[$pid])) {
                $localDoc = $localDoctors->get($pid);
                if ($localDoc && $localDoc->image) {
                    $photoUrl = asset('storage/' . $localDoc->image);
                } else {
                    $photoUrl = null;
                }

                $doctors_grouped[$pid] = (object)[
                    'id' => $pid,
                    'name' => $row->nama_dokter,
                    'specialization' => $row->nama_bagian,
                    'photo' => $photoUrl,
                    'schedules' => [],
                    'schedule_keys' => [],
                    'bagian_list' => [],
                ];
            }
            // Collect unique bagian
            if (!in_array($row->nama_bagian, $doctors_grouped[$pid]->bagian_list)) {
                $doctors_grouped[$pid]->bagian_list[] = $row->nama_bagian;
            }
            // Collect unique schedules (deduplicate by hari+bagian+waktu)
            $sched_key = $row->nama_hari . '_' . $row->nama_bagian . '_' . $row->waktu_mulai . '_' . $row->waktu_selesai;
            if (!isset($doctors_grouped[$pid]->schedule_keys[$sched_key])) {
                $doctors_grouped[$pid]->schedule_keys[$sched_key] = true;
                $doctors_grouped[$pid]->schedules[] = (object)[
                    'hari' => $row->nama_hari,
                    'waktu_mulai' => date('H:i', strtotime($row->waktu_mulai)),
                    'waktu_selesai' => date('H:i', strtotime($row->waktu_selesai)),
                    'bagian' => $row->nama_bagian,
                    'no_hari' => $row->no_hari,
                ];
            }
        }

        // Build schedule string, set specialization from all bagian, and sort schedules directly
        foreach ($doctors_grouped as &$doc) {
            $doc->specialization = implode(', ', $doc->bagian_list);
            
            // Sort schedules directly so that they are ordered by day (Senin -> Minggu) in the view
            usort($doc->schedules, fn($a, $b) => $a->no_hari <=> $b->no_hari);

            // Group schedules by bagian for the string representation
            $schedule_parts = [];
            $schedules_by_bagian = [];
            foreach ($doc->schedules as $s) {
                $schedules_by_bagian[$s->bagian][] = $s;
            }
            foreach ($schedules_by_bagian as $bagian => $scheds) {
                $days = [];
                foreach ($scheds as $s) {
                    $days[] = $s->hari . ' ' . $s->waktu_mulai . '-' . $s->waktu_selesai;
                }
                if (count($doctors_grouped) > 0 && count($doc->bagian_list) > 1) {
                    $schedule_parts[] = $bagian . ': ' . implode("\n", $days);
                } else {
                    $schedule_parts[] = implode("\n", $days);
                }
            }
            $doc->schedule = implode(' | ', $schedule_parts);
        }
        unset($doc);

        // Get hidden doctors from local DB (using 'id_dokter' column to store pegawai_id and 'status' as 'hidden')
        $hidden_doctor_ids = \App\Models\Doctor::where('status', 'hidden')->pluck('id_dokter')->toArray();

        $doctors = collect(array_values($doctors_grouped))->reject(function ($doc) use ($hidden_doctor_ids) {
            return in_array($doc->id, $hidden_doctor_ids);
        })->values();
    } catch (\Exception $e) {
        $doctors = collect();
        if (config('app.debug')) {
            logger()->error('Failed to fetch doctor schedules from estes: ' . $e->getMessage());
        }
    }

    $promos = App\Models\Promo::all();
    $news = App\Models\News::all();
    $slides = App\Models\Slide::where('is_active', true)->orderBy('order', 'asc')->get();
    $facilities = \App\Models\Facility::all();
    $popups = App\Models\PopupImage::where('is_active', true)->orderBy('order', 'asc')->get();
    return view('welcome', compact('doctors', 'promos', 'news', 'slides', 'nama_hari_ini', 'facilities', 'popups'));
});

Route::get('/berita/{id}', function ($id) {
    $item = App\Models\News::findOrFail($id);
    $otherNews = App\Models\News::where('id', '!=', $id)->latest()->take(3)->get();
    return view('news-detail', compact('item', 'otherNews'));
})->name('news.show');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// 2FA Routes (Requires password auth, but exempt from 2fa middleware to avoid redirect loop)
Route::middleware(['auth'])->group(function () {
    Route::get('2fa', [App\Http\Controllers\Auth\TwoFactorController::class, 'index'])->name('2fa.index');
    Route::post('2fa', [App\Http\Controllers\Auth\TwoFactorController::class, 'verify'])->name('2fa.verify');
    Route::get('2fa/setup', [App\Http\Controllers\Auth\TwoFactorController::class, 'setup'])->name('2fa.setup');
    Route::post('2fa/setup', [App\Http\Controllers\Auth\TwoFactorController::class, 'register'])->name('2fa.register');
});

// Chatbot Route
Route::post('chatbot', [App\Http\Controllers\ChatBotController::class, 'handle']);

// Harga Tindakan (estes_care) Routes
Route::get('tindakan', [App\Http\Controllers\TindakanController::class, 'index'])->name('tindakan.index');
Route::get('tindakan/{id}/detail', [App\Http\Controllers\TindakanController::class, 'getDetail'])->name('tindakan.detail');

// Protected Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', '2fa'])->group(function () {
    Route::get('/', function () {
        try {
            $total_doctors_result = \Illuminate\Support\Facades\DB::connection('estes')->select("SELECT
                        COUNT(DISTINCT pegawai.id) as total
                    FROM
                        pegawai
                    JOIN
                        pegawai_bagian ON pegawai_bagian.pegawai_id = pegawai.id
                    JOIN
                        bagian ON bagian.id = pegawai_bagian.bagian_id
                    JOIN
                        jadwal_dokter ON jadwal_dokter.pegawai_id = pegawai.id
                        AND jadwal_dokter.bagian_id = bagian.id
                    WHERE
                        pegawai.deleted_at IS NULL
                        AND jadwal_dokter.deleted_at IS NULL
                        AND bagian.id NOT IN (22,14,66,54,82)");
            $total_doctors = $total_doctors_result[0]->total ?? 0;
        } catch (\Exception $e) {
            $total_doctors = 0;
            if (config('app.debug')) {
                logger()->error('Failed to fetch total doctors from estes: ' . $e->getMessage());
            }
        }
        return view('admin.dashboard', compact('total_doctors'));
    })->name('dashboard');
    Route::resource('doctors', DoctorController::class);
    Route::resource('promos', PromoController::class);
    Route::resource('news', NewsController::class);
    Route::resource('slides', SlideController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('popups', PopupImageController::class);

    // Admin Only Routes
    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
        Route::post('users/{user}/reset-2fa', [UserController::class, 'reset2fa'])->name('users.reset-2fa');
    });
});
