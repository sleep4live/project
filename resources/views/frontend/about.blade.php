<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Museum IPB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Dark/Light Mode Styles -->
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
        }
        
        [data-theme="dark"] {
            /* Dark theme overrides - 100% Abu-abu Netral */
            --body-bg: #121212;
            --text-color: #e0e0e0;
            --card-bg: #1e1e1e;
            --shadow-color: rgba(0,0,0,0.3);
            --border-color: rgba(255,255,255,0.1);
            --brand-color: #404040;
            --navbar-bg: #1a1a1a;
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
        
        /* Hero Section untuk About */
        .about-hero {
            background: linear-gradient(135deg, var(--brand-color) 0%, var(--brand-color) 100%);
            color: white;
            padding: 5rem 0;
            text-align: center;
        }
        
        .about-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .about-hero p {
            font-size: 1.4rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
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
        
        /* About Section */
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
            box-shadow: 0 15px 35px var(--shadow-color);
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
            background-color: var(--brand-color);
            color: white;
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            font-size: 1.1rem;
            border: none;
            transition: var(--transition);
        }
        
        .accordion-button:not(.collapsed) {
            background-color: #505050;
            color: white;
            box-shadow: none;
        }
        
        .accordion-button:focus {
            box-shadow: none;
            border-color: var(--border-color);
        }
        
        .accordion-button::after {
            filter: brightness(0) invert(1);
        }
        
        .accordion-body {
            padding: 1.5rem;
            background-color: var(--card-bg);
            border-left: 4px solid var(--brand-color);
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--text-color);
        }
        
        .accordion-item {
            border: none;
            margin-bottom: 1rem;
            border-radius: 8px !important;
            overflow: hidden;
            box-shadow: 0 4px 12px var(--shadow-color);
        }
        
        .accordion-item:last-of-type {
            margin-bottom: 0;
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
            opacity: 0.4;
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
        
        /* Blockquote dan Mission Items */
        .blockquote {
            background-color: rgba(64, 64, 64, 0.1) !important;
            border-left: 4px solid var(--brand-color) !important;
        }
        
        .mission-item {
            border-left: 4px solid var(--brand-color) !important;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .image-slider {
                height: 350px;
            }
        }
        
        @media (max-width: 992px) {
            .about-hero h1 {
                font-size: 2.8rem;
            }
            
            .about-hero p {
                font-size: 1.2rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
            
            .stats-box h3 {
                font-size: 2.5rem;
            }
            
            .image-slider {
                height: 300px;
            }
        }
        
        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }
            
            section {
                padding: 3rem 0;
            }
            
            .about-hero h1 {
                font-size: 2.2rem;
            }
            
            .about-hero p {
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
            
            .image-slider {
                height: 250px;
            }
        }
        
        @media (max-width: 576px) {
            .about-hero {
                padding: 3rem 0;
            }
            
            .about-hero h1 {
                font-size: 1.8rem;
            }
            
            .image-slider {
                height: 200px;
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
        
        [data-theme="dark"] .text-dark,
        [data-theme="dark"] .text-muted {
            color: rgba(224, 224, 224, 0.7) !important;
        }
        
        [data-theme="dark"] .btn-close {
            filter: invert(0.8);
        }
        
        /* Contact section info icons */
        [data-theme="dark"] .text-primary {
            color: #a0a0a0 !important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <img src="/assets/img/ipb.png" alt="Logo IPB" height="100" class="me-3">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Dark/Light Toggle -->
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
                    <a class="nav-link active" href="{{ route('about') }}">Tentang Kami</a>
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

<!-- Hero Section untuk About -->
<div class="about-hero">
    <div class="container">
        <h1>Tentang Museum IPB</h1>
        <p>Menjelajahi sejarah dan warisan pendidikan tinggi pertanian Indonesia melalui pelestarian budaya dan edukasi</p>
    </div>
</div>

<!-- Section About -->
<section id="about" class="bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Tentang Kami</h2>
        </div>

        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="image-slider">
                    <div class="img-slide active" style="background-image: url('{{ asset('assets/img/hal-luar.png') }}');"></div>
                    <div class="img-slide" style="background-image: url('{{ asset('assets/img/sejarah-buku.jpg') }}');"></div>
                    <div class="img-slide" style="background-image: url('{{ asset('assets/img/sejarahwan.jpg') }}');"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="about-content">
                    <p class="fs-5 mb-4">
                        Museum IPB didirikan dengan misi mulia untuk melestarikan warisan pendidikan tinggi pertanian, kelautan, dan biosains tropika di Indonesia. 
                        Kami menjadi pusat pembelajaran yang menghubungkan masa lalu, masa kini, dan masa depan untuk memperkuat identitas dan karakter bangsa.
                    </p>
                    <p class="fs-5 mb-4">
                        Melalui program edukasi, pameran interaktif, dan kegiatan budaya, kami berharap dapat menginspirasi 
                        generasi muda untuk mencintai dan menjaga kekayaan budaya serta sejarah pendidikan bangsa yang tak ternilai harganya.
                    </p>
                </div>
            </div>
        </div>

        <!-- Visi dan Misi -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="accordion accordion-about" id="visiMisiAccordion">
                    <!-- Visi -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingVisi">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVisi" aria-expanded="true" aria-controls="collapseVisi">
                                <i class="fas fa-eye me-3"></i> Visi Museum IPB
                            </button>
                        </h2>
                        <div id="collapseVisi" class="accordion-collapse collapse show" aria-labelledby="headingVisi" data-bs-parent="#visiMisiAccordion">
                            <div class="accordion-body">
                                <div class="visi-content">
                                    <div class="text-center mb-4">
                                        <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                                        <h4 class="mb-3">Visi Museum IPB</h4>
                                    </div>
                                    <blockquote class="blockquote fs-4 fst-italic text-center px-4 py-3 rounded-3">
                                       Menjadikan memori kolektif pendidikan tinggi pertanian, kelautan, dan biosains tropika sebagai pusat pembelajaran untuk memperkuat identitas dan karakter bangsa
                                    </blockquote>   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Misi -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingMisi">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMisi" aria-expanded="false" aria-controls="collapseMisi">
                                <i class="fas fa-bullseye me-3"></i> Misi Museum IPB
                            </button>
                        </h2>
                        <div id="collapseMisi" class="accordion-collapse collapse" aria-labelledby="headingMisi" data-bs-parent="#visiMisiAccordion">
                            <div class="accordion-body">
                                <div class="misi-content">
                                    <div class="text-center mb-4">
                                        <i class="fas fa-tasks fa-3x text-primary mb-3"></i>
                                        <h4 class="mb-3">Misi Museum IPB</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mission-list">
                                                <div class="mission-item p-3 mb-3 rounded-3">
                                                    <h5 class="mb-2">a. Fungsi Informasi dan Konservasi</h5>
                                                    <p class="mb-0">Melaksanakan fungsinya sebagai sumber informasi dan konservasi sejarah masa lalu, masa kini, dan masa depan.</p>
                                                </div>
                                                <div class="mission-item p-3 mb-3 rounded-3">
                                                    <h5 class="mb-2">b. Memelihara Warisan Pendidikan</h5>
                                                    <p class="mb-0">Memelihara warisan kelahiran dan tumbuh kembang pendidikan tinggi pertanian Indonesia.</p>
                                                </div>
                                                <div class="mission-item p-3 mb-3 rounded-3">
                                                    <h5 class="mb-2">c. Pengembangan Wisata Pendidikan</h5>
                                                    <p class="mb-0">Mengembangkan museum sebagai wisata pendidikan yang rekreatif.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="map" class="bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Kontak & Lokasi</h2>
            <p class="section-subtitle mx-auto">
                Kunjungi kami di lokasi berikut atau hubungi untuk informasi lebih lanjut
            </p>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31709.85782019406!2d106.7063600347656!3d-6.555449800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c58e45a47b89%3A0x81cebe49013f2a0e!2sMuseum%20dan%20Galeri%20IPB%20University!5e0!3m2!1sid!2sid!4v1769503539696!5m2!1sid!2sid" 
                    width="100%" 
                    height="400" 
                    style="border:0; border-radius: 12px; box-shadow: 0 8px 25px var(--shadow-color);"
                    allowfullscreen="" 
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="col-lg-6">
                <div class="bg-white p-4 rounded-3 shadow h-100">
                    <h4 class="mb-4">Informasi Kontak</h4>
                    <div class="mb-4">
                        <h6><i class="fas fa-map-marker-alt text-primary me-2"></i>Alamat</h6>
                        <p class="ms-4">Kampus IPB Dramaga, Jl. Raya Dramaga, Bogor, Jawa Barat 16680</p>
                    </div>
                    <div class="mb-4">
                        <h6><i class="fas fa-phone text-primary me-2"></i>Telepon</h6>
                        <p class="ms-4">(0251) 8621748</p>
                    </div>
                    <div class="mb-4">
                        <h6><i class="fas fa-envelope text-primary me-2"></i>Email</h6>
                        <p class="ms-4">museum@apps.ipb.ac.id</p>
                    </div>
                    <div class="mb-4">
                        <h6><i class="fas fa-clock text-primary me-2"></i>Jam Operasional</h6>
                        <p class="ms-4">Senin–Jumat: 09.00–16.00 WIB</p>
                        <p class="ms-4">Sabtu: 09.00–14.00 WIB</p>
                        <p class="ms-4">Minggu & Hari Libur Nasional: Tutup</p>
                    </div>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/museumipb/" title="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
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
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
                    <li class="mb-2"><a href="{{ route('collections.index') }}" class="text-white-50 text-decoration-none">Koleksi</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Kontak & Lokasi</a></li>
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Theme Management
    const themeToggle = document.getElementById('themeToggle');
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    document.documentElement.setAttribute('data-theme', currentTheme);
    
    themeToggle.addEventListener('click', function() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';
        
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
        // Add animation effect
        themeToggle.style.transform = 'rotate(360deg)';
        setTimeout(() => {
            themeToggle.style.transform = '';
        }, 300);
    });

    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Image Slider untuk About
    const imgSlides = document.querySelectorAll('.img-slide');
    if (imgSlides.length > 0) {
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
    }

    // Smooth scroll untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href') === '#') return;
            
            const targetElement = document.querySelector(this.getAttribute('href'));
            if (targetElement) {
                e.preventDefault();
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    document.querySelector('.navbar-toggler').click();
                }
            }
        });
    });
});
</script>
</body>
</html>