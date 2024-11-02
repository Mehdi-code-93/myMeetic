const carousel = document.querySelector('.carousel');
const container = carousel.querySelector('.carousel-container');
let prevBtn = document.getElementById('pre');
let nextBtn = document.getElementById('next');
const itemWidth =570; // largeur d'un élément du carrousel
let position = 0; // position actuelle du carrousel

// écouteur de clic sur le bouton Précédent
prevBtn.addEventListener('click', () => {
  position -= itemWidth;
  if (position > 0) {
    position = -container.offsetWidth + itemWidth;
  }
  container.style.transform = `translateX(${position}px)`;
});

// écouteur de clic sur le bouton Suivant
nextBtn.addEventListener('click', () => {
  position += itemWidth;
  if (position < -container.offsetWidth - itemWidth) {
    position = 0;
  }
  container.style.transform = `translateX(${position}px)`;
});