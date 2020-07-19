// carousel
function carouselFunction(numberOfSlides) {
  for (i = 0; i < numberOfSlides; i++) {
    let slide = document.getElementById("carousel-slides" + i);
    let rect = slide.getBoundingClientRect();
    let dot = document.getElementById("carousel-dot" + i);

    dot.className = "carousel-dot";

    if (
      rect.x + (window.innerWidth * (i + 1) - window.innerWidth / 2) >=
        window.innerWidth * i &&
      rect.x <= window.innerWidth / 2
    ) {
      dot.className += " active";
    }
  }
}

function scrollToSlide(id) {
  let slider = document.getElementById("carousel-slider");
  slider.scrollLeft = window.innerWidth * id;
}

// bios
function toggleBio(id) {
  let x = document.getElementById(id);
  if (x.className == "bio-expanded") {
    x.style.opacity = "1";
    x.className += " open";
  } else {
    x.style.opacity = "0";
    window.setTimeout(function() {
      x.className = "bio-expanded";
    }, 500);
  }
}
