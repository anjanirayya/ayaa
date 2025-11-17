// Toggle mobile menu
const menuButtons = document.querySelectorAll('.menu-toggle');
menuButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const nav = document.querySelector('.main-nav');
    nav.classList.toggle('menu-open');
  });
});

// Gallery modal
const modal = document.getElementById('modal');
const modalImg = document.getElementById('modalImg');
const modalCaption = document.getElementById('modalCaption');
const modalClose = document.getElementById('modalClose');

document.querySelectorAll('.gallery-item').forEach(img => {
  img.addEventListener('click', (e) => {
    modal.style.display = 'flex';
    modalImg.src = e.target.src;
    modalCaption.textContent = e.target.alt || '';
  });
});

modalClose && modalClose.addEventListener('click', () => { modal.style.display = 'none'; });
modal && modal.addEventListener('click', (e) => { if (e.target === modal) modal.style.display = 'none'; });

// Contact form fake submit (won't actually send email) — show confirmation
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Terima kasih! Pesan kamu sudah terkirim (simulasi).');
    contactForm.reset();
  });
}