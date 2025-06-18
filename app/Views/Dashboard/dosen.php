<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h3 class="mb-4">Dashboard Dosen</h3>

<div class="card mb-4">
  <div class="card-body">
    <h5 class="card-title">Total Bimbingan</h5>
    <p class="display-6"><?= $bimbingan_count ?></p>
  </div>
</div>

<h5>Daftar Skripsi yang Dibimbing</h5>
<?php if (!empty($skripsi)): ?>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Judul</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($skripsi as $i => $s): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= esc($s['judul']) ?></td>
            <td><span class="badge bg-info"><?= esc($s['status']) ?></span></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <div class="alert alert-warning">Belum ada skripsi yang dibimbing.</div>
<?php endif ?>

<div class="row mt-4">
  <div class="col-md-4">
    <a href="/bimbingan" class="btn btn-outline-primary w-100">📘 Kelola Bimbingan</a>
  </div>
  <div class="col-md-4">
    <a href="/seminar" class="btn btn-outline-success w-100">📅 Jadwal Seminar</a>
  </div>
  <div class="col-md-4">
    <a href="/monitoring" class="btn btn-outline-dark w-100">📊 Monitoring</a>
  </div>
</div>

<?= $this->endSection() ?>
