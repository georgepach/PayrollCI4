<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4 mb-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 800px;">
        <div class="card-body p-5">
            
            <div class="d-flex justify-content-between align-items-center mb-5 border-bottom pb-4">
                <div>
                    <h3 class="fw-bold text-primary mb-1">FOCUS<span class="text-dark">HR</span></h3>
                    <p class="text-muted small mb-0">PT. Maju Bersama Digital</p>
                </div>
                <div class="text-end">
                    <h5 class="fw-bold mb-0">SLIP GAJI</h5>
                    <p class="text-muted small">Periode: <?= $bulan_txt; ?> <?= $payroll['tahun']; ?></p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <table class="table table-borderless table-sm small">
                        <tr><td class="text-muted" width="100">Nama</td><td class="fw-bold">: <?= $payroll['nama']; ?></td></tr>
                        <tr><td class="text-muted">Posisi</td><td class="fw-bold">: <?= $payroll['posisi']; ?></td></tr>
                    </table>
                </div>
                <div class="col-6 text-end">
                    <table class="table table-borderless table-sm small">
                        <tr><td class="text-muted">ID Karyawan</td><td class="fw-bold">: #<?= $payroll['employee_id']; ?></td></tr>
                        <tr><td class="text-muted">Tgl Cetak</td><td class="fw-bold">: <?= date('d/m/Y'); ?></td></tr>
                    </table>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold border-bottom pb-2 mb-3">PENDAPATAN (EARNINGS)</h6>
                        <div class="d-flex justify-content-between mb-2 small">
                            <span>Gaji Pokok</span>
                            <span class="fw-bold text-dark">Rp <?= number_format($payroll['pokok_snapshot'], 0, ',', '.'); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 small">
                            <span>Tunjangan Tetap</span>
                            <span class="fw-bold text-dark">Rp <?= number_format($payroll['tunjangan_tetap'], 0, ',', '.'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <h6 class="fw-bold border-bottom pb-2 mb-3 text-danger">POTONGAN (DEDUCTIONS)</h6>
                        <div class="d-flex justify-content-between mb-2 small">
                            <span>BPJS Kesehatan (1%)</span>
                            <span class="fw-bold text-danger">- Rp <?= number_format($potongan, 0, ',', '.'); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border-top border-bottom border-primary border-2 bg-primary bg-opacity-10">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-primary">GAJI BERSIH (NET PAY)</h5>
                    <h3 class="fw-bold mb-0 text-primary">Rp <?= number_format($payroll['gaji_netto'], 0, ',', '.'); ?></h3>
                </div>
            </div>

            <div class="row mt-5 pt-3">
                <div class="col-6 text-center">
                    <p class="small text-muted mb-5">Karyawan,</p>
                    <p class="fw-bold mt-4">( <?= $payroll['nama']; ?> )</p>
                </div>
                <div class="col-6 text-center">
                    <p class="small text-muted mb-5">HR Manager,</p>
                    <p class="fw-bold mt-4">( <?= session()->get('username'); ?> )</p>
                </div>
            </div>

            <div class="mt-5 text-center d-print-none">
                <button onclick="window.print()" class="btn btn-outline-secondary px-4 rounded-pill">
                    <i class="fas fa-print me-2"></i> Cetak Slip
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>