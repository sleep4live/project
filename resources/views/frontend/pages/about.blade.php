<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Museum IPB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #052070;
            --accent-color: #3498DB;
            --light-color: #F8F9FA;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            padding-top: 76px;
            background-color: #f8f9fa;
        }
        
        /* Navbar */
        .navbar {
            background: #1E3A8A;
            backdrop-filter: blur(10px);
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar.scrolled {
            background: #1E3A8A;
            box-shadow: 0 4px 20px rgba(30, 58, 138, 0.4);
        }
        
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 600;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        
        .btn-admin-login {
            background: green;
            color: #1E3A8A !important;
            border-radius: 8px;
            padding: 0.5rem 1.5rem !important;
            font-weight: 700;
            transition: all 0.3s ease;
            border: 2px solid white;
        }
        
        /* Hero Section */
        .about-hero {
            background: linear-gradient(135deg, #1E3A8A 0%, #2C3E50 100%);
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
        }
        
        .about-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        /* Content Sections */
        .section {
            padding: 4rem 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
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
        
        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--accent-color);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
            padding-left: 30px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -36px;
            top: 5px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: var(--secondary-color);
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--secondary-color);
        }
        
        .timeline-year {
            font-weight: 700;
            color: var(--secondary-color);
            font-size: 1.2rem;
        }
        
        /* Team Cards */
        .team-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .team-img {
            height: 250px;
            width: 100%;
            object-fit: cover;
        }
        
        /* Footer */
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }
        
        @media (max-width: 768px) {
            .about-hero h1 {
                font-size: 2.5rem;
            }
            
            .section {
                padding: 3rem 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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
                        <a class="nav-link active" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('collections.index') }}">
                            <i class="fas fa-archive me-1"></i>Koleksi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Kontak & Lokasi</a>
                    </li>
                    <li class="nav-item">
                        @if(session('admin'))
                            <a class="nav-link btn btn-admin-login ms-2" href="{{ route('admin.home') }}">
                                <i class="fas fa-user-circle me-2"></i>Dashboard
                            </a>
                        @else
                            <a class="nav-link btn btn-admin-login ms-2" href="{{ route('login') }}">
                                <i class="fas fa-user-circle me-2"></i>Admin Login
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="about-hero">
        <div class="container">
            <div class="text-center">
                <h1 class="mb-4">Tentang Museum IPB</h1>
                <p class="lead mx-auto" style="max-width: 800px;">
                    Menjadi pusat pembelajaran yang menghubungkan masa lalu, masa kini, 
                    dan masa depan pendidikan tinggi pertanian Indonesia
                </p>
            </div>
        </div>
    </div>

    <!-- Sejarah -->
    <div class="container section">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h2 class="section-title">Sejarah Museum IPB</h2>
                <p class="fs-5 mb-4">
                    Museum IPB didirikan pada tahun 2023 dengan misi mulia untuk melestarikan 
                    warisan pendidikan tinggi pertanian, kelautan, dan biosains tropika di Indonesia.
                </p>
                <p class="fs-5 mb-4">
                    Berawal dari koleksi pribadi para dosen dan peneliti IPB, museum ini berkembang 
                    menjadi institusi yang diakui secara nasional dalam pelestarian budaya dan sejarah pendidikan.
                </p>
                <p class="fs-5">
                    Saat ini, Museum IPB tidak hanya menjadi tempat penyimpanan artefak bersejarah, 
                    tetapi juga pusat penelitian dan edukasi bagi masyarakat umum, pelajar, dan akademisi.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="rounded-3 overflow-hidden shadow-lg">
                    <img src="{{ asset('assets/img/museum-building.jpg') }}" 
                         alt="Gedung Museum IPB" 
                         class="img-fluid"
                         onerror="this.src='https://images.unsplash.com/photo-1578662996442-48f60103fc96?auto=format&fit=crop&w=800&q=80'">
                </div>
            </div>
        </div>
    </div>

    <!-- Timeline -->
    <div class="bg-light section">
        <div class="container">
            <h2 class="section-title text-center mb-5">Perjalanan Museum</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">2020</div>
                            <h4>Ide Awal Pendirian</h4>
                            <p>Gagasan mendirikan museum muncul dari kebutuhan untuk mendokumentasikan sejarah pendidikan pertanian Indonesia.</p>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2021</div>
                            <h4>Pengumpulan Koleksi Awal</h4>
                            <p>Dimulai pengumpulan artefak dan dokumen sejarah dari berbagai fakultas di IPB.</p>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2022</div>
                            <h4>Pembangunan Gedung</h4>
                            <p>Pembangunan gedung museum dimulai dengan dukungan dari alumni dan pemerintah.</p>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2023</div>
                            <h4>Peresmian Museum</h4>
                            <p>Museum IPB secara resmi dibuka untuk umum pada tanggal 1 September 2023.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visi Misi -->
    <div class="container section">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="bg-primary text-white p-4 rounded-3 h-100">
                    <h3 class="mb-4">
                        <i class="fas fa-eye me-2"></i>Visi
                    </h3>
                    <blockquote class="blockquote fs-4 fst-italic">
                        "Menjadikan memori kolektif pendidikan tinggi pertanian, 
                        kelautan, dan biosains tropika sebagai pusat pembelajaran 
                        untuk memperkuat identitas dan karakter bangsa"
                    </blockquote>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="bg-white p-4 rounded-3 shadow h-100">
                    <h3 class="mb-4 text-primary">
                        <i class="fas fa-bullseye me-2"></i>Misi
                    </h3>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h5>Fungsi Informasi dan Konservasi</h5>
                                <p class="mb-0">Melaksanakan fungsinya sebagai sumber informasi dan konservasi sejarah</p>
                            </div>
                        </li>
                        <li class="mb-3 d-flex">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h5>Memelihara Warisan Pendidikan</h5>
                                <p class="mb-0">Memelihara warisan kelahiran dan tumbuh kembang pendidikan tinggi pertanian Indonesia</p>
                            </div>
                        </li>
                        <li class="d-flex">
                            <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                            <div>
                                <h5>Pengembangan Wisata Pendidikan</h5>
                                <p class="mb-0">Mengembangkan museum sebagai wisata pendidikan yang rekreatif</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Tim Pengelola -->
    <div class="bg-light section">
        <div class="container">
            <h2 class="section-title text-center mb-5">Tim Pengelola</h2>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80" 
                             alt="Kepala Museum" 
                             class="team-img">
                        <div class="p-4">
                            <h4 class="mb-1">Dr. Ahmad Syarif</h4>
                            <p class="text-muted mb-3">Kepala Museum</p>
                            <p class="small">Dosen senior IPB dengan pengalaman 20 tahun dalam penelitian sejarah pertanian</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=600&q=80" 
                             alt="Kurator" 
                             class="team-img">
                        <div class="p-4">
                            <h4 class="mb-1">Maya Dewi, M.Hum.</h4>
                            <p class="text-muted mb-3">Kurator Utama</p>
                            <p class="small">Spesialis museum dengan latar belakang sejarah dan budaya Indonesia</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="team-card">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" 
                             alt="Edukator" 
                             class="team-img">
                        <div class="p-4">
                            <h4 class="mb-1">Rina Kartika, M.Pd.</h4>
                            <p class="text-muted mb-3">Kepala Edukasi</p>
                            <p class="small">Bertanggung jawab atas program edukasi dan kunjungan sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3">Museum IPB</h5>
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
                <div class="col-lg-4">
                    <h5 class="mb-3">Kontak Kami</h5>
                    <p class="mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Kampus IPB Dramaga, Bogor, Jawa Barat 16680
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-phone me-2"></i>(0251) 8621748
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
            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>