<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Koleksi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #444;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .current-image {
            margin-top: 8px;
        }
        .current-image img {
            max-width: 120px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            flex: 1;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Koleksi</h2>

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi Error --}}
        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.collections.update', $collection->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Koleksi:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $collection->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" required>{{ old('description', $collection->description) }}</textarea>
            </div>

             <div class="form-group">
        <label>Nomor Koleksi</label>
        <input type="text" name="nomor_koleksi" value="{{ old('nomor_koleksi') }}">
              </div>

                <div class="form-group">
        <label>Tahun Masuk</label>
        <input type="number" name="tahun_masuk" value="{{ old('tahun_masuk') }}" min="1900" max="{{ date('Y') }}">
                </div>

            <div class="form-group">
                <label>Gambar Saat Ini:</label>
                <div class="current-image">
                    @if($collection->image)
                        <img src="{{ asset('uploads/' . $collection->image) }}" alt="Gambar">
                    @else
                        <span>Tidak ada gambar</span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label>Ganti Gambar (opsional):</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('admin.collections.index') }}" class="btn btn-secondary" style="background-color: #6c757d;">Batal</a>
            </div>
        </form>

        {{-- Form Hapus--}}
        <form method="POST" action="{{ route('admin.collections.destroy', $collection->id) }}" id="delete-form" style="margin-top: 20px;">
            @csrf
            @method('DELETE')
        </form>

        <button type="button" class="btn btn-danger" style="width: 100%; margin-top: 10px;" onclick="confirmDelete()">
            Hapus Koleksi
        </button>
    </div>

    <form method="POST" action="{{ route('admin.collections.destroy', $collection->id) }}" id="delete-form">
    @csrf
    @method('DELETE')
    </form>

    <script>
        function confirmDelete() {
            if (confirm('Yakin ingin menghapus koleksi ini? Tindakan ini tidak bisa dikembalikan.')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</body>
</html>