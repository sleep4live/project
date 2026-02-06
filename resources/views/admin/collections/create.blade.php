<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Koleksi Baru - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .page-title {
            color: #1E3A8A;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }
        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }
        .form-label.required::after {
            content: ' *';
            color: #dc3545;
        }
        .form-control, .form-select {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 16px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1E3A8A;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
        }
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        .btn-custom {
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-primary-custom {
            background-color: #1E3A8A;
            border: none;
            color: white;
            width: 100%;
        }
        .btn-primary-custom:hover {
            background-color: #152C5B;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
        }
        .btn-secondary-custom {
            background-color: #6b7280;
            border: none;
            color: white;
        }
        .alert-custom {
            border-radius: 8px;
            border: none;
            padding: 15px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-text {
            font-size: 13px;
            color: #6b7280;
            margin-top: 5px;
        }
        .preview-box {
            margin-top: 10px;
            padding: 15px;
            background-color: #f9fafb;
            border-radius: 8px;
            border: 1px dashed #d1d5db;
            min-height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .preview-box img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 6px;
            object-fit: cover;
        }
        .back-link {
            color: #6b7280;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
        }
        .back-link:hover {
            color: #1E3A8A;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('admin.collections.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Koleksi
        </a>
        
        <h1 class="page-title">
            <i class="fas fa-plus-circle me-2"></i>Tambah Koleksi Baru
        </h1>

        {{-- Notifikasi Error --}}
        @if($errors->any())
            <div class="alert alert-danger alert-custom alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.collections.store') }}" enctype="multipart/form-data" id="collection-form">
            @csrf

            <div class="form-group">
                <label class="form-label required">Nama Koleksi</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ old('name') }}" required
                       placeholder="Contoh: Patung Kuno Abad 18, Lukisan Pemandangan, Dll">
                <div class="form-text">Berikan nama yang deskriptif dan jelas</div>
            </div>

            <div class="form-group">
                <label class="form-label required">Deskripsi</label>
                <textarea name="description" class="form-control" rows="5" required
                          placeholder="Deskripsikan koleksi secara detail termasuk sejarah, bahan, ukuran, dan nilai budayanya...">{{ old('description') }}</textarea>
                <div class="form-text">Minimal 50 karakter. Jelaskan secara lengkap</div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nomor Koleksi</label>
                        <input type="text" name="nomor_koleksi" class="form-control"
                               value="{{ old('nomor_koleksi') }}"
                               placeholder="Contoh: M-001, ART-2023-01">
                        <div class="form-text">Nomor unik untuk identifikasi</div>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control"
                               value="{{ old('kategori') }}"
                               placeholder="Contoh: Sejarah">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Tahun Masuk</label>
                        <input type="number" name="tahun_masuk" class="form-control"
                               value="{{ old('tahun_masuk', date('Y')) }}"
                               min="1900" max="{{ date('Y') }}"
                               placeholder="{{ date('Y') }}">
                        <div class="form-text">Tahun koleksi masuk ke museum</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label required">Gambar Koleksi</label>
                <input type="file" name="image" class="form-control" accept="image/*" required
                       id="image-input">
                <div class="form-text">
                    Format: JPG, PNG, GIF (Maks. 2MB). Ukuran disarankan: min. 800x600px
                </div>
                
                <div class="preview-box" id="image-preview">
                    <div class="text-center text-muted">
                        <i class="fas fa-image fa-3x mb-3"></i>
                        <p class="mb-0">Pratinjau gambar akan muncul di sini</p>
                        <small>Pilih file gambar untuk melihat pratinjau</small>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary-custom btn-custom" id="submit-btn">
                    <i class="fas fa-save"></i> Simpan Koleksi
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Preview gambar saat dipilih
        const imageInput = document.getElementById('image-input');
        const imagePreview = document.getElementById('image-preview');
        const submitBtn = document.getElementById('submit-btn');
        
        imageInput.addEventListener('change', function(e) {
            const file = this.files[0];
            
            if (file) {
                // Validasi ukuran file (2MB = 2097152 bytes)
                if (file.size > 2097152) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    this.value = '';
                    imagePreview.innerHTML = `
                        <div class="text-center text-danger">
                            <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                            <p class="mb-0">Ukuran file terlalu besar!</p>
                            <small>Maksimal 2MB</small>
                        </div>
                    `;
                    return;
                }
                
                // Validasi tipe file
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak didukung! Gunakan JPG, PNG, atau GIF.');
                    this.value = '';
                    imagePreview.innerHTML = `
                        <div class="text-center text-danger">
                            <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                            <p class="mb-0">Format tidak didukung!</p>
                            <small>Gunakan JPG, PNG, atau GIF</small>
                        </div>
                    `;
                    return;
                }
                
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.innerHTML = `
                        <div class="text-center">
                            <img src="${e.target.result}" alt="Preview" class="img-fluid">
                            <div class="mt-2 text-success">
                                <i class="fas fa-check-circle me-1"></i>
                                Gambar siap diupload (${(file.size / 1024).toFixed(1)} KB)
                            </div>
                        </div>
                    `;
                }
                
                reader.onerror = function() {
                    imagePreview.innerHTML = `
                        <div class="text-center text-danger">
                            <i class="fas fa-times-circle fa-3x mb-3"></i>
                            <p class="mb-0">Gagal membaca gambar</p>
                        </div>
                    `;
                }
                
                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = `
                    <div class="text-center text-muted">
                        <i class="fas fa-image fa-3x mb-3"></i>
                        <p class="mb-0">Pratinjau gambar akan muncul di sini</p>
                        <small>Pilih file gambar untuk melihat pratinjau</small>
                    </div>
                `;
            }
        });
        
        // Loading state saat submit
        document.getElementById('collection-form').addEventListener('submit', function() {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
            submitBtn.disabled = true;
        });
        
        // Auto-hide alerts
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>