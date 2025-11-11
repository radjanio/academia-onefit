function menuShow() {
  const menuMobile = document.querySelector('.menu-mobile');
  const icon = document.querySelector('.icon');
  menuMobile.classList.toggle('open');
  icon.src = menuMobile.classList.contains('open') 
    ? 'img/off-menu.png' 
    : 'img/on-menu.png';
}

// ================================
// 🎞️ CARROSSEL DO HERO
// ================================
let slideIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlides() {
  slides.forEach((slide, i) => {
    slide.classList.remove('active');
  });
  slideIndex = (slideIndex + 1) % slides.length;
  slides[slideIndex].classList.add('active');
}

// Troca de imagem a cada 5 segundos
setInterval(showSlides, 5000);
