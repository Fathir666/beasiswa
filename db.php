<?php
// Koneksi ke database MySQL
$koneksi = new mysqli("localhost", "root", "", "db_beasiswa");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
