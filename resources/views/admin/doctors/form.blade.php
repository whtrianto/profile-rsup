@extends('layouts.admin')

@section('title', isset($doctor) ? 'Edit Dokter' : 'Tambah Dokter')

@section('content')
<div class="card" style="max-width: 700px; margin: 0 auto;">
    <div style="margin-bottom: 25px; padding: 15px; background: #f8fafc; border-radius: 10px; border-left: 4px solid var(--primary);">
        <h4 style="margin: 0 0 10px 0; color: var(--primary);">{{ $doctor->name }}</h4>
        <p style="margin: 0; font-size: 0.9rem; color: var(--text-muted);">{{ $doctor->specialization }}</p>
    </div>
    <form action="{{ isset($doctor) ? route('admin.doctors.update', $doctor->id) : route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($doctor))
            @method('PUT')
        @endif

        <!-- Status Visibility -->
        <div class="form-group" style="margin-bottom: 30px;">
            <label for="is_visible">Status Tampil di Halaman Utama</label>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 10px;">Atur apakah jadwal dokter ini akan ditampilkan di halaman utama website atau disembunyikan.</p>
            <select name="is_visible" id="is_visible" class="form-control" style="max-width: 300px;">
                <option value="1" {{ $doctor->is_visible ? 'selected' : '' }}>Tampilkan</option>
                <option value="0" {{ !$doctor->is_visible ? 'selected' : '' }}>Sembunyikan</option>
            </select>
        </div>

        <!-- Actions -->
        <div class="flex" style="gap: 12px;">
            <button type="submit" class="btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                <span>Simpan</span>
            </button>
            <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                <span>Batal</span>
            </a>
        </div>
    </form>
</div>
@endsection
