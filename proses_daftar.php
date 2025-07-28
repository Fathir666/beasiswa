<?php
include "db.php";

if (isset($_POST['daftar'])) {
  $nama     = $_POST['nama'];
  $email    = $_POST['email'];
  $hp       = $_POST['hp'];
  $semester = $_POST['semester'];
  $ipk      = $_POST['ipk'];
  $beasiswa = $_POST['beasiswa'];

  // Simpan file
  $fileName = $_FILES['berkas']['name'];
  $tmpName  = $_FILES['berkas']['tmp_name'];
  $folder   = "uploads/" . $fileName;

  // Validasi tipe file
  $allowedExt = ['pdf', 'jpg', 'jpeg'];
  $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

  if (in_array($fileExt, $allowedExt)) {
    if (move_uploaded_file($tmpName, $folder)) {
      // Simpan ke DB
      $query = "INSERT INTO pendaftaran 
                (nama, email, hp, semester, ipk, beasiswa, berkas, status_ajuan)
                VALUES 
                ('$nama', '$email', '$hp', '$semester', '$ipk', '$beasiswa', '$fileName', 'Belum Diverifikasi')";

      if ($koneksi->query($query)) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location='hasil.php';</script>";
      } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
      }
    } else {
      echo "Gagal mengupload berkas.";
    }
  } else {
    echo "Tipe file tidak diperbolehkan. Gunakan PDF atau JPG.";
  }
}
?>
