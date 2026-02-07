<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Kita - Melestarikan Warisan Budaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #052070;
            --accent-color: #3498DB;
            --light-color: #F8F9FA;
            --dark-color: #212529;
            --transition: all 0.3s ease;
            /* Default light theme */
            --body-bg: #ffffff;
            --text-color: #000000;
            --card-bg: #FFFFFF;
            --shadow-color: rgba(0,0,0,0.08);
            --border-color: rgba(0,0,0,0.1);
            --brand-color: #2C3E50;
            --navbar-bg: #1E3A8A;
            --btn-primary-bg: #2C3E50;
            --btn-primary-hover: #1a252f;
        }
        
        [data-theme="dark"] {
            /* Dark theme - 100% Abu-abu Netral */
            --body-bg: #121212;
            --text-color: #e0e0e0;
            --card-bg: #1e1e1e;
            --shadow-color: rgba(0,0,0,0.3);
            --border-color: rgba(255,255,255,0.1);
            --brand-color: #404040;
            --navbar-bg: #1a1a1a;
            --btn-primary-bg: #404040;
            --btn-primary-hover: #505050;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--body-bg);
            padding-top: 76px; /* Navbar height */
            transition: var(--transition);
        }
        
        /* Navigation */
        .navbar {
            background: var(--navbar-bg);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            padding: 0.8rem 0;
            transition: var(--transition);
        }

        .navbar.scrolled {
            background: var(--navbar-bg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: white !important;
            letter-spacing: 0.5px;
        }

        .navbar-brand .brand-logo {
            background: white;
            color: #667eea;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 600;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: var(--transition);
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .btn-admin-login {
            background: green;
            color: white !important;
            border-radius: 8px;
            padding: 0.5rem 1.5rem !important;
            font-weight: 700;
            transition: var(--transition);
            border: 2px solid white;
        }

        .btn-admin-login:hover {
            color: white !important;
            background: #228B22;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
        }
        
        /* Theme Toggle Button */
        .theme-toggle {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            margin-right: 0.5rem;
        }
        
        .theme-toggle:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: rotate(15deg);
        }
        
        .theme-toggle .fa-sun {
            display: none;
        }
        
        [data-theme="dark"] .theme-toggle .fa-moon {
            display: none;
        }
        
        [data-theme="dark"] .theme-toggle .fa-sun {
            display: block;
        }
        
        /* Hero Slider */
        .hero-slider {
            height: calc(85vh - 76px);
            max-height: 700px;
            position: relative;
            overflow: hidden;
            margin-top: -76px;
        }
        
        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover !important;
            background-position: center !important;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            display: flex;
            align-items: center;
        }
        
        .slide.active {
            opacity: 1;
        }
        
        .slide::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0,0,0,0.8), rgba(0,0,0,0.4));
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            padding: 0 2rem;
            max-width: 800px;
            margin-left: 8%;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            line-height: 1.2;
        }
        
        .hero-content p {
            font-size: 1.4rem;
            margin-bottom: 2rem;    
            opacity: 0.9;
        }
        
        .hero-content .btn {
            background-color: var(--brand-color);
            color: white;
            border: none;
            padding: 0.8rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: var(--transition);
        }
        
        .hero-content .btn:hover {
            background-color: #505050;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        
        /* Section Styling */
        section {
            padding: 5rem 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--text-color);
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background-color: var(--brand-color);
        }
        
        .section-title.text-center::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-subtitle {
            color: var(--text-color);
            opacity: 0.7;
            font-size: 1.1rem;
            margin-bottom: 3rem;
            max-width: 700px;
        }
        
        /* Stats Section */
        .stats-box {
            background: var(--brand-color);
            color: white;
            padding: 2.5rem 1.5rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 8px 20px var(--shadow-color);
            transition: var(--transition);
            height: 100%;
        }
        
        .stats-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px var(--shadow-color);
        }
        
        .stats-box h3 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }
        
        .stats-box p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        /* Collections Section */
        #collections {
            position: relative;
            background-color: var(--card-bg);
        }
        
        .scroll-nav {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .scroll-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--card-bg);
            border: 2px solid var(--brand-color);
            color: var(--brand-color);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 8px var(--shadow-color);
        }
        
        .scroll-btn:hover {
            background-color: var(--brand-color);
            color: white;
            transform: scale(1.1);
        }
        
        /* Collection Cards */
        .collection-card {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px var(--shadow-color);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: var(--card-bg);
        }
        
        .collection-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px var(--shadow-color);
        }
        
        .collection-card .card-img-top {
            height: 320px;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .collection-card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .collection-card .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 1.5rem;
            background-color: var(--card-bg);
        }
        
        .collection-card .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }
        
        .collection-card .card-text {
            color: var(--text-color);
            opacity: 0.8;
            flex-grow: 1;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        .btn-view-detail {
            background-color: var(--brand-color);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 0.7rem 1.8rem;
            font-weight: 600;
            transition: var(--transition);
            align-self: flex-start;
            margin-top: auto;
            font-size: 1rem;
        }
        
        .btn-view-detail:hover {
            background-color: #505050;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Infinite Scroll Container */
        #collections-container.infinite {
            display: flex;
            gap: 2rem;
            padding: 1rem 0;
            overflow-x: hidden;
            position: relative;
        }
        
        .scroll-track {
            display: flex;
            gap: 2rem;
            animation: scroll-loop 40s linear infinite;
            width: max-content;
        }
        
        .scroll-track.paused {
            animation-play-state: paused;
        }
        
        @keyframes scroll-loop {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .collection-item {
            flex-shrink: 0;
            width: 360px;
        }
        
        /* Map Section */
        .map-placeholder {
            height: 400px;
            background: linear-gradient(135deg, #555555 0%, #444444 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            box-shadow: 0 8px 25px var(--shadow-color);
            position: relative;
            overflow: hidden;
        }
        
        .map-placeholder::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1200');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
        }
        
        /* Footer */
        footer {
            background-color: var(--brand-color);
            color: white;
            padding: 3rem 0 2rem;
        }
        
        footer h5 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
        }
        
        footer p {
            opacity: 0.8;
            margin-bottom: 0.5rem;
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: var(--transition);
        }
        
        .social-icons a:hover {
            background-color: #555555;
            transform: translateY(-3px);
        }
        
        /* Modal Detail */
        #detail-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .modal-content {
            background-color: var(--card-bg);
            border-radius: 16px;
            width: 100%;
            max-width: 1000px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            animation: modalFadeIn 0.3s ease-out;
            border: 1px solid var(--border-color);
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .close-btn {
            position: absolute;
            top: 1rem;
            right: 1.2rem;
            background: none;
            border: none;
            font-size: 2rem;
            color: var(--text-color);
            cursor: pointer;
            z-index: 10;
            transition: var(--transition);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .close-btn:hover {
            color: #ff5252;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .modal-detail-header {
            padding: 2rem 2rem 0;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .modal-detail-body {
            padding: 0 2rem 2rem;
        }
        
        .modal-detail-body img {
            width: 100%;
            max-height: 500px;
            object-fit: contain;
            border-radius: 12px;
            background: var(--card-bg);
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px var(--shadow-color);
        }
        
        .info-row {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px dashed var(--border-color);
        }
        
        .info-label {
            font-weight: 700;
            min-width: 150px;
            color: var(--brand-color);
        }
        
        .info-value {
            color: var(--text-color);
            flex: 1;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .collection-item {
                width: 320px;
            }
            
            .collection-card .card-img-top {
                height: 280px;
            }
        }
        
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.8rem;
            }
            
            .hero-content p {
                font-size: 1.2rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
            
            .stats-box h3 {
                font-size: 2.5rem;
            }
            
            .collection-item {
                width: 300px;
            }
            
            .collection-card .card-img-top {
                height: 250px;
            }
        }
        
        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }
            
            .hero-slider {
                height: calc(70vh - 70px);
                margin-top: -70px;
            }
            
            section {
                padding: 3rem 0;
            }
            
            .hero-content {
                margin-left: 5%;
                padding: 0 1.5rem;
            }
            
            .hero-content h1 {
                font-size: 2.2rem;
            }
            
            .hero-content p {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .stats-box {
                padding: 2rem 1rem;
            }
            
            .stats-box h3 {
                font-size: 2rem;
            }
            
            .info-row {
                flex-direction: column;
            }
            
            .info-label {
                min-width: auto;
                margin-bottom: 0.3rem;
            }
            
            .modal-content {
                max-height: 95vh;
            }
            
            .modal-detail-header,
            .modal-detail-body {
                padding: 1.5rem;
            }
            
            .collection-item {
                width: 280px;
            }
            
            .collection-card .card-img-top {
                height: 220px;
            }
        }
        
        @media (max-width: 576px) {
            .hero-content {
                margin-left: 0;
                text-align: center;
            }
            
            .hero-content h1 {
                font-size: 1.8rem;
            }
            
            .scroll-btn {
                width: 45px;
                height: 45px;
            }
            
            .collection-card .card-title {
                font-size: 1.2rem;
            }
            
            .collection-item {
                width: 260px;
            }
            
            .collection-card .card-img-top {
                height: 200px;
            }
            
            #collections-container.infinite,
            .scroll-track {
                gap: 1.5rem;
            }
            
            .accordion-button {
                padding: 1rem;
                font-size: 1rem;
            }
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Dark mode adjustments */
        [data-theme="dark"] .bg-white {
            background-color: var(--card-bg) !important;
        }
        
        [data-theme="dark"] .bg-light {
            background-color: #1a1a1a !important;
        }
        
        [data-theme="dark"] .text-muted {
            color: rgba(224, 224, 224, 0.7) !important;
        }
        
        [data-theme="dark"] .btn-close {
            filter: invert(0.8);
        }
    </style>
</head>
<body>
    <!-- Navbar with Theme Toggle -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <img src="/assets/img/ipb.png" alt="Logo IPB" height="100" class="me-3">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Theme Toggle Button -->
                    <li class="nav-item me-2">
                        <button class="theme-toggle" id="themeToggle" title="Toggle Theme">
                            <i class="fas fa-moon"></i>
                            <i class="fas fa-sun"></i>
                        </button>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('collections.index') }}">
                            <i class="fas fa-archive me-1"></i>Koleksi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-admin-login ms-2" href="{{ route('login') }}">
                            <i class="fas fa-user-circle me-2"></i>Admin Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="hero" class="hero-slider">
        <div class="slide" style="background-image: url('{{ asset('assets/img/sejarah-buku.jpg') }}');">
            <div class="hero-content fade-in-up">
                <h1 class="display-4 mb-4">Koleksi Langka Nusantara</h1>
                <p class="lead mb-4">Temukan artefak bersejarah dari seluruh penjuru Indonesia</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('{{ asset('assets/img/sejarahwan.jpg') }}');">
            <div class="hero-content fade-in-up">
                <h1 class="display-4 mb-4">Warisan Budaya Abadi</h1>
                <p class="lead mb-4">Menyambungkan masa lalu dengan masa depan melalui artefak bersejarah</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('{{ asset('assets/img/war-cilembu.jpg') }}');">
            <div class="hero-content fade-in-up">
                <h1 class="display-4 mb-4">Koleksi Langka Nusantara</h1>
                <p class="lead mb-4">Temukan artefak bersejarah dari seluruh penjuru Indonesia</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('{{ asset('assets/img/kunjungan-armuse.jpeg') }}');">
            <div class="hero-content fade-in-up">
                <h1 class="display-4 mb-4">Museum untuk Semua Kalangan</h1>
                <p class="lead mb-4">Terbuka untuk pelajar, peneliti, dan masyarakat umum</p>
            </div>
        </div>
        <div class="slide" style="background-image: url('{{ asset('assets/img/kunjungan-armuse.jpeg') }}');">
            <div class="hero-content fade-in-up">
                <h1 class="display-4 mb-4">Budaya Kita, Identitas Kita</h1>
                <p class="lead mb-4">Lestarikan warisan budaya bersama-sama untuk generasi mendatang</p>
                <a href="#collections" class="btn btn-lg">
                    <i class="fas fa-book-open me-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="stats-box" style="background: linear-gradient(135deg, var(--brand-color), #505050);">
                        <h3>{{ $totalCollections ?? '1500' }}</h3>
                        <p>Koleksi</p>
                        <i class="fas fa-archive fa-2x mt-3" style="opacity: 0.7;"></i>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stats-box" style="background: linear-gradient(135deg, #555555, #444444);">
                        <h3>1500+</h3>
                        <p>Kunjungan Offline</p>
                        <i class="fas fa-users fa-2x mt-3" style="opacity: 0.7;"></i>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stats-box" style="background: linear-gradient(135deg, #444444, #333333);">
                        <h3>2023</h3>
                        <p>Tahun Berdiri</p>
                        <i class="fas fa-history fa-2x mt-3" style="opacity: 0.7;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3">Museum dan Galeri IPB Future</h5>
                    <p>Melestarikan warisan budaya Indonesia untuk generasi mendatang dengan penuh dedikasi dan tanggung jawab.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#hero" class="text-white-50 text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="#about" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#collections" class="text-white-50 text-decoration-none">Koleksi</a></li>
                        <li><a href="#map" class="text-white-50 text-decoration-none">Kontak & Lokasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <h5 class="mb-3">Kontak Kami</h5>
                    <p class="mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>Museum dan Galeri IPB Future
                            Babakan, Dramaga, Bogor Regency, West Java
                            16680
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-phone me-2"></i>+62 852-8353-7220
                    </p>
                    <p class="mb-0">
                        <i class="fas fa-envelope me-2"></i>museum@apps.ipb.ac.id
                    </p>
                </div>
            </div>
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Museum IPB. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Detail -->
    <div id="detail-modal">
        <div class="modal-content">
            <button class="close-btn">&times;</button>
            <div id="modal-body"></div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Theme Management
            const themeToggle = document.getElementById('themeToggle');
            const currentTheme = localStorage.getItem('theme') || 'light';
            
            document.documentElement.setAttribute('data-theme', currentTheme);
            
            themeToggle.addEventListener('click', function() {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                
                document.documentElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                
                // Add rotation animation
                themeToggle.style.transform = 'rotate(360deg)';
                setTimeout(() => {
                    themeToggle.style.transform = '';
                }, 300);
            });

            // Hero Slider Functionality
            const slides = document.querySelectorAll('.slide');
            let currentSlide = 0;
            
            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                slides[index].classList.add('active');
            }
            
            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }
            
            // Auto-advance hero slides every 5 seconds
            setInterval(nextSlide, 5000);
            
            // Show first slide
            showSlide(0);
            
            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
            
            // Smooth scroll for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                        
                        // Close mobile menu if open
                        const navbarToggler = document.querySelector('.navbar-toggler');
                        const navbarCollapse = document.querySelector('.navbar-collapse');
                        if (navbarCollapse.classList.contains('show')) {
                            navbarToggler.click();
                        }
                    }
                });
            });
            
            // Modal functionality (placeholder - implement as needed)
            const modal = document.getElementById('detail-modal');
            const closeBtn = document.querySelector('.close-btn');
            
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    modal.style.display = 'none';
                    document.body.classList.remove('modal-active');
                });
            }
            
            modal.addEventListener('click', e => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                    document.body.classList.remove('modal-active');
                }
            });
            
            // Close modal with Escape key
            document.addEventListener('keydown', e => {
                if (e.key === 'Escape' && modal.style.display === 'flex') {
                    modal.style.display = 'none';
                    document.body.classList.remove('modal-active');
                }
            });
        });
    </script>
</body>
</html>