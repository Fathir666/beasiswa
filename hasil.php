<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
include "db.php";

// Proses verifikasi jika tombol diklik
if (isset($_GET['verifikasi'])) {
  $id = intval($_GET['verifikasi']); 
  $sql = "UPDATE pendaftaran SET status_ajuan='Terverifikasi' WHERE id = ?";
  $stmt = $koneksi->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  header("Location: hasil.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pendaftar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
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

<div class="container mt-4">
  <h3>Daftar Pendaftar</h3>
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead class="table-primary text-center">
        <tr>
          <th>No</th><th>Nama</th><th>Email</th><th>HP</th><th>Semester</th>
          <th>IPK</th><th>Beasiswa</th><th>Berkas</th><th>Status</th><th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $stmt = $koneksi->query("SELECT * FROM pendaftaran ORDER BY id DESC");
        $no = 1;
        while ($row = $stmt->fetch_assoc()) {
          $badge = ($row['status_ajuan'] === 'Terverifikasi') ? 'status-sudah' : 'status-belum';
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
          if ($row['status_ajuan'] !== 'Terverifikasi') {
            echo "<a href='hasil.php?verifikasi={$row['id']}' class='btn btn-sm btn-success'>Verifikasi</a>";
          } else {
            echo "-";
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
