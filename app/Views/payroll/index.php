<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Payroll Dashboard</h3>
    <a href="/payroll/generate" class="btn btn-primary shadow-sm rounded-pill px-4" onclick="return confirm('Proses gaji seluruh karyawan bulan ini?')">
        <i class="fas fa-sync-alt me-2"></i>Generate Gaji Bulan Ini
    </a>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success border-0 shadow-sm"><?= session()->getFlashdata('pesan'); ?></div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Karyawan</th>
                    <th>Periode</th>
                    <th>Gaji Bersih</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payrolls as $p) : ?>
                <tr>
                    <td>
                        <span class="fw-bold"><?= $p['nama']; ?></span><br>
                        <small class="text-muted"><?= $p['posisi']; ?></small>
                    </td>
                    <td><?= date('F', mktime(0, 0, 0, $p['bulan'], 10)) . ' ' . $p['tahun']; ?></td>
                    <td class="fw-bold text-primary">Rp <?= number_format($p['gaji_netto'], 0, ',', '.'); ?></td>
                    <td>
                        <span class="badge rounded-pill <?= ($p['status_bayar'] == 'paid') ? 'bg-success' : 'bg-warning text-dark'; ?>">
                            <?= ucfirst($p['status_bayar']); ?>
                        </span>
                    </td>
                    <td>
                        <a href="/payroll/payslip/<?= $p['id']; ?>" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-file-invoice-dollar me-1"></i> Slip
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>