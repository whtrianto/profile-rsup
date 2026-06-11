<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ Str::limit(strip_tags($item->content), 150) }}">
    <meta name="keywords" content="Berita Kesehatan, Info RSUP KBN, Artikel Medis, Rumah Sakit Umum Pekerja">
    <meta name="robots" content="index, follow">
    <title>{{ $item->title }} - RSU Pekerja KBN</title>
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/jpeg">
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
            --card-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.08);
            --card-shadow-hover: 0 20px 40px -15px rgba(15, 23, 42, 0.15);
            --transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, border 0.3s ease;
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
                radial-gradient(circle at 20% 20%, rgba(6, 78, 59, 0.06) 0%, transparent 55%),
                radial-gradient(circle at 80% 80%, rgba(16, 185, 129, 0.06) 0%, transparent 55%),
                radial-gradient(circle at 50% 50%, rgba(134, 239, 172, 0.04) 0%, transparent 45%);
            animation: rotateBg 45s infinite alternate ease-in-out;
        }

        @keyframes rotateBg {
            0% {
                transform: rotate(0deg) scale(1);
            }

            50% {
                transform: rotate(90deg) scale(1.05);
            }

            100% {
                transform: rotate(180deg) scale(1);
            }
        }

        /* --- Navbar --- */
        nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            padding: 1rem 5%;
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

        .btn-back-nav {
            border: 1.5px solid var(--primary);
            color: var(--primary);
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .btn-back-nav:hover {
            background: var(--primary);
            color: white;
        }

        /* --- Article Layout --- */
        .article-container {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
        }

        .article-main {
            background: white;
            border: 1px solid #f1f5f9;
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--card-shadow);
        }

        .btn-back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--secondary);
            font-weight: 700;
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .btn-back-link:hover {
            color: var(--secondary-hover);
            transform: translateX(-4px);
        }

        .article-badge {
            background: var(--primary-light);
            color: var(--primary);
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 800;
            display: inline-block;
            margin-bottom: 1.25rem;
            text-transform: uppercase;
        }

        .article-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.25;
            margin-bottom: 1.25rem;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            color: var(--text-muted);
            font-size: 0.88rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 1.25rem;
        }

        .article-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .article-meta-item svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
        }

        .article-img-wrapper {
            border-radius: 16px;
            overflow: hidden;
            width: 100%;
            height: 400px;
            background: #e2e8f0;
            margin-bottom: 2.5rem;
            border: 1px solid #e2e8f0;
        }

        .article-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-content {
            font-size: 1.05rem;
            color: var(--text-dark);
            line-height: 1.8;
        }

        .article-content p {
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        /* --- Sidebar --- */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar-widget {
            background: white;
            border: 1px solid #f1f5f9;
            border-radius: 24px;
            padding: 30px;
            box-shadow: var(--card-shadow);
        }

        .widget-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .recent-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .recent-item {
            display: flex;
            gap: 12px;
            text-decoration: none;
            color: inherit;
        }

        .recent-img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: #f1f5f9;
        }

        .recent-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .recent-info h4 {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: var(--transition);
        }

        .recent-item:hover h4 {
            color: var(--secondary);
        }

        .recent-date {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* --- Responsive --- */
        @media (max-width: 992px) {
            .article-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .article-main {
                padding: 24px;
            }

            .article-title {
                font-size: 1.75rem;
            }

            .article-img-wrapper {
                height: 250px;
            }
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
            background: rgba(255,255,255,0.15);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid rgba(255,255,255,0.3);
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
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
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
            0% { transform: scale(0.95); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.5; }
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
    </style>
</head>

<body>

    <!-- Background Glow -->
    <div class="bg-glow"></div>

    <!-- Navbar -->
    <nav>
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo RSUP" class="logo-img"
                style="height: 40px; width: auto; border-radius: 6px; border: 1.5px solid white; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
            <div class="logo-text-wrapper">
                <span class="logo-title">RSU PEKERJA</span><br>
                <span class="logo-subtitle">KBN</span>
            </div>
        </a>

        <a href="{{ url('/') }}#berita" class="btn-back-nav">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Kembali ke Berita</span>
        </a>
    </nav>

    <!-- Content -->
    <div class="article-container">
        <!-- Main Content -->
        <main class="article-main">
            <a href="{{ url('/') }}#berita" class="btn-back-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span>Kembali ke Beranda</span>
            </a>

            <span class="article-badge">Kesehatan</span>

            <h1 class="article-title">{{ $item->title }}</h1>

            <div class="article-meta">
                <div class="article-meta-item">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}</span>
                </div>
                <div class="article-meta-item">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>Admin RSUP</span>
                </div>
            </div>

            <div class="article-img-wrapper">
                <img src="{{ $item->image ? (str_starts_with($item->image, 'http') ? $item->image : asset($item->image)) : 'https://images.unsplash.com/photo-1504813184591-015578c7720c?auto=format&fit=crop&w=800&q=80' }}"
                    alt="{{ $item->title }}" class="article-img">
            </div>

            <div class="article-content">
                {!! nl2br(e($item->content)) !!}
            </div>
        </main>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-widget">
                <h3 class="widget-title">Artikel Terbaru</h3>
                <div class="recent-list">
                    @forelse($otherNews as $recent)
                    <a href="{{ route('news.show', $recent->id) }}" class="recent-item">
                        <img src="{{ $recent->image ? (str_starts_with($recent->image, 'http') ? $recent->image : asset($recent->image)) : 'https://images.unsplash.com/photo-1504813184591-015578c7720c?auto=format&fit=crop&w=200&q=80' }}"
                            alt="{{ $recent->title }}" class="recent-img">
                        <div class="recent-info">
                            <h4>{{ $recent->title }}</h4>
                            <span
                                class="recent-date">{{ \Carbon\Carbon::parse($recent->published_at)->format('d M Y') }}</span>
                        </div>
                    </a>
                    @empty
                    <p style="font-size: 0.88rem; color: var(--text-muted);">Tidak ada artikel lain.</p>
                    @endforelse
                </div>
            </div>

            <div class="sidebar-widget" style="background-color: var(--primary); color: white;">
                <h3 class="widget-title" style="color: white;">Layanan Darurat</h3>
                <p style="font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; opacity: 0.85;">
                    Kami siap melayani kebutuhan medis darurat Anda dan keluarga 24 jam sehari. Hubungi kontak darurat
                    kami segera.
                </p>
                <a href="tel:02129484848"
                    style="background: var(--danger); color: white; display: block; text-align: center; padding: 12px; border-radius: 10px; text-decoration: none; font-weight: 700; transition: var(--transition);">
                    UGD: (021) 29484848
                </a>
            </div>
        </aside>
    </div>

    <!-- Footer -->
    <footer
        style="background: #0b2e24; color: rgba(255, 255, 255, 0.7); padding: 3rem 5% 2rem 5%; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.08);">
        <p style="font-size: 0.88rem; margin-bottom: 8px;">&copy; 2026 Rumah Sakit Umum Pekerja. Hak Cipta Dilindungi
            Undang-Undang.</p>
        <p style="font-size: 0.8rem; opacity: 0.7;">Managed by PT KBN Graha Medika</p>
    </footer>

    <!-- Chatbot Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Chatbot Frontend Logic ---
            window.toggleChatbot = function() {
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

            window.sendChatbotMessage = function() {
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

            window.handleChatEnter = function(event) {
                if (event.key === 'Enter') {
                    sendChatbotMessage();
                }
            };

            window.sendQuickReply = function(text) {
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
                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </div>
                    <div>
                        <h4 style="margin: 0; text-align: left;">Pekerja Care</h4>
                        <span class="chatbot-status" style="display: flex; align-items: center; gap: 4px;"><span class="status-dot" style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span> Online</span>
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
                <input type="text" id="chatbot-input" placeholder="Tulis pesan Anda..." onkeypress="handleChatEnter(event)">
                <button class="chatbot-send-btn" onclick="sendChatbotMessage()">
                    <svg viewBox="0 0 24 24">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</body>

</html>