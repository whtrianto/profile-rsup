<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Traits\UploadsImages;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    use UploadsImages;

    private function getEstesDoctors()
    {
        $jadwal_dokter = \Illuminate\Support\Facades\DB::select("SELECT
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
                    'id' => $pid, // use pegawai_id as id for edit route
                    'name' => $row->nama_dokter,
                    'specialization' => $row->nama_bagian,
                    'photo' => $photoUrl,
                    'schedules' => [],
                    'schedule_keys' => [],
                    'bagian_list' => [],
                ];
            }
            if (!in_array($row->nama_bagian, $doctors_grouped[$pid]->bagian_list)) {
                $doctors_grouped[$pid]->bagian_list[] = $row->nama_bagian;
            }
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

        foreach ($doctors_grouped as &$doc) {
            $doc->specialization = implode(', ', $doc->bagian_list);
            $schedule_parts = [];
            $schedules_by_bagian = [];
            foreach ($doc->schedules as $s) {
                $schedules_by_bagian[$s->bagian][] = $s;
            }
            foreach ($schedules_by_bagian as $bagian => $scheds) {
                usort($scheds, fn($a, $b) => $a->no_hari <=> $b->no_hari);
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

        return collect(array_values($doctors_grouped));
    }

    public function index()
    {
        $doctors = $this->getEstesDoctors();
        // Get hidden doctors from local DB (using 'id_dokter' column to store pegawai_id and 'status' as 'hidden')
        $hidden_doctor_ids = Doctor::where('status', 'hidden')->pluck('id_dokter')->toArray();
        
        foreach ($doctors as $doc) {
            $doc->is_visible = !in_array($doc->id, $hidden_doctor_ids);
        }

        return view('admin.doctors.index', compact('doctors'));
    }

    public function edit($id)
    {
        $doctors = $this->getEstesDoctors();
        $doctor = $doctors->firstWhere('id', $id);
        
        if (!$doctor) {
            return redirect()->route('admin.doctors.index')->with('error', 'Dokter tidak ditemukan');
        }

        $is_hidden = Doctor::where('id_dokter', $id)->where('status', 'hidden')->exists();
        $doctor->is_visible = !$is_hidden;

        return view('admin.doctors.form', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'is_visible' => 'required|boolean',
            'image' => 'nullable|image|max:3072'
        ]);

        $doctor = Doctor::firstOrNew(['id_dokter' => $id]);
        $doctor->status = $request->is_visible ? 'visible' : 'hidden';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $originalName) . '.jpg';
            
            // Simpan LANGSUNG ke folder public/storage/doctors agar tidak perlu symlink
            $dir = public_path('storage/doctors');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }
            
            $destPath = $dir . '/' . $filename;
            $info = getimagesize($file->getRealPath());
            $img = null;
            
            if ($info && $info['mime'] == 'image/jpeg') {
                $img = imagecreatefromjpeg($file->getRealPath());
            } elseif ($info && $info['mime'] == 'image/png') {
                $img = imagecreatefrompng($file->getRealPath());
            } elseif ($info && $info['mime'] == 'image/webp') {
                $img = imagecreatefromwebp($file->getRealPath());
            }

            if ($img) {
                // Resize if too large (helps reduce file size significantly)
                $width = imagesx($img);
                $height = imagesy($img);
                $maxDim = 1000;
                
                if ($width > $maxDim || $height > $maxDim) {
                    if ($width > $height) {
                        $newWidth = $maxDim;
                        $newHeight = (int)($height * ($maxDim / $width));
                    } else {
                        $newHeight = $maxDim;
                        $newWidth = (int)($width * ($maxDim / $height));
                    }
                    $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
                    
                    // Fill with white background (to avoid black background from alpha channel)
                    $white = imagecolorallocate($resizedImg, 255, 255, 255);
                    imagefill($resizedImg, 0, 0, $white);
                    
                    imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    imagedestroy($img);
                    $img = $resizedImg;
                }

                // Compress iteratively until the size is under 200KB
                $quality = 85;
                do {
                    imagejpeg($img, $destPath, $quality);
                    $size = filesize($destPath);
                    $quality -= 5;
                } while ($size > 200 * 1024 && $quality >= 20);

                imagedestroy($img);
            } else {
                $file->move($dir, $filename);
            }
            
            $doctor->image = 'doctors/' . $filename;
        }

        $doctor->save();

        return redirect()->route('admin.doctors.index')->with('success', 'Data dokter berhasil diperbarui');
    }
}
