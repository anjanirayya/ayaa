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

// =================== LIGHTBOX GALERI ===================
const galleryItems = document.querySelectorAll(".gallery-item img");
const lightbox = document.getElementById("lightbox");
const lightboxImg = document.getElementById("lightbox-img");

galleryItems.forEach(img => {
    img.addEventListener("click", () => {
        lightbox.style.display = "flex";
        lightboxImg.src = img.src;
    });
});

lightbox.addEventListener("click", () => {
    lightbox.style.display = "none";
});