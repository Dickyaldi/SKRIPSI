<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head di layout.php -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <meta charset="UTF-8">
    <title><?= $title ?? 'Manajemen Bimbingan' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4"><?= $title ?? 'Manajemen Bimbingan' ?></h1>
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
