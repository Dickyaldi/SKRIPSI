<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3>Monitoring Progress Skripsi</h3>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Judul Skripsi</th>
            <th>Status Skripsi</th>
            <th>Jumlah Bimbingan</th>
            <th>Status Terakhir Bimbingan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= esc($row['mahasiswa']) ?></td>
            <td><?= esc($row['nim']) ?></td>
            <td><?= esc($row['judul']) ?></td>
            <td>
                <span class="badge bg-info"><?= $row['status'] ?></span>
            </td>
            <td class="text-center"><?= $row['bimbingan_count'] ?></td>
            <td><?= $row['last_status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
