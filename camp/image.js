let slideIndex = 0;
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');

  function showSlides() {
    slides.forEach(slide => {
      slide.style.display = 'none';
    });
    dots.forEach(dot => {
      dot.classList.remove('active');
    });
    slideIndex = (slideIndex + 1) % slides.length;
    slides[slideIndex].style.display = 'block';
    dots[slideIndex].classList.add('active');
  }

  function currentSlide(index) {
    slideIndex = index;
    showSlides();
  }

  setInterval(showSlides, 3000); // Change slide every 3 seconds
