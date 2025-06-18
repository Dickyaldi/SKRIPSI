<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<a href="/bimbingan" class="btn btn-secondary mb-3">← Kembali</a>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4">Edit Bimbingan</h4>
        <form action="/bimbingan/update/<?= $bimbingan['id'] ?>" method="post">
            <div class="mb-3">
                <label for="skripsi_id" class="form-label">Skripsi ID</label>
                <input type="number" name="skripsi_id" id="skripsi_id" class="form-control" value="<?= $bimbingan['skripsi_id'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $bimbingan['tanggal'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control" required><?= $bimbingan['catatan'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="Menunggu Tanggapan" <?= $bimbingan['status'] == 'Menunggu Tanggapan' ? 'selected' : '' ?>>Menunggu Tanggapan</option>
                    <option value="Selesai" <?= $bimbingan['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
