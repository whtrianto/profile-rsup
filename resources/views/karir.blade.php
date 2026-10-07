<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Informasi Lowongan Karir RSU Pekerja KBN">
    <meta name="keywords" content="Lowongan Kerja, Karir RSUP KBN, Rumah Sakit Umum Pekerja">
    <meta name="robots" content="index, follow">
    <title>Karir - RSU Pekerja KBN</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
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
            --transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { color: var(--text-dark); background-color: var(--bg-light); min-height: 100vh; overflow-x: hidden; display: flex; flex-direction: column; }

        nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            padding: 1rem 5%; display: flex; justify-content: space-between; align-items: center;
            position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 20px -10px rgba(0, 0, 0, 0.05);
        }
        .logo-container { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-title { font-size: 1.15rem; font-weight: 800; color: var(--primary); line-height: 1.2; }
        .logo-subtitle { font-size: 0.7rem; font-weight: 700; color: var(--secondary); letter-spacing: 0.8px; }
        
        .btn-back-nav {
            border: 1.5px solid var(--primary); color: var(--primary); padding: 8px 18px; border-radius: 30px;
            font-size: 0.9rem; font-weight: 700; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
            transition: var(--transition);
        }
        .btn-back-nav:hover { background: var(--primary); color: white; }

        .container { max-width: 1200px; margin: 3rem auto; padding: 0 5%; flex: 1; width: 100%; }
        .page-title { font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 1rem; text-align: center; }
        .page-desc { font-size: 1.05rem; color: var(--text-muted); text-align: center; margin-bottom: 3rem; }

        .karir-grid {
            display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;
        }
        .karir-card {
            background: white; border-radius: 20px; overflow: hidden; box-shadow: var(--card-shadow);
            transition: var(--transition); display: flex; flex-direction: column; border: 1px solid #f1f5f9;
        }
        .karir-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.15); }
        .karir-img-wrapper { width: 100%; height: 280px; background: #e2e8f0; overflow: hidden; }
        .karir-img { width: 100%; height: 100%; object-fit: cover; transition: var(--transition); }
        .karir-card:hover .karir-img { transform: scale(1.05); }
        .karir-body { padding: 24px; flex: 1; display: flex; flex-direction: column; }
        .karir-desc { font-size: 0.95rem; color: var(--text-dark); line-height: 1.6; margin-bottom: 15px; flex-grow: 1; }
        .karir-date { font-size: 0.8rem; color: var(--text-muted); display: flex; align-items: center; gap: 6px; }

        footer { background: #0b2e24; color: rgba(255, 255, 255, 0.7); padding: 3rem 5% 2rem 5%; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.08); margin-top: 5rem; }

        /* Modal Styles */
        .modal-overlay {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(4px); z-index: 2000; display: none; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.3s ease; padding: 20px;
        }
        .modal-overlay.active { display: flex; opacity: 1; }
        .modal-content {
            background: white; border-radius: 24px; width: 100%; max-width: 950px; max-height: 90vh;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); transform: translateY(20px); transition: transform 0.3s ease;
            position: relative; overflow: hidden; display: flex; flex-direction: column;
        }
        .modal-overlay.active .modal-content { transform: translateY(0); }
        .modal-close {
            position: absolute; top: 15px; right: 15px; background: rgba(15, 23, 42, 0.6); color: white; border: none;
            width: 36px; height: 36px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: background 0.3s ease; z-index: 10;
        }
        .modal-close:hover { background: #ef4444; }
        .modal-body { display: flex; flex-direction: column; flex: 1; overflow-y: auto; }
        .modal-img-wrapper { width: 100%; background: #f8fafc; display: flex; justify-content: center; align-items: center; padding: 30px; border-bottom: 1px solid #f1f5f9; }
        .modal-img { width: 100%; max-width: 350px; height: auto; max-height: 50vh; object-fit: contain; border-radius: 12px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1); }
        .modal-info { padding: 30px; }
        .modal-title { font-size: 1.75rem; font-weight: 800; color: var(--primary); margin-bottom: 10px; }
        .modal-date { font-size: 0.9rem; color: var(--text-muted); display: flex; align-items: center; gap: 8px; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #f1f5f9; }
        .modal-desc { font-size: 1.05rem; color: var(--text-dark); line-height: 1.7; }
        .karir-card { cursor: pointer; }

        @media (min-width: 768px) {
            .modal-body { flex-direction: row; }
            .modal-img-wrapper { width: 45%; border-bottom: none; border-right: 1px solid #f1f5f9; padding: 40px; }
            .modal-img { max-width: 100%; max-height: 70vh; }
            .modal-info { width: 55%; padding: 40px; }
        }

        /* Lightbox Styles */
        .lightbox-overlay {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.9);
            z-index: 3000; display: none; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.3s ease;
        }
        .lightbox-overlay.active { display: flex; opacity: 1; }
        .lightbox-content { position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; overflow: hidden; }
        .lightbox-img {
            max-width: 95%; max-height: 95vh; object-fit: contain;
            transform: scale(1); transition: transform 0.2s ease; cursor: grab;
        }
        .lightbox-img:active { cursor: grabbing; transition: none; }
        .lightbox-close {
            position: absolute; top: 20px; right: 20px; background: rgba(255, 255, 255, 0.2); color: white; border: none;
            width: 44px; height: 44px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: background 0.3s ease; z-index: 3010;
        }
        .lightbox-close:hover { background: #ef4444; }
        .lightbox-controls {
            position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); display: flex; gap: 15px; z-index: 3010;
            background: rgba(0, 0, 0, 0.6); padding: 10px 20px; border-radius: 30px; backdrop-filter: blur(5px);
        }
        .lightbox-btn {
            background: rgba(255, 255, 255, 0.2); color: white; border: none; width: 40px; height: 40px; border-radius: 50%;
            cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.3s ease;
        }
        .lightbox-btn:hover { background: rgba(255, 255, 255, 0.4); }

        /* --- Responsive --- */
        @media (max-width: 992px) {
            .container { padding: 0 3%; }
        }

        @media (max-width: 768px) {
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

            .btn-back-nav span {
                display: none;
            }

            .btn-back-nav {
                padding: 8px 12px;
                border-radius: 50%;
            }

            .page-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .logo-container img:first-of-type {
                display: none; /* Sembunyikan Danantara di layar sangat kecil */
            }
            .logo-title {
                font-size: 0.85rem;
            }
            .logo-subtitle {
                font-size: 0.6rem;
            }
            .page-title {
                font-size: 1.75rem;
            }
            .karir-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset('images/danantara.png') }}" alt="Logo Danantara" style="height: 40px; margin-right: 8px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo RSUP" style="height: 60px;">
            <div class="logo-text-wrapper">
                <span class="logo-title">RUMAH SAKIT UMUM PEKERJA</span><br>
                <span class="logo-subtitle">KBN - RSUP</span>
            </div>
        </a>
        <a href="{{ url('/') }}" class="btn-back-nav">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            <span>Kembali ke Beranda</span>
        </a>
    </nav>

    <div class="container">
        <h1 class="page-title">Informasi Lowongan Karir</h1>
        <p class="page-desc">Bergabunglah bersama kami di Rumah Sakit Umum Pekerja</p>

        @if($karirs->count() > 0)
            <div class="karir-grid">
                @foreach($karirs as $karir)
                    <div class="karir-card" onclick="openModal('{{ $karir->id }}')">
                        <div class="karir-img-wrapper">
                            @if($karir->image)
                                <img src="{{ asset($karir->image) }}" alt="Pamflet Karir" class="karir-img">
                            @else
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: var(--text-muted);">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="karir-body">
                            <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--primary); margin-bottom: 10px; line-height: 1.4;">{{ $karir->title }}</h3>
                            <div class="karir-desc" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                                {!! nl2br(e($karir->description)) !!}
                            </div>
                            <div class="karir-date">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <span>Diposting pada {{ $karir->created_at ? $karir->created_at->format('d M Y') : '-' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 3rem; background: white; border-radius: 20px; box-shadow: var(--card-shadow);">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="var(--text-muted)" stroke-width="1.5" style="margin-bottom: 1rem;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                <h3 style="font-size: 1.25rem; color: var(--text-dark); margin-bottom: 0.5rem;">Belum ada lowongan tersedia</h3>
                <p style="color: var(--text-muted);">Saat ini belum ada informasi lowongan karir terbaru. Silakan cek kembali nanti.</p>
            </div>
        @endif
    </div>

    <footer>
        <p style="font-size: 0.88rem; margin-bottom: 8px;">&copy; 2026 Rumah Sakit Umum Pekerja. Hak Cipta Dilindungi Undang-Undang.</p>
        <p style="font-size: 0.8rem; opacity: 0.7;">Managed by PT KBN Graha Medika</p>
    </footer>

    <!-- Modal -->
    <div class="modal-overlay" id="karirModal" onclick="closeModal(event)">
        <div class="modal-content" id="modalContent" onclick="event.stopPropagation()">
            <button class="modal-close" onclick="closeModal(event)">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <div class="modal-body">
                <div class="modal-img-wrapper">
                    <img src="" alt="Pamflet Karir" id="modalImg" class="modal-img" style="cursor: zoom-in;" onclick="openLightbox(this.src)" title="Klik untuk memperbesar">
                </div>
                <div class="modal-info">
                    <h2 class="modal-title" id="modalTitle"></h2>
                    <div class="modal-date">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span id="modalDate"></span>
                    </div>
                    <div class="modal-desc" id="modalDesc"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox -->
    <div class="lightbox-overlay" id="imageLightbox">
        <button class="lightbox-close" onclick="closeLightbox(event)">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <div class="lightbox-content" id="lightboxContent">
            <img src="" alt="Full Image" id="lightboxImg" class="lightbox-img">
        </div>
        <div class="lightbox-controls">
            <button class="lightbox-btn" onclick="zoomOut(event)" title="Perkecil">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button>
            <button class="lightbox-btn" onclick="zoomIn(event)" title="Perbesar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button>
        </div>
    </div>

    <!-- Data karir untuk JS -->
    <script>
        const karirData = {
            @foreach($karirs as $k)
                "{{ $k->id }}": {
                    title: {!! json_encode($k->title) !!},
                    image: "{{ $k->image ? asset($k->image) : '' }}",
                    date: "Diposting pada {{ $k->created_at ? $k->created_at->format('d M Y') : '-' }}",
                    desc: {!! json_encode(nl2br(e($k->description))) !!}
                }{{ $loop->last ? '' : ',' }}
            @endforeach
        };

        const modal = document.getElementById('karirModal');
        
        function openModal(id) {
            const data = karirData[id];
            if(!data) return;
            
            document.getElementById('modalTitle').innerText = data.title;
            document.getElementById('modalDate').innerText = data.date;
            document.getElementById('modalDesc').innerHTML = data.desc;
            
            const imgEl = document.getElementById('modalImg');
            if(data.image) {
                imgEl.src = data.image;
                imgEl.style.display = 'block';
            } else {
                imgEl.style.display = 'none';
            }

            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(e) {
            if(e) e.preventDefault();
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Lightbox Functionality
        const lightbox = document.getElementById('imageLightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        let currentZoom = 1;

        function openLightbox(src) {
            if(!src) return;
            lightboxImg.src = src;
            lightbox.classList.add('active');
            currentZoom = 1;
            translateX = 0;
            translateY = 0;
            updateTransform();
        }

        function closeLightbox(e) {
            if(e) {
                if(e.target.id === 'lightboxImg') return; // Jangan tutup jika klik gambar
                e.preventDefault();
            }
            lightbox.classList.remove('active');
            setTimeout(() => {
                currentZoom = 1;
                translateX = 0;
                translateY = 0;
                updateTransform();
            }, 300);
        }

        function zoomIn(e) {
            if(e) e.stopPropagation();
            if (currentZoom < 4) {
                currentZoom += 0.5;
                updateTransform();
            }
        }

        function zoomOut(e) {
            if(e) e.stopPropagation();
            if (currentZoom > 1) {
                currentZoom -= 0.5;
            } else {
                currentZoom = 1;
                translateX = 0;
                translateY = 0;
            }
            updateTransform();
        }

        function updateTransform() {
            lightboxImg.style.transform = `scale(${currentZoom}) translate(${translateX / currentZoom}px, ${translateY / currentZoom}px)`;
        }

        // Drag functionality
        let isDragging = false;
        let startX, startY, translateX = 0, translateY = 0;

        lightboxImg.addEventListener('mousedown', (e) => {
            if (currentZoom > 1) {
                isDragging = true;
                startX = e.clientX - translateX;
                startY = e.clientY - translateY;
            }
            e.preventDefault();
        });

        window.addEventListener('mousemove', (e) => {
            if (isDragging && currentZoom > 1) {
                translateX = e.clientX - startX;
                translateY = e.clientY - startY;
                updateTransform();
            }
        });

        window.addEventListener('mouseup', () => {
            isDragging = false;
        });
        
        // Tutup lightbox jika klik background
        document.getElementById('lightboxContent').addEventListener('click', function(e) {
            if(e.target === this) closeLightbox();
        });
    </script>
</body>
</html>
