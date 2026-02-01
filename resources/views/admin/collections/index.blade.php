<!DOCTYPE html>
<html>
<head>
    <title>Admin - Koleksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
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

        .btn-edit {
            font-size: 13px;
        }
    </style>
</head>

<body>
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Koleksi</h2>
        <a href="{{ route('admin.collections.create') }}" class="btn btn-add text-white">
            + Tambah Koleksi
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">Judul</th>
                        <th>Deskripsi</th>
                        <th width="15%">Gambar</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($collections as $collection)
                        <tr>
                            <td>{{ $collection->id }}</td>
                            <td>{{ $collection->name }}</td>
                            <td>{{ Str::limit($collection->description, 50) }}</td>
                            <td>
                                @if($collection->image)
                                    <img src="{{ asset('uploads/' . $collection->image) }}" width="70">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.collections.edit', $collection) }}"
                                   class="btn btn-sm btn-outline-primary btn-edit">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada koleksi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">
        ← Kembali ke Dashboard
    </a>

</div>
</body>
</html>
