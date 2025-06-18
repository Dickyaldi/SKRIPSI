<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Auth' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <?= $this->renderSection('content') ?>
</body>
</html>
<?= $this->extend('layout_auth') ?>
<?= $this->section('content') ?>

<div class="card p-4 shadow" style="min-width:400px;">
  <h4 class="mb-3 text-center">Registrasi Pengguna</h4>
  <form action="/register" method="post">
    <!-- form input -->
  </form>
</div>

<?= $this->endSection() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registrasi Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }
    .register-card {
      max-width: 500px;
      margin: auto;
      margin-top: 80px;
    }
  </style>
</head>
<body>

<div class="card register-card shadow-sm">
  <div class="card-body">
    <h3 class="text-center mb-4">📄 Registrasi Pengguna</h3>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif ?>

    <form action="/register" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">👤 Username</label>
        <input type="text" name="username" id="username" class="form-control" required placeholder="Masukkan username">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">🔒 Password</label>
        <input type="password" name="password" id="password" class="form-control" required placeholder="Buat password">
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">🎓 Daftar Sebagai</label>
        <select name="role" id="role" class="form-select" required>
          <option value="">-- Pilih Role --</option>
          <option value="mahasiswa">🧑‍🎓 Mahasiswa</option>
          <option value="dosen">👩‍🏫 Dosen</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
    </form>

    <div class="text-center mt-3">
      <small>Sudah punya akun? <a href="/login">Login di sini</a></small>
    </div>
  </div>
</div>

</body>
</html>
