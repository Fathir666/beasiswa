// Tunggu hingga seluruh konten DOM dimuat
document.addEventListener("DOMContentLoaded", function () {
  // Ambil elemen-elemen form berdasarkan ID
  const email = document.getElementById("email");
  const hp = document.getElementById("hp");
  const semester = document.getElementById("semester");
  const ipk = document.getElementById("ipk");
  const beasiswa = document.getElementById("beasiswa");
  const berkas = document.getElementById("berkas");
  const btnDaftar = document.getElementById("btnDaftar");

  // Validasi input email secara real-time
  email.addEventListener("input", function () {
    const emailError = document.getElementById("emailError");
    // Regex untuk format email dasar
    const regex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (!regex.test(email.value)) {
      // Jika tidak valid, tampilkan pesan error dan tambahkan class is-invalid
      email.classList.add("is-invalid");
      emailError.textContent = "Format email tidak valid";
    } else {
      // Jika valid, hapus pesan error dan class is-invalid
      email.classList.remove("is-invalid");
      emailError.textContent = "";
    }
  });

  // Validasi input nomor HP secara real-time
  hp.addEventListener("input", function () {
    const hpError = document.getElementById("hpError");
    // Regex untuk angka 10-15 digit
    const regex = /^[0-9]{10,15}$/;

    if (!regex.test(hp.value)) {
      // Jika tidak valid, tampilkan pesan error
      hp.classList.add("is-invalid");
      hpError.textContent = "Nomor HP harus 10-15 digit angka";
    } else {
      // Jika valid, hapus error
      hp.classList.remove("is-invalid");
      hpError.textContent = "";
    }
  });

  // Hitung IPK otomatis saat semester dipilih
  semester.addEventListener("change", function () {
  let sem = parseInt(this.value); // Ambil nilai semester

  if (!isNaN(sem)) {
    let nilaiIpk = parseFloat((2.5 + (sem * 0.1)).toFixed(2));
    ipk.value = nilaiIpk;

    if (nilaiIpk >= 3.0) {
      beasiswa.disabled = false;
      berkas.disabled = false;
      btnDaftar.disabled = false;
    } else {
      beasiswa.disabled = true;
      berkas.disabled = true;
      btnDaftar.disabled = true;
      alert("Maaf, IPK minimal untuk mendaftar beasiswa adalah 3.00");
    }
  } else {
    ipk.value = "";
    beasiswa.disabled = true;
    berkas.disabled = true;
    btnDaftar.disabled = true;
  }
});
});
