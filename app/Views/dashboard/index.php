<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="alert alert-info small">
    <strong>Debug Session:</strong><br>
    Role saat ini: <span class="badge bg-primary"><?= session()->get('role'); ?></span><br>
    Is Logged In: <?= session()->get('isLoggedIn') ? 'Ya' : 'Tidak'; ?>
</div>

<div class="nav flex-column mt-2">

    <a href="<?= site_url('logout'); ?>" class="nav-link text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>

<div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mb-4" style="background: #fff9e6; color: #856404; font-size: 14px;">
    <i class="fas fa-exclamation-triangle me-3"></i>
    <span>There are some transactions that need to be calculated. Please run the payroll to process. <a href="/payroll" class="fw-bold">View</a></span>
</div>

<div class="card border-0 shadow-sm mb-4 overflow-hidden position-relative">
    <div class="card-body p-4">
        <h4 class="fw-bold mb-1">Good afternoon, <?= $nama_user; ?>!</h4>
        <p class="text-muted small">It's <?= date('l, d F'); ?></p>
        
        <div class="mt-4">
            <p class="small fw-bold text-muted mb-2">Shortcut</p>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">Live attendance</button>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">Request benefit reimbursement</button>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">Request time off</button>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3">More request <i class="fas fa-chevron-down ms-1"></i></button>
            </div>
        </div>
    </div>
    <img src="https://img.freepik.com/free-vector/hr-manager-looking-curriculum-vitae-job-applicant_74855-10493.jpg" 
         class="position-absolute end-0 bottom-0 d-none d-md-block" style="height: 180px; opacity: 0.8;">
</div>

<div class="row g-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100 p-3">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h6 class="fw-bold small text-muted">Employment Status</h6>
                <i class="fas fa-ellipsis-v text-muted small"></i>
            </div>
            <div class="progress mb-3" style="height: 10px;">
                <div class="progress-bar bg-primary" style="width: 80%"></div>
                <div class="progress-bar bg-warning" style="width: 15%"></div>
                <div class="progress-bar bg-danger" style="width: 5%"></div>
            </div>
            <div class="small">
                <div class="d-flex justify-content-between mb-1"><span>Permanent</span> <b><?= $total_karyawan; ?></b></div>
                <div class="d-flex justify-content-between text-muted"><span>Contract</span> <b>0</b></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100 p-3">
            <h6 class="fw-bold small text-muted">Length of Service</h6>
            <div class="text-center py-4 text-muted">
                <i class="fas fa-chart-bar fa-3x opacity-25"></i>
                <p class="mt-2 small">Chart data will appear here</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100 p-3">
            <h6 class="fw-bold small text-muted">Job Level</h6>
            <div class="progress mb-3 mt-4" style="height: 10px;">
                <div class="progress-bar bg-info" style="width: 40%"></div>
                <div class="progress-bar bg-success" style="width: 30%"></div>
            </div>
            <p class="small text-muted mt-auto">Staff: 40% | Manager: 30%</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100 p-3 text-center">
            <h6 class="fw-bold small text-muted text-start">Gender Diversity</h6>
            <div class="py-2">
                <canvas id="genderChart" style="max-height: 100px;"></canvas>
                <h4 class="fw-bold mt-2"><?= $total_karyawan; ?></h4>
                <p class="small text-muted">Total Employee</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>