<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Verifikasi 2FA - RSUP KBN</title>
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
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --glass-card: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.6);
            --card-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.12);
            --transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                background-color 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                color 0.35s cubic-bezier(0.16, 1, 0.3, 1),
                opacity 0.35s cubic-bezier(0.16, 1, 0.3, 1);
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
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 20px;
        }

        /* --- Animated Background Orbs --- */
        .bg-glow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
            pointer-events: none;
        }

        .orb {
            position: absolute;
            width: 45vw;
            height: 45vw;
            max-width: 600px;
            max-height: 600px;
            border-radius: 50%;
            filter: blur(140px);
            opacity: 0.15;
            animation: floatOrb 25s infinite alternate ease-in-out;
        }

        .orb-1 {
            background: var(--primary);
            top: -10%;
            left: -10%;
            animation-duration: 20s;
        }

        .orb-2 {
            background: var(--secondary);
            bottom: -10%;
            right: -10%;
            animation-duration: 25s;
            animation-delay: -5s;
        }

        @keyframes floatOrb {
            0% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(8%, 12%) scale(1.15);
            }
            100% {
                transform: translate(-5%, -8%) scale(0.9);
            }
        }

        /* --- Container --- */
        .verify-container {
            width: 100%;
            max-width: 420px;
            z-index: 10;
        }

        .verify-card {
            background: var(--glass-card);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: var(--card-shadow);
            text-align: center;
        }

        .logo-img {
            height: 72px;
            width: auto;
            border-radius: 12px;
            margin-bottom: 20px;
            border: 2px solid white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .verify-header h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .verify-header p {
            font-size: 0.88rem;
            color: var(--text-muted);
            margin-bottom: 30px;
            font-weight: 500;
        }

        /* --- Form --- */
        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: var(--primary);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1.5rem;
            letter-spacing: 6px;
            font-weight: 700;
            text-align: center;
            color: var(--text-dark);
            outline: none;
            transition: var(--transition);
            background: white;
        }

        .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(6, 78, 59, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-bottom: 15px;
            will-change: transform;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(6, 78, 59, 0.25);
        }

        .logout-form {
            display: inline;
        }

        .btn-logout {
            background: none;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.85rem;
            font-weight: 700;
            color: #ef4444;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-logout:hover {
            color: #b91c1c;
        }

        /* --- Alert --- */
        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fee2e2;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-error svg {
            flex-shrink: 0;
            stroke: currentColor;
            fill: none;
            width: 16px;
            height: 16px;
        }
    </style>
</head>

<body>

    <div class="bg-glow">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
    </div>

    <div class="verify-container">
        <div class="verify-card">
            <img src="{{ asset('images/logo.png') }}" alt="Logo RSUP" class="logo-img">

            <div class="verify-header">
                <h2>Verifikasi Dua Langkah</h2>
                <p>Masukkan 6 digit kode dari aplikasi Google Authenticator Anda</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert-error">
                    <svg viewBox="0 0 24 24" stroke-width="2.5">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('2fa.verify') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="code">Kode Verifikasi</label>
                    <input type="text" name="code" id="code" class="form-control" placeholder="000000" maxlength="6" pattern="\d{6}" required autocomplete="off" autofocus>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Verifikasi</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>
            </form>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Batal dan Keluar</span>
                </button>
            </form>
        </div>
    </div>

</body>

</html>
