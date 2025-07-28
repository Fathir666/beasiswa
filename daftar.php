<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Formulir Pendaftaran</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/validasi.js" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Beasiswa</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Pilihan Beasiswa</a></li>
        <li class="nav-item"><a class="nav-link active" href="daftar.php">Daftar</a></li>
        <li class="nav-item"><a class="nav-link" href="hasil.php">Hasil</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h3>Formulir Pendaftaran Beasiswa</h3>
  <form action="proses_daftar.php" method="post" enctype="multipart/form-data" id="formDaftar">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Lengkap</label>
      <input type="text" name="nama" id="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" required>
      <div class="invalid-feedback" id="emailError"></div>
    </div>

    <div class="mb-3">
      <label for="hp" class="form-label">No. HP</label>
      <input type="text" name="hp" id="hp" class="form-control" required>
      <div class="invalid-feedback" id="hpError"></div>
    </div>

    <div class="mb-3">
      <label for="semester" class="form-label">Semester Saat Ini</label>
      <select name="semester" id="semester" class="form-select" required>
        <option value="">-- Pilih Semester --</option>
        <?php for ($i=1; $i<=8; $i++) echo "<option value='$i'>$i</option>"; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="ipk" class="form-label">IPK</label>
      <input type="text" name="ipk" id="ipk" class="form-control" readonly>
    </div>

    <div class="mb-3">
      <label for="beasiswa" class="form-label">Pilih Beasiswa</label>
      <select name="beasiswa" id="beasiswa" class="form-select" disabled required>
        <option value="">-- Pilih --</option>
        <option value="Akademik">Akademik</option>
        <option value="Non-akademik">Non-akademik</option>
        <option value="Penelitian">Penelitian</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="berkas" class="form-label">Upload Berkas (PDF/JPG)</label>
      <input type="file" name="berkas" id="berkas" class="form-control" accept=".pdf,.jpg,.jpeg" required disabled>
    </div>

    <button type="submit" name="daftar" id="btnDaftar" class="btn btn-primary" disabled>Daftar</button>
  </form>
</div>
</body>
</html>
