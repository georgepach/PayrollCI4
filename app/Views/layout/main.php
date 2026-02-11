<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --sidebar-width: 240px; --topbar-height: 60px; --primary-talenta: #3758f9; }
        body { background-color: #f4f7fa; font-family: 'Inter', sans-serif; overflow-x: hidden; }
        
        /* SIDEBAR (9) */
        .sidebar { width: var(--sidebar-width); height: 100vh; position: fixed; background: white; border-right: 1px solid #e0e0e0; z-index: 1000; }
        .sidebar-brand { height: var(--topbar-height); padding: 15px; border-bottom: 1px solid #f0f0f0; }
        .nav-link { color: #616161; padding: 10px 20px; font-size: 14px; display: flex; align-items: center; }
        .nav-link:hover, .nav-link.active { background: #f0f4ff; color: var(--primary-talenta); border-left: 4px solid var(--primary-talenta); }
        .nav-link i { width: 25px; }

        /* TOPBAR (1-8) */
        .topbar { height: var(--topbar-height); background: white; position: fixed; left: var(--sidebar-width); right: 0; border-bottom: 1px solid #e0e0e0; z-index: 999; padding: 0 20px; }
        .main-content { margin-left: var(--sidebar-width); padding-top: calc(var(--topbar-height) + 20px); padding-right: 20px; padding-left: 20px; }
        
        .btn-ai { background: #f0f4ff; color: var(--primary-talenta); border-radius: 20px; font-size: 13px; border: 1px solid #d0dfff; }
        .profile-img { width: 35px; height: 35px; border-radius: 50%; object-fit: cover; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand d-flex align-items-center">
        <img src="/logo.png" height="30" class="me-2"> <div class="dropdown"> <button class="btn btn-sm dropdown-toggle fw-bold" data-bs-toggle="dropdown">HRIS</button>
        </div>
    </div>
    <div class="nav flex-column mt-2">
<a href="<?= site_url('dashboard'); ?>" class="nav-link <?= (url_is('dashboard*') || url_is('/')) ? 'active' : ''; ?>">
        <i class="fas fa-home"></i> Home
    </a>
    <a href="<?= site_url('employees'); ?>" class="nav-link <?= url_is('employees*') ? 'active' : ''; ?>">
        <i class="fas fa-users"></i> Employees
    </a>
    
    <?php if (session()->get('role') == 'admin') : ?>
        <a href="<?= site_url('payroll'); ?>" class="nav-link <?= url_is('payroll*') ? 'active' : ''; ?>">
            <i class="fas fa-wallet"></i> Payroll
        </a>
    <?php endif; ?>

    <hr class="mx-3 my-2 text-muted">
    <a href="<?= site_url('logout'); ?>" class="nav-link text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
        <a href="#" class="nav-link"><i class="fas fa-user-plus"></i> Recruitment <i class="fas fa-chevron-right ms-auto small"></i></a>
        <a href="#" class="nav-link mt-4 text-muted small uppercase">Applications</a>
        <a href="#" class="nav-link"><i class="fas fa-th-large"></i> Integrations</a>
        <a href="#" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
    </div>
</div>
<div class="topbar d-flex align-items-center justify-content-end gap-3">
    <button class="btn btn-ai px-3"><i class="fas fa-sparkles"></i> Summarize data</button>
    <i class="fas fa-plus text-muted cursor-pointer"></i>
    <i class="fas fa-search text-muted cursor-pointer"></i>
    <div class="position-relative">
        <i class="fas fa-bell text-muted cursor-pointer"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 8px;">99+</span>
    </div>
    <i class="fas fa-th text-muted cursor-pointer"></i>
    
    <div class="d-flex align-items-center gap-2 border-start ps-3">
        <div class="text-end d-none d-sm-block">
            <p class="fw-bold mb-0 small" style="line-height: 1.2;"><?= session()->get('username'); ?></p>
            <p class="text-muted mb-0" style="font-size: 11px;"><?= strtoupper(session()->get('role')); ?></p>
        </div>
        <img src="https://ui-avatars.com/api/?name=<?= session()->get('username'); ?>&background=random" class="profile-img border">
    </div>
</div>
    <i class="fas fa-th text-muted cursor-pointer"></i> <img src="https://ui-avatars.com/api/?name=Surya" class="profile-img border"> </div>

<div class="main-content">
    <?= $this->renderSection('content'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>