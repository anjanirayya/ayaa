
// ====== script.js ======

// helper: offset for sticky header
function getHeaderOffset() {
  const header = document.querySelector('.site-header');
  return header ? header.offsetHeight + 8 : 0;
}

// MOBILE MENU TOGGLE
const btnMenu = document.getElementById('btnMenu');
const mainNav = document.getElementById('mainNav');
btnMenu && btnMenu.addEventListener('click', () => {
  mainNav.classList.toggle('open');
});

// SMOOTH SCROLL WITH OFFSET (for sticky header)
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const id = this.getAttribute('href');
    const target = document.querySelector(id);
    if (!target) return;
    const y = target.getBoundingClientRect().top + window.pageYOffset - getHeaderOffset();
    window.scrollTo({ top: y, behavior: 'smooth' });
    // close mobile menu
    if (mainNav.classList.contains('open')) mainNav.classList.remove('open');
  });
});

// ACTIVE NAV ITEM ON SCROLL
const navLinks = document.querySelectorAll('.nav-link');
const sections = Array.from(document.querySelectorAll('section, footer'));

function onScrollActive() {
  const scrollPos = window.pageYOffset + getHeaderOffset() + 10;
  let foundId = '';
  for (let s of sections) {
    if (s.offsetTop <= scrollPos && (s.offsetTop + s.offsetHeight) > scrollPos) {
      foundId = s.id;
    }
  }
  navLinks.forEach(a => {
    a.classList.toggle('active', a.getAttribute('href') === `#${foundId}`);
  });
}
window.addEventListener('scroll', onScrollActive);
window.addEventListener('load', onScrollActive);

// INTERSECTION OBSERVER FOR REVEAL ANIMATIONS
const io = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
      // optional: unobserve after shown
      io.unobserve(entry.target);
    }
  });
}, { threshold: 0.15 });

document.querySelectorAll('[data-animate]').forEach(el => io.observe(el));

// GALLERY MODAL
const modal = document.getElementById('modal');
const modalImg = document.getElementById('modalImg');
const modalCaption = document.getElementById('modalCaption');
const modalClose = document.getElementById('modalClose');

document.querySelectorAll('.gallery-item img').forEach(img => {
  img.addEventListener('click', (e) => {
    const src = e.target.getAttribute('data-src') || e.target.src;
    modalImg.src = src;
    modalCaption.textContent = e.target.alt || '';
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  });
});
modalClose && modalClose.addEventListener('click', () => {
  modal.style.display = 'none';
  document.body.style.overflow = '';
});
modal && modal.addEventListener('click', e => { if (e.target === modal) { modal.style.display = 'none'; document.body.style.overflow = ''; } });

// CONTACT FORM (simulasi)
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    alert('Terima kasih! Pesan kamu sudah terkirim (simulasi).');
    contactForm.reset();
  });
}

// LAZY LOAD IMAGES (simple)
document.addEventListener('DOMContentLoaded', () => {
  const imgs = document.querySelectorAll('img[data-src]');
  imgs.forEach(img => {
    const real = img.getAttribute('data-src');
    if (real) img.src = real;
  });
});