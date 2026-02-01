<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .sidebar {
            background-color: #111827;
            padding: 0;
        }

        .sidebar h4 {
            font-size: 18px;
            font-weight: 600;
            color: #e5e7eb;
            padding: 16px 20px;
            margin-bottom: 16px;
            border-bottom: 1px solid #1f2937;
        }

        .sidebar .nav-link,
        .sidebar .external-link {
            display: block;
            color: #d1d5db;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 6px;
            margin: 0 12px 8px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .external-link:hover {
            background-color: #1f2937;
            color: #fff;
        }

        .content h2 {
            font-size: 24px;
            font-weight: 600;
            color: #111827;
        }

        .dashboard-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        }

        .dashboard-card .card-title {
            font-size: 16px;
            font-weight: 600;
        }

        .dashboard-card .card-text {
            font-size: 14px;
            color: #6b7280;
        }

        .btn-custom {
            background-color: #111827;
            border: none;
            font-size: 14px;
            padding: 6px 12px;
        }

        .btn-custom:hover {
            background-color: #1f2937;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <div class="col-md-2 sidebar text-white min-vh-100 px-0">
                <h4>Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/') }}" target="_blank" class="external-link">
                            ke dashboard user
                        </a>
                    </li>
                </ul>
            </div>

            <!-- CONTENT -->
            <div class="col-md-10 p-4 content">
                <h2>Dashboard Admin</h2>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card dashboard-card">
                            <div class="card-body">
                                <h5 class="card-title">Koleksi</h5>
                                <p class="card-text">
                                    Kelola seluruh koleksi yang tampil di website.
                                </p>
                                <a href="{{ route('admin.collections.index') }}" class="btn btn-custom text-white">
                                    Kelola Koleksi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>