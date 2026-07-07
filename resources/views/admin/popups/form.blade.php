@extends('layouts.admin')
 
@section('title', isset($popup) ? 'Edit Popup Gambar' : 'Tambah Popup Gambar')
 
@section('content')
<div class="card">
    <form action="{{ isset($popup) ? route('admin.popups.update', $popup->id) : route('admin.popups.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div style="background: #fee2e2; border: 1px solid #fca5a5; color: #b91c1c; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px; font-weight: 600;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($popup))
            @method('PUT')
        @endif
 
        <div class="form-group">
            <label for="title">Judul / Keterangan (Opsional)</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ isset($popup) ? $popup->title : old('title') }}" placeholder="Contoh: Pengumuman Hari Libur">
        </div>
 
        <div class="form-group" style="max-width: 200px;">
            <label for="order">Urutan Tampilan</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ isset($popup) ? $popup->order : (old('order') ?? 0) }}" min="0" required>
        </div>
 
        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; text-transform: none; font-size: 0.9rem; font-weight: 600;">
                <input type="checkbox" name="is_active" value="1" {{ (!isset($popup) || $popup->is_active) ? 'checked' : '' }} style="width: 18px; height: 18px; cursor: pointer;">
                <span>Aktifkan / Tampilkan Popup Ini</span>
            </label>
        </div>
 
        <div class="form-group">
            <label for="image">File Gambar {{ isset($popup) ? '(Opsional jika tidak diganti)' : '(Wajib)' }}</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" {{ isset($popup) ? '' : 'required' }}>
            <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 6px;">Maksimal ukuran file 10MB.</p>
            @error('image')
                <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600; display: block; margin-top: 6px;">{{ $message }}</span>
            @enderror
            @if(isset($popup) && $popup->image)
                <div style="margin-top: 15px;">
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Gambar saat ini:</p>
                    <img src="{{ asset($popup->image) }}" alt="Preview" style="max-height: 200px; max-width: 100%; border-radius: 8px; border: 1.5px solid #e2e8f0; display: block; object-fit: contain;">
                </div>
            @endif
        </div>
 
        <button type="submit" class="btn">Simpan</button>
        <a href="{{ route('admin.popups.index') }}" class="btn" style="background: #6c757d;">Batal</a>
    </form>
</div>
@endsection
