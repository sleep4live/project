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
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            padding-top: 76px; /* Navbar height */
        }
        
        /* Navigation */
       .navbar {
    background: #1E3A8A;
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 20px rgba(30, 58, 138, 0.3);
    padding: 0.8rem 0;
    transition: var(--transition);
}

.navbar.scrolled {
	background: #1E3A8A; /* <-- solid, tanpa transparansi */
	box-shadow: 0 4px 20px rgba(30, 58, 138, 0.4);
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: 800;
    color: white !important;
    letter-spacing: 0.5px;
}

.navbar-brand .brand-logo {
    background:white;
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
    color:white !important;
    font-weight: 600;
    margin: 0 0.5rem;
    padding: 0.5rem 1rem !important;
    border-radius: 8px;
    transition: var(--transition);
}

.navbar-nav .nav-link:hover {
    color:white !important;
    background-color: rgba(255, 255, 255, 0.15);
    transform: translateY(-2px);
}

.btn-admin-login {
    background:green;
    color: #1E3A8A !important;
    border-radius: 8px;
    padding: 0.5rem 1.5rem !important;
    font-weight: 700;
    transition: var(--transition);
    border: 2px solid white;
}

.btn-admin-login:hover {
    color: black !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
}
        
        /* Hero Slider - DIUBAH: Menempel ke navbar */
        .hero-slider {
            height: calc(85vh - 76px);
            max-height: 700px;
            position: relative;
            overflow: hidden;
            margin-top: -76px; /* Menempel ke navbar */
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
	background-color: var(--secondary-color);
	color: white; /* <-- ditambahkan */
	border: none;
	padding: 0.8rem 2.5rem;
	font-size: 1.1rem;
	font-weight: 600;
	border-radius: 8px;
	transition: var(--transition);
}
        .hero-content .btn:hover {
            background-color: darkblue;
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
            color: var(--primary-color);
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
            background-color: var(--secondary-color);
        }
        
        .section-title.text-center::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        .section-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 3rem;
            max-width: 700px;
        }
        
        /* About Section - DIUBAH: Layout baru dengan gambar slider */
        #about {
            position: relative;
        }
        
        .about-content {
            margin-bottom: 3rem;
        }
        
        /* Image Slider */
        .image-slider {
            height: 400px;
            max-height: 500px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
        }
        
        .img-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover !important;
            background-position: center !important;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }
        
        .img-slide.active {
            opacity: 1;
        }
        
        /* Accordion Styling */
        .accordion-about {
            margin-top: 2rem;
        }
        
        .accordion-button {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            font-size: 1.1rem;
            border: none;
            transition: var(--transition);
        }
        
        .accordion-button:not(.collapsed) {
            background-color: var(--accent-color);
            color: white;
            box-shadow: none;
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: rgba(0,0,0,0.1);
        }
        
        .accordion-button::after {
            filter: brightness(0) invert(1);
        }
        
        .accordion-body {
            padding: 1.5rem;
            background-color: var(--light-color);
            border-left: 4px solid var(--accent-color);
            font-size: 1.05rem;
            line-height: 1.7;
        }
        
        .accordion-item {
            border: none;
            margin-bottom: 1rem;
            border-radius: 8px !important;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .accordion-item:last-of-type {
            margin-bottom: 0;
        }
        
        /* Stats Section */
        .stats-box {
            background: var(--primary-color);
            color: white;
            padding: 2.5rem 1.5rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
            height: 100%;
        }
        
        .stats-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
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
        
        /* Collections Section - DIUBAH: Gambar lebih besar */
        #collections {
            position: relative;
            background-color: var(--light-color);
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
            background-color: white;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .scroll-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }
        
        /* Collection Cards - DIUBAH: Gambar lebih besar */
        .collection-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .collection-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }
        
        .collection-card .card-img-top {
            height: 320px; /* DIUBAH: Lebih tinggi dari sebelumnya (220px) */
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
        }
        
        .collection-card .card-title {
            font-size: 1.4rem; /* DIUBAH: Sedikit lebih besar */
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }
        
        .collection-card .card-text {
            color: #6c757d;
            flex-grow: 1;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        /* DIHAPUS: category-badge dihapus sesuai permintaan */
        
        .btn-view-detail {
            background-color: var(--primary-color);
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
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Infinite Scroll Container */
        #collections-container.infinite {
            display: flex;
            gap: 2rem; /* DIUBAH: Gap lebih besar untuk gambar besar */
            padding: 1rem 0;
            overflow-x: hidden;
            position: relative;
        }
        
        .scroll-track {
            display: flex;
            gap: 2rem; /* DIUBAH: Gap lebih besar untuk gambar besar */
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
            width: 360px; /* DIUBAH: Lebih lebar untuk gambar besar */
        }
        
        /* Map Section */
        .map-placeholder {
            height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
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
            opacity: 0.4;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary-color);
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
            background-color: var(--secondary-color);
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
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 16px;
            width: 100%;
            max-width: 1000px; /* DIUBAH: Lebar modal lebih besar */
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalFadeIn 0.3s ease-out;
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
            color: var(--dark-color);
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
            color: var(--secondary-color);
            background-color: rgba(0, 0, 0, 0.05);
        }
        
        .modal-detail-header {
            padding: 2rem 2rem 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .modal-detail-body {
            padding: 0 2rem 2rem;
        }
        
        .modal-detail-body img {
            width: 100%;
            max-height: 500px; /* DIUBAH: Gambar lebih besar di modal */
            object-fit: contain;
            border-radius: 12px;
            background: #f8f9fa;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .info-row {
            display: flex;
            margin-bottom: 1rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px dashed #eee;
        }
        
        .info-label {
            font-weight: 700;
            min-width: 150px;
            color: var(--primary-color);
        }
        
        .info-value {
            color: var(--dark-color);
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
            
            .image-slider {
                height: 350px;
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
            
            .image-slider {
                height: 300px;
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
            
            .image-slider {
                height: 250px;
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
            
            .image-slider {
                height: 200px;
            }
            
            .accordion-button {
                padding: 1rem;
                font-size: 1rem;
            }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading state for images */
        .img-loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body>
            <!-- nav -->

 <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <img src="/assets/img/ipb.png" alt="Logo IPB" height="100" class="me-3">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
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

      <!-- stats -->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="stats-box" style="background: linear-gradient(135deg, #2C3E50, #4A6491);">
                        <h3>{{ $totalCollections ?? '1500' }}</h3>
                        <p>Koleksi</p>
                        <i class="fas fa-archive fa-2x mt-3" style="opacity: 0.7;"></i>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stats-box" style="background: linear-gradient(135deg, #E74C3C, #C0392B);">
                        <h3>1500+</h3>
                        <p>Kunjugan Offline</p>
                        <i class="fas fa-tags fa-2x mt-3" style="opacity: 0.7;"></i>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="stats-box" style="background: linear-gradient(135deg, #27AE60, #229954);">
                        <h3>2023</h3>
                        <p>Tahun Berdiri</p>
                        <i class="fas fa-history fa-2x mt-3" style="opacity: 0.7;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-blue text-white py-5">
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
                    <p class="mb-0">&copy; {{ date('Y') }}  MUseum IPB. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Detail - DIUBAH: Tanpa kategori dan periode -->
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
            const collectionsData = @json(isset($collections) ? $collections->keyBy('id') : []);
            const modal = document.getElementById('detail-modal');
            const modalBody = document.getElementById('modal-body');
            const closeBtn = document.querySelector('.close-btn');
            
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
            
            // === IMAGE SLIDER DI BAGIAN TENTANG KAMI ===
            const imgSlides = document.querySelectorAll('.img-slide');
            let currentImgSlide = 0;
            
            function showImgSlide(index) {
                imgSlides.forEach(slide => slide.classList.remove('active'));
                imgSlides[index].classList.add('active');
            }
            
            function nextImgSlide() {
                currentImgSlide = (currentImgSlide + 1) % imgSlides.length;
                showImgSlide(currentImgSlide);
            }
            
            // Auto-advance image slides every 4 seconds
            setInterval(nextImgSlide, 4000);
            
            // Show first image slide
            showImgSlide(0);
            
            // === INFINITE SCROLL LOOP ===
            const container = document.getElementById('collections-container');
            if (container && container.querySelector('.collection-item')) {
                const originalItems = Array.from(container.querySelectorAll('.collection-item'));
                
                if (originalItems.length > 0) {
                    const track = document.createElement('div');
                    track.className = 'scroll-track';
                    
                    // Duplicate items for seamless animation
                    const duplicatedItems = [...originalItems, ...originalItems];
                    duplicatedItems.forEach(item => {
                        const clone = item.cloneNode(true);
                        // Reattach event listeners to cloned items
                        const detailBtn = clone.querySelector('.show-detail');
                        if (detailBtn) {
                            detailBtn.addEventListener('click', function() {
                                const id = this.getAttribute('data-id');
                                showCollectionDetail(id);
                            });
                        }
                        track.appendChild(clone);
                    });
                    
                    container.innerHTML = '';
                    container.classList.add('infinite');
                    container.appendChild(track);
                    
                    // Pause on hover
                    container.addEventListener('mouseenter', () => {
                        track.classList.add('paused');
                    });
                    container.addEventListener('mouseleave', () => {
                        track.classList.remove('paused');
                    });
                }
            }
            
            // === MODAL DETAIL ===
            function assetUrl(path) {
                return path.startsWith('http') ? path : '/' + path;
            }
            
            function closeModal() {
                modal.style.display = 'none';
                document.body.classList.remove('modal-active');
            }
            
            function showCollectionDetail(id) {
                const c = collectionsData[id];
                if (!c) return;
                
                let imgHtml = c.image 
                    ? `<img src="${assetUrl('uploads/' + c.image)}" alt="${c.name}">`
                    : `<div class="bg-light text-center py-5 rounded-3">
                          <i class="fas fa-image fa-4x text-muted mb-3"></i>
                          <p class="mb-0">Tidak ada gambar</p>
                       </div>`;
                
                const nomorKoleksi = c.nomor_koleksi || 'Belum tercatat';
                const tahunMasuk = c.tahun_masuk || 'Tidak diketahui';
                const description = c.description || 'Tidak ada deskripsi tersedia.';
                
                modalBody.innerHTML = `
                    <div class="modal-detail-header">
                        <h4 class="text-center mb-3">${c.name}</h4>
                        <!-- DIHAPUS: Kategori dan periode badge -->
                    </div>
                    <div class="modal-detail-body">
                        ${imgHtml}
                        <div class="modal-detail-info">
                            <div class="info-row">
                                <span class="info-label">Nomor Koleksi:</span>
                                <span class="info-value">${nomorKoleksi}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label">Tahun Masuk:</span>
                                <span class="info-value">${tahunMasuk}</span>
                            </div>
                            <!-- DIHAPUS: Baris kategori dan periode -->
                            <div class="mt-4">
                                <h6 class="mb-2">Deskripsi</h6>
                                <p class="mb-0" style="font-size: 1.1rem; line-height: 1.7;">${description}</p>
                            </div>
                        </div>
                    </div>
                `;
                modal.style.display = 'flex';
                document.body.classList.add('modal-active');
            }
            
            // Attach event listeners to detail buttons
            document.querySelectorAll('.show-detail').forEach(btn => {
                btn.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    showCollectionDetail(id);
                });
            });
            
            closeBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', e => {
                if (e.target === modal) closeModal();
            });
            
            // Close modal with Escape key
            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') closeModal();
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
            
            // Navbar background on scroll
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.style.backgroundColor = 'rgba(44, 62, 80, 1)';
                    navbar.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
                } else {
                    navbar.style.backgroundColor = 'rgba(44, 62, 80, 0.98)';
                    navbar.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
                }
            });
            
            // Tambahkan di script bagian akhir
            document.addEventListener('DOMContentLoaded', function () {
                const navbar = document.querySelector('.navbar');
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 100) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                });
            });
        });

    </script>
</body>
</html>