<?= $this->extend('layout') ?>
<?= $this->section('content') ?>


<h2>Selamat Datang, <?= esc($user['username'] ?? 'Pengguna') ?>!</h2>
<?php $role = session()->get('role'); ?>
<h5>Anda login sebagai: <?= esc($role ?? '-') ?></h5>
<h5>Anda login sebagai: <?= esc($role ?? 'Tidak diketahui') ?></h5>


<div class="alert alert-info">
    Anda login sebagai <strong><?= esc($role) ?></strong>.
</div>

<p>Ini adalah halaman dashboard utama. Di sini Anda bisa mengakses fitur sesuai peran Anda.</p>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Dashboard Utama</h2>

<div class="row">
  <?php
    $cards = [
      ['title' => 'Mahasiswa', 'count' => $total_mahasiswa, 'link' => '/mahasiswa', 'color' => 'primary'],
      ['title' => 'Dosen', 'count' => $total_dosen, 'link' => '/dosen', 'color' => 'success'],
      ['title' => 'Skripsi', 'count' => $total_skripsi, 'link' => '/skripsi', 'color' => 'info'],
      ['title' => 'Bimbingan', 'count' => $total_bimbingan, 'link' => '/bimbingan', 'color' => 'warning'],
      ['title' => 'Jadwal Seminar', 'count' => $total_seminar, 'link' => '/seminar', 'color' => 'dark'],
    ];
  ?>

  <?php foreach ($cards as $c): ?>
    <div class="col-md-4 mb-3">
      <div class="card text-white bg-<?= $c['color'] ?> shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title"><?= $c['title'] ?></h5>
          <p class="display-6"><?= $c['count'] ?></p>
          <a href="<?= $c['link'] ?>" class="btn btn-light btn-sm">Lihat</a>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>

<?= $this->endSection() ?>
