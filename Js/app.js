// HAMBURGER ANIMATION TOGGLE

const navSlide = () => {
  const burger = document.querySelector(".burger");
  const homeLinks1 = document.querySelector(".home-link-about");
  const homeLinks2 = document.querySelector(".home-link-contact");
  const nav = document.querySelector(".nav-links");
  const navLinks = document.querySelectorAll(".nav-links li");

  //Toggle Nav
  burger.addEventListener("click", () => {
    nav.classList.toggle("nav-active");
    // Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        // if this exists
        link.style.animation = ""; // reset animation
      } else {
        link.style.animation = "navLinkFade 0.5s ease forwards .6s"; // else play animation on click
      }
    });
    // Burger Animation
    burger.classList.toggle("hamburger-toggle");
  });

  homeLinks1.addEventListener("click", () => {
    nav.classList.toggle("nav-active");
    // Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        // if this exists
        link.style.animation = ""; // reset animation
      } else {
        link.style.animation = "navLinkFade 0.5s ease forwards .6s"; // else play animation on click
      }
    });
    // Burger Animation
    burger.classList.toggle("hamburger-toggle");
  });

  homeLinks2.addEventListener("click", () => {
    nav.classList.toggle("nav-active");
    // Animate Links
    navLinks.forEach((link, index) => {
      if (link.style.animation) {
        // if this exists
        link.style.animation = ""; // reset animation
      } else {
        link.style.animation = "navLinkFade 0.5s ease forwards .6s"; // else play animation on click
      }
    });
    // Burger Animation
    burger.classList.toggle("hamburger-toggle");
  });
};

const app = () => {
  navSlide();
};

app();

// SLIDER

function onload() {
  const slideImage2 = document.querySelector(".slider2");
  const slideImage3 = document.querySelector(".slider3");
  const sliderContent2 = document.querySelector(".slider-info2");
  const sliderContent3 = document.querySelector(".slider-info3");

  slideImage2.style.display = "none";
  slideImage3.style.display = "none";
  sliderContent2.style.display = "none";
  sliderContent3.style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function slideFunction(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("cover");
  var slideContent = document.getElementsByClassName("intro-text");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    slideContent[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  slideContent[slideIndex - 1].style.display = "flex";
  dots[slideIndex - 1].className += " active";
}
