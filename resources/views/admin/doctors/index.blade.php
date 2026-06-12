@extends('layouts.admin')

@section('title', 'Manajemen Dokter')

@section('content')
    <div class="card">
        <div class="flex" style="justify-content: space-between; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem;">Daftar Dokter Spesialis</h3>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 80px;">Foto</th>
                        <th>Nama Lengkap</th>
                        <th>Spesialisasi</th>
                        <th>Status</th>
                        <th style="width: 100px; text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($doctors as $index => $doctor)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ str_starts_with($doctor->photo, 'http') ? $doctor->photo : ($doctor->photo ? asset($doctor->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($doctor->name) . '&background=064e3b&color=fff&size=100') }}"
                                    alt="{{ $doctor->name }}"
                                    style="width: 48px; height: 48px; object-fit: cover; border-radius: 50%; border: 2px solid var(--secondary-light); background: #f1f5f9;">
                            </td>
                            <td style="font-weight: 700; color: var(--primary);">{{ $doctor->name }}</td>
                            <td><span
                                    style="background: var(--secondary-light); color: var(--secondary-hover); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">{{ $doctor->specialization }}</span>
                            </td>
                            <td>
                                @if($doctor->is_visible)
                                    <span
                                        style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">Tampil</span>
                                @else
                                    <span
                                        style="background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">Disembunyikan</span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning"
                                    style="padding: 6px 12px; font-size: 0.85rem;">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-row-text">Belum ada data dokter spesialis. Silakan tambahkan data baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection