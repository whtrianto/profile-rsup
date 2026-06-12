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
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $file->getClientOriginalName());
            
            $dir = storage_path('app/public/doctors');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }
            
            $destPath = $dir . '/' . $filename;
            $info = getimagesize($file->getRealPath());
            
            if ($info && $info['mime'] == 'image/jpeg') {
                $img = imagecreatefromjpeg($file->getRealPath());
                imagejpeg($img, $destPath, 60); // compress quality 60
                imagedestroy($img);
            } elseif ($info && $info['mime'] == 'image/png') {
                $img = imagecreatefrompng($file->getRealPath());
                imagepng($img, $destPath, 6); // compress level 6
                imagedestroy($img);
            } else {
                $file->storeAs('doctors', $filename, 'public');
            }
            
            $doctor->image = 'doctors/' . $filename;
        }

        $doctor->save();

        return redirect()->route('admin.doctors.index')->with('success', 'Data dokter berhasil diperbarui');
    }
}
