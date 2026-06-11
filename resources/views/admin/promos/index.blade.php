@extends('layouts.admin')

@section('title', 'Manajemen Promo')

@section('content')
<div class="card">
    <div class="flex" style="justify-content: space-between; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem;">Daftar Promo & Paket Kesehatan</h3>
        <a href="{{ route('admin.promos.create') }}" class="btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Tambah Promo</span>
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 120px;">Gambar</th>
                    <th>Judul Promo</th>
                    <th>Masa Berlaku</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($promos as $index => $promo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($promo->image)
                            <img src="{{ str_starts_with($promo->image, 'http') ? $promo->image : asset($promo->image) }}" alt="{{ $promo->title }}" style="width: 80px; height: 48px; object-fit: cover; border-radius: 8px; border: 1.5px solid #e2e8f0; background: #f1f5f9;">
                        @else
                            <div style="width: 80px; height: 48px; border-radius: 8px; border: 1.5px dashed #cbd5e1; background: #f8fafc; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">
                                No Image
                            </div>
                        @endif
                    </td>
                    <td style="font-weight: 700; color: var(--primary);">{{ $promo->title }}</td>
                    <td>
                        @if($promo->valid_until)
                            <span style="color: var(--danger); font-weight: 700; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 4px;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                <span>Hingga {{ \Carbon\Carbon::parse($promo->valid_until)->format('d M Y') }}</span>
                            </span>
                        @else
                            <span style="color: var(--text-muted); font-size: 0.85rem;">Selama Persediaan Ada</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div class="flex" style="justify-content: center;">
                            <a href="{{ route('admin.promos.edit', $promo->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus promo {{ $promo->title }}?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-row-text">Belum ada data promo aktif. Silakan tambahkan promo baru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
