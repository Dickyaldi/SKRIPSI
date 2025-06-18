<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Sistem Skripsi' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">Sistem Skripsi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <!-- Untuk Admin -->
        <?php if (session()->get('role') === 'admin'): ?>
          <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="/mahasiswa">Mahasiswa</a></li>
          <li class="nav-item"><a class="nav-link" href="/dosen">Dosen</a></li>
          <li class="nav-item"><a class="nav-link" href="/skripsi">Skripsi</a></li>
          <li class="nav-item"><a class="nav-link" href="/bimbingan">Bimbingan</a></li>
          <li class="nav-item"><a class="nav-link" href="/seminar">Seminar</a></li>
          <li class="nav-item"><a class="nav-link" href="/monitoring">Monitoring</a></li>
        <?php endif; ?>

        <!-- Untuk Dosen -->
        <?php if (session()->get('role') === 'dosen'): ?>
          <li class="nav-item"><a class="nav-link" href="/dashboard/dosen">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="/bimbingan">Bimbingan</a></li>
          <li class="nav-item"><a class="nav-link" href="/monitoring">Monitoring</a></li>
        <?php endif; ?>

        <!-- Untuk Mahasiswa -->
        <?php if (session()->get('role') === 'mahasiswa'): ?>
          <li class="nav-item"><a class="nav-link" href="/dashboard/mahasiswa">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="/bimbingan">Bimbingan</a></li>
          <li class="nav-item"><a class="nav-link" href="/skripsi/upload">Upload Skripsi</a></li>
          <li class="nav-item"><a class="nav-link" href="/seminar">Seminar</a></li>
        <?php endif; ?>

        <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>

      </ul>
    </div>
  </div>
</nav>


  <!-- ✅ KONTEN DI BAWAH NAVBAR -->
  <div class="container mt-4">
    <?= $this->renderSection('content') ?>
  </div>
<?php if (session()->get('role') == 'dosen'): ?>
  <li class="nav-item"><a class="nav-link" href="/dashboard/dosen">Dashboard Dosen</a></li>
<?php endif; ?>

</body>
</html>



