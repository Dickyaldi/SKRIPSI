<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<header><th>File</th>
</header>

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Bimbingan Skripsi</h5>
        <a href="/bimbingan/create" class="btn btn-light btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Bimbingan
        </a>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Skripsi ID</th>
                        <th style="width: 15%;">Tanggal</th>
                        <th>Catatan</th>
                        <th style="width: 12%;">Status</th>
                        <th style="width: 15%;">File</th>
                        <th style="width: 15%;">Persetujuan dan edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bimbingan as $row): ?>
                    <tr>
                        <td class="text-center"><?= $row['id'] ?></td>
                        <td class="text-center"><?= $row['skripsi_id'] ?></td>
                        <td class="text-center"><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                        <td><?= esc($row['catatan']) ?></td>
                        <td class="text-center">
                            <span class="badge rounded-pill <?= $row['status'] === 'Selesai' ? 'bg-success' : 'bg-warning text-dark' ?>">
                                <?= $row['status'] ?>
                            </span>
                        </td>
                        <td>
                        <?php if (!empty($row['file'])): ?>
                            <a href="/uploads/bimbingan/<?= $row['file'] ?>" target="_blank">Lihat File</a>
                        <?php else: ?>
                            Tidak ada
                        <?php endif ?>
                        </td>
                        <td class="text-center">
                            <a href="/bimbingan/edit/<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/bimbingan/delete/<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (empty($bimbingan)): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">Belum ada data bimbingan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

