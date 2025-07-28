<?php
// Aktifkan laporan error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors','1');

// Hubungkan ke database
include "db.php";

// Proses verifikasi jika parameter `verifikasi` dikirim lewat URL (GET)
if (isset($_GET['verifikasi'])) {
  $id = intval($_GET['verifikasi']); // Ambil ID pendaftaran dan ubah ke integer

  // Query untuk update status menjadi Terverifikasi
  $sql = "UPDATE pendaftaran SET status_ajuan='Terverifikasi' WHERE id = ?";
  $stmt = $koneksi->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();

  // Redirect kembali ke halaman hasil setelah verifikasi
  header("Location: hasil.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pendaftar</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Beasiswa</a>
    <ul class="navbar-nav me-auto">
      <li class="nav-item"><a class="nav-link" href="index.php">Pilihan</a></li>
      <li class="nav-item"><a class="nav-link" href="daftar.php">Daftar</a></li>
      <li class="nav-item"><a class="nav-link active" href="hasil.php">Hasil</a></li>
    </ul>
  </div>
</nav>

<!-- Tabel Data Pendaftar -->
<div class="container mt-4">
  <h3>Daftar Pendaftar</h3>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-primary text-center">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>HP</th>
          <th>Semester</th>
          <th>IPK</th>
          <th>Beasiswa</th>
          <th>Berkas</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Ambil semua data pendaftaran dari database
        $stmt = $koneksi->query("SELECT * FROM pendaftaran ORDER BY id DESC");
        $no = 1; // Nomor urut
        while ($row = $stmt->fetch_assoc()) {
          // Tentukan class badge berdasarkan status_ajuan
          $badge = ($row['status_ajuan'] === 'Terverifikasi') ? 'status-sudah' : 'status-belum';

          // Tampilkan baris tabel
          echo "<tr>
                  <td class='text-center'>{$no}</td>
                  <td>{$row['nama']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['hp']}</td>
                  <td class='text-center'>{$row['semester']}</td>
                  <td class='text-center'>{$row['ipk']}</td>
                  <td>{$row['beasiswa']}</td>
                  <td><a href='uploads/{$row['berkas']}' target='_blank'>Lihat</a></td>
                  <td class='text-center'><span class='status-badge {$badge}'>{$row['status_ajuan']}</span></td>
                  <td class='text-center'>";
          
          // Tampilkan tombol verifikasi jika status belum diverifikasi
          if ($row['status_ajuan'] !== 'Terverifikasi') {
            echo "<a href='hasil.php?verifikasi={$row['id']}' class='btn btn-sm btn-success'>Verifikasi</a>";
          } else {
            echo "-"; // Jika sudah diverifikasi, tampilkan tanda strip
          }

          echo "</td>
                </tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
