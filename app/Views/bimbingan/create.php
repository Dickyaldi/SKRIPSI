<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Tambah Bimbingan</h3>

<form action="/bimbingan/store" method="post" enctype="multipart/form-data">
  <!-- Dropdown Pilih Skripsi -->
  <div class="mb-3">
    <label for="skripsi_id" class="form-label">Pilih Skripsi</label>
  <select name="skripsi_id" id="skripsi_id" class="form-select" required>
  <option value="">-- Pilih Skripsi --</option>
  <?php foreach ($skripsi as $s): ?>
    <option value="<?= $s['id'] ?>">
      <?= $s['judul'] ?> (<?= $s['nim'] ?>)
    </option>
  <?php endforeach; ?>
</select>
  <!-- Tanggal -->
  <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" class="form-control" required>
  </div>

  <!-- Catatan -->
  <div class="mb-3">
    <label for="catatan" class="form-label">Catatan Revisi</label>
    <textarea name="catatan" class="form-control" required></textarea>
  </div>

  <!-- Status -->
  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select" required>
      <option value="Menunggu Tanggapan">Menunggu Tanggapan</option>
      <option value="Selesai">Selesai</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="file">Lampiran File Skripsi</label>
    <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
</div>


  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>