<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'FocusHR System'; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --bg-light: #f8f9fa;
        }
        body {
            background-color: var(--bg-light);
            font-family: 'Inter', -apple-system, sans-serif;
        }
        .navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e3e6f0;
        }
        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--primary-color) !important;
        }
        .main-content {
            padding-top: 30px;
            padding-bottom: 50px;
        }
        /* Styling tambahan untuk Card agar mirip Talenta */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/payroll">
                <i class="fas fa-chart-pie me-2"></i>FOCUS<span class="text-dark">HR</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/employees"><i class="fas fa-users me-1"></i> Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 active fw-bold text-primary" href="/payroll"><i class="fas fa-wallet me-1"></i> Payroll</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-danger btn-sm rounded-pill px-4" href="#"><i class="fas fa-sign-out-alt me-1"></i> Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container main-content">
        <?= $this->renderSection('content'); ?>
    </main>

    <footer class="text-center py-4 mt-auto">
        <p class="text-muted small">&copy; 2026 FocusHR System • Payroll Engine v1.0</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>