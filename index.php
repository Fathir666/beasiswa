<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilihan Beasiswa</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">Beasiswa Unggulan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Pilihan Beasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="daftar.php">Daftar</a></li>
        <li class="nav-item"><a class="nav-link" href="hasil.php">Hasil</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="container py-5">
  <h3 class="text-center mb-4 text-primary">Pilih Jenis Beasiswa</h3>
  <div class="row g-4">
    <!-- Beasiswa Prestasi -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100 text-center p-4">
        <div class="icon-beasiswa mb-3"><i class="bi bi-award-fill"></i></div>
        <h5>Beasiswa Prestasi</h5>
        <p class="text-muted">Untuk mahasiswa dengan prestasi akademik atau non-akademik yang luar biasa.</p>
      </div>
    </div>
    <!-- Beasiswa Inovasi -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100 text-center p-4">
        <div class="icon-beasiswa mb-3"><i class="bi bi-lightbulb-fill"></i></div>
        <h5>Beasiswa Inovasi</h5>
        <p class="text-muted">Mendukung mahasiswa yang mengembangkan inovasi dan penelitian.</p>
      </div>
    </div>
    <!-- Beasiswa Sosial -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100 text-center p-4">
        <div class="icon-beasiswa mb-3"><i class="bi bi-heart-fill"></i></div>
        <h5>Beasiswa Sosial</h5>
        <p class="text-muted">Diberikan kepada mahasiswa dari keluarga kurang mampu yang tetap berprestasi.</p>
      </div>
    </div>
  </div>

  <div class="text-center mt-5">
    <a href="daftar.php" class="btn btn-primary px-4 py-2">
      <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang
    </a>
  </div>
</div>

<!-- Footer -->
<footer class="bg-light text-center py-3 mt-4">
  <small>&copy; <?= date("Y") ?> Beasiswa Unggulan. All rights reserved.</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
