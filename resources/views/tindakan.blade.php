<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cari dan lihat estimasi biaya tindakan medis di Rumah Sakit Umum Pekerja (RSUP) KBN. Informasi transparan dan lengkap untuk kebutuhan perawatan Anda.">
    <meta name="keywords"
        content="Biaya Tindakan Medis, Tarif Rumah Sakit, RSUP KBN, Harga Operasi, Biaya Rawat Inap, Layanan Kesehatan Jakarta">
    <meta name="robots" content="index, follow">
    <title>Estimasi Biaya Tindakan Medis - RSU Pekerja KBN</title>
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
            --danger-hover: #dc2626;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --glass-card: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.6);
            --card-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
            --transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);

            /* Dark Medical Database Theme variables (Gambar 1 style) */
            --db-bg: #0f172a;
            /* Deep Slate Blue */
            --db-card: #1e2235;
            /* Dark Card Grey-Blue */
            --db-header: #2b304c;
            /* Header Blue-Grey */
            --db-border: #2d354e;
            /* Border Blue */
            --db-text-light: #f8fafc;
            --db-text-gray: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            color: var(--text-dark);
            background-color: var(--bg-light);
            min-height: 100vh;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        /* --- Background Glow --- */
        .bg-glow {
            position: fixed;
            top: -20vh;
            left: -20vw;
            width: 140vw;
            height: 140vh;
            z-index: -2;
            pointer-events: none;
            background-color: #f8fafc;
            background-image:
                radial-gradient(at 0% 0%, rgba(16, 185, 129, 0.08) 0px, transparent 50%),
                radial-gradient(at 50% 0%, rgba(6, 78, 59, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(245, 158, 11, 0.03) 0px, transparent 50%);
            opacity: 0.8;
        }

        /* --- Top Bar --- */
        .top-bar {
            background-color: #0b2e24;
            color: rgba(255, 255, 255, 0.9);
            padding: 10px 5%;
            font-size: 0.825rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .top-bar-left,
        .top-bar-right {
            display: flex;
            gap: 24px;
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
            transition: var(--transition);
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

        /* --- Navbar --- */
        nav {
            background: var(--glass-card);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            padding: 1.2rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px -10px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
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
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.2;
            letter-spacing: 0.5px;
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
            gap: 24px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
            padding: 6px 0;
            transition: var(--transition);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--secondary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .nav-links a:hover::after,
        .nav-links a.active::after {
            transform: scaleX(1);
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary);
        }

        .btn-cta-nav {
            background: var(--secondary);
            color: white !important;
            padding: 10px 20px !important;
            border-radius: 30px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
            transition: var(--transition) !important;
        }

        .btn-cta-nav:hover {
            background: var(--secondary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.3);
        }

        .btn-cta-nav::after {
            display: none !important;
        }

        .mobile-toggle {
            display: none;
            cursor: pointer;
        }

        /* --- Header Section --- */
        .page-header {
            padding: 3.5rem 5% 2.5rem 5%;
            text-align: center;
            max-width: 1000px;
            margin: 0 auto;
        }

        .page-tag {
            background: var(--primary-light);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 12px;
        }

        .page-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .page-desc {
            font-size: 1.05rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* --- Search Area --- */
        .search-container {
            max-width: 1200px;
            width: 90%;
            margin: 0 auto 2rem auto;
            position: relative;
        }

        .search-box-wrapper {
            position: relative;
            box-shadow: var(--card-shadow);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--glass-border);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            stroke: var(--text-muted);
            fill: none;
            stroke-width: 2.5;
            pointer-events: none;
        }

        .search-input {
            width: 100%;
            padding: 18px 20px 18px 56px;
            border: none;
            outline: none;
            background: white;
            font-size: 1.05rem;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
        }

        .search-input:focus {
            background: var(--primary-light);
        }

        /* --- Database Table Area (Gambar 1 style) --- */
        .db-container {
            max-width: 1200px;
            width: 90%;
            margin: 0 auto 5rem auto;
            background-color: var(--db-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.3);
            border: 1px solid var(--db-border);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table.db-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        table.db-table th {
            background-color: var(--db-header);
            color: var(--db-text-light);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 20px 24px;
            border-bottom: 2px solid var(--db-border);
            user-select: none;
        }

        table.db-table th.sortable {
            cursor: pointer;
            position: relative;
        }

        table.db-table th.sortable::after {
            content: ' ↕';
            font-size: 0.75rem;
            opacity: 0.5;
            margin-left: 6px;
        }

        table.db-table td {
            color: var(--db-text-light);
            padding: 20px 24px;
            border-bottom: 1px solid var(--db-border);
            font-size: 0.975rem;
            font-weight: 500;
            transition: var(--transition);
        }

        table.db-table tr.db-row {
            cursor: pointer;
            transition: var(--transition);
        }

        table.db-table tr.db-row:hover {
            background-color: var(--db-card);
        }

        table.db-table tr.db-row:hover td {
            color: var(--secondary);
            transform: translateX(4px);
        }

        table.db-table td.jenis-col {
            color: var(--db-text-gray);
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* --- Empty state / Error Notice --- */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            color: var(--db-text-gray);
        }

        .empty-state svg {
            width: 48px;
            height: 48px;
            stroke: var(--db-text-gray);
            fill: none;
            stroke-width: 1.5;
            margin-bottom: 16px;
        }

        .empty-state h3 {
            color: var(--db-text-light);
            font-size: 1.25rem;
            margin-bottom: 8px;
        }

        .error-notice {
            background: #fef2f2;
            border: 1px solid #fee2e2;
            color: #b91c1c;
            padding: 16px 24px;
            border-radius: 12px;
            max-width: 1200px;
            width: 90%;
            margin: 0 auto 2rem auto;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .error-notice svg {
            width: 20px;
            height: 20px;
            stroke: #b91c1c;
            fill: none;
            stroke-width: 2;
            flex-shrink: 0;
        }

        /* --- Premium Details Modal Popup --- */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.35s ease;
        }

        .modal.active {
            display: flex;
            opacity: 1;
            pointer-events: auto;
        }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            transition: all 0.35s ease;
        }

        .modal-container {
            position: relative;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            width: 100%;
            max-width: 550px;
            max-height: 90vh;
            z-index: 10;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 30px 60px -15px rgba(15, 23, 42, 0.25);
            transform: translateY(30px) scale(0.95);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .modal.active .modal-container {
            transform: translateY(0) scale(1);
        }

        .modal-header {
            padding: 24px 30px 20px 30px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-shrink: 0;
        }

        .modal-title-wrapper h3 {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.3;
            margin-bottom: 4px;
        }

        .modal-title-wrapper span {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .modal-close {
            background: none;
            border: none;
            cursor: pointer;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.03);
            color: var(--text-dark);
            transition: var(--transition);
        }

        .modal-close:hover {
            background-color: var(--danger-hover);
            color: white;
            transform: rotate(90deg);
        }

        .modal-close svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
        }

        .modal-body {
            padding: 30px;
            overflow-y: auto;
            flex: 1;
            -webkit-overflow-scrolling: touch;
        }

        .modal-loader {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
            gap: 16px;
        }

        .modal-spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(16, 185, 129, 0.15);
            border-left-color: var(--secondary);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .modal-detail-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.06);
        }

        .modal-detail-table th {
            background-color: #f1f5f9;
            color: var(--text-dark);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            padding: 16px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        }

        .modal-detail-table td {
            padding: 16px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .modal-detail-table tr:last-child td {
            border-bottom: none;
        }

        .modal-detail-table td.price-cell {
            color: var(--secondary-hover);
            font-weight: 800;
            font-size: 1.05rem;
            text-align: right;
        }

        .modal-footer {
            padding: 20px 30px 24px 30px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: flex-end;
            flex-shrink: 0;
        }

        .btn-modal-close {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-modal-close:hover {
            background-color: var(--primary-hover);
        }

        /* --- Footer (Consistent with welcome page) --- */
        footer {
            background: #0b2e24;
            color: rgba(255, 255, 255, 0.7);
            padding: 5rem 5% 2rem 5%;
            position: relative;
            margin-top: auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr 0.8fr 1.2fr;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto 3rem auto;
        }

        .footer-col h3 {
            color: white;
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: var(--secondary);
        }

        .footer-desc {
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 12px;
        }

        .social-icon {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition);
            text-decoration: none;
        }

        .social-icon:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        .social-icon svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.95rem;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--secondary);
            transform: translateX(4px);
        }

        .footer-col p {
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .footer-bottom {
            max-width: 1400px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            font-size: 0.875rem;
        }

        /* --- Chatbot Styles (Consistent with layout) --- */
        .chatbot-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 10px 25px rgba(6, 78, 59, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            z-index: 1999;
            transition: var(--transition);
        }

        .chatbot-btn:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 30px rgba(6, 78, 59, 0.45);
        }

        .chatbot-btn svg {
            width: 28px;
            height: 28px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
        }

        .chatbot-widget {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 380px;
            height: 520px;
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
            z-index: 1999;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            transform: scale(0.9) translateY(20px);
            opacity: 0;
            pointer-events: none;
            transition: var(--transition);
        }

        .chatbot-widget.active {
            transform: scale(1) translateY(0);
            opacity: 1;
            pointer-events: auto;
        }

        .chatbot-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chatbot-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chatbot-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: bold;
            font-size: 1.1rem;
        }

        .chatbot-status {
            font-size: 0.725rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .chatbot-close {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        .chatbot-close svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2.5;
        }

        .chatbot-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background: #f8fafc;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .chat-msg {
            max-width: 80%;
            padding: 12px 16px;
            border-radius: 14px;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .chat-msg.bot {
            background: white;
            color: var(--text-dark);
            align-self: flex-start;
            border-bottom-left-radius: 4px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .chat-msg.user {
            background: var(--primary);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }

        .chat-msg.bot.loading {
            color: var(--text-muted);
            font-style: italic;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--secondary);
            display: inline-block;
            animation: pulse-dot 1.2s infinite;
        }

        @keyframes pulse-dot {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(0.8);
                opacity: 0.5;
            }
        }

        .chatbot-quick-replies {
            padding: 10px 20px;
            background: #f8fafc;
            display: flex;
            gap: 8px;
            overflow-x: auto;
            border-top: 1px solid rgba(0, 0, 0, 0.04);
        }

        .chatbot-quick-replies button {
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            white-space: nowrap;
            transition: var(--transition);
        }

        .chatbot-quick-replies button:hover {
            border-color: var(--secondary);
            color: var(--secondary-hover);
            background: var(--secondary-light);
        }

        .chatbot-footer {
            padding: 12px 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
            display: flex;
            gap: 12px;
            background: white;
        }

        .chatbot-input-wrapper {
            flex: 1;
            position: relative;
        }

        .chatbot-input-wrapper input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 30px;
            outline: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .chatbot-input-wrapper input:focus {
            border-color: var(--secondary);
        }

        .chatbot-send-btn {
            background: var(--primary);
            color: white;
            border: none;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .chatbot-send-btn:hover {
            background: var(--primary-hover);
            transform: scale(1.05);
        }

        .chatbot-send-btn svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
        }

        /* --- Media Queries --- */
        @media (max-width: 992px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            nav {
                padding: 1rem 5%;
            }

            .nav-links {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background: white;
                flex-direction: column;
                padding: 40px 5%;
                gap: 30px;
                align-items: stretch;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
                transition: var(--transition);
                z-index: 999;
            }

            .nav-links.active {
                left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .top-bar {
                display: none;
            }

            .chatbot-widget {
                width: calc(100vw - 40px);
                height: calc(100vh - 120px);
                right: 20px;
                bottom: 90px;
            }
        }

        /* --- Cart & Checkout Features --- */
        .btn-select-item-class {
            background-color: var(--secondary);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .btn-select-item-class:hover {
            background-color: var(--secondary-hover);
            transform: scale(1.1);
        }

        /* Floating Cart Button */
        .cart-btn-floating {
            position: fixed;
            bottom: 105px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0284c7, #0369a1);
            box-shadow: 0 10px 25px rgba(3, 105, 161, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            z-index: 1998;
            transition: var(--transition);
        }

        .cart-btn-floating:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 30px rgba(3, 105, 161, 0.45);
        }

        .cart-btn-floating svg {
            width: 28px;
            height: 28px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
        }

        .cart-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            min-width: 22px;
            height: 22px;
            font-size: 0.75rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            border: 2px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: var(--transition);
            transform: scale(0);
        }

        .cart-badge.active {
            transform: scale(1);
        }

        /* Cart Drawer (Sidebar) */
        .cart-drawer {
            position: fixed;
            top: 0;
            right: -420px;
            width: 420px;
            height: 100vh;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(20px);
            border-left: 1px solid var(--db-border);
            box-shadow: -10px 0 40px rgba(0, 0, 0, 0.3);
            z-index: 2001;
            display: flex;
            flex-direction: column;
            transition: right 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .cart-drawer.active {
            right: 0;
        }

        .cart-drawer-header {
            padding: 24px 30px;
            border-bottom: 1px solid var(--db-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-drawer-header h3 {
            color: white;
            font-size: 1.3rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-drawer-header h3 svg {
            width: 24px;
            height: 24px;
            stroke: var(--secondary);
            stroke-width: 2;
        }

        .cart-drawer-close {
            background: none;
            border: none;
            color: var(--db-text-gray);
            cursor: pointer;
            transition: var(--transition);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .cart-drawer-close:hover {
            color: white;
            background-color: var(--danger);
            transform: rotate(90deg);
        }

        .cart-drawer-close svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            stroke-width: 2.5;
            fill: none;
        }

        .cart-drawer-body {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .cart-empty-state {
            margin: auto;
            text-align: center;
            color: var(--db-text-gray);
        }

        .cart-empty-state svg {
            width: 48px;
            height: 48px;
            stroke: var(--db-text-gray);
            stroke-width: 1.5;
            fill: none;
            margin-bottom: 16px;
        }

        .cart-item {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--db-border);
            border-radius: 12px;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(20px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .cart-item:hover {
            border-color: var(--secondary);
            background: rgba(255, 255, 255, 0.05);
        }

        .cart-item-info {
            flex: 1;
            padding-right: 16px;
        }

        .cart-item-name {
            color: white;
            font-weight: 700;
            font-size: 0.95rem;
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .cart-item-class {
            color: var(--secondary);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cart-item-price {
            color: white;
            font-weight: 800;
            font-size: 1rem;
            margin-top: 4px;
        }

        .cart-item-remove {
            background: none;
            border: none;
            color: var(--db-text-gray);
            cursor: pointer;
            transition: var(--transition);
            padding: 8px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-item-remove:hover {
            color: var(--danger);
            background: rgba(239, 68, 68, 0.1);
        }

        .cart-item-remove svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            stroke-width: 2;
            fill: none;
        }

        .cart-drawer-footer {
            padding: 30px;
            border-top: 1px solid var(--db-border);
            background: rgba(9, 15, 30, 0.95);
        }

        .cart-total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .cart-total-label {
            color: var(--db-text-gray);
            font-weight: 600;
            font-size: 0.95rem;
        }

        .cart-total-price {
            color: white;
            font-weight: 800;
            font-size: 1.4rem;
        }

        .btn-checkout {
            width: 100%;
            background: linear-gradient(135deg, var(--secondary), var(--secondary-hover));
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: var(--transition);
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.35);
        }

        /* Checkout Wizard Modal */
        .checkout-step {
            display: none;
        }

        .checkout-step.active {
            display: block;
        }

        .checkout-summary-list {
            max-height: 150px;
            overflow-y: auto;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 10px;
            padding: 12px;
            background: #f8fafc;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .checkout-summary-item {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
            padding-bottom: 6px;
        }

        .checkout-summary-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--text-dark);
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 500;
            outline: none;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .payment-options-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .payment-option-card {
            border: 2px solid rgba(0, 0, 0, 0.06);
            border-radius: 12px;
            padding: 16px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--text-dark);
        }

        .payment-option-card svg {
            width: 24px;
            height: 24px;
            stroke: var(--text-muted);
            fill: none;
            stroke-width: 2;
        }

        .payment-option-card.active {
            border-color: var(--secondary);
            background-color: var(--secondary-light);
            color: var(--primary);
        }

        .payment-option-card.active svg {
            stroke: var(--secondary);
        }

        .checkout-success-view {
            text-align: center;
            padding: 20px 0;
        }

        .checkout-success-icon {
            width: 64px;
            height: 64px;
            background-color: var(--secondary-light);
            color: var(--secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
        }

        .checkout-success-icon svg {
            width: 36px;
            height: 36px;
            stroke: currentColor;
            stroke-width: 3;
            fill: none;
        }

        .checkout-success-view h4 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .checkout-success-view p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 24px;
        }

        .checkout-invoice-box {
            border: 1px dashed var(--db-border);
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            text-align: left;
            margin-bottom: 24px;
        }

        .invoice-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.875rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .invoice-row:last-child {
            margin-bottom: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
            padding-top: 8px;
            font-size: 1rem;
            font-weight: 800;
            color: var(--primary);
        }

        .invoice-label {
            color: var(--text-muted);
        }

        .btn-wa-booking {
            width: 100%;
            background-color: #25d366;
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            transition: var(--transition);
        }

        .btn-wa-booking:hover {
            background-color: #20ba5a;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.35);
        }

        .checkout-nav {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-checkout-prev {
            flex: 1;
            background-color: #f1f5f9;
            color: var(--text-dark);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-checkout-prev:hover {
            background-color: #e2e8f0;
        }

        .btn-checkout-next {
            flex: 2;
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-checkout-next:hover {
            background-color: var(--primary-hover);
        }

        /* Adjustment for mobile responsive layout */
        @media (max-width: 768px) {
            .cart-drawer {
                width: 100%;
                right: -100%;
            }

            .cart-btn-floating {
                bottom: 85px;
                right: 20px;
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Jl. Raya Cakung Cilincing No. 46, Sukapura, Jakarta Utara</span>
            </div>
            <div class="top-bar-item">
                <svg viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Pelayanan 24 Jam</span>
            </div>
        </div>
        <div class="top-bar-right">
            <div class="top-bar-item">
                <svg viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <a href="tel:02129484848" class="emergency-btn">UGD EMERGENCY: (021) 29484848</a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav>
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('images/danantara.png') }}" alt="Logo Danantara" class="logo-img"
                style="height: 40px; width: auto; margin-right: 8px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo RSUP" class="logo-img"
                style="height: 60px; width: auto; ">
            <div class="logo-text-wrapper">
                <span class="logo-title">RUMAH SAKIT UMUM PEKERJA</span>
                <span class="logo-subtitle">KBN - RSUP</span>
            </div>
        </a>

        <div class="nav-links" id="nav-links">
            <a href="{{ url('/') }}#home">Home</a>
            <a href="{{ url('/') }}#layanan">Layanan</a>
            <a href="{{ url('/') }}#promo">Promo</a>
            <a href="{{ url('/') }}#jadwal">Jadwal Dokter</a>
            <a href="{{ url('/') }}#berita">Berita</a>
            <a href="#" class="active">Estimasi Tindakan</a>
            <a href="{{ url('/') }}#kontak">Hubungi Kami</a>
            <a href="https://wa.me/6285777789022" target="_blank" class="btn-cta-nav">Pendaftaran WA</a>
        </div>

        <div class="mobile-toggle" id="mobile-toggle">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" style="width: 28px; height: 28px; color: var(--primary);">
                <line x1="4" y1="12" x2="20" y2="12"></line>
                <line x1="4" y1="6" x2="20" y2="6"></line>
                <line x1="4" y1="18" x2="20" y2="18"></line>
            </svg>
        </div>
    </nav>

    <!-- Page Title Area -->
    <div class="page-header">
        <span class="page-tag">Transparansi Biaya</span>
        <h1 class="page-title">Harga & Tarif Tindakan Medis</h1>
        <p class="page-desc">Informasi lengkap tarif tindakan medis RSU Pekerja. Klik salah satu item tindakan untuk
            melihat rincian biaya per kelas perawatan.</p>
    </div>

    <!-- Search Input Area -->
    <div class="search-container">
        <div class="search-box-wrapper">
            <svg class="search-icon" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" id="tindakan-search" class="search-input"
                placeholder="Cari tindakan medis (contoh: Thorax, Laboratorium, Radiologi, Bedah)...">
        </div>
    </div>

    <!-- Graceful Error Notice -->
    @if(isset($connectionError) && $connectionError)
        <div class="error-notice">
            <svg viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span>{{ $connectionError }}</span>
        </div>
    @endif

    <!-- Database Table Area -->
    <div class="db-container">
        <div class="table-responsive">
            <table class="db-table" id="tindakan-table">
                <thead>
                    <tr>
                        <th class="sortable" onclick="sortTable(0)">Nama Tindakan</th>
                        <th class="sortable" onclick="sortTable(1)">Jenis Tindakan</th>
                        <th style="text-align: center; width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($list_tindakan as $tindakan)
                        <tr class="db-row" data-id="{{ $tindakan->id }}"
                            onclick="showDetailModal('{{ $tindakan->id }}', '{{ addslashes($tindakan->nama) }}', '{{ addslashes($tindakan->nama_jenis) }}')">
                            <td>{{ $tindakan->nama }}</td>
                            <td class="jenis-col">{{ $tindakan->nama_jenis }}</td>
                            <td style="text-align: center;" onclick="event.stopPropagation()">
                                <button class="btn-select-item-class"
                                    style="width: auto; padding: 6px 14px; font-size: 0.8rem; font-weight: 700; border-radius: 8px;"
                                    onclick="showDetailModal('{{ $tindakan->id }}', '{{ addslashes($tindakan->nama) }}', '{{ addslashes($tindakan->nama_jenis) }}')">
                                    + Pilih
                                </button>
                            </td>
                        </tr>
                    @empty
                        @if(!isset($connectionError) || !$connectionError)
                            <tr>
                                <td colspan="3" class="empty-state">
                                    <div class="empty-state">
                                        <svg viewBox="0 0 24 24">
                                            <path
                                                d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                                            </path>
                                        </svg>
                                        <h3>Tidak Ada Data Tindakan</h3>
                                        <p>Data tindakan medis tidak ditemukan dalam database.</p>
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3">
                                    <div class="empty-state" style="color: var(--db-text-gray);">
                                        <p>Silakan segarkan halaman setelah koneksi database pulih kembali.</p>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Detail Modal Popup (Glassmorphic) -->
    <div class="modal" id="detail-modal">
        <div class="modal-overlay" onclick="closeModal()"></div>
        <div class="modal-container">
            <div class="modal-header">
                <div class="modal-title-wrapper">
                    <span id="modal-jenis-label">Kategori</span>
                    <h3 id="modal-tindakan-title">Nama Tindakan</h3>
                </div>
                <button class="modal-close" onclick="closeModal()" aria-label="Tutup">
                    <svg viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal-loading" class="modal-loader">
                    <div class="modal-spinner"></div>
                    <p style="color: var(--text-muted); font-weight:600;">Mengambil informasi tarif...</p>
                </div>
                <div id="modal-content" style="display: none;">
                    <table class="modal-detail-table">
                        <thead>
                            <tr>
                                <th style="text-align: left">Kelas Perawatan</th>
                                <th style="text-align: right;">Total Tarif</th>
                                <th style="text-align: center; width: 80px;">Pilih</th>
                            </tr>
                        </thead>
                        <tbody id="modal-detail-rows">
                            <!-- Rows injected via JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div id="modal-error"
                    style="display: none; color: var(--danger); text-align: center; font-weight: 600; padding: 20px 0;">
                    Gagal mengambil rincian harga tindakan.
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-modal-close" onclick="closeModal()">Selesai</button>
            </div>
        </div>
    </div>

    <!-- Floating Cart Button -->
    <div class="cart-btn-floating" id="cart-toggle" onclick="toggleCart()">
        <svg viewBox="0 0 24 24">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <span class="cart-badge" id="cart-count">0</span>
    </div>

    <!-- Cart Drawer (Sidebar) -->
    <div class="cart-drawer" id="cart-drawer">
        <div class="cart-drawer-header">
            <h3>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                Keranjang Tindakan
            </h3>
            <button class="cart-drawer-close" onclick="toggleCart()" aria-label="Tutup">
                <svg viewBox="0 0 24 24">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="cart-drawer-body" id="cart-items-container">
            <div class="cart-empty-state" id="cart-empty-state">
                <svg viewBox="0 0 24 24">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <p>Keranjang belanja kosong</p>
                <small style="color: var(--db-text-gray);">Silakan pilih tindakan medis untuk ditambahkan.</small>
            </div>
        </div>
        <div class="cart-drawer-footer">
            <div class="cart-total-row">
                <span class="cart-total-label">Total Estimasi</span>
                <span class="cart-total-price" id="cart-total">Rp 0</span>
            </div>
            <button class="btn-checkout" id="btn-checkout-trigger" onclick="openCheckoutModal()" disabled>
                Lanjutkan Pembayaran
            </button>
        </div>
    </div>

    <!-- Checkout Wizard Modal -->
    <div class="modal" id="checkout-modal">
        <div class="modal-overlay" onclick="closeCheckoutModal()"></div>
        <div class="modal-container" style="max-width: 600px;">
            <div class="modal-header">
                <div class="modal-title-wrapper">
                    <span>Reservasi & Pembayaran</span>
                    <h3 id="checkout-modal-title">Selesaikan Pemesanan</h3>
                </div>
                <button class="modal-close" onclick="closeCheckoutModal()" aria-label="Tutup">
                    <svg viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" style="padding: 24px 30px;">

                <!-- Step 1: Summary -->
                <div class="checkout-step active" id="checkout-step-1">
                    <h4 style="margin-bottom: 12px; font-weight: 700; color: var(--primary);">1. Ringkasan Tindakan</h4>
                    <div class="checkout-summary-list" id="checkout-summary-items">
                        <!-- Summary list injected via JS -->
                    </div>
                    <div class="invoice-row"
                        style="font-weight: 800; font-size: 1.1rem; color: var(--primary); margin-bottom: 20px; border-top: 1px solid rgba(0,0,0,0.06); padding-top: 12px;">
                        <span>Total Biaya</span>
                        <span id="checkout-step1-total">Rp 0</span>
                    </div>
                    <div class="checkout-nav">
                        <button class="btn-checkout-prev" style="visibility: hidden;"></button>
                        <button class="btn-checkout-next" onclick="changeCheckoutStep(2)">Lanjut Isi Data Pasien
                            &rarr;</button>
                    </div>
                </div>

                <!-- Step 2: Patient Info -->
                <div class="checkout-step" id="checkout-step-2">
                    <h4 style="margin-bottom: 16px; font-weight: 700; color: var(--primary);">2. Data Diri Pasien</h4>
                    <div class="form-group">
                        <label for="patient-name">Nama Lengkap Pasien *</label>
                        <input type="text" id="patient-name" placeholder="Contoh: Budi Santoso" required>
                    </div>
                    <div class="form-group">
                        <label for="patient-phone">Nomor WhatsApp Aktif *</label>
                        <input type="tel" id="patient-phone" placeholder="Contoh: 081234567890" required>
                    </div>
                    <div class="form-group">
                        <label for="patient-penjamin">Metode Penjaminan *</label>
                        <select id="patient-penjamin" onchange="toggleBpjsField()">
                            <option value="Umum / Mandiri">Umum / Mandiri</option>
                            <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                            <option value="BPJS Ketenagakerjaan">BPJS Ketenagakerjaan</option>
                            <option value="Asuransi Swasta">Asuransi Swasta / Rekanan</option>
                        </select>
                    </div>
                    <div class="form-group" id="bpjs-field-wrapper" style="display: none;">
                        <label for="patient-bpjs">Nomor Kartu BPJS *</label>
                        <input type="text" id="patient-bpjs" placeholder="Contoh: 0001234567890">
                    </div>
                    <div class="checkout-nav">
                        <button class="btn-checkout-prev" onclick="changeCheckoutStep(1)">&larr; Kembali</button>
                        <button class="btn-checkout-next" onclick="validateStep2()">Lanjut Pilih Metode &rarr;</button>
                    </div>
                </div>

                <!-- Step 3: Payment Selection -->
                <div class="checkout-step" id="checkout-step-3">
                    <h4 style="margin-bottom: 16px; font-weight: 700; color: var(--primary);">3. Metode Pembayaran</h4>
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 16px;">
                        Pilih metode penyelesaian pembayaran. Registrasi akan divalidasi oleh petugas medis kami.
                    </p>
                    <div class="payment-options-grid">
                        <div class="payment-option-card active" onclick="selectPaymentMethod(this, 'Transfer Bank')">
                            <svg viewBox="0 0 24 24">
                                <rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="2" y1="10" x2="22" y2="10"></line>
                            </svg>
                            <span>Transfer Bank</span>
                        </div>
                        <div class="payment-option-card" onclick="selectPaymentMethod(this, 'QRIS / E-Wallet')">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <rect x="7" y="7" width="3" height="3"></rect>
                                <rect x="14" y="7" width="3" height="3"></rect>
                                <rect x="7" y="14" width="3" height="3"></rect>
                                <rect x="14" y="14" width="3" height="3"></rect>
                            </svg>
                            <span>QRIS / E-Wallet</span>
                        </div>
                        <div class="payment-option-card" onclick="selectPaymentMethod(this, 'Bayar di Kasir RS')">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <span>Kasir RS (Onsite)</span>
                        </div>
                        <div class="payment-option-card" onclick="selectPaymentMethod(this, 'Booking & WA Konfirmasi')">
                            <svg viewBox="0 0 24 24">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <span>Booking WA</span>
                        </div>
                    </div>
                    <div class="checkout-nav">
                        <button class="btn-checkout-prev" onclick="changeCheckoutStep(2)">&larr; Kembali</button>
                        <button class="btn-checkout-next" onclick="submitCheckout()">Konfirmasi Reservasi
                            &rarr;</button>
                    </div>
                </div>

                <!-- Step 4: Success & WA Redirect -->
                <div class="checkout-step" id="checkout-step-4">
                    <div class="checkout-success-view">
                        <div class="checkout-success-icon">
                            <svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <h4>Reservasi Berhasil Diajukan!</h4>
                        <p>Pemesanan tindakan medis Anda telah berhasil tercatat dengan Kode Booking: <strong
                                id="booking-code" style="color: var(--primary);">RSUP-XXXXXX</strong>. Silakan
                            selesaikan pembayaran dan konfirmasi melalui WhatsApp.</p>

                        <div class="checkout-invoice-box">
                            <div class="invoice-row">
                                <span class="invoice-label">Nama Pasien</span>
                                <span id="invoice-patient-name">-</span>
                            </div>
                            <div class="invoice-row">
                                <span class="invoice-label">Jumlah Tindakan</span>
                                <span id="invoice-item-count">0 Tindakan</span>
                            </div>
                            <div class="invoice-row">
                                <span class="invoice-label">Penjaminan</span>
                                <span id="invoice-penjamin">-</span>
                            </div>
                            <div class="invoice-row">
                                <span class="invoice-label">Metode Pembayaran</span>
                                <span id="invoice-payment-method">-</span>
                            </div>
                            <div class="invoice-row">
                                <span class="invoice-label">Total Pembayaran</span>
                                <span id="invoice-total">Rp 0</span>
                            </div>
                        </div>

                        <a href="#" target="_blank" class="btn-wa-booking" id="wa-booking-link">
                            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 20px; height: 20px;">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.003 5.324 5.328 0 11.859 0c3.161.001 6.136 1.233 8.375 3.474 2.241 2.241 3.471 5.211 3.47 8.378-.004 6.535-5.33 11.859-11.861 11.859-2.002-.001-3.971-.51-5.753-1.48L0 24zm6.59-4.846c1.666.988 3.52 1.516 5.419 1.517 5.378 0 9.756-4.374 9.758-9.752.001-2.607-1.011-5.059-2.85-6.899-1.838-1.84-4.292-2.853-6.901-2.854-5.385 0-9.763 4.377-9.765 9.755-.001 1.996.52 3.943 1.51 5.642l-.99 3.616 3.729-.985z" />
                            </svg>
                            Kirim Bukti Pembayaran / Booking via WA
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Chatbot Widget Area (Consistent with main layout) -->
    <div class="chatbot-btn" id="chatbot-toggle" onclick="toggleChatbot()">
        <svg viewBox="0 0 24 24">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
    </div>

    <div class="chatbot-widget" id="chatbot-widget">
        <div class="chatbot-header">
            <div class="chatbot-info">
                <div class="chatbot-avatar">P</div>
                <div>
                    <h4 style="font-weight:700; font-size:0.95rem; line-height:1.2;">Pekerja Care</h4>
                    <span class="chatbot-status" style="display: flex; align-items: center; gap: 4px;">
                        <span class="status-dot"></span> Online
                    </span>
                </div>
            </div>
            <button class="chatbot-close" onclick="toggleChatbot()">
                <svg viewBox="0 0 24 24">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="chatbot-body" id="chatbot-chat-body">
            <div class="chat-msg bot">
                Halo! Saya Pekerja Care, asisten virtual RSU Pekerja. Ada yang bisa saya bantu hari ini?
            </div>
        </div>
        <div class="chatbot-quick-replies">
            <button onclick="sendQuickReply('Tanya jadwal dokter spesialis')">Jadwal Dokter</button>
            <button onclick="sendQuickReply('Hubungi nomor UGD darurat')">Layanan UGD</button>
            <button onclick="sendQuickReply('Bagaimana cara daftar BPJS?')">Daftar BPJS</button>
        </div>
        <div class="chatbot-footer">
            <div class="chatbot-input-wrapper">
                <input type="text" id="chatbot-input" placeholder="Tulis pesan..." onkeypress="handleChatEnter(event)">
            </div>
            <button class="chatbot-send-btn" onclick="sendChatbotMessage()">
                <svg viewBox="0 0 24 24">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <a href="{{ url('/') }}" class="logo-container" style="margin-bottom: 1.5rem; display: inline-flex;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo RSUP" class="logo-img"
                        style="height: 48px; width: auto; border-radius: 8px; border: 2px solid rgba(255,255,255,0.1);">
                    <div class="logo-text-wrapper" style="text-align: left;">
                        <span class="logo-title" style="color: white;">RSU PEKERJA</span>
                        <span class="logo-subtitle" style="color: var(--secondary);">KBN - RSUP</span>
                    </div>
                </a>
                <p class="footer-desc">
                    Rumah Sakit Umum Pekerja berkomitmen memberikan pelayanan kesehatan berkualitas terbaik, modern,
                    dan setara bagi seluruh lapisan masyarakat dan para pekerja.
                </p>
                <div class="social-links">
                    <a href="#" class="social-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.8c4.56-.93 8-4.96 8-9.8z" />
                        </svg>
                    </a>
                    <a href="#" class="social-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" />
                        </svg>
                    </a>
                    <a href="#" class="social-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M23.953 4.57a10 10 0 0 1-2.825.775 4.958 4.958 0 0 0 2.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 0 0-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 0 0-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.228-.616v.06a4.923 4.923 0 0 0 3.946 4.827 4.996 4.996 0 0 1-2.212.085 4.936 4.936 0 0 0 4.604 3.417 9.867 9.867 0 0 1-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0 0 7.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0 0 24 4.59z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Navigasi</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}#home">Home</a></li>
                    <li><a href="{{ url('/') }}#layanan">Layanan Medis</a></li>
                    <li><a href="{{ url('/') }}#promo">Promo & Paket</a></li>
                    <li><a href="{{ url('/') }}#jadwal">Jadwal Dokter</a></li>
                    <li><a href="{{ url('/') }}#berita">Berita & Informasi</a></li>
                    <li><a href="{{ url('/') }}#kontak">Hubungi Kami</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Link Cepat</h3>
                <ul class="footer-links">
                    <li><a href="https://wa.me/6285777789022" target="_blank">Pendaftaran Online</a></li>
                    <li><a href="{{ route('admin.dashboard') }}">Portal Admin</a></li>
                    <li><a href="{{ url('/') }}#jadwal">Cari Jadwal Spesialis</a></li>
                    <li><a href="tel:02129484848">Ambulance UGD</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Jam Operasional</h3>
                <p>
                    <strong>Instalasi Gawat Darurat (UGD):</strong><br>
                    Buka 24 Jam (Setiap Hari)<br><br>
                    <strong>Poliklinik Rawat Jalan:</strong><br>
                    Senin - Sabtu: 08:00 - 20:00 WIB<br>
                    Minggu & Libur Nasional: Tutup
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Rumah Sakit Umum Pekerja. Hak Cipta Dilindungi Undang-Undang.</p>
            <p>Managed by PT KBN Graha Medika</p>
        </div>
    </footer>

    <!-- JavaScript code -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile Menu Toggle
            const mobileToggle = document.getElementById('mobile-toggle');
            const navLinks = document.getElementById('nav-links');

            mobileToggle.addEventListener('click', function () {
                navLinks.classList.toggle('active');
            });

            // Close mobile menu when a link is clicked
            const navItems = navLinks.querySelectorAll('a');
            navItems.forEach(item => {
                item.addEventListener('click', function () {
                    navLinks.classList.remove('active');
                });
            });

            // Real-time Search functionality (Vanilla JS)
            const searchInput = document.getElementById('tindakan-search');
            const tableRows = document.querySelectorAll('#tindakan-table tbody tr.db-row');

            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();

                tableRows.forEach(row => {
                    const textName = row.cells[0].textContent.toLowerCase();
                    const textJenis = row.cells[1].textContent.toLowerCase();

                    if (textName.includes(query) || textJenis.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        // Detail Modal functions
        function showDetailModal(id, name, jenis) {
            const modal = document.getElementById('detail-modal');
            const titleEl = document.getElementById('modal-tindakan-title');
            const jenisEl = document.getElementById('modal-jenis-label');
            const loadingEl = document.getElementById('modal-loading');
            const contentEl = document.getElementById('modal-content');
            const errorEl = document.getElementById('modal-error');
            const rowsContainer = document.getElementById('modal-detail-rows');

            // Open modal and show loading state
            titleEl.textContent = name;
            jenisEl.textContent = jenis;
            loadingEl.style.display = 'flex';
            contentEl.style.display = 'none';
            errorEl.style.display = 'none';
            rowsContainer.innerHTML = '';

            modal.classList.add('active');

            // Fetch detail from backend via AJAX
            fetch(`/tindakan/${id}/detail`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal terhubung ke server');
                    }
                    return response.json();
                })
                .then(data => {
                    loadingEl.style.display = 'none';
                    if (data.success && data.details && data.details.length > 0) {
                        data.details.forEach(detail => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td style="text-align: left">${detail.kelas}</td>
                                <td class="price-cell">${detail.harga_formatted}</td>
                                <td style="text-align: center;">
                                    <button class="btn-select-item-class" onclick="addToCart('${id}', '${name.replace(/'/g, "\\'")}', '${detail.kelas}', ${detail.harga})">
                                        +
                                    </button>
                                </td>
                            `;
                            rowsContainer.appendChild(tr);
                        });
                        contentEl.style.display = 'block';
                    } else {
                        errorEl.textContent = data.message || 'Detail harga tidak tersedia untuk tindakan ini.';
                        errorEl.style.display = 'block';
                    }
                })
                .catch(error => {
                    loadingEl.style.display = 'none';
                    errorEl.textContent = 'Gagal memuat data tarif. Silakan coba kembali nanti.';
                    errorEl.style.display = 'block';
                });
        }

        function closeModal() {
            const modal = document.getElementById('detail-modal');
            modal.classList.remove('active');
        }

        // Cart Logic (Keranjang Belanja Tindakan)
        let cart = JSON.parse(localStorage.getItem('medical_cart')) || [];
        let selectedPayment = 'Transfer Bank';

        // Load cart items on start
        document.addEventListener('DOMContentLoaded', function () {
            renderCart();
        });

        function formatRupiah(number) {
            return 'Rp ' + new Intl.NumberFormat('id-ID', { maximumFractionDigits: 0 }).format(number);
        }

        function toggleCart() {
            const drawer = document.getElementById('cart-drawer');
            drawer.classList.toggle('active');
        }

        function addToCart(id, name, kelas, price) {
            // Check if item already in cart
            const isExist = cart.some(item => item.id === id && item.kelas === kelas);
            if (isExist) {
                alert('Tindakan dengan kelas ini sudah ada di keranjang.');
                return;
            }

            cart.push({
                id: id,
                name: name,
                kelas: kelas,
                price: parseFloat(price)
            });

            localStorage.setItem('medical_cart', JSON.stringify(cart));
            renderCart();

            // Badge pulse animation
            const badge = document.getElementById('cart-count');
            badge.classList.remove('active');
            setTimeout(() => {
                badge.classList.add('active');
            }, 50);

            // Close the class selection modal
            closeModal();

            // Show drawer to give feedback
            const drawer = document.getElementById('cart-drawer');
            if (!drawer.classList.contains('active')) {
                drawer.classList.add('active');
            }
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            localStorage.setItem('medical_cart', JSON.stringify(cart));
            renderCart();
        }

        function renderCart() {
            const countEl = document.getElementById('cart-count');
            const containerEl = document.getElementById('cart-items-container');
            const totalEl = document.getElementById('cart-total');
            const checkoutBtn = document.getElementById('btn-checkout-trigger');

            // Update badge count
            countEl.textContent = cart.length;
            if (cart.length > 0) {
                countEl.classList.add('active');
                checkoutBtn.removeAttribute('disabled');
            } else {
                countEl.classList.remove('active');
                checkoutBtn.setAttribute('disabled', 'true');
            }

            // Clear previous items
            containerEl.innerHTML = '';

            if (cart.length === 0) {
                containerEl.innerHTML = `
                    <div class="cart-empty-state" id="cart-empty-state">
                        <svg viewBox="0 0 24 24">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <p>Keranjang belanja kosong</p>
                        <small style="color: var(--db-text-gray);">Silakan pilih tindakan medis untuk ditambahkan.</small>
                    </div>
                `;
                totalEl.textContent = 'Rp 0';
                return;
            }

            let total = 0;
            cart.forEach((item, index) => {
                total += item.price;
                const div = document.createElement('div');
                div.className = 'cart-item';
                div.innerHTML = `
                    <div class="cart-item-info">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-class">${item.kelas}</div>
                        <div class="cart-item-price">${formatRupiah(item.price)}</div>
                    </div>
                    <button class="cart-item-remove" onclick="removeFromCart(${index})" aria-label="Hapus">
                        <svg viewBox="0 0 24 24">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                    </button>
                `;
                containerEl.appendChild(div);
            });

            totalEl.textContent = formatRupiah(total);
        }

        // Checkout Flow Logic
        function openCheckoutModal() {
            // Render step 1 summary list
            const summaryContainer = document.getElementById('checkout-summary-items');
            summaryContainer.innerHTML = '';

            let total = 0;
            cart.forEach(item => {
                total += item.price;
                const div = document.createElement('div');
                div.className = 'checkout-summary-item';
                div.innerHTML = `
                    <span style="font-weight: 700;">${item.name} <small style="color: var(--secondary); font-weight:800;">(${item.kelas})</small></span>
                    <span>${formatRupiah(item.price)}</span>
                `;
                summaryContainer.appendChild(div);
            });

            document.getElementById('checkout-step1-total').textContent = formatRupiah(total);

            // Open modal
            const modal = document.getElementById('checkout-modal');
            modal.classList.add('active');
            changeCheckoutStep(1);

            // Close cart drawer
            const drawer = document.getElementById('cart-drawer');
            drawer.classList.remove('active');
        }

        function closeCheckoutModal() {
            const modal = document.getElementById('checkout-modal');
            modal.classList.remove('active');
        }

        function changeCheckoutStep(step) {
            // Hide all steps
            const steps = document.querySelectorAll('.checkout-step');
            steps.forEach(s => s.classList.remove('active'));

            // Show active step
            document.getElementById(`checkout-step-${step}`).classList.add('active');
        }

        function toggleBpjsField() {
            const penjamin = document.getElementById('patient-penjamin').value;
            const bpjsWrapper = document.getElementById('bpjs-field-wrapper');
            const bpjsInput = document.getElementById('patient-bpjs');

            if (penjamin.includes('BPJS')) {
                bpjsWrapper.style.display = 'block';
                bpjsInput.setAttribute('required', 'true');
            } else {
                bpjsWrapper.style.display = 'none';
                bpjsInput.removeAttribute('required');
            }
        }

        function validateStep2() {
            const name = document.getElementById('patient-name').value.trim();
            const phone = document.getElementById('patient-phone').value.trim();
            const penjamin = document.getElementById('patient-penjamin').value;
            const bpjs = document.getElementById('patient-bpjs').value.trim();

            if (!name) {
                alert('Nama pasien wajib diisi.');
                return;
            }
            if (!phone) {
                alert('Nomor WhatsApp wajib diisi.');
                return;
            }
            if (penjamin.includes('BPJS') && !bpjs) {
                alert('Nomor Kartu BPJS wajib diisi.');
                return;
            }

            changeCheckoutStep(3);
        }

        function selectPaymentMethod(element, method) {
            // Remove active class from all payment cards
            const cards = document.querySelectorAll('.payment-option-card');
            cards.forEach(c => c.classList.remove('active'));

            // Add active to clicked
            element.classList.add('active');
            selectedPayment = method;
        }

        function submitCheckout() {
            const name = document.getElementById('patient-name').value.trim();
            const phone = document.getElementById('patient-phone').value.trim();
            const penjamin = document.getElementById('patient-penjamin').value;
            const bpjs = document.getElementById('patient-bpjs').value.trim();

            // Generate booking code
            const randomCode = 'RSUP-' + Math.floor(100000 + Math.random() * 900000);

            // Calculate total
            let total = 0;
            cart.forEach(item => total += item.price);

            // Populate invoice details in Step 4
            document.getElementById('booking-code').textContent = randomCode;
            document.getElementById('invoice-patient-name').textContent = name;
            document.getElementById('invoice-item-count').textContent = cart.length + ' Tindakan';
            document.getElementById('invoice-penjamin').textContent = penjamin + (bpjs ? ` (${bpjs})` : '');
            document.getElementById('invoice-payment-method').textContent = selectedPayment;
            document.getElementById('invoice-total').textContent = formatRupiah(total);

            // Build WhatsApp API Message
            const waNumber = '6285777789022'; // Marketing / Registration WhatsApp
            let waMessage = `Halo RSU Pekerja, saya ingin konfirmasi pendaftaran & pembayaran tindakan medis:\n\n`;
            waMessage += `*Kode Booking:* ${randomCode}\n`;
            waMessage += `*Nama Pasien:* ${name}\n`;
            waMessage += `*Nomor WA:* ${phone}\n`;
            waMessage += `*Penjamin:* ${penjamin}\n`;
            if (penjamin.includes('BPJS') && bpjs) {
                waMessage += `*Nomor BPJS:* ${bpjs}\n`;
            }
            waMessage += `*Metode Pembayaran:* ${selectedPayment}\n\n`;
            waMessage += `*Rincian Tindakan:*\n`;

            cart.forEach((item, idx) => {
                waMessage += `${idx + 1}. ${item.name} (${item.kelas}) - ${formatRupiah(item.price)}\n`;
            });

            waMessage += `\n*TOTAL ESTIMASI: ${formatRupiah(total)}*\n\n`;
            waMessage += `Mohon bantu divalidasi dan dihubungi lebih lanjut untuk kedatangan saya. Terima kasih.`;

            const waUrl = `https://wa.me/${waNumber}?text=${encodeURIComponent(waMessage)}`;
            document.getElementById('wa-booking-link').href = waUrl;

            // Transition to Step 4
            changeCheckoutStep(4);

            // Clear the cart
            cart = [];
            localStorage.removeItem('medical_cart');
            renderCart();
        }

        // Table sorting
        let sortDirections = [true, true];
        function sortTable(columnIndex) {
            const table = document.getElementById("tindakan-table");
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.querySelectorAll("tr.db-row"));

            if (rows.length === 0) return;

            const isAscending = sortDirections[columnIndex];

            rows.sort((a, b) => {
                const cellA = a.cells[columnIndex].textContent.trim().toLowerCase();
                const cellB = b.cells[columnIndex].textContent.trim().toLowerCase();

                return isAscending
                    ? cellA.localeCompare(cellB)
                    : cellB.localeCompare(cellA);
            });

            // Toggle direction
            sortDirections[columnIndex] = !isAscending;

            // Re-append rows in sorted order
            rows.forEach(row => tbody.appendChild(row));
        }

        // Chatbot Integration Functions
        function toggleChatbot() {
            const widget = document.getElementById('chatbot-widget');
            widget.classList.toggle('active');
        }

        function appendChatMessage(text, sender) {
            const chatBody = document.getElementById('chatbot-chat-body');
            const msgEl = document.createElement('div');
            const randomId = 'msg-' + Math.random().toString(36).substr(2, 9);
            msgEl.id = randomId;
            msgEl.className = 'chat-msg ' + sender;
            msgEl.innerHTML = text;
            chatBody.appendChild(msgEl);
            chatBody.scrollTop = chatBody.scrollHeight;
            return randomId;
        }

        function removeLoadingMessage(id) {
            const msgEl = document.getElementById(id);
            if (msgEl) msgEl.remove();
        }

        function sendChatbotMessage() {
            const inputEl = document.getElementById('chatbot-input');
            const message = inputEl.value.trim();
            if (!message) return;

            appendChatMessage(message, 'user');
            inputEl.value = '';

            const loadingId = appendChatMessage('<span class="status-dot"></span> Sedang berpikir...', 'bot loading');

            fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: message })
            })
                .then(response => response.json())
                .then(data => {
                    removeLoadingMessage(loadingId);
                    appendChatMessage(data.reply, 'bot');
                })
                .catch(error => {
                    removeLoadingMessage(loadingId);
                    appendChatMessage('Maaf, koneksi terganggu. Silakan coba sesaat lagi.', 'bot');
                });
        }

        function handleChatEnter(event) {
            if (event.key === 'Enter') {
                sendChatbotMessage();
            }
        }

        function sendQuickReply(text) {
            appendChatMessage(text, 'user');

            const loadingId = appendChatMessage('<span class="status-dot"></span> Sedang berpikir...', 'bot loading');

            fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: text })
            })
                .then(response => response.json())
                .then(data => {
                    removeLoadingMessage(loadingId);
                    appendChatMessage(data.reply, 'bot');
                })
                .catch(error => {
                    removeLoadingMessage(loadingId);
                    appendChatMessage('Maaf, terjadi kesalahan.', 'bot');
                });
        }
    </script>
</body>

</html>