<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') - Admin Panel RSU Pekerja</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #064e3b;
            /* Dark Emerald Green */
            --primary-hover: #042f2e;
            --primary-light: #e6f4ea;
            --secondary: #10b981;
            /* Teal/Green */
            --secondary-light: #ecfdf5;
            --accent: #f59e0b;
            /* Warning Amber */
            --danger: #ef4444;
            /* Danger Red */
            --danger-hover: #dc2626;
            --text-dark: #0f172a;
            /* Navy Slate */
            --text-muted: #64748b;
            /* Muted Gray */
            --bg-light: #f8fafc;
            --sidebar-bg: #052e16;
            /* Deep Forest Green */
            --sidebar-active: #047857;
            /* Emerald 700 */
            --card-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.04), 0 8px 16px -6px rgba(15, 23, 42, 0.04);
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
            display: flex;
            min-height: 100vh;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        /* --- Sidebar --- */
        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 20px rgba(5, 46, 22, 0.1);
            position: sticky;
            top: 0;
            height: 100vh;
            z-index: 10;
        }

        .sidebar-header {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.15);
        }

        .logo-icon-wrapper {
            background: linear-gradient(135deg, var(--secondary), #059669);
            padding: 6px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon {
            width: 20px;
            height: 20px;
            stroke: white;
            fill: none;
            stroke-width: 2.5;
        }

        .logo-text-wrapper {
            display: flex;
            flex-direction: column;
        }

        .logo-title {
            font-size: 0.95rem;
            font-weight: 800;
            color: white;
            line-height: 1.2;
            letter-spacing: 0.5px;
        }

        .logo-subtitle {
            font-size: 0.65rem;
            font-weight: 700;
            color: var(--secondary);
            letter-spacing: 0.5px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .sidebar-nav a svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            transition: var(--transition);
        }

        .sidebar-nav a:hover {
            color: white;
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar-nav a.active {
            background: var(--sidebar-active);
            color: white;
            box-shadow: 0 4px 12px rgba(4, 120, 87, 0.3);
        }

        .sidebar-nav a.active svg {
            color: white;
        }

        .sidebar-footer {
            padding: 20px 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.4);
            background: rgba(0, 0, 0, 0.1);
        }

        /* --- Main Content --- */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            /* Prevent flex children from overflowing */
        }

        .topbar {
            background: white;
            padding: 18px 40px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f1f5f9;
        }

        .topbar-left h2 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.2;
        }

        .user-role {
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            background: var(--secondary);
            border-radius: 50%;
            display: inline-block;
        }

        .content {
            padding: 40px;
            flex: 1;
            overflow-y: auto;
        }

        /* --- Cards --- */
        .card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            margin-bottom: 25px;
            border: 1px solid #f1f5f9;
        }

        /* --- Forms --- */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: var(--primary);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            color: var(--text-dark);
            outline: none;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* --- Buttons --- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(6, 78, 59, 0.15);
            will-change: transform;
        }

        .btn:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(6, 78, 59, 0.2);
        }

        .btn-secondary {
            background: #64748b;
            box-shadow: 0 4px 10px rgba(100, 116, 139, 0.15);
        }

        .btn-secondary:hover {
            background: #475569;
            box-shadow: 0 6px 14px rgba(100, 116, 139, 0.2);
        }

        .btn-warning {
            background: var(--accent);
            color: white;
            box-shadow: 0 4px 10px rgba(245, 158, 11, 0.15);
        }

        .btn-warning:hover {
            background: #d97706;
            box-shadow: 0 6px 14px rgba(245, 158, 11, 0.2);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.15);
        }

        .btn-danger:hover {
            background: var(--danger-hover);
            box-shadow: 0 6px 14px rgba(239, 68, 68, 0.2);
        }

        /* --- Tables --- */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            margin-top: 15px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            background: white;
        }

        th,
        td {
            padding: 16px 20px;
            font-size: 0.9rem;
        }

        th {
            background-color: #f1f5f9;
            color: var(--primary);
            font-weight: 800;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            border-bottom: 1px solid #e2e8f0;
            color: var(--text-dark);
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        .flex {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        /* --- Alerts --- */
        .alert-success {
            background: var(--secondary-light);
            color: #065f46;
            border-left: 4px solid var(--secondary);
            padding: 16px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.05);
        }

        /* --- Empty State --- */
        .empty-row-text {
            text-align: center;
            color: var(--text-muted);
            padding: 30px !important;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo RSUP" class="logo-img"
                style="height: 40px; width: auto; border-radius: 6px; background: white; padding: 2px;">
            <div class="logo-text-wrapper">
                <span class="logo-title">RSUP Admin</span>
                <span class="logo-subtitle">KBN - RSUP</span>
            </div>
        </div>
        <div class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="9" rx="1"></rect>
                    <rect x="14" y="3" width="7" height="5" rx="1"></rect>
                    <rect x="14" y="12" width="7" height="9" rx="1"></rect>
                    <rect x="3" y="16" width="7" height="5" rx="1"></rect>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.doctors.index') }}"
                class="{{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
                <span>Jadwal Dokter</span>
            </a>
            <a href="{{ route('admin.promos.index') }}"
                class="{{ request()->routeIs('admin.promos.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                    <line x1="7" y1="7" x2="7.01" y2="7"></line>
                </svg>
                <span>Promo Layanan</span>
            </a>
            <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                <span>Berita & Informasi</span>
            </a>
            <a href="{{ route('admin.slides.index') }}"
                class="{{ request()->routeIs('admin.slides.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                    <polyline points="21 15 16 10 5 21"></polyline>
                </svg>
                <span>Kelola Carousel</span>
            </a>
            <a href="{{ route('admin.facilities.index') }}"
                class="{{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                    <path d="M8 14h.01"></path>
                    <path d="M12 14h.01"></path>
                    <path d="M16 14h.01"></path>
                    <path d="M8 18h.01"></path>
                    <path d="M12 18h.01"></path>
                    <path d="M16 18h.01"></path>
                </svg>
                <span>Kelola Layanan</span>
            </a>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('admin.users.index') }}"
                    class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>Kelola User</span>
                </a>
            @endif
            <a href="{{ url('/') }}" target="_blank"
                style="margin-top: auto; border: 1.5px dashed rgba(255,255,255,0.15); background: rgba(255,255,255,0.02);">
                <svg viewBox="0 0 24 24">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
                <span>Lihat Web Publik</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                style="border: 1.5px solid rgba(239, 68, 68, 0.2); background: rgba(239, 68, 68, 0.05); color: #ef4444;">
                <svg viewBox="0 0 24 24" style="stroke: #ef4444;">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                    <polyline points="16 17 21 12 16 7"></polyline>
                    <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <span>Keluar (Logout)</span>
            </a>
        </div>
        <div class="sidebar-footer">
            <span>&copy; 2026 RSUP KBN</span>
        </div>
    </div>
    <div class="main-content">
        <div class="topbar">
            <div class="topbar-left">
                <h2>@yield('title')</h2>
            </div>
            <div class="topbar-right">
                <div class="user-profile">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}</div>
                    <div class="user-info">
                        <span class="user-name">{{ auth()->user()->name ?? 'Administrator' }}</span>
                        <span class="user-role">
                            <span class="status-dot"></span>
                            {{ auth()->check() && auth()->user()->role === 'admin' ? 'Admin' : 'Staf' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            @if(session('success'))
                <div class="alert-success">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</body>

</html>