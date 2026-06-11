@extends('layouts.admin')
 
@section('title', isset($slide) ? 'Edit Slide Background' : 'Tambah Slide Background')
 
@section('content')
<div class="card">
    <form action="{{ isset($slide) ? route('admin.slides.update', $slide->id) : route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($slide))
            @method('PUT')
        @endif
 
        <div class="form-group">
            <label for="title">Judul / Alt Text (Opsional)</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ isset($slide) ? $slide->title : old('title') }}" placeholder="Contoh: Tim Medis RSU Pekerja">
        </div>
 
        <div class="form-group" style="max-width: 200px;">
            <label for="order">Urutan Tampilan</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ isset($slide) ? $slide->order : (old('order') ?? 0) }}" min="0" required>
        </div>
 
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; text-transform: none; font-size: 0.9rem; font-weight: 600;">
                <input type="checkbox" name="is_active" value="1" {{ (!isset($slide) || $slide->is_active) ? 'checked' : '' }} style="width: 18px; height: 18px; cursor: pointer;">
                <span>Aktifkan / Tampilkan Slide Ini</span>
            </label>
        </div>
 
        <div class="form-group">
            <label for="image">File Gambar {{ isset($slide) ? '(Opsional jika tidak diganti)' : '(Wajib)' }}</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" {{ isset($slide) ? '' : 'required' }}>
            <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 6px;">Rekomendasi rasio landscape 4:3 (contoh: 1200x900px atau 800x600px). Maksimal ukuran file 10MB.</p>
            @error('image')
                <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600; display: block; margin-top: 6px;">{{ $message }}</span>
            @enderror
            @if(isset($slide) && $slide->image)
                <div style="margin-top: 15px;">
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Gambar saat ini:</p>
                    <img src="{{ asset($slide->image) }}" alt="Preview" style="height: 120px; border-radius: 8px; border: 1.5px solid #e2e8f0; display: block; object-fit: cover;">
                </div>
            @endif
        </div>
 
        <button type="submit" class="btn">Simpan</button>
        <a href="{{ route('admin.slides.index') }}" class="btn" style="background: #6c757d;">Batal</a>
    </form>
</div>
@endsection
