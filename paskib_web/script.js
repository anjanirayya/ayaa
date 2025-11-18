// SCRIPT ANIMASI UNTUK WEBSITE PASKIBRA SMKN 2 BALEENDAH

// Fungsi animasi saat elemen muncul di layar
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show");
    }
  });
});

// Seleksi semua elemen dengan data-animate
document.querySelectorAll("[data-animate]").forEach((el) => observer.observe(el));