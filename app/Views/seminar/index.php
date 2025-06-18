<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3>Jadwal Seminar dan Sidang</h3>
<a href="/seminar/create" class="btn btn-primary mb-3">Tambah Jadwal</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Skripsi ID</th>
            <th>Jenis</th>
            <th>Tanggal</th>
            <th>Tempat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jadwal as $j): ?>
        <tr>
            <td><?= $j['id'] ?></td>
            <td><?= $j['skripsi_id'] ?></td>
            <td><?= $j['jenis'] ?></td>
            <td><?= date('d-m-Y H:i', strtotime($j['tanggal'])) ?></td>
            <td><?= $j['tempat'] ?></td>
            <td>
                <a href="/seminar/delete/<?= $j['id'] ?>" onclick="return confirm('Hapus jadwal ini?')" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>
