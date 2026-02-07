<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Museum - Museum IPB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #2C3E50;
            --accent-color: #2C3E50;
            --transition: all 0.3s ease;
            --card-bg: #FFFFFF;
            --body-bg: #ffffff;
            --text-color: #000000;
            --shadow-color: rgba(0,0,0,0.08);
            --border-color: rgba(0,0,0,0.1);
            --brand-color: #2C3E50;
        }
        
        [data-theme="dark"] {
            --primary-color: #1a1a1a;
            --secondary-color: #252525;
            --accent-color: #2d2d2d;
            --card-bg: #1e1e1e;
            --body-bg: #121212;
            --text-color: #e0e0e0;
            --shadow-color: rgba(0,0,0,0.3);
            --border-color: rgba(255,255,255,0.1);
            --brand-color: #404040; /* Abu-abu netral, bukan biru */
        }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            padding-top: 76px;
            background-color: var(--body-bg);
            color: var(--text-color);
            transition: var(--transition);
        }
        
        /* Navbar */
        .navbar {
            background: var(--primary-color);
            backdrop-filter: blur(10px);
            padding: 0.8rem 0;
            transition: var(--transition);
        }
        
        .navbar.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
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
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        
        .btn-admin-login {
            background: var(--brand-color);
            color: white !important;
            border-radius: 8px;
            padding: 0.5rem 1.5rem !important;
            font-weight: 700;
            transition: var(--transition);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn-admin-login:hover {
            background: #2a2a2a;
            transform: translateY(-2px);
        }
        
        /* Theme Toggle */
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
        
        /* Hero Section */
        .collections-hero {
            background: var(--brand-color);
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
        }
        
        .collections-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        /* Content */
        .section {
            padding: 4rem 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-color);
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
            background-color: var(--brand-color);
        }
        
        /* Collection Cards */
        .collection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .collection-card {
            background: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px var(--shadow-color);
            transition: var(--transition);
            height: 100%;
            border: 1px solid var(--border-color);
        }
        
        .collection-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px var(--shadow-color);
        }
        
        .collection-img {
            height: 250px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .collection-card:hover .collection-img {
            transform: scale(1.05);
        }
        
        .collection-body {
            padding: 1.5rem;
        }
        
        .collection-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 0.8rem;
        }
        
        .collection-meta {
            display: flex;
            justify-content: space-between;
            color: var(--text-color);
            opacity: 0.7;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .collection-description {
            color: var(--text-color);
            opacity: 0.9;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        /* Category Badge - SEKARANG ABU-ABU NETRAL */
        .category-badge {
            display: inline-block;
            background: var(--brand-color);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        /* Category Section */
        .category-section {
            margin-bottom: 4rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .category-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        
        /* Stats Counter */
        .stats-counter {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 5px 15px var(--shadow-color);
            margin: -50px auto 3rem;
            position: relative;
            z-index: 10;
            max-width: 800px;
            border: 1px solid var(--border-color);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-color);
            line-height: 1;
        }
        
        .stat-label {
            color: var(--text-color);
            opacity: 0.7;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        
        /* Alert */
        .alert {
            background-color: var(--card-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        
        /* Footer */
        footer {
            background-color: var(--brand-color);
            color: white;
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }
        
        /* Modal */
        .modal-content {
            background: var(--card-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }
        
        .btn-close {
            filter: invert(1);
        }
        
        [data-theme="dark"] .btn-close {
            filter: invert(0.8);
        }
        
        /* Buttons - SEMUA MENGGUNAKAN ABU-ABU NETRAL DI DARK MODE */
        .btn-outline-primary {
            border-color: var(--brand-color);
            color: var(--brand-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--brand-color);
            border-color: var(--brand-color);
            color: white;
        }
        
        .btn-primary {
            background-color: var(--brand-color);
            border-color: var(--brand-color);
        }
        
        .btn-primary:hover {
            background-color: #333333;
            border-color: #333333;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        
        [data-theme="dark"] .btn-secondary {
            background-color: #555555;
            border-color: #555555;
            color: #e0e0e0;
        }
        
        /* Text Muted */
        .text-muted {
            color: var(--text-color) !important;
            opacity: 0.7;
        }
        
        .bg-light {
            background-color: var(--card-bg) !important;
        }
        
        .badge {
            background-color: var(--brand-color) !important;
            color: white !important;
        }
        
        /* Footer Links */
        .text-white-50 {
            color: rgba(255, 255, 255, 0.6) !important;
        }
        
        /* Icon folder di judul kategori */
        [data-theme="dark"] .category-section h3 i {
            color: #555555 !important;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .collections-hero h1 {
                font-size: 2.5rem;
            }
            
            .section {
                padding: 3rem 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .collection-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .stats-counter {
                margin: -30px 1rem 2rem;
                padding: 1.5rem;
            }
            
            .navbar-nav .nav-link {
                margin: 0.2rem 0;
            }
        }
        
        @media (max-width: 576px) {
            .theme-toggle {
                width: 36px;
                height: 36px;
                margin-right: 0.25rem;
            }
            
            .btn-admin-login {
                padding: 0.4rem 1rem !important;
                font-size: 0.9rem;
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
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item me-2">
                        <button class="theme-toggle" id="themeToggle" title="Toggle Theme">
                            <i class="fas fa-moon"></i>
                            <i class="fas fa-sun"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                   <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/koleksi">
                            <i class="fas fa-archive me-1"></i>Koleksi
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link btn btn-admin-login ms-2" href="/login">
                            <i class="fas fa-user-circle me-2"></i>Admin Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="collections-hero">
        <div class="container">
            <div class="text-center">
                <h1 class="mb-4">Koleksi Museum IPB</h1>
                <p class="lead mx-auto" style="max-width: 800px;">
                    Menjelajahi warisan budaya dan sejarah pendidikan tinggi pertanian Indonesia 
                    melalui koleksi unggulan yang kami rawat dengan penuh dedikasi.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Counter -->
    <div class="container">
        <div class="stats-counter">
            <div class="row text-center">
                <div class="col-md-4 col-6 mb-3 mb-md-0">
                    <div class="stat-number">{{ $totalCollections ?? '0' }}</div>
                    <div class="stat-label">Total Koleksi</div>
                </div>
                <div class="col-md-4 col-6 mb-3 mb-md-0">
                    <div class="stat-number">{{ isset($categories) ? $categories->count() : '0' }}</div>
                    <div class="stat-label">Kategori</div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="stat-number">2023</div>
                    <div class="stat-label">Tahun Berdiri</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container section">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title mb-4">Koleksi Museum</h2>
                <p class="lead mb-5">Temukan berbagai koleksi yang kami rawat dengan penuh dedikasi</p>
                
                @if(isset($error))
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endif
                
                @if(isset($categories) && $categories->count() > 0)
                    @foreach($categories as $category)
                        <div class="category-section">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="h4 mb-0">
                                    <i class="fas fa-folder me-2"></i>
                                    {{ $category->name }}
                                </h3>
                                <span class="badge rounded-pill px-3 py-2">
                                    {{ $category->collections->count() }} Koleksi
                                </span>
                            </div>
                            
                            @if($category->collections->count() > 0)
                                <div class="collection-grid">
                                    @foreach($category->collections as $collection)
                                        <div class="collection-card">
                                            @if($collection->image)
                                                <img src="{{ Storage::url($collection->image) }}" 
                                                     alt="{{ $collection->name }}"
                                                     class="collection-img"
                                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/300?text=No+Image'">
                                            @else
                                                <div class="collection-img bg-light d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-image fa-4x text-muted"></i>
                                                </div>
                                            @endif
                                            
                                            <div class="collection-body">
                                                <span class="category-badge">
                                                    <i class="fas fa-tag me-1"></i>
                                                    {{ $category->name }}
                                                </span>
                                                
                                                <h4 class="collection-title">{{ $collection->name }}</h4>
                                                
                                                <div class="collection-meta">
                                                    <span>
                                                        <i class="fas fa-hashtag me-1"></i>
                                                        {{ $collection->nomor_koleksi ?? 'N/A' }}
                                                    </span>
                                                    <span>
                                                        <i class="fas fa-calendar me-1"></i>
                                                        {{ $collection->tahun_masuk ?? 'N/A' }}
                                                    </span>
                                                </div>
                                                
                                                <p class="collection-description">
                                                    {{ Str::limit($collection->description, 150) }}
                                                </p>
                                                
                                                <button class="btn btn-sm btn-outline-primary view-detail-btn"
                                                        data-id="{{ $collection->id }}"
                                                        data-name="{{ $collection->name }}"
                                                        data-description="{{ $collection->description }}"
                                                        data-image="{{ $collection->image ? Storage::url($collection->image) : '' }}"
                                                        data-nomor="{{ $collection->nomor_koleksi }}"
                                                        data-tahun="{{ $collection->tahun_masuk }}"
                                                        data-category="{{ $category->name }}">
                                                    <i class="fas fa-info-circle me-1"></i>
                                                    Detail Koleksi
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <div class="mb-3">
                                        <i class="fas fa-box-open fa-3x text-muted"></i>
                                    </div>
                                    <p class="text-muted mb-0">Belum ada koleksi dalam kategori ini</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-box-open fa-4x text-muted"></i>
                        </div>
                        <h4 class="mb-3">Belum ada koleksi yang tersedia</h4>
                        <p class="text-muted mb-4">Koleksi sedang dalam proses kurasi dan akan segera tersedia</p>
                        <a href="/" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                @endif
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
                        <li class="mb-2"><a href="/" class="text-white-50 text-decoration-none">Beranda</a></li>
                          <li class="mb-2"><a href="#about" class="text-white-50 text-decoration-none">Tentang Kami</a></li>
                        <li class="mb-2"><a href="/koleksi" class="text-white-50 text-decoration-none">Koleksi</a></li>
                        <li><a href="/contact" class="text-white-50 text-decoration-none">Kontak & Lokasi</a></li>
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

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="detailModalImage" class="text-center mb-4">
                        <!-- Gambar akan dimuat via JS -->
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6>Nomor Koleksi</h6>
                            <p id="detailModalNomor" class="mb-0"></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6>Tahun Masuk</h6>
                            <p id="detailModalTahun" class="mb-0"></p>
                        </div>
                    </div>
                    <div>
                        <h6>Deskripsi</h6>
                        <p id="detailModalDescription" class="mb-0"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

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
            
            // Modal detail
            const detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
            
            document.querySelectorAll('.view-detail-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const name = this.getAttribute('data-name');
                    const description = this.getAttribute('data-description');
                    const image = this.getAttribute('data-image');
                    const nomor = this.getAttribute('data-nomor');
                    const tahun = this.getAttribute('data-tahun');
                    const category = this.getAttribute('data-category');
                    
                    document.getElementById('detailModalTitle').textContent = name;
                    document.getElementById('detailModalDescription').textContent = description || 'Tidak ada deskripsi';
                    document.getElementById('detailModalNomor').textContent = nomor || 'Tidak tersedia';
                    document.getElementById('detailModalTahun').textContent = tahun || 'Tidak diketahui';
                    
                    // Set gambar untuk modal
                    const imageContainer = document.getElementById('detailModalImage');
                    if (image && image.trim() !== '') {
                        const img = document.createElement('img');
                        img.src = image;
                        img.alt = name;
                        img.className = 'img-fluid rounded';
                        img.style.maxHeight = '300px';
                        img.style.objectFit = 'contain';
                        
                        img.onerror = function() {
                            this.onerror = null;
                            this.src = 'https://images.unsplash.com/photo-1588421357579-478c4bdfc8c5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80&text=' + encodeURIComponent(name);
                        };
                        
                        imageContainer.innerHTML = '';
                        imageContainer.appendChild(img);
                    } else {
                        imageContainer.innerHTML = `
                            <div class="bg-light p-5 rounded d-flex align-items-center justify-content-center flex-column">
                                <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No image available</p>
                            </div>
                        `;
                    }
                    
                    // Tambahkan badge kategori ke modal
                    const modalHeader = document.querySelector('.modal-header');
                    const existingBadge = modalHeader.querySelector('.modal-category-badge');
                    if (existingBadge) {
                        existingBadge.remove();
                    }
                    
                    if (category) {
                        const badge = document.createElement('span');
                        badge.className = 'badge ms-2 modal-category-badge';
                        badge.textContent = category;
                        modalHeader.querySelector('.modal-title').after(badge);
                    }
                    
                    detailModal.show();
                });
            });
            
            // Auto-collapse mobile menu on click
            const navLinks = document.querySelectorAll('.nav-link');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navbarCollapse.classList.contains('show')) {
                        const toggler = document.querySelector('.navbar-toggler');
                        toggler.click();
                    }
                });
            });
        });
    </script>
</body>
</html>