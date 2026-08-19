<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Laporan Hasil Medical Check-Up (MCU) berdasarkan tanggal dan nasabah di RSU Pekerja KBN.">
    <meta name="robots" content="noindex, nofollow">
    <title>Hasil MCU - RSU Pekerja KBN</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

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
            --db-bg: #0f172a;
            --db-card: #1e2235;
            --db-header: #2b304c;
            --db-border: #2d354e;
            --db-text-light: #f8fafc;
            --db-text-gray: #94a3b8;
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
            padding: 52px 5% 36px;
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

        /* Filter Card */
        .filter-section {
            max-width: 1200px;
            margin: 0 auto 32px;
            padding: 0 5%;
            width: 100%;
        }

        .filter-card {
            background: var(--glass-card);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 32px 36px;
            box-shadow: var(--card-shadow);
        }

        .filter-card-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-card-title svg {
            width: 20px;
            height: 20px;
            stroke: var(--secondary);
            fill: none;
            stroke-width: 2;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group.full-width {
            grid-column: 1 / -1;
        }

        .filter-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-input {
            width: 100%;
            padding: 11px 15px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            font-family: inherit;
            color: var(--text-dark);
            background: white;
            transition: var(--transition);
            outline: none;
        }

        .filter-input:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        .filter-select-wrapper {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-type-select {
            width: 175px;
            flex-shrink: 0;
            padding: 11px 12px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.85rem;
            font-family: inherit;
            color: var(--text-dark);
            background: white;
            outline: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-type-select:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        /* Custom multi-select */
        .nasabah-select-container {
            flex: 1;
            position: relative;
        }

        .nasabah-multiselect {
            width: 100%;
            min-height: 44px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 6px 10px;
            cursor: pointer;
            background: white;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            align-items: center;
            transition: var(--transition);
        }

        .nasabah-multiselect:focus-within {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        .nasabah-tag {
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 6px;
            padding: 3px 8px;
            font-size: 0.8rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nasabah-tag button {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--primary);
            font-size: 1rem;
            line-height: 1;
            padding: 0;
        }

        .nasabah-placeholder {
            color: #94a3b8;
            font-size: 0.88rem;
        }

        .nasabah-dropdown {
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            right: 0;
            background: white;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 12px 40px -10px rgba(0, 0, 0, 0.15);
            z-index: 500;
            max-height: 240px;
            overflow: hidden;
            display: none;
            flex-direction: column;
        }

        .nasabah-dropdown.open {
            display: flex;
        }

        .nasabah-search-input {
            padding: 10px 14px;
            border: none;
            border-bottom: 1px solid #f1f5f9;
            font-family: inherit;
            font-size: 0.88rem;
            outline: none;
            width: 100%;
            color: var(--text-dark);
        }

        .nasabah-list {
            overflow-y: auto;
            max-height: 190px;
        }

        .nasabah-option {
            padding: 9px 14px;
            cursor: pointer;
            font-size: 0.88rem;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.15s;
        }

        .nasabah-option:hover {
            background: var(--secondary-light);
        }

        .nasabah-option.selected {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
        }

        .nasabah-option input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--secondary);
            flex-shrink: 0;
        }

        #nasabah_ids {
            display: none;
        }

        /* Buttons */
        .filter-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-reset {
            padding: 11px 22px;
            border-radius: 10px;
            border: 1.5px solid #e2e8f0;
            background: white;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-reset:hover {
            border-color: #cbd5e1;
            color: var(--text-dark);
        }

        .btn-search {
            padding: 11px 28px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, var(--secondary) 0%, #059669 100%);
            color: white;
            font-size: 0.9rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-search:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px -5px rgba(16, 185, 129, 0.5);
        }

        .btn-search svg,
        .btn-reset svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
        }

        /* Results */
        .results-section {
            max-width: 1200px;
            margin: 0 auto 60px;
            padding: 0 5%;
            width: 100%;
        }

        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 12px;
        }

        .results-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .results-count {
            background: linear-gradient(135deg, var(--secondary) 0%, #059669 100%);
            color: white;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .btn-export {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 18px;
            border: 1.5px solid var(--primary);
            border-radius: 9px;
            background: white;
            color: var(--primary);
            font-size: 0.85rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-export:hover {
            background: var(--primary);
            color: white;
        }

        .btn-export svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
        }

        /* Print PDF button */
        .btn-print-pdf {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 13px;
            border-radius: 7px;
            border: none;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            font-size: 0.78rem;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-print-pdf:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px -4px rgba(239, 68, 68, 0.5);
        }

        .btn-print-pdf svg {
            width: 13px;
            height: 13px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
        }

        /* DB Table */
        .db-container {
            background: var(--db-bg);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 20px 60px -15px rgba(15, 23, 42, 0.3);
        }

        .db-table-wrapper {
            overflow-x: auto;
        }

        .db-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .db-table thead tr {
            background: var(--db-header);
        }

        .db-table thead th {
            padding: 15px 18px;
            text-align: left;
            color: var(--db-text-gray);
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            white-space: nowrap;
            border-bottom: 1px solid var(--db-border);
            cursor: pointer;
            user-select: none;
            transition: var(--transition);
        }

        .db-table thead th:hover {
            color: var(--db-text-light);
        }

        .db-table thead th.sorted {
            color: var(--secondary);
        }

        .db-table thead th .sort-icon {
            display: inline-block;
            margin-left: 4px;
            opacity: 0.4;
            font-size: 0.7rem;
            transition: var(--transition);
        }

        .db-table thead th.sorted .sort-icon {
            opacity: 1;
        }

        .db-table tbody tr {
            border-bottom: 1px solid rgba(45, 53, 78, 0.5);
            transition: background 0.15s;
        }

        .db-table tbody tr:last-child {
            border-bottom: none;
        }

        .db-table tbody tr:hover {
            background: rgba(16, 185, 129, 0.05);
        }

        .db-table tbody td {
            padding: 14px 18px;
            color: var(--db-text-light);
            vertical-align: middle;
            white-space: nowrap;
        }

        .no-row {
            background: var(--db-card);
            color: var(--db-text-gray);
            font-size: 0.8rem;
            font-weight: 600;
            text-align: center;
        }

        .badge-nasabah {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border-radius: 6px;
            padding: 3px 10px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-mr {
            display: inline-block;
            background: rgba(245, 158, 11, 0.12);
            color: #fbbf24;
            border-radius: 5px;
            padding: 2px 8px;
            font-size: 0.78rem;
            font-weight: 700;
            font-family: monospace;
        }

        .badge-paket {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(99, 102, 241, 0.15);
            color: #a5b4fc;
            border-radius: 6px;
            padding: 3px 10px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .tanggal-cell {
            color: var(--db-text-gray);
            font-size: 0.84rem;
        }

        .empty-state-row td {
            padding: 60px 20px;
            text-align: center;
        }

        .empty-state-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
        }

        .empty-state-inner svg {
            width: 48px;
            height: 48px;
            stroke: #475569;
            fill: none;
            stroke-width: 1.5;
        }

        .empty-state-inner p {
            color: #475569;
            font-size: 0.9rem;
        }

        .empty-state-inner p.title {
            color: #64748b;
            font-weight: 700;
            font-size: 1rem;
        }

        .init-state {
            background: var(--db-card);
            border-radius: 18px;
            padding: 60px 30px;
            text-align: center;
            box-shadow: 0 20px 60px -15px rgba(15, 23, 42, 0.2);
        }

        .init-state svg {
            width: 56px;
            height: 56px;
            stroke: #334155;
            fill: none;
            stroke-width: 1.5;
            margin-bottom: 18px;
        }

        .init-state p.title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #64748b;
            margin-bottom: 8px;
        }

        .init-state p.desc {
            font-size: 0.9rem;
            color: #475569;
        }

        /* Error */
        .error-outer {
            max-width: 1200px;
            margin: 0 auto 20px;
            padding: 0 5%;
        }

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
        }

        .error-notice svg {
            width: 20px;
            height: 20px;
            stroke: #dc2626;
            fill: none;
            stroke-width: 2;
            flex-shrink: 0;
        }

        /* Table Search */
        .table-search-wrapper {
            position: relative;
            margin-bottom: 0;
        }

        .table-search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 17px;
            height: 17px;
            stroke: var(--text-muted);
            fill: none;
            stroke-width: 2;
            pointer-events: none;
        }

        .table-search-input {
            width: 100%;
            max-width: 340px;
            padding: 10px 14px 10px 42px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.88rem;
            font-family: inherit;
            color: var(--text-dark);
            background: white;
            outline: none;
            transition: var(--transition);
        }

        .table-search-input:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
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

        @media (max-width: 1024px) {
            .filter-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 700px) {
            .top-bar {
                display: none;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .filter-card {
                padding: 24px 20px;
            }

            .filter-select-wrapper {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-type-select {
                width: 100%;
            }

            .results-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .table-search-input {
                max-width: 100%;
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
            <a href="{{ url('hasil-mcu') }}" class="active">Hasil MCU</a>
            <a href="{{ url('/') }}#kontak">Hubungi Kami</a>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <span class="page-tag">Medical Check-Up</span>
        <h1 class="page-title">Laporan <span>Hasil MCU</span></h1>
        <p class="page-desc">Lihat data registrasi Medical Check-Up berdasarkan rentang tanggal dan filter nasabah yang
            diinginkan.</p>
    </div>

    <!-- Error Notice -->
    @if(isset($connectionError) && $connectionError)
        <div class="error-outer">
            <div class="error-notice">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <span>{{ $connectionError }}</span>
            </div>
        </div>
    @endif

    <!-- Filter Form -->
    <div class="filter-section">
        <div class="filter-card">
            <div class="filter-card-title">
                <svg viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z" />
                </svg>
                Filter Data MCU
            </div>

            <form method="GET" action="{{ url('/hasil-mcu') }}" id="mcu-filter-form">
                <div class="filter-grid">
                    <!-- Tanggal Awal -->
                    <div class="filter-group">
                        <label class="filter-label" for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" id="tanggal_awal" name="tanggal_awal" class="filter-input"
                            value="{{ request('tanggal_awal', now()->startOfMonth()->toDateString()) }}" required>
                    </div>

                    <!-- Tanggal Akhir -->
                    <div class="filter-group">
                        <label class="filter-label" for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="filter-input"
                            value="{{ request('tanggal_akhir', now()->endOfMonth()->toDateString()) }}" required>
                    </div>

                    <!-- Spacer col -->
                    <div class="filter-group"></div>

                    <!-- Filter Nasabah (full width, Select2) -->
                    <div class="filter-group full-width">
                        <label class="filter-label" for="nasabah_ids">Nasabah <span
                                style="font-weight:400;text-transform:none;font-size:0.75rem;color:#94a3b8;">(kosongkan
                                = semua nasabah)</span></label>
                        <select name="nasabah_ids[]" id="nasabah_ids" multiple="multiple" style="width:100%"
                            data-placeholder="Pilih nasabah... (kosong = semua)">
                            @foreach($nasabahList as $nasabah)
                                <option value="{{ $nasabah->id }}" {{ in_array($nasabah->id, (array) request('nasabah_ids', [])) ? 'selected' : '' }}>
                                    {{ $nasabah->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="filter-actions">
                    <a href="{{ url('/hasil-mcu') }}" class="btn-reset">
                        <svg viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Reset
                    </a>
                    <button type="submit" class="btn-search" id="btn-submit">
                        <svg viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        Tampilkan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Results -->
    <div class="results-section">
        @if(request()->has('tanggal_awal'))
            <div class="results-header">
                <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                    <span class="results-title">Hasil Pencarian</span>
                    <span class="results-count" id="result-count">{{ $results->count() }} data</span>
                </div>
                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
                    <div class="table-search-wrapper">
                        <svg class="table-search-icon" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" class="table-search-input" id="table-search" placeholder="Cari dalam tabel...">
                    </div>
                    @if($results->count() > 0)
                        <button class="btn-export" onclick="exportTableToCSV()">
                            <svg viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export CSV
                        </button>
                    @endif
                </div>
            </div>

            <div class="db-container">
                <div class="db-table-wrapper">
                    <table class="db-table" id="result-table">
                        <thead>
                            <tr>
                                <th style="width:46px;text-align:center;cursor:default;">#</th>
                                <th onclick="sortTable(1)">Tanggal Masuk <span class="sort-icon">↕</span></th>
                                <th onclick="sortTable(2)">Nasabah <span class="sort-icon">↕</span></th>
                                <th onclick="sortTable(3)">Nama Pasien <span class="sort-icon">↕</span></th>
                                <th onclick="sortTable(4)">No. MR <span class="sort-icon">↕</span></th>
                                <th onclick="sortTable(5)">Paket MCU <span class="sort-icon">↕</span></th>
                                <th style="text-align:center;width:110px;cursor:default;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @forelse($results as $i => $row)
                                <tr>
                                    <td class="no-row" style="text-align:center;font-size:0.8rem;color:#475569;">{{ $i + 1 }}
                                    </td>
                                    <td class="tanggal-cell">
                                        {{ \Carbon\Carbon::parse($row->tanggal_masuk)->format('d M Y') }}
                                    </td>
                                    <td><span class="badge-nasabah">{{ $row->nama_nasabah }}</span></td>
                                    <td style="color:var(--db-text-light);font-weight:500;">{{ $row->nama_pasien }}</td>
                                    <td><span class="badge-mr">{{ $row->no_mr }}</span></td>
                                    <td><span class="badge-paket">{{ $row->nama_paket }}</span></td>
                                    <td style="text-align:center;">
                                        <a href="{{ route('hasil-mcu.pdf', encrypt($row->id)) }}" target="_blank" class="btn-print-pdf"
                                            title="Cetak PDF Resume MCU">
                                            <svg viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                            </svg>
                                            Cetak PDF
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="empty-state-row">
                                    <td colspan="7">
                                        <div class="empty-state-inner">
                                            <svg viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="title">Tidak ada data ditemukan</p>
                                            <p>Tidak ada registrasi MCU pada rentang tanggal dan filter yang dipilih.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        @else
            <!-- Initial state -->
            <div class="init-state">
                <svg viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <p class="title">Silakan Tentukan Filter</p>
                <p class="desc">Tentukan rentang tanggal dan filter nasabah, lalu klik <strong>Tampilkan Data</strong>.</p>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} RSU Pekerja KBN. Seluruh hak cipta dilindungi. &mdash; <a
                href="{{ url('/') }}">Kembali ke Beranda</a></p>
    </footer>

    <script>
        // ─── Table Sort ────────────────────────────────────────────────────────
        let sortDir = {};

        function sortTable(colIndex) {
            const tbody = document.getElementById('table-body');
            if (!tbody) return;
            const rows = Array.from(tbody.querySelectorAll('tr:not(.empty-state-row)'));
            if (rows.length === 0) return;

            const asc = !sortDir[colIndex];
            sortDir = {};
            sortDir[colIndex] = asc;

            rows.sort((a, b) => {
                const aText = a.cells[colIndex]?.innerText.trim() ?? '';
                const bText = b.cells[colIndex]?.innerText.trim() ?? '';
                return asc ? aText.localeCompare(bText, 'id') : bText.localeCompare(aText, 'id');
            });

            rows.forEach(r => tbody.appendChild(r));

            // Update icons
            document.querySelectorAll('.db-table thead th').forEach((th, i) => {
                th.classList.remove('sorted');
                const icon = th.querySelector('.sort-icon');
                if (icon) icon.textContent = '↕';
                if (i === colIndex) {
                    th.classList.add('sorted');
                    if (icon) icon.textContent = asc ? '↑' : '↓';
                }
            });

            renumberRows();
        }

        function renumberRows() {
            const tbody = document.getElementById('table-body');
            if (!tbody) return;
            let n = 1;
            Array.from(tbody.querySelectorAll('tr:not(.empty-state-row)')).forEach(r => {
                if (r.style.display !== 'none') r.cells[0].textContent = n++;
            });
        }

        // ─── Table Live Search ─────────────────────────────────────────────────
        document.getElementById('table-search')?.addEventListener('input', function () {
            const q = this.value.toLowerCase();
            const tbody = document.getElementById('table-body');
            if (!tbody) return;
            let n = 1;
            let visible = 0;
            Array.from(tbody.querySelectorAll('tr:not(.empty-state-row)')).forEach(r => {
                const show = r.innerText.toLowerCase().includes(q);
                r.style.display = show ? '' : 'none';
                if (show) { r.cells[0].textContent = n++; visible++; }
            });
            const countEl = document.getElementById('result-count');
            if (countEl) countEl.textContent = visible + ' data';
        });

        // ─── Date Validation ───────────────────────────────────────────────────
        document.getElementById('tanggal_awal')?.addEventListener('change', function () {
            const akhir = document.getElementById('tanggal_akhir');
            if (akhir && this.value > akhir.value) akhir.value = this.value;
        });

        // ─── Export CSV ────────────────────────────────────────────────────────
        function exportTableToCSV() {
            const table = document.getElementById('result-table');
            if (!table) return;
            const rows = [];

            // Header
            const headers = [];
            table.querySelectorAll('thead th').forEach(th => {
                headers.push('"' + th.innerText.replace(/[↕↑↓]/g, '').trim() + '"');
            });
            rows.push(headers.join(','));

            // Body
            table.querySelectorAll('tbody tr:not(.empty-state-row)').forEach(tr => {
                if (tr.style.display === 'none') return;
                const cols = [];
                Array.from(tr.cells).forEach(td => cols.push('"' + td.innerText.trim().replace(/"/g, '""') + '"'));
                rows.push(cols.join(','));
            });

            const csv = rows.join('\n');
            const blob = new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            const ts = new Date().toISOString().slice(0, 19).replace(/[-:T]/g, '');
            a.href = url;
            a.download = `hasil_mcu_${ts}.csv`;
            a.click();
            URL.revokeObjectURL(url);
        }
    </script>

    <!-- jQuery + Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/id.js"></script>

    <style>
        /* ─── Select2 Custom Theme ─────────────────────────────────────────── */
        .select2-container--default .select2-selection--multiple {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            min-height: 44px;
            padding: 4px 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: white;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple,
        .select2-container--default.select2-container--open .select2-selection--multiple {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
            outline: none;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background: #ecfdf5;
            border: none;
            color: #064e3b;
            border-radius: 6px;
            padding: 2px 10px 2px 8px;
            font-size: 0.82rem;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 3px 4px 3px 0;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #064e3b;
            margin-right: 5px;
            font-size: 1rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #ef4444;
            background: transparent;
        }

        .select2-container--default .select2-selection--multiple .select2-search__field {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem;
            color: #0f172a;
            margin-top: 4px;
        }

        .select2-dropdown {
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 12px 40px -10px rgba(0, 0, 0, 0.15);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow: hidden;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 0.88rem;
            outline: none;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.12);
        }

        .select2-container--default .select2-results__option {
            padding: 9px 14px;
            font-size: 0.88rem;
            color: #0f172a;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background: #f0fdf4;
            color: #064e3b;
            font-weight: 600;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background: #ecfdf5;
            color: #064e3b;
            font-weight: 600;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
            color: #94a3b8;
            font-size: 0.88rem;
        }
    </style>

    <script>
        // Init Select2
        $(document).ready(function () {
            $('#nasabah_ids').select2({
                placeholder: 'Pilih nasabah... (kosong = semua nasabah)',
                allowClear: true,
                width: '100%',
                language: {
                    noResults: function () { return 'Nasabah tidak ditemukan'; },
                    searching: function () { return 'Mencari...'; }
                }
            });
        });
    </script>
</body>

</html>