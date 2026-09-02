<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Akses Hasil Medical Check-Up (MCU) Pasien RSU Pekerja KBN menggunakan nomor MR dan tanggal masuk.">
    <meta name="robots" content="noindex, nofollow">
    <title>Hasil MCU Pasien - RSU Pekerja KBN</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #064e3b;
            --primary-hover: #042f2e;
            --primary-light: #ecfdf5;
            --secondary: #10b981;
            --secondary-hover: #059669;
            --secondary-light: #f0fdf4;
            --accent: #f59e0b;
            --danger: #ef4444;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --glass-card: rgba(255, 255, 255, 0.92);
            --glass-border: rgba(255, 255, 255, 0.65);
            --card-shadow: 0 10px 40px -10px rgba(15, 23, 42, 0.1);
            --transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            color: var(--text-dark);
            background-color: var(--bg-light);
            min-height: 100vh;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        .bg-glow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            pointer-events: none;
            background-image:
                radial-gradient(at 0% 0%, rgba(16, 185, 129, 0.07) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(6, 78, 59, 0.05) 0px, transparent 50%);
        }

        /* Top Bar */
        .top-bar {
            background-color: #0b2e24;
            color: rgba(255, 255, 255, 0.9);
            padding: 10px 5%;
            font-size: 0.825rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-left,
        .top-bar-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .top-bar-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .top-bar-item svg {
            width: 14px;
            height: 14px;
            stroke: var(--secondary);
            fill: none;
            stroke-width: 2.5;
        }

        .emergency-btn {
            background-color: var(--danger);
            color: white;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            animation: pulse-danger 2s infinite;
        }

        @keyframes pulse-danger {
            0% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
            }

            70% {
                box-shadow: 0 0 0 6px rgba(239, 68, 68, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
            }
        }

        /* Navbar */
        nav {
            background: var(--glass-card);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            padding: 1.1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px -10px rgba(0, 0, 0, 0.05);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-text-wrapper {
            display: flex;
            flex-direction: column;
        }

        .logo-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.2;
        }

        .logo-subtitle {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--secondary);
            letter-spacing: 0.8px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--secondary);
        }

        .nav-links a.active {
            color: var(--secondary);
        }

        .btn-cta-nav {
            background: linear-gradient(135deg, var(--secondary) 0%, #059669 100%);
            color: white !important;
            padding: 8px 18px;
            border-radius: 10px;
            font-weight: 700 !important;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            padding: 52px 5% 24px;
        }

        .page-tag {
            display: inline-block;
            background: var(--primary-light);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .page-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .page-title span {
            background: linear-gradient(135deg, var(--secondary) 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-desc {
            color: var(--text-muted);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Form Card */
        .form-section {
            max-width: 580px;
            margin: 0 auto 60px;
            padding: 0 5%;
            width: 100%;
        }

        .form-card {
            background: var(--glass-card);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 36px;
            box-shadow: var(--card-shadow);
        }

        .form-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-card-title svg {
            width: 22px;
            height: 22px;
            stroke: var(--secondary);
            fill: none;
            stroke-width: 2;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: inherit;
            color: var(--text-dark);
            background: white;
            transition: var(--transition);
            outline: none;
        }

        .form-input:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        /* Error / Notice */
        .error-notice {
            padding: 14px 20px;
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #dc2626;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .error-notice svg {
            width: 20px;
            height: 20px;
            stroke: #dc2626;
            fill: none;
            stroke-width: 2;
            flex-shrink: 0;
        }

        /* Buttons */
        .form-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, var(--secondary) 0%, #059669 100%);
            color: white;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px -5px rgba(16, 185, 129, 0.5);
        }

        .btn-submit svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
        }

        footer {
            background: #0b2e24;
            color: rgba(255, 255, 255, 0.6);
            text-align: center;
            padding: 24px 5%;
            font-size: 0.82rem;
            margin-top: auto;
        }

        footer a {
            color: var(--secondary);
            text-decoration: none;
        }

        @media (max-width: 700px) {
            .top-bar {
                display: none;
            }

            .form-card {
                padding: 24px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="bg-glow"></div>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-left">
            <div class="top-bar-item">
                <svg viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Jl. Raya Cakung Cilincing No. 46, Sukapura, Jakarta Utara</span>
            </div>
            <div class="top-bar-item">
                <svg viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Pelayanan 24 Jam</span>
            </div>
        </div>
        <div class="top-bar-right">
            <a href="tel:02129484848" class="emergency-btn">UGD EMERGENCY: (021) 29484848</a>
        </div>
    </div>

    <!-- Navbar -->
    <nav>
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('images/danantara.png') }}" alt="Logo Danantara"
                style="height:40px;width:auto;margin-right:8px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo RSUP" style="height:55px;width:auto;">
            <div class="logo-text-wrapper">
                <span class="logo-title">RUMAH SAKIT UMUM PEKERJA</span>
                <span class="logo-subtitle">KBN - RSUP</span>
            </div>
        </a>
        <div class="nav-links">
            <a href="{{ url('/') }}#home">Home</a>
            <a href="{{ url('/') }}#layanan">Layanan</a>
            <a href="{{ url('/') }}#jadwal">Jadwal Dokter</a>
            <a href="{{ url('/') }}#berita">Berita</a>
            <!-- <a href="{{ url('tindakan') }}">Estimasi Tindakan</a> -->
            <a href="{{ url('pasien-mcu') }}" class="active">Hasil MCU Pasien</a>
            <a href="{{ url('/') }}#kontak">Hubungi Kami</a>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <span class="page-tag">Hasil Pemeriksaan</span>
        <h1 class="page-title">Akses <span>Hasil MCU</span></h1>
        <p class="page-desc">Masukkan tanggal lahir Anda dan Nomor Rekam Medis (MR) untuk melihat Resume Hasil
            Medical Check-Up.</p>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <!-- Error Notice -->
        @if(session('error'))
            <div class="error-notice">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if(isset($visits) && count($visits) > 0)
            <div class="form-card">
                <div class="form-card-title">
                    <svg viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Pilih Kunjungan MCU
                </div>
                <p style="margin-bottom: 20px; font-size: 0.9rem; color: var(--text-muted);">
                    Ditemukan {{ count($visits) }} kunjungan MCU untuk No. MR <strong>{{ $no_mr }}</strong>. Silakan pilih tanggal kunjungan di bawah ini untuk melihat hasil.
                </p>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($visits as $visit)
                        <button type="button" onclick="openCaptchaModal('{{ route('hasil-mcu.pdf', encrypt($visit->id)) }}')" style="display: flex; align-items: center; justify-content: space-between; padding: 15px 20px; border: 1.5px solid #e2e8f0; border-radius: 10px; text-decoration: none; color: var(--text-dark); transition: var(--transition); background: white; cursor: pointer; width: 100%; text-align: left;">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center;">
                                    <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: none; stroke: currentColor; stroke-width: 2;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <div style="font-weight: 700; font-size: 1rem;">Tanggal: {{ \Carbon\Carbon::parse($visit->tanggal_masuk)->translatedFormat('d F Y') }}</div>
                                    <div style="font-size: 0.8rem; color: var(--text-muted);">Kunjungan MCU</div>
                                </div>
                            </div>
                            <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: none; stroke: var(--secondary); stroke-width: 2;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @endforeach
                </div>

                <!-- Modal Captcha -->
                <div id="captchaModal" style="display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); align-items: center; justify-content: center;">
                    <div style="background: white; padding: 25px; border-radius: 12px; width: 90%; max-width: 350px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                        <h3 style="margin-bottom: 10px; color: var(--primary); font-size: 1.2rem;">Verifikasi Keamanan</h3>
                        <p style="margin-bottom: 10px; font-size: 0.85rem; color: var(--text-muted);">Selesaikan soal matematika di bawah ini untuk mengunduh PDF.</p>
                        
                        <div id="captchaError" style="display: none; margin-bottom: 15px; color: #dc2626; font-size: 0.85rem; background: rgba(239, 68, 68, 0.1); padding: 8px; border-radius: 6px;"></div>

                        <form id="captchaForm" onsubmit="submitCaptcha(event)">
                            <div style="margin-bottom: 15px; display: flex; flex-direction: column; align-items: center; gap: 10px;">
                                <div style="background: var(--bg-light); padding: 10px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                    <img src="{{ captcha_src('math') }}" alt="captcha" id="captchaImage" style="border-radius: 5px; cursor: pointer;" onclick="refreshCaptcha()" title="Klik untuk memuat ulang captcha">
                                </div>
                                <span style="font-size: 0.75rem; color: var(--text-muted);">Klik gambar untuk memuat ulang</span>
                            </div>
                            
                            <input type="text" id="captchaInput" name="captcha" required class="form-input" placeholder="Masukkan jawaban" style="margin-bottom: 20px; text-align: center; font-weight: bold; font-size: 1.1rem; letter-spacing: 2px;" autocomplete="off">
                            
                            <div style="display: flex; gap: 10px;">
                                <button type="button" onclick="closeCaptchaModal()" class="btn-submit" style="background: #f1f5f9; color: #475569; flex: 1;">Batal</button>
                                <button type="submit" id="btnSubmitCaptcha" class="btn-submit" style="flex: 1;">Unduh</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    let currentActionUrl = '';

                    function openCaptchaModal(actionUrl) {
                        currentActionUrl = actionUrl;
                        document.getElementById('captchaError').style.display = 'none';
                        document.getElementById('captchaInput').value = '';
                        document.getElementById('captchaModal').style.display = 'flex';
                        refreshCaptcha();
                    }

                    function closeCaptchaModal() {
                        document.getElementById('captchaModal').style.display = 'none';
                        document.getElementById('captchaInput').value = '';
                    }

                    function refreshCaptcha() {
                        document.getElementById('captchaImage').src = '{{ captcha_src('math') }}' + Math.random();
                    }

                    async function submitCaptcha(e) {
                        e.preventDefault();
                        const btn = document.getElementById('btnSubmitCaptcha');
                        const errorDiv = document.getElementById('captchaError');
                        const captchaVal = document.getElementById('captchaInput').value;

                        btn.disabled = true;
                        btn.innerHTML = 'Memproses...';
                        errorDiv.style.display = 'none';

                        try {
                            const response = await fetch('{{ route('hasil-mcu.validate-captcha') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({ captcha: captchaVal })
                            });

                            const data = await response.json();

                            if (response.ok && data.success) {
                                // Captcha valid! Open PDF and close modal
                                window.open(currentActionUrl, '_blank');
                                closeCaptchaModal();
                            } else {
                                // Invalid Captcha
                                errorDiv.innerHTML = data.message || data.errors?.captcha?.[0] || 'Jawaban Captcha tidak valid.';
                                errorDiv.style.display = 'block';
                                refreshCaptcha();
                                document.getElementById('captchaInput').value = '';
                                document.getElementById('captchaInput').focus();
                            }
                        } catch (err) {
                            errorDiv.innerHTML = 'Terjadi kesalahan, silakan coba lagi.';
                            errorDiv.style.display = 'block';
                        } finally {
                            btn.disabled = false;
                            btn.innerHTML = 'Unduh';
                        }
                    }
                </script>
                </div>
                <div style="margin-top: 20px; text-align: center;">
                    <a href="{{ url('pasien-mcu') }}" style="font-size: 0.9rem; color: var(--secondary); font-weight: 600; text-decoration: none;">&larr; Kembali ke Pencarian</a>
                </div>
            </div>
        @else
            <div class="form-card">
                <div class="form-card-title">
                    <svg viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Form Verifikasi Pasien
                </div>

                <form method="POST" action="{{ route('pasien-mcu') }}">
                    @csrf
                    <div class="form-grid">
                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-input"
                                value="{{ old('tanggal_lahir') }}" required>
                        </div>

                        <!-- Nomor MR -->
                        <div class="form-group">
                            <label class="form-label" for="no_mr">Nomor Rekam Medis (No. MR)</label>
                            <input type="text" id="no_mr" name="no_mr" class="form-input" placeholder="Contoh: 00123456"
                                value="{{ old('no_mr') }}" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <svg viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Hasil MCU
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} RSU Pekerja KBN. Seluruh hak cipta dilindungi. &mdash; <a
                href="{{ url('/') }}">Kembali ke Beranda</a></p>
    </footer>
</body>

</html>