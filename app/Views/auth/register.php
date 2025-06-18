<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registrasi Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #74ebd5, #acb6e5);
      font-family: 'Segoe UI', sans-serif;
    }

    .register-card {
      max-width: 500px;
      margin: 80px auto;
      padding: 30px;
      border-radius: 12px;
      background-color: #ffffff;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .form-label {
      font-weight: 500;
    }

    .form-control:focus {
      border-color: #4d9de0;
      box-shadow: 0 0 0 0.2rem rgba(77, 157, 224, 0.25);
    }
  </style>
</head>
<body>

<div class="register-card">
  <h3 class="text-center mb-4"><i class="bi bi-person-plus-fill"></i> Registrasi Pengguna</h3>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif ?>

  <form action="/register" method="post">
    <div class="mb-3">
      <label class="form-label">👤 Username</label>
      <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
    </div>

    <div class="mb-3">
  <label class="form-label">📧 Email</label>
  <input type="email" name="email" class="form-control" placeholder="Email aktif" required>
</div>

    <div class="mb-3">
      <label class="form-label">🔒 Password</label>
      <input type="password" name="password" class="form-control" placeholder="Buat password" required>
    </div>

    <div class="mb-3">
      <label class="form-label">🎓 Daftar Sebagai</label>
      <select name="role" id="role" class="form-select" required>
        <option value="">-- Pilih Role --</option>
        <option value="mahasiswa">🧑‍🎓 Mahasiswa</option>
        <option value="dosen">👨‍🏫 Dosen</option>
      </select>
    </div>
    

    <div class="mb-3" id="nim-field" style="display: none;">
      <label class="form-label">🆔 NIM (Mahasiswa)</label>
      <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
    </div>

    <div class="mb-3" id="nidn-field" style="display: none;">
      <label class="form-label">🆔 NIDN (Dosen)</label>
      <input type="text" name="nidn" class="form-control" placeholder="Masukkan NIDN">
    </div>

    <button type="submit" class="btn btn-primary w-100 mt-2">📥 Daftar Sekarang</button>
  </form>

  <div class="text-center mt-3">
    <small>Sudah punya akun? <a href="/login" class="text-decoration-none">Login di sini</a></small>
  </div>
</div>

<!-- Script Role Switch -->
<script>
  const roleSelect = document.getElementById('role');
  const nimField = document.getElementById('nim-field');
  const nidnField = document.getElementById('nidn-field');

  function toggleFields() {
    nimField.style.display = roleSelect.value === 'mahasiswa' ? 'block' : 'none';
    nidnField.style.display = roleSelect.value === 'dosen' ? 'block' : 'none';
  }

  roleSelect.addEventListener('change', toggleFields);
  window.addEventListener('DOMContentLoaded', toggleFields);
</script>
</body>
</html>
