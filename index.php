<?php 
// Menghubungkan ke file koneksi database
include "db.php"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilihan Beasiswa</title>
  <!-- Menggunakan Bootstrap CSS dari CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Menggunakan Bootstrap Icons dari CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <!-- Menggunakan CSS kustom dari folder css/style.css -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar utama -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <!-- Nama Brand -->
    <a class="navbar-brand" href="#">Beasiswa Unggulan</a>
    <!-- Tombol toggle untuk responsive navbar -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menu navigasi -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Tautan ke halaman pilihan beasiswa -->
        <li class="nav-item"><a class="nav-link active" href="index.php">Pilihan Beasiswa</a></li>
        <!-- Tautan ke halaman daftar -->
        <li class="nav-item"><a class="nav-link" href="daftar.php">Daftar</a></li>
        <!-- Tautan ke halaman hasil pendaftaran -->
        <li class="nav-item"><a class="nav-link" href="hasil.php">Hasil</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten utama -->
<div class="container py-5">
  <!-- Judul halaman -->
  <h3 class="text-center mb-4 text-primary">Pilih Jenis Beasiswa</h3>
  <div class="row g-4">
    <!-- Kartu Beasiswa Prestasi -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100 text-center p-4">
        <!-- Ikon beasiswa -->
        <div class="icon-beasiswa mb-3"><i class="bi bi-award-fill"></i></div>
        <h5>Beasiswa Prestasi</h5>
        <p class="text-muted">Untuk mahasiswa dengan prestasi akademik atau non-akademik yang luar biasa.</p>
      </div>
    </div>
    <!-- Kartu Beasiswa Inovasi -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100 text-center p-4">
        <div class="icon-beasiswa mb-3"><i class="bi bi-lightbulb-fill"></i></div>
        <h5>Beasiswa Inovasi</h5>
        <p class="text-muted">Mendukung mahasiswa yang mengembangkan inovasi dan penelitian.</p>
      </div>
    </div>
    <!-- Kartu Beasiswa Sosial -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100 text-center p-4">
        <div class="icon-beasiswa mb-3"><i class="bi bi-heart-fill"></i></div>
        <h5>Beasiswa Sosial</h5>
        <p class="text-muted">Diberikan kepada mahasiswa dari keluarga kurang mampu yang tetap berprestasi.</p>
      </div>
    </div>
  </div>

  <!-- Tombol untuk menuju ke halaman pendaftaran -->
  <div class="text-center mt-5">
    <a href="daftar.php" class="btn btn-primary px-4 py-2">
      <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang
    </a>
  </div>
</div>

<!-- Footer -->
<footer class="bg-light text-center py-3 mt-4">
  <!-- Hak cipta yang menampilkan tahun otomatis -->
  <small>&copy; <?= date("Y") ?> Beasiswa Unggulan. All rights reserved.</small>
</footer>

<!-- Script Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
