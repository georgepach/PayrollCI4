<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-dark">Manajemen Karyawan</h3>
    <button class="btn btn-primary shadow-sm rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-user-plus me-2"></i>Tambah Karyawan
    </button>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success border-0 shadow-sm"><?= session()->getFlashdata('pesan'); ?></div>
<?php endif; ?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $e) : ?>
                <tr class="align-middle">
                    <td class="ps-4 fw-bold text-dark"><?= $e['nama']; ?></td>
                    <td><span class="badge bg-light text-secondary border"><?= $e['posisi']; ?></span></td>
                    <td>Rp <?= number_format($e['gaji_pokok'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($e['tunjangan_tetap'], 0, ',', '.'); ?></td>
                    <td class="text-center">
                        <a href="/employees/delete/<?= $e['id']; ?>" class="text-danger ms-2" onclick="return confirm('Hapus karyawan ini?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom-0 pt-4 px-4">
                <h5 class="fw-bold">Input Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/employees/store" method="post">
                <div class="modal-body px-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">NAMA LENGKAP</label>
                        <input type="text" name="nama" class="form-control" placeholder="Contoh: John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">JABATAN</label>
                        <input type="text" name="posisi" class="form-control" placeholder="Contoh: Senior Developer" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">GAJI POKOK</label>
                            <input type="number" name="gaji_pokok" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">TUNJANGAN</label>
                            <input type="number" name="tunjangan_tetap" class="form-control" value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pb-4 px-4">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>