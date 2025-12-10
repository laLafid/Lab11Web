<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventori Gajah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/flatly/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="data:,">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(45deg,#5d87b8,#4a6fa5);">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL . 'artikel/home' ?>">Inventori Gajah</a>
        <a class="btn btn-outline-light" href="<?= BASE_URL . 'artikel/about' ?>">Tentang</a>
        <a class="btn btn-outline-light" href="<?= BASE_URL . 'artikel/kontak' ?>">Kontak</a>
        <div class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['login'])): ?>
                <span class="navbar-text me-3">Hai, <?= htmlspecialchars($_SESSION['nama']) ?></span>
                <a href="<?= BASE_URL ?>auth/logout" class="btn btn-outline-light">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div id="main" class="container my-5 flex-grow-1">