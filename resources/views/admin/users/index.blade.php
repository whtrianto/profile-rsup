@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')
<div class="card" style="padding: 25px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
        <h3 style="color: var(--primary); font-weight: 800; font-size: 1.25rem; display: flex; align-items: center; gap: 8px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            Daftar Pengguna Sistem
        </h3>
        <a href="{{ route('admin.users.create') }}" class="btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Tambah User
        </a>
    </div>

    @if($errors->any())
    <div class="alert-error" style="background: #fef2f2; color: #b91c1c; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fee2e2;">
        {{ $errors->first() }}
    </div>
    @endif

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px; text-align: center;">No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th style="text-align: center;">Peran (Role)</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td style="font-weight: 700; color: var(--primary);">{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td style="text-align: center;">
                        @if($user->role === 'admin')
                            <span style="background: var(--primary-light); color: var(--primary); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; border: 1px solid rgba(6,78,59,0.2);">Admin</span>
                        @else
                            <span style="background: #f1f5f9; color: var(--text-muted); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; border: 1px solid #cbd5e1;">Staf</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <div style="display: flex; gap: 8px; justify-content: center; flex-wrap: wrap;">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning" style="padding: 6px 12px; font-size: 0.8rem;">
                                Edit
                            </a>
                            @if($user->google2fa_secret)
                            <form action="{{ route('admin.users.reset-2fa', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin mereset Google Authenticator untuk user ini? Pengguna harus memindai ulang kode QR pada login berikutnya.');" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn" style="padding: 6px 12px; font-size: 0.8rem; background: #f97316; border-color: #f97316; color: white; box-shadow: 0 4px 10px rgba(249, 115, 22, 0.15);">
                                    Reset 2FA
                                </button>
                            </form>
                            @endif
                            @if(auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?');" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 0.8rem;">
                                    Hapus
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-row-text">Belum ada data user.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
