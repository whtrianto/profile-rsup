@extends('layouts.admin')
 
@section('title', 'Manajemen Popup Gambar')
 
@section('content')
<div class="card">
    <div class="flex" style="justify-content: space-between; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem;">Daftar Popup Gambar</h3>
        <a href="{{ route('admin.popups.create') }}" class="btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Tambah Gambar Popup</span>
        </a>
    </div>
 
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 120px;">Gambar</th>
                    <th>Judul / Keterangan</th>
                    <th style="width: 100px; text-align: center;">Urutan</th>
                    <th style="width: 120px; text-align: center;">Status</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($popups as $index => $popup)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($popup->image)
                            <img src="{{ asset($popup->image) }}" alt="{{ $popup->title ?? 'Popup Image' }}" style="width: 80px; height: 50px; object-fit: cover; border-radius: 8px; border: 1.5px solid #e2e8f0; background: #f1f5f9;">
                        @else
                            <div style="width: 80px; height: 50px; border-radius: 8px; border: 1.5px dashed #cbd5e1; background: #f8fafc; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">
                                No Image
                            </div>
                        @endif
                    </td>
                    <td style="font-weight: 700; color: var(--primary);">{{ $popup->title ?? 'Tidak Ada Judul' }}</td>
                    <td style="text-align: center; font-weight: 600;">{{ $popup->order }}</td>
                    <td style="text-align: center;">
                        @if($popup->is_active)
                            <span style="color: var(--secondary); font-weight: 700; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 4px; background: var(--secondary-light); padding: 4px 8px; border-radius: 20px; border: 1px solid rgba(16, 185, 129, 0.25);">
                                <span>Aktif</span>
                            </span>
                        @else
                            <span style="color: var(--text-muted); font-weight: 700; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 4px; background: #f1f5f9; padding: 4px 8px; border-radius: 20px; border: 1px solid #cbd5e1;">
                                <span>Draft</span>
                            </span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div class="flex" style="justify-content: center;">
                            <a href="{{ route('admin.popups.edit', $popup->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.popups.destroy', $popup->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus popup ini?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty-row-text">Belum ada popup gambar. Silakan tambahkan popup baru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
