<?php
// Menghubungkan ke database
include "db.php";

// Periksa apakah tombol daftar ditekan
if (isset($_POST['daftar'])) {
  // Ambil data dari form
  $nama     = $_POST['nama'];
  $email    = $_POST['email'];
  $hp       = $_POST['hp'];
  $semester = $_POST['semester'];
  $ipk      = $_POST['ipk'];
  $beasiswa = $_POST['beasiswa'];

  // Ambil data file yang diunggah
  $fileName = $_FILES['berkas']['name'];          // Nama asli file
  $tmpName  = $_FILES['berkas']['tmp_name'];      // Lokasi sementara file
  $folder   = "uploads/" . $fileName;             // Tujuan penyimpanan file

  // Validasi ekstensi file
  $allowedExt = ['pdf', 'jpg', 'jpeg'];           // Daftar ekstensi yang diperbolehkan
  $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Ambil ekstensi file

  // Cek apakah ekstensi file diperbolehkan
  if (in_array($fileExt, $allowedExt)) {
    // Pindahkan file ke folder tujuan
    if (move_uploaded_file($tmpName, $folder)) {
      
      // Query untuk menyimpan data ke database
      $query = "INSERT INTO pendaftaran 
                (nama, email, hp, semester, ipk, beasiswa, berkas, status_ajuan)
                VALUES 
                ('$nama', '$email', '$hp', '$semester', '$ipk', '$beasiswa', '$fileName', 'Belum Diverifikasi')";

      // Jalankan query dan periksa apakah berhasil
      if ($koneksi->query($query)) {
        // Tampilkan alert dan redirect ke halaman hasil
        echo "<script>alert('Pendaftaran berhasil!'); window.location='hasil.php';</script>";
      } else {
        // Tampilkan pesan error jika gagal menyimpan
        echo "Gagal menyimpan data: " . $koneksi->error;
      }

    } else {
      // Gagal memindahkan file
      echo "Gagal mengupload berkas.";
    }
  } else {
    // File bukan tipe yang diizinkan
    echo "Tipe file tidak diperbolehkan. Gunakan PDF atau JPG.";
  }
}
?>
