@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="card">
    <div class="flex" style="justify-content: space-between; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem;">Daftar Artikel & Berita Kesehatan</h3>
        <a href="{{ route('admin.news.create') }}" class="btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Tambah Berita</span>
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 120px;">Gambar</th>
                    <th>Judul Artikel / Berita</th>
                    <th>Tanggal Terbit</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset($item->image) }}" alt="{{ $item->title }}" style="width: 80px; height: 48px; object-fit: cover; border-radius: 8px; border: 1.5px solid #e2e8f0; background: #f1f5f9;">
                        @else
                            <div style="width: 80px; height: 48px; border-radius: 8px; border: 1.5px dashed #cbd5e1; background: #f8fafc; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">
                                No Image
                            </div>
                        @endif
                    </td>
                    <td style="font-weight: 700; color: var(--primary);">{{ $item->title }}</td>
                    <td>
                        <span style="color: var(--text-muted); font-size: 0.85rem; display: inline-flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <span>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M Y') : '-' }}</span>
                        </span>
                    </td>
                    <td style="text-align: center;">
                        <div class="flex" style="justify-content: center;">
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita {{ $item->title }}?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-row-text">Belum ada rilis berita atau artikel edukasi. Silakan tambahkan berita baru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
