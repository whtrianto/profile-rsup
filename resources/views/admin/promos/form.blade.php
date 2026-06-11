@extends('layouts.admin')

@section('title', isset($promo) ? 'Edit Promo' : 'Tambah Promo')

@section('content')
<div class="card">
    <form action="{{ isset($promo) ? route('admin.promos.update', $promo->id) : route('admin.promos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($promo))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Judul Promo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ isset($promo) ? $promo->title : '' }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ isset($promo) ? $promo->description : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="valid_until">Berlaku Sampai (Tanggal)</label>
            <input type="date" name="valid_until" id="valid_until" class="form-control" value="{{ isset($promo) ? $promo->valid_until : '' }}">
        </div>

        <div class="form-group">
            <label for="image">Gambar Promo (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @error('image')
                <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600;">{{ $message }}</span>
            @enderror
            @if(isset($promo) && $promo->image)
                <div style="margin-top: 15px;">
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Gambar saat ini:</p>
                    <img src="{{ str_starts_with($promo->image, 'http') ? $promo->image : asset($promo->image) }}" alt="Preview" style="height: 100px; border-radius: 8px; border: 1.5px solid #e2e8f0; display: block;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn">Simpan</button>
        <a href="{{ route('admin.promos.index') }}" class="btn" style="background: #6c757d;">Batal</a>
    </form>
</div>
@endsection
