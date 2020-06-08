// carousel
function carouselFunction(numberOfSlides) {
  for (i = 0; i < numberOfSlides; i++) {
    const slide = document.getElementById("carousel-slides" + i);
    let rect = slide.getBoundingClientRect();
    const dot = document.getElementById("carousel-dot" + i);

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
  const slider = document.getElementById("carousel-slider");
  slider.scrollLeft = window.innerWidth * id;
}

// bios
function toggleBio(id) {
  let x = document.getElementById(id);
  if (x.className == "bio-expanded") {
    x.style.opacity = "1";
    x.className += " open";
    outsideClick(id);
  } else {
    x.style.opacity = "0";
    window.setTimeout(function() {
      x.className = "bio-expanded";
    }, 500);
  }
}

// close if the user clicks outside the bio
function outsideClick(id) {
  let outsideClickListener;

  // if on mobile, close if the user clicks the background
  if (screen.width <= 700) {
    outsideClickListener = evt => {
      const bio = document.getElementsByClassName("bio-inner")[0];
      let targetElement = evt.target; // clicked element

      if (targetElement == bio) {
        // clicked the background
        toggleBio(id);
        removeListener();
      }
    };
  } else {
    // desktop
    // can only click on image once
    let clicked = false;

    outsideClickListener = evt => {
      const bio = document.getElementById(id);
      const index = id.match(/\d/gm)[0];
      let targetElement = evt.target; // clicked element

      do {
        if (targetElement.className == "bio-inner") {
          return;
        }
        if (
          targetElement.id == "carousel-slides" + index ||
          targetElement.id == "bio-container" + index
        ) {
          if (!clicked) {
            clicked = true;
          } else {
            toggleBio(id);
            removeListener();
          }
          return;
        }
        if (targetElement.className == "close-bio") {
          removeListener();
          return;
        }
        // Go up the DOM
        targetElement = targetElement.parentNode;
      } while (targetElement);

      // This is a click outside.
      toggleBio(id);
      removeListener();
    };

    document.onkeydown = function(evt) {
      evt = evt || window.event;
      let isEscape = false;
      if ("key" in evt) {
        isEscape = evt.key == "Escape" || evt.key == "Esc";
      } else {
        isEscape = evt.keyCode == 27;
      }
      if (isEscape) {
        toggleBio(id);
        removeListener();
      }
    };
  }

  const removeListener = function() {
    document.removeEventListener("click", outsideClickListener);
  };
  document.addEventListener("click", outsideClickListener);
}

// greyscale effect
function imageEffect(id) {
  // if a bio is open, keep that image coloured
  const index = id.match(/\d/gm)[0];
  let openBio = document.getElementsByClassName("bio-expanded open");
  if (openBio.length > 0) {
    return;
  }

  let hoveredImage = document.getElementById(id);
  hoveredImage.className = "bio-image";

  let colourImages = Array.from(document.getElementsByClassName("bio-image"));
  let greyImages = Array.from(
    document.getElementsByClassName("bio-image greyscale")
  );
  let allImages = colourImages.concat(greyImages);
  for (i = 0; i < allImages.length; i += 1) {
    currentImage = allImages[i];
    if (currentImage != hoveredImage) {
      currentImage.className = "bio-image greyscale";
    }
  }
}

function removeImageEffects() {
  let colourImages = Array.from(document.getElementsByClassName("bio-image"));
  let greyImages = Array.from(
    document.getElementsByClassName("bio-image greyscale")
  );
  let allImages = colourImages.concat(greyImages);
  for (i = 0; i < allImages.length; i += 1) {
    allImages[i].className = "bio-image";
  }
}
