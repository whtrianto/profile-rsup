@extends('layouts.admin')
 
@section('title', 'Manajemen Karir')
 
@section('content')
<div class="card">
    <div class="flex" style="justify-content: space-between; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem;">Daftar Lowongan Karir</h3>
        <a href="{{ route('admin.karirs.create') }}" class="btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            <span>Tambah Lowongan</span>
        </a>
    </div>
 
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th style="width: 120px;">Gambar</th>
                    <th>Judul Lowongan</th>
                    <th>Deskripsi Singkat</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($karirs as $index => $karir)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($karir->image)
                            <img src="{{ asset($karir->image) }}" alt="Karir Image" style="width: 80px; height: 50px; object-fit: cover; border-radius: 8px; border: 1.5px solid #e2e8f0; background: #f1f5f9;">
                        @else
                            <div style="width: 80px; height: 50px; border-radius: 8px; border: 1.5px dashed #cbd5e1; background: #f8fafc; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">
                                No Image
                            </div>
                        @endif
                    </td>
                    <td style="font-weight: 700; color: var(--primary);">{{ $karir->title }}</td>
                    <td style="font-weight: 500; color: var(--text-dark);">{{ Str::limit($karir->description, 100) }}</td>
                    <td style="text-align: center;">
                        <div class="flex" style="justify-content: center;">
                            <a href="{{ route('admin.karirs.edit', $karir->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.karirs.destroy', $karir->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty-row-text">Belum ada lowongan karir. Silakan tambahkan lowongan baru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
