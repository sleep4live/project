<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Koleksi - Admin</title>
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
        .current-image-box {
            margin-top: 10px;
            padding: 15px;
            background-color: #f9fafb;
            border-radius: 8px;
            border: 1px dashed #d1d5db;
        }
        .current-image-box img {
            max-width: 200px;
            max-height: 150px;
            border-radius: 6px;
            object-fit: cover;
        }
        .btn-custom {
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-primary-custom {
            background-color: #1E3A8A;
            border: none;
            color: white;
        }
        .btn-primary-custom:hover {
            background-color: #152C5B;
            transform: translateY(-2px);
        }
        .btn-secondary-custom {
            background-color: #6b7280;
            border: none;
            color: white;
        }
        .btn-danger-custom {
            background-color: #dc3545;
            border: none;
            color: white;
            width: 100%;
            margin-top: 15px;
        }
        .btn-danger-custom:hover {
            background-color: #c82333;
        }
        .alert-custom {
            border-radius: 8px;
            border: none;
            padding: 15px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        .form-text {
            font-size: 13px;
            color: #6b7280;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="page-title">
            <i class="fas fa-edit me-2"></i>Edit Koleksi
        </h1>

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-custom alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

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

        <form method="POST" action="{{ route('admin.collections.update', $collection->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nama Koleksi *</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ old('name', $collection->name) }}" required
                       placeholder="Contoh: Patung Kuno, Lukisan, Dll">
            </div>

            <div class="form-group">
                <label class="form-label">Deskripsi *</label>
                <textarea name="description" class="form-control" rows="4" required
                          placeholder="Deskripsikan koleksi secara detail...">{{ old('description', $collection->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nomor Koleksi</label>
                        <input type="text" name="nomor_koleksi" class="form-control"
                               value="{{ old('nomor_koleksi', $collection->nomor_koleksi) }}"
                               placeholder="Contoh: M-001">
                        <div class="form-text">Nomor unik identifikasi koleksi</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Tahun Masuk</label>
                        <input type="number" name="tahun_masuk" class="form-control"
                               value="{{ old('tahun_masuk', $collection->tahun_masuk) }}"
                               min="1900" max="{{ date('Y') }}"
                               placeholder="{{ date('Y') }}">
                        <div class="form-text">Tahun koleksi masuk ke museum</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Gambar Saat Ini</label>
                <div class="current-image-box">
                    @if($collection->image)
                        <div class="text-center">
                            <img src="{{ Storage::url($collection->image) }}" 
                                 alt="{{ $collection->name }}"
                                 class="img-thumbnail mb-2"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/200x150?text=Gambar+Tidak+Tersedia'">
                            <div class="text-muted small">
                                <i class="fas fa-info-circle me-1"></i>
                                Klik gambar untuk melihat ukuran penuh
                            </div>
                        </div>
                    @else
                        <div class="text-center text-muted py-3">
                            <i class="fas fa-image fa-2x mb-2"></i>
                            <p class="mb-0">Tidak ada gambar</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Ganti Gambar (Opsional)</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <div class="form-text">
                    Format: JPG, PNG, GIF (Maks. 2MB). Kosongkan jika tidak ingin mengganti.
                </div>
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn btn-primary-custom btn-custom flex-grow-1">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
                <a href="{{ route('admin.collections.index') }}" class="btn btn-secondary-custom btn-custom">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
            </div>
        </form>

        <form method="POST" action="{{ route('admin.collections.destroy', $collection->id) }}" 
              id="delete-form" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger-custom btn-custom" onclick="confirmDelete()">
                <i class="fas fa-trash me-2"></i>Hapus Koleksi Ini
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmDelete() {
            if (confirm('⚠️ PERINGATAN!\n\nApakah Anda yakin ingin menghapus koleksi ini?\nTindakan ini tidak dapat dikembalikan.')) {
                document.getElementById('delete-form').submit();
            }
        }

        // Auto-hide alerts setelah 5 detik
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Preview gambar saat dipilih
        document.querySelector('input[name="image"]').addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewBox = document.querySelector('.current-image-box');
                    previewBox.innerHTML = `
                        <div class="text-center">
                            <img src="${e.target.result}" alt="Preview" class="img-thumbnail mb-2" style="max-height: 150px;">
                            <div class="text-success small">
                                <i class="fas fa-check-circle me-1"></i>
                                Gambar baru dipilih
                            </div>
                        </div>
                    `;
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</body>
</html>