<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Rumah Sakit Umum Pekerja (RSUP) KBN menyediakan layanan kesehatan profesional, fasilitas modern, jadwal dokter spesialis lengkap, dan layanan gawat darurat 24 jam.">
    <meta name="keywords"
        content="Rumah Sakit Umum Pekerja, RSUP KBN, Rumah Sakit Jakarta, Jadwal Dokter, Layanan Kesehatan, Gawat Darurat, BPJS">
    <meta name="robots" content="index, follow">
    <title>Rumah Sakit Umum Pekerja - RSUP KBN | Pelayanan Kesehatan Terpercaya</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #064e3b;
            /* Dark Medical Green */
            --primary-hover: #042f2e;
            --primary-light: #ecfdf5;
            --secondary: #10b981;
            /* Clean Teal/Green */
            --secondary-hover: #059669;
            --secondary-light: #f0fdf4;
            --accent: #f59e0b;
            /* Amber/Gold */
            --danger: #ef4444;
            /* Emergency Red */
            --danger-hover: #dc2626;
            --text-dark: #0f172a;
            /* Navy Dark Slate */
            --text-muted: #64748b;
            /* Slate Gray */
            --bg-light: #f8fafc;
            --glass-card: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.6);
            --card-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
            --card-shadow-hover: 0 20px 40px -15px rgba(15, 23, 42, 0.15);
            --transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                border-color 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                background-color 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                color 0.4s cubic-bezier(0.16, 1, 0.3, 1),
                opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1);
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
        }

        /* --- Background Glow (GPU Optimized Animation) --- */
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
                radial-gradient(circle at 20% 20%, rgba(6, 78, 59, 0.12) 0%, transparent 55%),
                radial-gradient(circle at 80% 80%, rgba(16, 185, 129, 0.12) 0%, transparent 55%),
                radial-gradient(circle at 50% 50%, rgba(134, 239, 172, 0.08) 0%, transparent 45%);
            animation: rotateBg 45s infinite alternate ease-in-out;
            will-change: transform;
            transform: translate3d(0, 0, 0);
        }

        @keyframes rotateBg {
            0% {
                transform: translate3d(0, 0, 0) rotate(0deg) scale(1);
            }

            50% {
                transform: translate3d(2%, 1%, 0) rotate(90deg) scale(1.1);
            }

            100% {
                transform: translate3d(0, 0, 0) rotate(180deg) scale(1);
            }
        }

        /* --- Top Contact Bar --- */
        .top-bar {
            background: var(--primary);
            color: white;
            padding: 8px 5%;
            font-size: 0.85rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            z-index: 1001;
            position: relative;
        }

        .top-bar-left,
        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .top-bar-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .top-bar-item svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
        }

        .emergency-btn {
            background: var(--danger);
            color: white;
            padding: 2px 10px;
            border-radius: 4px;
            font-weight: 700;
            animation: pulseDanger 2s infinite;
            text-decoration: none;
        }

        @keyframes pulseDanger {
            0% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
            }

            70% {
                box-shadow: 0 0 0 8px rgba(239, 68, 68, 0);
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

        .logo-icon-wrapper {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 8px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(6, 78, 59, 0.2);
        }

        .logo-icon {
            width: 22px;
            height: 22px;
            stroke: white;
            fill: none;
            stroke-width: 2.5;
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
            will-change: transform;
        }

        .nav-links a:hover::after {
            transform: scaleX(1);
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .btn-cta-nav {
            background: var(--secondary);
            color: white !important;
            padding: 10px 20px !important;
            border-radius: 30px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
            transition: var(--transition) !important;
            will-change: transform;
        }

        .btn-cta-nav:hover {
            background: var(--secondary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.3);
        }

        .btn-cta-nav::after {
            display: none !important;
        }

        .btn-admin-nav {
            border: 1.5px solid var(--primary);
            color: var(--primary) !important;
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 0.9rem !important;
            transition: var(--transition) !important;
        }

        .btn-admin-nav:hover {
            background: var(--primary);
            color: white !important;
            box-shadow: 0 4px 10px rgba(6, 78, 59, 0.15);
        }

        .btn-admin-nav::after {
            display: none !important;
        }

        .mobile-toggle {
            display: none;
            cursor: pointer;
        }

        /* --- Hero Section --- */
        .hero {
            position: relative;
            width: 100%;
            min-height: 85vh;
            display: flex;
            align-items: center;
            padding: 8rem 5% 10rem 5%;
            overflow: hidden;
            background-color: var(--primary);
            /* fallback */
        }

        .hero-bg-carousel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-bg-carousel .carousel-container {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .hero-bg-carousel .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1.2s ease-in-out, visibility 1.2s ease-in-out;
            z-index: 1;
        }

        .hero-bg-carousel .carousel-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 2;
        }

        .hero-bg-carousel .carousel-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1);
            transition: transform 8s ease-out;
        }

        .hero-bg-carousel .carousel-slide.active .carousel-img {
            transform: scale(1.08);
            /* Slow elegant zoom */
        }

        /* Overlay for high contrast and readability */
        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(6, 78, 59, 0.9) 0%, rgba(4, 47, 46, 0.78) 50%, rgba(15, 23, 42, 0.6) 100%);
            z-index: 3;
        }

        /* Inner container to center/align text content */
        .hero-wrapper-inner {
            position: relative;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            z-index: 4;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            align-items: center;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        /* Badge text styling for contrast */
        .hero-badge {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
            /* Bright green text */
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(52, 211, 153, 0.3);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        }

        .hero h1 {
            font-size: 3.8rem;
            font-weight: 800;
            color: #ffffff;
            /* White text for overlay */
            line-height: 1.15;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            text-align: left;
        }

        .hero h1 span {
            color: var(--secondary);
            /* Vibrant green */
            position: relative;
            display: inline-block;
        }

        .hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.88);
            /* Highly legible off-white */
            line-height: 1.7;
            margin-bottom: 2.5rem;
            max-width: 650px;
            text-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        .hero-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* Buttons custom styled for the dark overlay background */
        .btn-primary-hero {
            background: var(--secondary);
            color: white;
            padding: 15px 32px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            will-change: transform;
        }

        .btn-primary-hero:hover {
            background: var(--secondary-hover);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-outline-hero {
            border: 2px solid rgba(255, 255, 255, 0.8);
            color: white;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            will-change: transform;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        }

        .btn-outline-hero:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: white;
            transform: translateY(-3px);
        }

        /* Floating card positioning and custom styling */
        .hero-floating-card-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;
            gap: 20px;
            width: 100%;
            height: 100%;
        }

        .hero-floating-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 16px 20px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 16px;
            width: 100%;
            max-width: 310px;
            transition: var(--transition);
            will-change: transform, background-color, border-color;
        }

        .hero-floating-card:hover {
            background: rgba(255, 255, 255, 0.22);
            transform: scale(1.05) translateY(-3px) !important;
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }

        .hero-floating-card.card-1 {
            animation: bounceCard1 5s infinite alternate ease-in-out;
            align-self: flex-end;
        }

        .hero-floating-card.card-2 {
            animation: bounceCard2 6s infinite alternate ease-in-out 0.5s;
            align-self: flex-end;
            margin-right: 35px;
        }

        .hero-floating-card.card-3 {
            animation: bounceCard3 4.5s infinite alternate ease-in-out 1s;
            align-self: flex-end;
        }

        @keyframes bounceCard1 {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-8px);
            }
        }

        @keyframes bounceCard2 {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-12px);
            }
        }

        @keyframes bounceCard3 {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-10px);
            }
        }

        .hero-floating-card .floating-card-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .hero-floating-card.card-1 .floating-card-icon {
            background: rgba(16, 185, 129, 0.25);
            color: #34d399;
        }

        .hero-floating-card.card-2 .floating-card-icon {
            background: rgba(245, 158, 11, 0.25);
            color: #fbbf24;
        }

        .hero-floating-card.card-3 .floating-card-icon {
            background: rgba(239, 68, 68, 0.25);
            color: #f87171;
        }

        .hero-floating-card .floating-card-text h4 {
            font-size: 0.95rem;
            font-weight: 800;
            color: white;
            margin-bottom: 2px;
            text-align: left;
        }

        .hero-floating-card .floating-card-text p {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0;
            line-height: 1.3;
            text-align: left;
        }

        /* Navigation Arrows on full hero wrapper */
        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 5;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .hero:hover .carousel-arrow {
            opacity: 1;
            visibility: visible;
        }

        .carousel-arrow:hover {
            background: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-50%) scale(1.1);
        }

        .prev-arrow {
            left: 24px;
        }

        .next-arrow {
            right: 24px;
        }

        /* Carousel Indicators */
        .carousel-indicators {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 5;
        }

        .indicator-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.35);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator-dot.active {
            background: var(--secondary);
            transform: scale(1.2);
            box-shadow: 0 0 10px var(--secondary);
        }

        /* --- Quick Services Cards --- */
        .quick-services {
            margin-top: -4rem;
            position: relative;
            z-index: 10;
            padding: 0 5%;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .qs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .qs-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            padding: 24px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            will-change: transform, box-shadow;
        }

        .qs-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(6, 78, 59, 0.2);
        }

        .qs-icon {
            background: var(--primary-light);
            color: var(--primary);
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
            transition: var(--transition);
        }

        .qs-card:hover .qs-icon {
            background: var(--primary);
            color: white;
        }

        .qs-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .qs-card p {
            font-size: 0.85rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 1.25rem;
        }

        .qs-link {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--secondary);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .qs-card:hover .qs-link {
            gap: 10px;
            color: var(--secondary-hover);
        }

        /* --- Sections Core --- */
        .section-container {
            padding: 6rem 5% 4rem 5%;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 4rem auto;
        }

        .section-tag {
            color: var(--secondary);
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 0.75rem;
            display: inline-block;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.6;
        }

        /* --- Slider wrapper & layout --- */
        .slider-wrapper {
            position: relative;
            width: 100%;
        }

        .slider-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: 1px solid #e2e8f0;
            color: var(--primary);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
        }

        .slider-nav-btn:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }

        .slider-nav-btn svg {
            width: 20px;
            height: 20px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .slider-nav-btn.prev-btn {
            left: -22px;
        }

        .slider-nav-btn.next-btn {
            right: -22px;
        }

        @media (max-width: 1024px) {
            .slider-nav-btn {
                display: none;
            }
        }

        /* --- Promo Cards --- */
        .promo-grid {
            display: flex;
            overflow-x: auto;
            gap: 30px;
            padding: 10px 5px 25px 5px;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .promo-grid::-webkit-scrollbar,
        .news-grid::-webkit-scrollbar {
            height: 8px;
        }

        .promo-grid::-webkit-scrollbar-track,
        .news-grid::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        .promo-grid::-webkit-scrollbar-thumb,
        .news-grid::-webkit-scrollbar-thumb {
            background: var(--secondary);
            border-radius: 10px;
        }

        .promo-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            position: relative;
            min-height: 480px;
            /* Consistent card height */
            will-change: transform, box-shadow;
            flex: 0 0 350px;
            scroll-snap-align: start;
        }

        .promo-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(16, 185, 129, 0.2);
        }

        @media (max-width: 768px) {

            .promo-card,
            .news-card {
                flex: 0 0 290px;
            }
        }

        .promo-img-wrapper {
            position: relative;
            width: 100%;
            height: 240px;
            /* Taller image cover */
            overflow: hidden;
            background: #e2e8f0;
        }

        .promo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
            will-change: transform;
            backface-visibility: hidden;
        }

        .promo-card:hover .promo-img {
            transform: scale(1.05);
        }

        .promo-badge-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--secondary);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .promo-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .promo-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }

        .promo-date {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: var(--danger);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .promo-date svg {
            width: 14px;
            height: 14px;
            fill: none;
            stroke: currentColor;
        }

        .promo-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .btn-promo-detail {
            background: var(--primary-light);
            color: var(--primary);
            border: none;
            padding: 10px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.85rem;
            width: 100%;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-promo-detail:hover {
            background: var(--primary);
            color: white;
        }

        /* --- Doctor Schedule with Live Filter --- */
        .doctor-filter-container {
            background: var(--glass-card);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            padding: 24px;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            margin-bottom: 3rem;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
        }

        .filter-group {
            flex: 1;
            min-width: 250px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--primary);
        }

        .filter-input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .filter-input-wrapper svg {
            position: absolute;
            left: 14px;
            width: 18px;
            height: 18px;
            color: var(--text-muted);
            stroke: currentColor;
            fill: none;
        }

        .filter-control {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            background: white;
            font-size: 0.95rem;
            color: var(--text-dark);
            outline: none;
            transition: var(--transition);
        }

        .filter-select {
            padding-left: 14px;
        }

        .filter-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(6, 78, 59, 0.1);
        }

        .doctors-grid {
            display: flex;
            overflow-x: auto;
            gap: 30px;
            padding: 10px 5px 25px 5px;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .doctors-grid::-webkit-scrollbar {
            height: 8px;
        }

        .doctors-grid::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        .doctors-grid::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 10px;
        }

        .doctor-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            padding: 30px 24px;
            text-align: center;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            will-change: transform, box-shadow;
            flex: 0 0 300px;
            scroll-snap-align: start;
        }

        .doctor-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(6, 78, 59, 0.2);
        }

        .doctor-avatar-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 20px auto;
            border-radius: 50%;
            z-index: 1;
        }

        .doctor-avatar-wrapper::after {
            content: '';
            position: absolute;
            top: -6px;
            left: -6px;
            width: 128px;
            height: 128px;
            border-radius: 50%;
            border: 2.5px solid var(--secondary);
            z-index: -1;
            transition: var(--transition);
            will-change: transform, border-color;
            backface-visibility: hidden;
        }

        .doctor-card:hover .doctor-avatar-wrapper::after {
            border-color: var(--primary);
            transform: scale(1.05);
        }

        .doctor-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            background-color: #e2e8f0;
        }

        .doctor-card h3 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 6px;
        }

        .doctor-specialty {
            background: var(--secondary-light);
            color: var(--secondary-hover);
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 20px;
        }

        .doctor-schedule-box {
            background: var(--primary-light);
            padding: 14px;
            border-radius: 14px;
            border: 1px solid rgba(6, 78, 59, 0.08);
            font-size: 0.85rem;
            color: var(--primary);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .doctor-schedule-title {
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .doctor-schedule-title svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
        }

        .schedule-rows {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .schedule-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            background: white;
            padding: 6px 10px;
            border-radius: 8px;
            border: 1px solid rgba(6, 78, 59, 0.06);
            transition: var(--transition);
        }

        .schedule-row:hover {
            border-color: var(--secondary);
            transform: translateX(3px);
        }

        .schedule-day {
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--primary);
            min-width: 52px;
        }

        .schedule-time {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            font-weight: 700;
            font-size: 0.72rem;
            padding: 3px 10px;
            border-radius: 20px;
            white-space: nowrap;
            letter-spacing: 0.3px;
        }

        .doctor-schedule-text {
            color: var(--text-dark);
            font-weight: 600;
        }

        /* --- News Section --- */
        .news-grid {
            display: flex;
            overflow-x: auto;
            gap: 30px;
            padding: 10px 5px 25px 5px;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
        }

        .news-card {
            background: #ffffff;
            border: 1px solid #f1f5f9;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            min-height: 500px;
            /* Consistent card height */
            will-change: transform, box-shadow;
            flex: 0 0 350px;
            scroll-snap-align: start;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--card-shadow-hover);
        }

        .news-img-wrapper {
            width: 100%;
            height: 260px;
            /* Taller image cover */
            overflow: hidden;
            background: #e2e8f0;
        }

        .news-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
            will-change: transform;
            backface-visibility: hidden;
        }

        .news-card:hover .news-img {
            transform: scale(1.05);
        }

        .news-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .news-badge {
            background: var(--primary-light);
            color: var(--primary);
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .news-date {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .news-date svg {
            width: 14px;
            height: 14px;
            stroke: currentColor;
            fill: none;
        }

        .news-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.75rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 3.4rem;
        }

        .news-text {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
        }

        .news-link {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: var(--transition);
        }

        .news-card:hover .news-link {
            color: var(--secondary);
            gap: 8px;
        }

        /* --- Contact Us Section --- */
        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 2rem;
        }

        .contact-info-card {
            background: var(--glass-card);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--card-shadow);
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .contact-row {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .contact-icon {
            background: var(--primary-light);
            color: var(--primary);
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .contact-row-text h3 {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 4px;
        }

        .contact-row-text p {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        .contact-map-placeholder {
            border-radius: 16px;
            overflow: hidden;
            height: 200px;
            border: 1.5px solid #e2e8f0;
            position: relative;
        }

        .contact-form-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .contact-form-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 16px;
        }

        .form-group label {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--primary);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            font-size: 0.95rem;
            color: var(--text-dark);
            outline: none;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(6, 78, 59, 0.1);
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            will-change: transform;
        }

        .btn-submit:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        /* --- Footer --- */
        footer {
            background: #0b2e24;
            /* Dark Greenish Navy Footer */
            color: rgba(255, 255, 255, 0.7);
            padding: 5rem 5% 2rem 5%;
            position: relative;
            margin-top: 4rem;
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
            bottom: 0;
            left: 0;
            width: 35px;
            height: 3px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .footer-logo-wrapper {
            margin-bottom: 1.25rem;
        }

        .footer-logo-title {
            color: white;
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .footer-logo-subtitle {
            color: var(--secondary);
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .footer-col p {
            font-size: 0.88rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
            padding-left: 6px;
        }

        .social-links {
            display: flex;
            gap: 12px;
        }

        .social-icon {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            text-decoration: none;
            will-change: transform;
        }

        .social-icon:hover {
            background: var(--secondary);
            transform: translateY(-3px);
        }

        .social-icon svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            max-width: 1400px;
            margin: 0 auto;
            font-size: 0.85rem;
        }

        /* --- Empty States styling --- */
        .empty-state {
            text-align: center;
            grid-column: 1 / -1;
            padding: 3rem 1.5rem;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            border: 1.5px dashed #cbd5e1;
            color: var(--text-muted);
        }

        .empty-state-icon {
            margin-bottom: 12px;
            color: var(--text-muted);
        }

        .empty-state-icon svg {
            width: 48px;
            height: 48px;
            stroke: currentColor;
            fill: none;
        }

        /* --- Responsive Breakpoints --- */
        @media (max-width: 1024px) {
            .hero {
                padding-top: 6rem;
                padding-bottom: 6rem;
            }

            .hero-wrapper-inner {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 30px;
            }

            .hero-content {
                align-items: center;
            }

            .hero h1 {
                font-size: 2.8rem;
                text-align: center;
                line-height: 1.25;
            }

            .hero p {
                font-size: 1.05rem;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-actions {
                justify-content: center;
            }

            .hero-floating-card-wrapper {
                flex-direction: row !important;
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
                margin-top: 2rem;
            }

            .hero-floating-card {
                align-self: center !important;
                margin-right: 0 !important;
                max-width: 100% !important;
                flex: 1 1 280px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .top-bar {
                display: none;
                /* Hide on mobile to save space */
            }

            nav {
                padding: 1rem 5%;
            }

            .logo-title {
                font-size: 0.95rem;
            }

            .logo-subtitle {
                font-size: 0.65rem;
            }

            .logo-container img {
                height: 35px !important;
            }

            .logo-container img:nth-of-type(2) {
                height: 48px !important;
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
                backdrop-filter: none;
            }

            .nav-links.active {
                left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .btn-cta-nav,
            .btn-admin-nav {
                text-align: center;
            }

            .contact-layout {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 0.9rem;
            }

            .hero-floating-card {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 480px) {
            .logo-container img:first-of-type {
                display: none;
                /* Hide Danantara on very small screens to fit text */
            }

            .logo-title {
                font-size: 0.85rem;
            }

            .logo-subtitle {
                font-size: 0.6rem;
            }
        }

        /* --- Info Modal (Glassmorphism Modal) --- */
        .info-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .info-modal.active {
            display: flex;
            opacity: 1;
        }

        .info-modal-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .info-modal-content {
            position: relative;
            background: white;
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            width: 90%;
            max-width: 550px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);
            z-index: 2001;
            transform: scale(0.9);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .info-modal.active .info-modal-content {
            transform: scale(1);
        }

        .info-modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(15, 23, 42, 0.05);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 1.5rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-dark);
            transition: var(--transition);
        }

        .info-modal-close:hover {
            background: var(--danger);
            color: white;
        }

        .info-modal-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 20px;
        }

        .info-modal-icon-wrapper {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 5px;
        }

        .info-modal-icon-wrapper.bpjs {
            background: rgba(16, 185, 129, 0.15);
            color: var(--secondary);
        }

        .info-modal-icon-wrapper.akreditasi {
            background: rgba(245, 158, 11, 0.15);
            color: var(--accent);
        }

        .info-modal-icon-wrapper.ugd {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
        }

        .info-modal-icon-wrapper svg {
            width: 32px;
            height: 32px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2.5;
        }

        .info-modal-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
        }

        .info-modal-desc {
            font-size: 0.95rem;
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Set cursor for cards */
        .hero-floating-card {
            cursor: pointer;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease, background-color 0.4s ease !important;
        }

        /* --- Chatbot Widget Styles --- */
        .chatbot-widget {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 2000;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .chatbot-toggle-btn {
            background: var(--primary);
            color: white;
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(6, 78, 59, 0.3);
            transition: var(--transition);
            will-change: transform;
        }

        .chatbot-toggle-btn:hover {
            transform: scale(1.08) translateY(-2px);
            background: var(--secondary);
            box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
        }

        .chatbot-toggle-btn svg {
            width: 26px;
            height: 26px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .chatbot-window {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 360px;
            height: 500px;
            background: white;
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.15);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 2001;
            transform: translateY(20px) scale(0.95);
            opacity: 0;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
        }

        .chatbot-window.active {
            display: flex;
            transform: translateY(0) scale(1);
            opacity: 1;
        }

        .chatbot-header {
            background: var(--primary);
            color: white;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .chatbot-header-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chatbot-avatar-active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
        }

        .chatbot-avatar-active svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        .chatbot-header-info h4 {
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1.2;
        }

        .chatbot-status {
            font-size: 0.75rem;
            color: #34d399;
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
        }

        .chatbot-status .status-dot {
            background: #10b981;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        .chatbot-header-close {
            background: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0.7;
            transition: var(--transition);
        }

        .chatbot-header-close:hover {
            opacity: 1;
        }

        .chatbot-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: #f8fafc;
        }

        .chat-message {
            max-width: 80%;
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 0.88rem;
            line-height: 1.5;
            word-wrap: break-word;
        }

        .chat-message.bot {
            background: white;
            color: var(--text-dark);
            align-self: flex-start;
            border-bottom-left-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            border: 1.5px solid #f1f5f9;
        }

        .chat-message.bot .status-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--secondary);
            animation: pulseActive 1.5s infinite;
        }

        @keyframes pulseActive {
            0% {
                transform: scale(0.95);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.1);
                opacity: 1;
            }

            100% {
                transform: scale(0.95);
                opacity: 0.5;
            }
        }

        .chat-message.user {
            background: var(--primary);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
            box-shadow: 0 4px 10px rgba(6, 78, 59, 0.15);
        }

        .chatbot-quick-replies {
            padding: 10px 16px;
            display: flex;
            gap: 8px;
            overflow-x: auto;
            background: #f8fafc;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .chatbot-quick-replies::-webkit-scrollbar {
            height: 4px;
        }

        .chatbot-quick-replies button {
            background: white;
            border: 1.5px solid #e2e8f0;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.78rem;
            color: var(--primary);
            cursor: pointer;
            white-space: nowrap;
            font-weight: 700;
            transition: var(--transition);
        }

        .chatbot-quick-replies button:hover {
            background: var(--primary-light);
            border-color: var(--primary);
        }

        .chatbot-input-area {
            padding: 14px 16px;
            display: flex;
            gap: 10px;
            background: white;
            align-items: center;
        }

        .chatbot-input-area input {
            flex: 1;
            border: 1.5px solid #e2e8f0;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 0.88rem;
            outline: none;
            transition: var(--transition);
        }

        .chatbot-input-area input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(6, 78, 59, 0.08);
        }

        .chatbot-send-btn {
            background: var(--primary);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .chatbot-send-btn:hover {
            background: var(--secondary);
            transform: scale(1.05);
        }

        .chatbot-send-btn svg {
            width: 18px;
            height: 18px;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        @media (max-width: 480px) {
            .chatbot-window {
                width: calc(100vw - 40px);
                height: 420px;
                bottom: 70px;
            }

            .chatbot-widget {
                bottom: 20px;
                right: 20px;
            }
        }

        /* --- FAQ Section --- */
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 0 15px;
        }

        .faq-item {
            background: white;
            border-radius: 16px;
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .faq-item:hover {
            box-shadow: var(--card-shadow-hover);
            border-color: rgba(16, 185, 129, 0.3);
        }

        .faq-question {
            width: 100%;
            padding: 22px 28px;
            background: none;
            border: none;
            text-align: left;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            gap: 15px;
            outline: none;
            transition: color 0.3s ease;
        }

        .faq-question:hover {
            color: var(--secondary);
        }

        .faq-icon {
            width: 20px;
            height: 20px;
            color: var(--text-muted);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), color 0.3s;
            flex-shrink: 0;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
            color: var(--secondary);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1), padding 0.4s ease;
            padding: 0 28px;
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .faq-item.active .faq-answer {
            padding-bottom: 22px;
        }

        .faq-answer p {
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- Developed by www.anstonic.site -->

    <!-- Background Glow -->
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
            <a href="#home">Home</a>
            <a href="#layanan">Layanan</a>
            <a href="#promo">Promo</a>
            <a href="#jadwal">Jadwal Dokter</a>
            <a href="#berita">Berita</a>
            <a href="{{ route('tindakan.index') }}">Estimasi Tindakan</a>
            <a href="#faq">FAQ</a>
            <a href="#kontak">Hubungi Kami</a>
            <!-- <a href="{{ route('admin.dashboard') }}" class="btn-admin-nav">Admin Portal</a> -->
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

    <!-- Hero Section -->
    <header class="hero" id="home">
        <!-- Background Carousel -->
        <div class="hero-bg-carousel">
            <div class="carousel-container">
                @forelse($slides as $index => $slide)
                    <div class="carousel-slide {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset($slide->image) }}" alt="{{ $slide->title ?? 'Slide Background' }}"
                            class="carousel-img">
                    </div>
                @empty
                    <!-- Fallback static slides if database has no slides -->
                    <div class="carousel-slide active">
                        <img src="{{ asset('images/hospital_hero.png') }}" alt="Medical Team" class="carousel-img">
                    </div>
                    <div class="carousel-slide">
                        <img src="{{ asset('images/hospital_lobby.png') }}" alt="Modern Hospital Lobby"
                            class="carousel-img">
                    </div>
                    <div class="carousel-slide">
                        <img src="{{ asset('images/hospital_doctors.png') }}" alt="Professional Medical Team"
                            class="carousel-img">
                    </div>
                @endforelse
            </div>
            <div class="carousel-overlay"></div>
        </div>

        <!-- Content Overlay -->
        <div class="hero-wrapper-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Partner Kesehatan Pekerja & Keluarga Anda</span>
                </div>
                <div class="hero-text-container">
                    <h1>Rumah Sakit <span>Umum Pekerja,</span><br>Melayani Sepenuh Hati</h1>
                    <p>Rumah Sakit Umum Pekerja berkomitmen memberikan pelayanan kesehatan berkualitas prima untuk para
                        pekerja dan masyarakat umum dengan fasilitas modern dan tim medis berpengalaman.</p>
                </div>
                <div class="hero-actions">
                    <a href="#jadwal" class="btn-primary-hero">
                        <span>Cari Jadwal Dokter</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            <circle cx="11" cy="11" r="8"></circle>
                        </svg>
                    </a>
                    <a href="#layanan" class="btn-outline-hero">
                        <span>Layanan Unggulan</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="hero-floating-card-wrapper">
                <!-- Card 1: BPJS -->
                <div class="hero-floating-card card-1">
                    <div class="floating-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="floating-card-text">
                        <h4>BPJS Kesehatan</h4>
                        <p>Menerima Pasien JKN & Asuransi</p>
                    </div>
                </div>

                <!-- Card 2: Accreditation -->
                <div class="hero-floating-card card-2">
                    <div class="floating-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <div class="floating-card-text">
                        <h4>Akreditasi Paripurna</h4>
                        <p>Standar Mutu Pelayanan KARS</p>
                    </div>
                </div>

                <!-- Card 3: 24 Hours -->
                <div class="hero-floating-card card-3">
                    <div class="floating-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </div>
                    <div class="floating-card-text">
                        <h4>UGD & Farmasi 24 Jam</h4>
                        <p>Layanan Darurat Siaga 24/7</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button class="carousel-arrow prev-arrow" aria-label="Previous Slide">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>
        <button class="carousel-arrow next-arrow" aria-label="Next Slide">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            @if($slides->count() > 0)
                @foreach($slides as $index => $slide)
                    <span class="indicator-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></span>
                @endforeach
            @else
                <span class="indicator-dot active" data-slide="0"></span>
                <span class="indicator-dot" data-slide="1"></span>
                <span class="indicator-dot" data-slide="2"></span>
            @endif
        </div>
    </header>

    <!-- Quick Services -->
    <section class="quick-services">
        <div class="qs-grid">
            <div class="qs-card">
                <div class="qs-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0zM12 9v4m0 4h.01" />
                    </svg>
                </div>
                <h3>UGD 24 Jam</h3>
                <p>Siaga darurat dengan tenaga medis responsif dan kompeten selama 24 jam penuh.</p>
                <a href="tel:02129484848" class="qs-link">Hubungi UGD &rarr;</a>
            </div>
            <div class="qs-card">
                <div class="qs-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </div>
                <h3>Pendaftaran Online</h3>
                <p>Pendaftaran rawat jalan yang praktis tanpa antre via WhatsApp resmi kami.</p>
                <a href="https://wa.me/6285777789022" target="_blank" class="qs-link">Daftar Sekarang &rarr;</a>
            </div>
            <div class="qs-card">
                <div class="qs-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3>Dokter Spesialis</h3>
                <p>Dokter spesialis yang lengkap mulai dari Anak, Kebidanan, Bedah, hingga Penyakit Dalam.</p>
                <a href="#jadwal" class="qs-link">Lihat Jadwal &rarr;</a>
            </div>
            <div class="qs-card">
                <div class="qs-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                    </svg>
                </div>
                <h3>MCU Karyawan</h3>
                <p>Pemeriksaan kesehatan berkala (Medical Check Up) untuk karyawan dan pekerja industri.</p>
                <a href="#promo" class="qs-link">Paket MCU &rarr;</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section-container" id="layanan">
        <div class="section-header">
            <span class="section-tag">Fasilitas RS</span>
            <h2 class="section-title">Layanan Medis Unggulan</h2>
            <p class="section-desc">RSU Pekerja menyediakan berbagai poli spesialis dan pelayanan penunjang medis yang
                komprehensif untuk mendiagnosis dan mengobati masalah kesehatan Anda secara tuntas.</p>
        </div>
        <div class="qs-grid">
            @forelse($facilities as $facility)
                <div class="qs-card" style="background: white;">
                    <div class="qs-icon"
                        style="background-color: var(--secondary-light); color: var(--secondary); padding: 8px; display: flex; align-items: center; justify-content: center;">
                        @if($facility->icon)
                            <img src="{{ asset('storage/' . $facility->icon) }}" alt="Icon"
                                style="width: 28px; height: 28px; object-fit: contain;">
                        @else
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        @endif
                    </div>
                    <h3>{{ $facility->title }}</h3>
                    <p>{{ $facility->description }}</p>
                </div>
            @empty
                <div
                    style="grid-column: 1 / -1; text-align: center; color: var(--text-muted); padding: 40px; background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    Belum ada data fasilitas/layanan medis unggulan.
                </div>
            @endforelse
        </div>
    </section>

    <!-- Promo Section -->
    <section class="section-container" id="promo"
        style="background-color: rgba(241, 245, 249, 0.85); border-radius: 40px; border: 1px solid rgba(226, 232, 240, 0.8);">
        <div class="section-header">
            <span class="section-tag">Promo Spesial</span>
            <h2 class="section-title">Promo & Paket Layanan</h2>
            <p class="section-desc">Nikmati potongan harga spesial dan penawaran paket pemeriksaan eksklusif dari kami
                demi mendukung gaya hidup sehat Anda.</p>
        </div>
        <div class="slider-wrapper">
            <div class="promo-grid" id="promo-slider">
                @forelse($promos as $promo)
                    <div class="promo-card">
                        <span class="promo-badge-tag">Promo Medis</span>
                        <div class="promo-img-wrapper">
                            <img src="{{ $promo->image ? (str_starts_with($promo->image, 'http') ? $promo->image : asset($promo->image)) : 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=600&q=80' }}"
                                alt="{{ $promo->title }}" class="promo-img">
                        </div>
                        <div class="promo-body">
                            <h3>{{ $promo->title }}</h3>
                            <div class="promo-date">
                                <svg viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Berlaku hingga:
                                    {{ $promo->valid_until ? \Carbon\Carbon::parse($promo->valid_until)->format('d M Y') : 'Selesai' }}</span>
                            </div>
                            <p class="promo-desc">{{ Str::limit($promo->description, 130) }}</p>
                            <a href="https://wa.me/6285777789022?text=Halo%20RSUP%2C%20saya%20tertarik%20dengan%20promo%20{{ urlencode($promo->title) }}"
                                target="_blank" class="btn-promo-detail">
                                <span>Hubungi via WA</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <svg viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5a2 2 0 10-2 2h2zm0 0h4m-4 0H8m12 3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h4>Belum Ada Promo Aktif</h4>
                        <p>Saat ini belum ada promo kesehatan yang dirilis. Silakan cek kembali nanti.</p>
                    </div>
                @endforelse
            </div>
            @if(count($promos) > 0)
                <!-- Navigation Buttons -->
                <button class="slider-nav-btn prev-btn"
                    onclick="document.getElementById('promo-slider').scrollBy({left: -380, behavior: 'smooth'})"
                    aria-label="Previous">
                    <svg viewBox="0 0 24 24">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                </button>
                <button class="slider-nav-btn next-btn"
                    onclick="document.getElementById('promo-slider').scrollBy({left: 380, behavior: 'smooth'})"
                    aria-label="Next">
                    <svg viewBox="0 0 24 24">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </button>
            @endif
        </div>
    </section>

    <!-- Doctor Schedule -->
    <section class="section-container" id="jadwal">
        <div class="section-header">
            <span class="section-tag">Jadwal Praktik</span>
            <h2 class="section-title">Cari & Temukan Dokter Anda</h2>
            <p class="section-desc">Temukan dokter spesialis pilihan Anda dan atur kunjungan dengan mudah. Silakan ketik
                nama dokter atau filter berdasarkan spesialisasi mereka.
                @if(!empty($nama_hari_ini))
                    <br><strong style="color: var(--secondary);">Hari ini: {{ $nama_hari_ini }},
                        {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}</strong>
                @endif
            </p>
        </div>

        <!-- Filter Component (Vanilla JS Powered) -->
        <div class="doctor-filter-container">
            <div class="filter-group">
                <label for="search-doctor">Nama Dokter</label>
                <div class="filter-input-wrapper">
                    <svg viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" id="search-doctor" class="filter-control" placeholder="Ketik nama dokter...">
                </div>
            </div>
            <div class="filter-group">
                <label for="filter-specialty">Spesialisasi / Klinik</label>
                <select id="filter-specialty" class="filter-control filter-select">
                    <option value="">Semua Spesialisasi</option>
                    <!-- JavaScript will auto populate this dynamically -->
                </select>
            </div>
        </div>

        <p
            style="text-align: center; font-size: 0.85rem; color: var(--danger); margin-top: 10px; margin-bottom: 20px; font-style: italic; font-weight: 500;">
            *Catatan: Jadwal dokter dapat berubah sewaktu-waktu. Mohon hubungi Customer Service untuk konfirmasi.
        </p>

        <div class="slider-wrapper">
            <div class="doctors-grid" id="doctors-grid">
                @forelse($doctors as $doctor)
                    <div class="doctor-card" data-name="{{ $doctor->name }}"
                        data-specialization="{{ $doctor->specialization }}">
                        <div class="doctor-avatar-wrapper">
                            <img src="{{ $doctor->photo ? $doctor->photo : 'https://ui-avatars.com/api/?name=' . urlencode($doctor->name) . '&background=064e3b&color=fff&size=200' }}"
                                alt="{{ $doctor->name }}" class="doctor-avatar">
                        </div>
                        <h3>{{ $doctor->name }}</h3>
                        <span class="doctor-specialty">{{ $doctor->specialization }}</span>
                        <div class="doctor-schedule-box">
                            <div class="doctor-schedule-title">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span>Hari & Jam Praktik</span>
                            </div>
                            @if(!empty($doctor->schedules))
                                <div class="schedule-rows">
                                    @foreach($doctor->schedules as $sched)
                                        <div class="schedule-row">
                                            <span class="schedule-day">{{ $sched->hari }}</span>
                                            <span class="schedule-time">{{ $sched->waktu_mulai }} -
                                                {{ $sched->waktu_selesai }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <span class="doctor-schedule-text">Hubungi Call Center</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <svg viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h4>Data Dokter Belum Tersedia</h4>
                        <p>Jadwal dokter spesialis belum dapat dimuat dari sistem. Silakan hubungi call center untuk
                            informasi jadwal.</p>
                    </div>
                @endforelse
            </div>
            @if(count($doctors) > 0)
                <button class="slider-nav-btn prev-btn"
                    onclick="document.getElementById('doctors-grid').scrollBy({left: -330, behavior: 'smooth'})"
                    aria-label="Previous">
                    <svg viewBox="0 0 24 24">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                </button>
                <button class="slider-nav-btn next-btn"
                    onclick="document.getElementById('doctors-grid').scrollBy({left: 330, behavior: 'smooth'})"
                    aria-label="Next">
                    <svg viewBox="0 0 24 24">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </button>
            @endif
        </div>
    </section>

    <!-- News Section -->
    <section class="section-container" id="berita"
        style="background-color: rgba(241, 245, 249, 0.85); border-radius: 40px; border: 1px solid rgba(226, 232, 240, 0.8);">
        <div class="section-header">
            <span class="section-tag">Info Kesehatan</span>
            <h2 class="section-title">Berita & Artikel Edukasi</h2>
            <p class="section-desc">Perluas wawasan Anda dengan membaca rilis informasi terbaru dari RSUP serta
                tips-tips kesehatan dari ahli medis terpercaya kami.</p>
        </div>
        <div class="slider-wrapper">
            <div class="news-grid" id="news-slider">
                @forelse($news as $item)
                    <div class="news-card">
                        <div class="news-img-wrapper">
                            <img src="{{ $item->image ? (str_starts_with($item->image, 'http') ? $item->image : asset($item->image)) : 'https://images.unsplash.com/photo-1504813184591-015578c7720c?auto=format&fit=crop&w=600&q=80' }}"
                                alt="{{ $item->title }}" class="news-img">
                        </div>
                        <div class="news-body">
                            <div class="news-meta">
                                <span class="news-badge">Kesehatan</span>
                                <div class="news-date">
                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <p class="news-text">{{ Str::limit(strip_tags($item->content), 120) }}</p>
                            <a href="{{ route('news.show', $item->id) }}" class="news-link">
                                <span>Baca Selengkapnya</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <svg viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 00-2-2m2 2a2 2 0 01-2 2m2-2h.01M17 16h.01M17 12h.01M17 8h.01M5 8h7m-7 4h7m-7 4h3" />
                            </svg>
                        </div>
                        <h4>Belum Ada Berita Rilis</h4>
                        <p>Saat ini belum ada artikel edukasi atau rilis berita yang diterbitkan oleh manajemen rumah sakit.
                        </p>
                    </div>
                @endforelse
            </div>
            @if(count($news) > 0)
                <!-- Navigation Buttons -->
                <button class="slider-nav-btn prev-btn"
                    onclick="document.getElementById('news-slider').scrollBy({left: -380, behavior: 'smooth'})"
                    aria-label="Previous">
                    <svg viewBox="0 0 24 24">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                </button>
                <button class="slider-nav-btn next-btn"
                    onclick="document.getElementById('news-slider').scrollBy({left: 380, behavior: 'smooth'})"
                    aria-label="Next">
                    <svg viewBox="0 0 24 24">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </button>
            @endif
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-container" id="faq">
        <div class="section-header">
            <span class="section-tag">FAQ</span>
            <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
            <p class="section-desc">Temukan jawaban cepat atas pertanyaan umum seputar layanan, fasilitas, pendaftaran,
                BPJS, dan kunjungan di RSU Pekerja.</p>
        </div>
        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question">
                    <span>Bagaimana cara melakukan pendaftaran online di RSU Pekerja?</span>
                    <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Pendaftaran online dapat dilakukan dengan mudah dengan menghubungi layanan WhatsApp Customer Care
                        / Marketing kami di nomor <strong>0857-7778-9022</strong> atau klik tombol "Pendaftaran WA" yang
                        tertera di bagian navigasi menu atas.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>Apakah RSU Pekerja menerima pasien BPJS Kesehatan?</span>
                    <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Ya, RSU Pekerja melayani pasien BPJS Kesehatan (JKN) untuk pelayanan Rawat Jalan (Poliklinik
                        Spesialis) dengan membawa surat rujukan dari FKTP, serta pelayanan Rawat Inap. Untuk layanan
                        IGD/UGD 24 jam, pasien dalam kondisi darurat medis dapat dilayani langsung tanpa rujukan.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>Kapan jam besok / kunjungan pasien rawat inap?</span>
                    <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Waktu kunjungan pasien rawat inap di RSU Pekerja terbagi dalam dua sesi demi kenyamanan istirahat
                        pasien:
                        <br>• <strong>Sesi Siang:</strong> Pukul 11:00 s/d 13:00 WIB
                        <br>• <strong>Sesi Sore/Malam:</strong> Pukul 17:00 s/d 19:00 WIB
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>Bagaimana cara mengetahui jadwal praktek dokter spesialis?</span>
                    <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Jadwal praktek dokter spesialis RSU Pekerja diperbarui secara berkala dan dapat Anda lihat
                        langsung di menu <strong>"Jadwal Dokter"</strong> pada halaman utama website ini. Anda juga bisa
                        menanyakan kehadiran dokter spesialis pada hari H melalui call center resmi kami.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">
                    <span>Apakah layanan UGD/IGD dan Ambulans siaga 24 jam?</span>
                    <svg class="faq-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div class="faq-answer">
                    <p>Ya, Unit Gawat Darurat (UGD) dan layanan penjemputan ambulans darurat RSU Pekerja beroperasi
                        <strong>24 jam penuh setiap hari</strong>, termasuk hari Minggu dan hari libur nasional, siap
                        menangani keadaan darurat medis kapan saja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section class="section-container" id="kontak">
        <div class="section-header">
            <span class="section-tag">Kontak & Lokasi</span>
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-desc">Kirimkan pertanyaan, saran, maupun kritik Anda demi meningkatkan pelayanan kami. Tim
                kami akan segera menanggapi pesan Anda.</p>
        </div>
        <div class="contact-layout">
            <!-- Contact info card -->
            <div class="contact-info-card">
                <div class="contact-row">
                    <div class="contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                    </div>
                    <div class="contact-row-text">
                        <h3>Telepon & Layanan UGD</h3>
                        <p>(021) 29484848 / 0857-7778-9022 (Marketing)</p>
                    </div>
                </div>
                <div class="contact-row">
                    <div class="contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="contact-row-text">
                        <h3>Email Resmi</h3>
                        <p>inforsupekerja.mkt@gmail.com / rs.umum.pekerja@gmail.com</p>
                    </div>
                </div>
                <div class="contact-row">
                    <div class="contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <div class="contact-row-text">
                        <h3>Lokasi Utama</h3>
                        <p>Jl. Raya Cakung Cilincing No. 46, Sukapura, Cilincing, Jakarta Utara, DKI Jakarta 14140</p>
                    </div>
                </div>
            </div>

            <!-- Contact map card -->
            <div class="contact-form-card"
                style="padding: 0; overflow: hidden; min-height: 450px; display: flex; border: 2px solid var(--primary);">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15867.646041903648!2d106.92405570000001!3d-6.1425879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698ab07931550b%3A0xec6ef0c6256e4c5f!2sRS%20Umum%20Pekerja!5e0!3m2!1sid!2sid!4v1780623406813!5m2!1sid!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <div class="footer-logo-wrapper">
                    <span class="footer-logo-title">RSU PEKERJA</span><br>
                    <span class="footer-logo-subtitle">KBN - RSUP</span>
                </div>
                <p>RSU Pekerja diresmikan oleh PT KBN Graha Medika dan dikelola secara profesional bekerja sama dengan
                    Danantara untuk melayani jaminan kesehatan pekerja kawasan industri dan warga sekitarnya.</p>
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
                    <li><a href="#home">Home</a></li>
                    <li><a href="#layanan">Layanan Medis</a></li>
                    <li><a href="#promo">Promo & Paket</a></li>
                    <li><a href="#jadwal">Jadwal Dokter</a></li>
                    <li><a href="#berita">Berita & Informasi</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#kontak">Hubungi Kami</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Link Cepat</h3>
                <ul class="footer-links">
                    <li><a href="https://wa.me/6285777789022" target="_blank">Pendaftaran Online</a></li>
                    <li><a href="{{ route('admin.dashboard') }}">Portal Admin</a></li>
                    <li><a href="#jadwal">Cari Jadwal Spesialis</a></li>
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
            // FAQ Accordion
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const questionBtn = item.querySelector('.faq-question');
                const answerDiv = item.querySelector('.faq-answer');

                questionBtn.addEventListener('click', function () {
                    const isActive = item.classList.contains('active');

                    // Close all other items
                    faqItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                        otherItem.querySelector('.faq-answer').style.maxHeight = null;
                    });

                    if (!isActive) {
                        item.classList.add('active');
                        // Calculate scrollHeight for smooth transition
                        answerDiv.style.maxHeight = answerDiv.scrollHeight + 'px';
                    }
                });
            });

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

            // Dynamic Doctor Filtering and Specialization Population
            const searchInput = document.getElementById('search-doctor');
            const filterSelect = document.getElementById('filter-specialty');
            const doctorCards = document.querySelectorAll('.doctor-card');

            // 1. Extract unique specialties from doctor cards and populate dropdown
            const specialties = new Set();
            doctorCards.forEach(card => {
                const spec = card.getAttribute('data-specialization');
                if (spec) {
                    specialties.add(spec.trim());
                }
            });

            // Sort and append specialties to the select dropdown
            Array.from(specialties).sort().forEach(spec => {
                const option = document.createElement('option');
                option.value = spec;
                option.textContent = spec;
                filterSelect.appendChild(option);
            });

            // 2. Filter function
            function filterDoctors() {
                const query = searchInput.value.toLowerCase().trim();
                const selectedSpecialty = filterSelect.value.toLowerCase().trim();
                let matchCount = 0;

                doctorCards.forEach(card => {
                    const name = card.getAttribute('data-name').toLowerCase();
                    const spec = card.getAttribute('data-specialization').toLowerCase();

                    const matchesSearch = name.includes(query);
                    const matchesSpecialty = selectedSpecialty === '' || spec === selectedSpecialty;

                    if (matchesSearch && matchesSpecialty) {
                        card.style.display = 'block';
                        matchCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Display empty state if no doctor matches
                let existingEmpty = document.getElementById('no-doctors-found');
                if (matchCount === 0 && doctorCards.length > 0) {
                    if (!existingEmpty) {
                        const emptyState = document.createElement('div');
                        emptyState.id = 'no-doctors-found';
                        emptyState.className = 'empty-state';
                        emptyState.style.width = '100%';
                        emptyState.style.gridColumn = '1 / -1';
                        emptyState.innerHTML = `
                            <div class="empty-state-icon">
                                <svg viewBox="0 0 24 24" style="width:48px;height:48px;stroke:currentColor;fill:none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"/></svg>
                            </div>
                            <h4>Tidak Menemukan Dokter</h4>
                            <p>Tidak ada dokter dengan nama atau spesialisasi tersebut yang sedang bertugas.</p>
                        `;
                        document.getElementById('doctors-grid').appendChild(emptyState);
                    }
                } else {
                    if (existingEmpty) {
                        existingEmpty.remove();
                    }
                }
            }

            // Bind filter events
            searchInput.addEventListener('input', filterDoctors);
            filterSelect.addEventListener('change', filterDoctors);

            // Hero Image Carousel Logic
            const slides = document.querySelectorAll('.carousel-slide');
            const dots = document.querySelectorAll('.indicator-dot');
            const prevBtn = document.querySelector('.prev-arrow');
            const nextBtn = document.querySelector('.next-arrow');
            const carouselWrapper = document.querySelector('.hero');

            let currentSlideIndex = 0;
            let slideInterval;
            const slideDuration = 5000; // 5 seconds

            function showSlide(index) {
                if (index >= slides.length) {
                    currentSlideIndex = 0;
                } else if (index < 0) {
                    currentSlideIndex = slides.length - 1;
                } else {
                    currentSlideIndex = index;
                }

                slides.forEach((slide, i) => {
                    if (i === currentSlideIndex) {
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });

                dots.forEach((dot, i) => {
                    if (i === currentSlideIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }

            function nextSlide() {
                showSlide(currentSlideIndex + 1);
            }

            function prevSlide() {
                showSlide(currentSlideIndex - 1);
            }

            function startSlideShow() {
                stopSlideShow();
                slideInterval = setInterval(nextSlide, slideDuration);
            }

            function stopSlideShow() {
                if (slideInterval) {
                    clearInterval(slideInterval);
                }
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    nextSlide();
                    startSlideShow();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    prevSlide();
                    startSlideShow();
                });
            }

            dots.forEach((dot, i) => {
                dot.addEventListener('click', function (e) {
                    e.preventDefault();
                    showSlide(i);
                    startSlideShow();
                });
            });

            if (carouselWrapper) {
                carouselWrapper.addEventListener('mouseenter', stopSlideShow);
                carouselWrapper.addEventListener('mouseleave', startSlideShow);
            }

            startSlideShow();

            // Info Modals Logic for Hero Floating Cards
            const infoModal = document.getElementById('info-modal');
            const infoModalTitle = document.getElementById('info-modal-title');
            const infoModalDesc = document.getElementById('info-modal-desc');
            const infoModalIcon = document.getElementById('info-modal-icon');

            const infoData = {
                bpjs: {
                    title: "BPJS Kesehatan & Asuransi",
                    iconClass: "bpjs",
                    svg: `<svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>`,
                    desc: `<p style="margin-bottom:15px;">Rumah Sakit Umum Pekerja melayani peserta Jaminan Kesehatan Nasional (JKN) / BPJS Kesehatan, BPJS Ketenagakerjaan (Kecelakaan Kerja), serta berbagai asuransi kesehatan swasta dan corporate partner.</p>
                           <p style="margin-bottom:15px;">Kami berkomitmen memberikan kemudahan proses pendaftaran dan pelayanan medis yang setara tanpa diskriminasi.</p>
                           <h5 style="text-align:left; color:var(--primary); margin-bottom:8px; font-weight:700;">Dokumen yang Dibutuhkan untuk BPJS:</h5>
                           <ul style="text-align:left; padding-left:20px; color:var(--text-muted); font-size:0.9rem;">
                             <li>Kartu Indonesia Sehat (KIS) / BPJS Kesehatan aktif</li>
                             <li>KTP atau kartu identitas resmi lainnya</li>
                             <li>Surat Rujukan dari Fasilitas Kesehatan Tingkat Pertama (FKTP) seperti Puskesmas/Klinik (kecuali kondisi Gawat Darurat/Emergency)</li>
                           </ul>`
                },
                akreditasi: {
                    title: "Akreditasi Paripurna (KARS)",
                    iconClass: "akreditasi",
                    svg: `<svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>`,
                    desc: `<p style="margin-bottom:15px;">RSU Pekerja telah melalui rangkaian survei penilaian mutu pelayanan dan keselamatan pasien yang ketat oleh Komisi Akreditasi Rumah Sakit (KARS) dan berhasil mendapatkan kelulusan tingkat <strong>Paripurna (Bintang Lima)</strong>.</p>
                           <p style="margin-bottom:15px;">Predikat Paripurna merupakan pengakuan tertinggi atas kepatuhan rumah sakit terhadap standar keselamatan pasien, mutu asuhan medis, kompetensi staf, dan kenyamanan sarana prasarana penunjang.</p>
                           <p>Pencapaian ini menjadi motivasi kami untuk terus menjaga kepercayaan Anda melalui perbaikan kualitas klinis yang berkelanjutan.</p>`
                },
                ugd: {
                    title: "UGD & Farmasi Siaga 24 Jam",
                    iconClass: "ugd",
                    svg: `<svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>`,
                    desc: `<p style="margin-bottom:15px;">Instalasi Gawat Darurat (UGD) dan Unit Farmasi RSU Pekerja siaga 24 jam sehari, 7 hari seminggu untuk menangani kondisi darurat medis Anda secara cepat dan tepat.</p>
                           <p style="margin-bottom:15px;">UGD kami dilengkapi dengan ruang triase, resusitasi, tindakan bedah/non-bedah, serta ambulans darurat yang siap menjemput kapan saja.</p>
                           <h5 style="text-align:left; color:var(--primary); margin-bottom:8px; font-weight:700;">Layanan Siaga UGD:</h5>
                           <ul style="text-align:left; padding-left:20px; color:var(--text-muted); font-size:0.9rem; margin-bottom:15px;">
                             <li>Dokter jaga dan tim perawat bersertifikasi ACLS, BTCLS, dan ATLS</li>
                             <li>Apotek 24 jam untuk ketersediaan obat emergency secara instan</li>
                             <li>Pemeriksaan Laboratorium & Radiologi Cepat 24 Jam</li>
                           </ul>
                           <p style="text-align:center; font-weight:700; color:var(--danger);">Hubungi Emergency UGD: (021) 29484848</p>`
                }
            };

            const floatingCards = {
                'card-1': 'bpjs',
                'card-2': 'akreditasi',
                'card-3': 'ugd'
            };

            Object.keys(floatingCards).forEach(className => {
                const cardEl = document.querySelector(`.hero-floating-card.${className}`);
                if (cardEl) {
                    cardEl.addEventListener('click', function () {
                        const type = floatingCards[className];
                        const data = infoData[type];
                        if (data && infoModal) {
                            infoModalTitle.textContent = data.title;
                            infoModalDesc.innerHTML = data.desc;
                            infoModalIcon.className = `info-modal-icon-wrapper ${data.iconClass}`;
                            infoModalIcon.innerHTML = data.svg;

                            // Open Modal
                            infoModal.style.display = 'flex';
                            setTimeout(() => {
                                infoModal.classList.add('active');
                            }, 10);
                        }
                    });
                }
            });

            window.closeInfoModal = function () {
                if (infoModal) {
                    infoModal.classList.remove('active');
                    setTimeout(() => {
                        infoModal.style.display = 'none';
                    }, 300);
                }
            };

            // --- Chatbot Frontend Logic ---
            window.toggleChatbot = function () {
                const windowEl = document.getElementById('chatbot-window');
                const toggleBtn = document.querySelector('.chatbot-toggle-btn');
                const chatIcon = toggleBtn.querySelector('.chat-icon');
                const closeIcon = toggleBtn.querySelector('.close-icon');

                if (windowEl.classList.contains('active')) {
                    windowEl.classList.remove('active');
                    setTimeout(() => {
                        windowEl.style.display = 'none';
                    }, 300);
                    chatIcon.style.display = 'block';
                    closeIcon.style.display = 'none';
                } else {
                    windowEl.style.display = 'flex';
                    setTimeout(() => {
                        windowEl.classList.add('active');
                    }, 10);
                    chatIcon.style.display = 'none';
                    closeIcon.style.display = 'block';
                    // Scroll to bottom
                    const msgEl = document.getElementById('chatbot-messages');
                    msgEl.scrollTop = msgEl.scrollHeight;
                }
            };

            window.sendChatbotMessage = function () {
                const inputEl = document.getElementById('chatbot-input');
                const message = inputEl.value.trim();
                if (!message) return;

                // Append User Message
                appendChatMessage(message, 'user');
                inputEl.value = '';

                // Loading state
                const loadingId = appendChatMessage('<span class="status-dot"></span> Sedang berpikir...', 'bot loading');

                // Send Ajax Request to Backend
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
            };

            window.handleChatEnter = function (event) {
                if (event.key === 'Enter') {
                    sendChatbotMessage();
                }
            };

            window.sendQuickReply = function (text) {
                appendChatMessage(text, 'user');

                // Loading state
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
            };

            function appendChatMessage(text, sender) {
                const msgEl = document.getElementById('chatbot-messages');
                const msgId = 'msg-' + Date.now() + Math.random().toString(36).substr(2, 9);

                const messageDiv = document.createElement('div');
                messageDiv.id = msgId;
                messageDiv.className = `chat-message ${sender}`;
                messageDiv.innerHTML = text;

                msgEl.appendChild(messageDiv);
                msgEl.scrollTop = msgEl.scrollHeight;
                return msgId;
            }

            function removeLoadingMessage(id) {
                const el = document.getElementById(id);
                if (el) el.remove();
            }
        });
    </script>

    <!-- Detail Modal -->
    <div id="info-modal" class="info-modal">
        <div class="info-modal-backdrop" onclick="closeInfoModal()"></div>
        <div class="info-modal-content">
            <button class="info-modal-close" onclick="closeInfoModal()">&times;</button>
            <div class="info-modal-body">
                <div class="info-modal-icon-wrapper" id="info-modal-icon"></div>
                <h3 class="info-modal-title" id="info-modal-title">Title</h3>
                <div class="info-modal-desc" id="info-modal-desc">Description</div>
            </div>
        </div>
    </div>

    <!-- Chatbot Widget -->
    <div class="chatbot-widget">
        <!-- Floating Button -->
        <button class="chatbot-toggle-btn" onclick="toggleChatbot()" aria-label="Chat with us">
            <svg class="chat-icon" viewBox="0 0 24 24">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <svg class="close-icon" viewBox="0 0 24 24" style="display: none;">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>

        <!-- Chat Window -->
        <div class="chatbot-window" id="chatbot-window">
            <div class="chatbot-header">
                <div class="chatbot-header-info">
                    <div class="chatbot-avatar-active">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div>
                        <h4 style="margin: 0; text-align: left;">Pekerja Care</h4>
                        <span class="chatbot-status" style="display: flex; align-items: center; gap: 4px;"><span
                                class="status-dot"
                                style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span>
                            Online</span>
                    </div>
                </div>
                <button class="chatbot-header-close" onclick="toggleChatbot()">&times;</button>
            </div>

            <div class="chatbot-messages" id="chatbot-messages">
                <div class="chat-message bot">
                    Halo! Saya Pekerja Care, Asisten Virtual RSU Pekerja. Ada yang bisa saya bantu hari ini?
                </div>
            </div>

            <!-- Quick Replies -->
            <div class="chatbot-quick-replies">
                <button onclick="sendQuickReply('Tanya pendaftaran BPJS')">Info BPJS</button>
                <button onclick="sendQuickReply('Tanya jadwal dokter spesialis')">Jadwal Dokter</button>
                <button onclick="sendQuickReply('Hubungi nomor UGD darurat')">Layanan UGD</button>
                <button onclick="sendQuickReply('Bagaimana cara daftar online?')">Daftar Online</button>
            </div>

            <div class="chatbot-input-area">
                <input type="text" id="chatbot-input" placeholder="Tulis pesan Anda..."
                    onkeypress="handleChatEnter(event)">
                <button class="chatbot-send-btn" onclick="sendChatbotMessage()">
                    <svg viewBox="0 0 24 24">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </div>
        </div>

        @if(isset($popups) && $popups->count() > 0)
            <!-- Popup Images Overlay -->
            <div id="image-popup-overlay" class="image-popup-overlay" style="display: none;">
                <div class="image-popup-wrapper">
                    @foreach($popups as $index => $popup)
                        <div class="image-popup-item" id="popup-item-{{ $index }}" style="display: none;">
                            <button class="image-popup-close-btn" onclick="closePopup({{ $index }})" aria-label="Close">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            <div class="image-popup-content-box">
                                <img src="{{ asset($popup->image) }}" alt="{{ $popup->title ?? 'Popup' }}"
                                    class="image-popup-img">
                                <!-- @if($popup->title)
                                                <div class="image-popup-caption">
                                                    {{ $popup->title }}
                                                </div>
                                            @endif -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <style>
                .image-popup-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(15, 23, 42, 0.75);
                    backdrop-filter: blur(8px);
                    z-index: 99999;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    opacity: 0;
                    transition: opacity 0.4s ease;
                }

                .image-popup-overlay.show {
                    opacity: 1;
                }

                .image-popup-wrapper {
                    position: relative;
                    max-width: 90%;
                    max-height: 90%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .image-popup-item {
                    position: relative;
                    background: white;
                    border-radius: 20px;
                    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                    overflow: hidden;
                    transform: scale(0.9);
                    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
                    max-width: 600px;
                    width: 100%;
                }

                .image-popup-overlay.show .image-popup-item.active {
                    transform: scale(1);
                }

                .image-popup-close-btn {
                    position: absolute;
                    top: 15px;
                    right: 15px;
                    width: 36px;
                    height: 36px;
                    background: rgba(15, 23, 42, 0.6);
                    border: none;
                    border-radius: 50%;
                    color: white;
                    cursor: pointer;
                    z-index: 10;
                    transition: background 0.3s, transform 0.3s;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 0;
                }

                .image-popup-close-btn:hover {
                    background: rgba(239, 68, 68, 0.9);
                    transform: scale(1.1);
                }

                .image-popup-content-box {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .image-popup-img {
                    max-width: 100%;
                    max-height: 70vh;
                    object-fit: contain;
                    display: block;
                }

                .image-popup-caption {
                    padding: 16px 24px;
                    background: white;
                    color: var(--text-dark);
                    font-weight: 700;
                    font-size: 1.1rem;
                    text-align: center;
                    width: 100%;
                    box-sizing: border-box;
                    border-top: 1px solid #f1f5f9;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const overlay = document.getElementById('image-popup-overlay');
                    let currentPopupIndex = 0;
                    const totalPopups = {{ $popups->count() }};

                    function showPopup(index) {
                        if (index >= totalPopups) {
                            // All popups shown, close overlay
                            overlay.classList.remove('show');
                            setTimeout(() => {
                                overlay.style.display = 'none';
                            }, 400);
                            return;
                        }

                        // Hide all popups
                        for (let i = 0; i < totalPopups; i++) {
                            const item = document.getElementById('popup-item-' + i);
                            if (item) {
                                item.style.display = 'none';
                                item.classList.remove('active');
                            }
                        }

                        // Show the specific popup
                        const currentItem = document.getElementById('popup-item-' + index);
                        if (currentItem) {
                            currentItem.style.display = 'block';
                            overlay.style.display = 'flex';
                            // Trigger reflow/macro-task to let CSS transition work
                            setTimeout(() => {
                                overlay.classList.add('show');
                                currentItem.classList.add('active');
                            }, 50);
                        }
                    }

                    // Initial start
                    showPopup(currentPopupIndex);

                    // Exposed close function to handle click actions
                    window.closePopup = function (index) {
                        const currentItem = document.getElementById('popup-item-' + index);
                        if (currentItem) {
                            currentItem.classList.remove('active');
                        }

                        // Small delay before transition to next popup
                        currentPopupIndex++;
                        setTimeout(() => {
                            showPopup(currentPopupIndex);
                        }, 300);
                    };
                });
            </script>
        @endif
</body>

</html>