@extends('layouts.admin')

@section('title', isset($facility) ? 'Edit Fasilitas' : 'Tambah Fasilitas Baru')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem; margin-bottom: 25px;">
        {{ isset($facility) ? 'Edit Data Fasilitas' : 'Tambah Data Fasilitas' }}
    </h3>

    <form action="{{ isset($facility) ? route('admin.facilities.update', $facility->id) : route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($facility))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Judul Layanan / Fasilitas <span style="color: red;">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $facility->title ?? '') }}" required>
            @error('title')
                <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Singkat <span style="color: red;">*</span></label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $facility->description ?? '') }}</textarea>
            @error('description')
                <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group" style="margin-bottom: 30px;">
            <label for="icon">Ikon (Gambar/SVG) @if(!isset($facility))<span style="color: red;">*</span>@endif</label>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 10px;">Pilih ikon (format PNG, JPG, atau SVG) yang merepresentasikan fasilitas ini. Jika menggunakan SVG atau PNG transparan akan terlihat lebih baik. Anda dapat mengunduh ikon gratis di <a href="https://lucide.dev/icons" target="_blank" style="color: var(--secondary); text-decoration: underline;">Lucide</a>, <a href="https://feathericons.com/" target="_blank" style="color: var(--secondary); text-decoration: underline;">Feather Icons</a>, atau <a href="https://www.flaticon.com/" target="_blank" style="color: var(--secondary); text-decoration: underline;">Flaticon</a>.</p>
            @if(isset($facility) && $facility->icon)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $facility->icon) }}" alt="Ikon Saat Ini" style="width: 64px; height: 64px; object-fit: contain; border-radius: 8px; border: 1px solid #e2e8f0; background: #f8fafc; padding: 5px;">
                </div>
            @endif
            <input type="file" name="icon" id="icon" class="form-control" accept="image/png, image/jpeg, image/svg+xml" {{ !isset($facility) ? 'required' : '' }}>
            @error('icon')
                <small style="color: var(--danger); display: block; margin-top: 5px;">{{ $message }}</small>
            @enderror
        </div>

        <div class="flex" style="gap: 12px;">
            <button type="submit" class="btn">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Simpan Fasilitas
            </button>
            <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
