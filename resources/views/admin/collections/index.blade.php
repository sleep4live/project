<!DOCTYPE html>
<html>
<head>
    <title>Admin - Koleksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f5f6f8;
            padding: 20px;
        }

        h2 {
            font-weight: 600;
            color: #111827;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        table {
            font-size: 14px;
        }

        thead {
            background-color: #f1f5f9;
        }

        th {
            font-weight: 600;
            color: #374151;
        }

        td {
            vertical-align: middle;
            color: #374151;
        }

        img {
            border-radius: 6px;
            object-fit: cover;
        }

        .btn-add {
            background-color: #111827;
            border: none;
        }

        .btn-add:hover {
            background-color: #1f2937;
        }

        .btn-action {
            padding: 5px 10px;
            font-size: 13px;
            margin-right: 5px;
        }
        
        /* Notifikasi */
        .alert {
            border-radius: 8px;
            border: none;
        }
    </style>
</head>

<body>
<div class="container mt-4">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Koleksi</h2>
        <a href="{{ route('admin.collections.create') }}" class="btn btn-add text-white">
            <i class="fas fa-plus"></i> Tambah Koleksi
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            @if($collections && $collections->count() > 0)
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Judul</th>
                            <th width="25%">Deskripsi</th>
                            <th width="15%">Nomor</th>
                            <th width="10%">Tahun</th>
                            <th width="15%">Gambar</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                            <tr>
                                <td>{{ $collection->id }}</td>
                                <td><strong>{{ $collection->name }}</strong></td>
                                <td>{{ Str::limit($collection->description, 50) }}</td>
                                <td>{{ $collection->nomor_koleksi ?? '-' }}</td>
                                <td>{{ $collection->tahun_masuk ?? '-' }}</td>
                                <td>
                                    @if($collection->image)
                                        <img src="{{ Storage::url($collection->image) }}" 
                                             width="70" height="70"
                                             onerror="this.onerror=null; this.src='https://via.placeholder.com/70?text=No+Image'">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" 
                                             style="width:70px; height:70px; border-radius:6px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <!-- TOMBOL EDIT -->
                                        <a href="{{ route('admin.collections.edit', $collection->id) }}"
                                           class="btn btn-sm btn-outline-primary btn-action me-1"
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- TOMBOL HAPUS -->
                                        <form action="{{ route('admin.collections.destroy', $collection->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus koleksi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger btn-action"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-box-open fa-4x text-muted"></i>
                    </div>
                    <h4 class="mb-3">Belum ada koleksi</h4>
                    <p class="text-muted mb-4">Mulai dengan menambahkan koleksi pertama Anda</p>
                    <a href="{{ route('admin.collections.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Koleksi Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
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