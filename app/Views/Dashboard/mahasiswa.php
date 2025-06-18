<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3>Dashboard Mahasiswa</h3>

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php elseif (session()->getFlashdata('error')): ?>
<div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="/skripsi/upload" method="post" enctype="multipart/form-data" class="card p-3 shadow-sm">
    <div class="mb-3">
        <label for="judul">Judul Skripsi</label>
        <input type="text" name="judul" class="form-control" required
            value="<?= $skripsi['judul'] ?? '' ?>">
    </div>
    <div class="mb-3">
        <label for="file">Upload Berkas Skripsi (PDF/DOCX)</label>
        <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx" required>
    </div>
    <button class="btn btn-primary">Upload Skripsi</button>
</form>

<?php if ($skripsi): ?>
<hr>
<h5 class="mt-4">Skripsi Anda</h5>
<ul>
    <li><strong>Judul:</strong> <?= $skripsi['judul'] ?></li>
    <li><strong>Status:</strong> <?= $skripsi['status'] ?></li>
    <li><strong>Berkas:</strong> 
        <a href="/uploads/skripsi/<?= $skripsi['file'] ?>" target="_blank">Download</a>
    </li>
</ul>
<?php endif ?>

<?= $this->endSection() ?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Dashboard Mahasiswa</h3>

<?php if ($skripsi): ?>
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h5>📄 Judul Skripsi:</h5>
      <p><strong><?= esc($skripsi['judul']) ?></strong></p>

      <h6>Status Skripsi:</h6>
      <span class="badge bg-info"><?= esc($skripsi['status'] ?? 'Draft') ?></span>

      <h6 class="mt-3">Total Bimbingan:</h6>
      <span class="badge bg-success"><?= $bimbingan_count ?> catatan</span>
    </div>
  </div>
<?php else: ?>
  <div class="alert alert-warning">Belum ada data skripsi. Silakan unggah skripsi terlebih dahulu.</div>
<?php endif ?>

<div class="row">
  <div class="col-md-4 mb-3">
    <a href="/skripsi/upload" class="btn btn-outline-primary w-100">📤 Upload Skripsi</a>
  </div>
  <div class="col-md-4 mb-3">
    <a href="/bimbingan" class="btn btn-outline-success w-100">📘 Lihat Bimbingan</a>
  </div>
  <div class="col-md-4 mb-3">
    <a href="/seminar" class="btn btn-outline-dark w-100">📅 Jadwal Seminar</a>
  </div>
</div>

<?= $this->endSection() ?>
