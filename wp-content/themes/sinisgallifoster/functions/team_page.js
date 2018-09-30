sr.reveal(".bio-container", { scale: 1, distance: "20px" });

// carousel
function carouselFunction(numberOfSlides) {
  for (i = 0; i < numberOfSlides; i++) {
    const slide = document.getElementById("carousel-slides" + i);
    var rect = slide.getBoundingClientRect();
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
  var x = document.getElementById(id);
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
  var outsideClickListener;

  // if on mobile, close if the user clicks the background
  if (screen.width <= 700) {
    outsideClickListener = evt => {
      const bio = document.getElementsByClassName("bio-inner")[0];
      const index = id.match(/\d/gm)[0];
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
    var clicked = false;

    outsideClickListener = evt => {
      const bio = document.getElementById(id);
      const index = id.match(/\d/gm)[0];
      let targetElement = evt.target; // clicked element

      do {
        if (targetElement == bio) {
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
      var isEscape = false;
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
  var openBio = document.getElementsByClassName("bio-expanded open");
  if (openBio.length > 0) {
    return;
  }

  var hoveredImage = document.getElementById(id);
  hoveredImage.className = "bio-image";

  var colourImages = Array.from(document.getElementsByClassName("bio-image"));
  var greyImages = Array.from(
    document.getElementsByClassName("bio-image greyscale")
  );
  var allImages = colourImages.concat(greyImages);
  for (i = 0; i < allImages.length; i += 1) {
    currentImage = allImages[i];
    if (currentImage != hoveredImage) {
      currentImage.className = "bio-image greyscale";
    }
  }
}

function removeImageEffects() {
  var colourImages = Array.from(document.getElementsByClassName("bio-image"));
  var greyImages = Array.from(
    document.getElementsByClassName("bio-image greyscale")
  );
  var allImages = colourImages.concat(greyImages);
  for (i = 0; i < allImages.length; i += 1) {
    allImages[i].className = "bio-image";
  }
}
