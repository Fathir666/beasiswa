document.addEventListener("DOMContentLoaded", function () {
  const email = document.getElementById("email");
  const hp = document.getElementById("hp");
  const semester = document.getElementById("semester");
  const ipk = document.getElementById("ipk");
  const beasiswa = document.getElementById("beasiswa");
  const berkas = document.getElementById("berkas");
  const btnDaftar = document.getElementById("btnDaftar");

  // Validasi email format
  email.addEventListener("input", function () {
    const emailError = document.getElementById("emailError");
    const regex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!regex.test(email.value)) {
      email.classList.add("is-invalid");
      emailError.textContent = "Format email tidak valid";
    } else {
      email.classList.remove("is-invalid");
      emailError.textContent = "";
    }
  });

  // Validasi nomor HP
  hp.addEventListener("input", function () {
    const hpError = document.getElementById("hpError");
    const regex = /^[0-9]{10,15}$/;
    if (!regex.test(hp.value)) {
      hp.classList.add("is-invalid");
      hpError.textContent = "Nomor HP harus 10-15 digit angka";
    } else {
      hp.classList.remove("is-invalid");
      hpError.textContent = "";
    }
  });

  // Hitung IPK otomatis saat semester dipilih
  semester.addEventListener("change", function () {
    let sem = parseInt(this.value);
    if (!isNaN(sem)) {
      ipk.value = (2.5 + (sem * 0.1)).toFixed(2);
      beasiswa.disabled = false;
      berkas.disabled = false;
      btnDaftar.disabled = false;
    } else {
      ipk.value = "";
      beasiswa.disabled = true;
      berkas.disabled = true;
      btnDaftar.disabled = true;
    }
  });
});
