@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="card"
        style="background: linear-gradient(135deg, var(--primary), var(--sidebar-bg)); color: white; border: none; position: relative; overflow: hidden; padding: 35px 30px;">
        <div style="position: relative; z-index: 2;">
            <h3 style="font-size: 1.6rem; font-weight: 800; margin-bottom: 8px; color: white;">Selamat Datang Kembali,
                Admin!</h3>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.95rem; max-width: 600px; line-height: 1.6;">Kelola jadwal
                praktik dokter, rilis berita edukasi kesehatan terbaru, serta kelola paket promo aktif Rumah Sakit Umum
                Pekerja secara real-time.</p>
        </div>
        <!-- Decorative background circle -->
        <div
            style="position: absolute; right: -50px; top: -50px; width: 220px; height: 220px; border-radius: 50%; background: rgba(255,255,255,0.05); pointer-events: none;">
        </div>
    </div>

    <div
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 25px;">
        <!-- Stats Doctor -->
        <div class="card"
            style="display: flex; align-items: center; justify-content: space-between; padding: 24px; border-left: 5px solid var(--secondary); margin-bottom: 0;">
            <div>
                <span
                    style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Total
                    Dokter</span>
                <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary); margin-top: 4px; margin-bottom: 0;">
                    {{ $total_doctors }}</h2>
            </div>
            <div
                style="background: var(--secondary-light); color: var(--secondary); padding: 12px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
            </div>
        </div>

        <!-- Stats Promo -->
        <div class="card"
            style="display: flex; align-items: center; justify-content: space-between; padding: 24px; border-left: 5px solid #f59e0b; margin-bottom: 0;">
            <div>
                <span
                    style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Promo
                    Aktif</span>
                <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary); margin-top: 4px; margin-bottom: 0;">
                    {{ \App\Models\Promo::count() }}</h2>
            </div>
            <div
                style="background: #fef3c7; color: #d97706; padding: 12px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                    <line x1="7" y1="7" x2="7.01" y2="7"></line>
                </svg>
            </div>
        </div>

        <!-- Stats News -->
        <div class="card"
            style="display: flex; align-items: center; justify-content: space-between; padding: 24px; border-left: 5px solid #3b82f6; margin-bottom: 0;">
            <div>
                <span
                    style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Rilis
                    Berita</span>
                <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary); margin-top: 4px; margin-bottom: 0;">
                    {{ \App\Models\News::count() }}</h2>
            </div>
            <div
                style="background: #eff6ff; color: #2563eb; padding: 12px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
            </div>
        </div>
    </div>

    <div class="card" style="padding: 30px;">
        <h3
            style="color: var(--primary); font-weight: 800; margin-bottom: 15px; font-size: 1.15rem; display: flex; align-items: center; gap: 8px;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
            <span>Panduan Singkat Pengelolaan</span>
        </h3>
        <ul
            style="padding-left: 20px; line-height: 1.8; font-size: 0.92rem; color: var(--text-muted); display: flex; flex-direction: column; gap: 10px;">
            <li>Gunakan menu <strong style="color: var(--primary);">Jadwal Dokter</strong> untuk mengatur visibilitas jadwal
                dokter di halaman utama.</li>
            <li>Halaman <strong style="color: var(--primary);">Promo Layanan</strong> digunakan untuk mengatur promo
                pemeriksaan kesehatan berkala (Medical Check-Up).</li>
            <li>Halaman <strong style="color: var(--primary);">Berita & Informasi</strong> berfungsi untuk mempublikasikan
                artikel tips hidup sehat atau pengumuman resmi rumah sakit.</li>
            <li>Halaman <strong style="color: var(--primary);">Kelola Carousel</strong> berfungsi untuk mengatur gambar
                carousel di halaman utama.</li>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <li><strong style="color: var(--primary);">Pengaturan Peran:</strong> User dengan role <strong>Admin</strong>
                    memiliki akses penuh untuk mengelola konten dan pengguna lainnya (Kelola User). Sementara user dengan role
                    <strong>Staf</strong> dapat mengelola semua konten website kecuali mengelola data pengguna.</li>
            @endif
        </ul>
    </div>
@endsection