<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Jadwal Seminar/Sidang</h3>

<form action="/seminar/store" method="post">
    <div class="mb-3">
        <label for="skripsi_id">Skripsi</label>
        <select name="skripsi_id" class="form-select" required>
            <option value="">-- Pilih Skripsi --</option>
            <?php foreach ($skripsi as $s): ?>
                <option value="<?= $s['id'] ?>"><?= $s['judul'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Jenis</label>
        <select name="jenis" class="form-select" required>
            <option value="Seminar Proposal">Seminar Proposal</option>
            <option value="Seminar Hasil">Seminar Hasil</option>
            <option value="Sidang Akhir">Sidang Akhir</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="datetime-local" name="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tempat</label>
        <input type="text" name="tempat" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>

<?= $this->endSection() ?>
