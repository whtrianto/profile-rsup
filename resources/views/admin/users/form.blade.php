@extends('layouts.admin')

@section('title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto; padding: 30px;">
    <div style="margin-bottom: 25px; padding-bottom: 15px; border-bottom: 1px solid #f1f5f9;">
        <h3 style="color: var(--primary); font-weight: 800; display: flex; align-items: center; gap: 8px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            {{ isset($user) ? 'Edit Data User' : 'Tambah User Baru' }}
        </h3>
    </div>

    @if ($errors->any())
    <div class="alert-error" style="background: #fef2f2; color: #b91c1c; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #fee2e2;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="role">Peran (Role)</label>
            <select name="role" id="role" class="form-control" required style="appearance: auto;">
                <option value="staff" {{ old('role', $user->role ?? '') === 'staff' ? 'selected' : '' }}>Staf (Akses Terbatas)</option>
                <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin (Akses Penuh)</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password {{ isset($user) ? '(Kosongkan jika tidak ingin diubah)' : '' }}</label>
            <input type="password" name="password" id="password" class="form-control" {{ isset($user) ? '' : 'required' }} minlength="8">
        </div>

        <div style="margin-top: 30px; display: flex; gap: 15px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn" style="flex: 1;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                Simpan User
            </button>
        </div>
    </form>
</div>
@endsection
