@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas / Layanan')

@section('content')
<div class="card">
    <div class="flex" style="justify-content: space-between; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem;">Daftar Fasilitas Medis Unggulan</h3>
        <a href="{{ route('admin.facilities.create') }}" class="btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tambah Fasilitas
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 80px;">Ikon</th>
                    <th>Judul Layanan</th>
                    <th>Deskripsi Singkat</th>
                    <th style="width: 150px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($facilities as $index => $facility)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($facility->icon)
                            <img src="{{ asset('storage/' . $facility->icon) }}" alt="{{ $facility->title }}" style="width: 48px; height: 48px; object-fit: contain; border-radius: 8px; background: #f8fafc; padding: 4px; border: 1px solid #e2e8f0;">
                        @else
                            <div style="width: 48px; height: 48px; border-radius: 8px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 0.7rem; border: 1px dashed #cbd5e1;">-</div>
                        @endif
                    </td>
                    <td style="font-weight: 700; color: var(--primary);">{{ $facility->title }}</td>
                    <td>{{ Str::limit($facility->description, 60) }}</td>
                    <td style="text-align: center;">
                        <div class="flex" style="justify-content: center;">
                            <a href="{{ route('admin.facilities.edit', $facility->id) }}" class="btn btn-warning" style="padding: 6px 12px; font-size: 0.85rem;">Edit</a>
                            <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 0.85rem;">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-row-text">Belum ada data fasilitas medis unggulan. Silakan tambahkan data baru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
