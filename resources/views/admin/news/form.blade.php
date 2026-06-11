@extends('layouts.admin')

@section('title', isset($news) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="card">
    <form action="{{ isset($news) ? route('admin.news.update', $news->id) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($news))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Judul Berita</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ isset($news) ? $news->title : '' }}" required>
        </div>

        <div class="form-group">
            <label for="content">Konten Berita</label>
            <textarea name="content" id="content" class="form-control" rows="8" required>{{ isset($news) ? $news->content : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="published_at">Tanggal Publikasi</label>
            <input type="date" name="published_at" id="published_at" class="form-control" value="{{ isset($news) ? $news->published_at : '' }}">
        </div>

        <div class="form-group">
            <label for="image">Gambar Berita (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @error('image')
                <span style="color: var(--danger); font-size: 0.85rem; font-weight: 600;">{{ $message }}</span>
            @enderror
            @if(isset($news) && $news->image)
                <div style="margin-top: 15px;">
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 8px; font-weight: 600;">Gambar saat ini:</p>
                    <img src="{{ str_starts_with($news->image, 'http') ? $news->image : asset($news->image) }}" alt="Preview" style="height: 100px; border-radius: 8px; border: 1.5px solid #e2e8f0; display: block;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn">Simpan</button>
        <a href="{{ route('admin.news.index') }}" class="btn" style="background: #6c757d;">Batal</a>
    </form>
</div>
@endsection
