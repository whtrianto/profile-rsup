@extends('layouts.admin')
 
@section('title', isset($karir) ? 'Edit Lowongan Karir' : 'Tambah Lowongan Karir')
 
@section('content')
<div class="card">
    <form action="{{ isset($karir) ? route('admin.karirs.update', $karir->id) : route('admin.karirs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($karir))
            @method('PUT')
        @endif
 
        <div class="form-group">
            <label for="title">Judul Lowongan</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ isset($karir) ? $karir->title : old('title') }}" placeholder="Contoh: Lowongan Dokter Umum" required>
            @error('title')
                <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600; display: block; margin-top: 6px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">File Gambar (Pamflet Lowongan) {{ isset($karir) ? '(Opsional jika tidak diganti)' : '(Wajib)' }}</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" {{ isset($karir) ? '' : 'required' }}>
            <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 6px;">Maksimal ukuran file 10MB.</p>
            @error('image')
                <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600; display: block; margin-top: 6px;">{{ $message }}</span>
            @enderror
            @if(isset($karir) && $karir->image)
                <div style="margin-top: 15px;">
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Gambar saat ini:</p>
                    <img src="{{ asset($karir->image) }}" alt="Preview" style="height: 120px; border-radius: 8px; border: 1.5px solid #e2e8f0; display: block; object-fit: cover;">
                </div>
            @endif
        </div>
 
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="5" placeholder="Masukkan deskripsi singkat tentang lowongan kerja ini">{{ isset($karir) ? $karir->description : old('description') }}</textarea>
            @error('description')
                <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600; display: block; margin-top: 6px;">{{ $message }}</span>
            @enderror
        </div>
 
        <button type="submit" class="btn">Simpan</button>
        <a href="{{ route('admin.karirs.index') }}" class="btn" style="background: #6c757d;">Batal</a>
    </form>
</div>
@endsection
