<div class="team-page-container desktop-container" id="our_team">
  <h3>Our Team</h3>

  <!-- desktop -->
  <div class="desktop-view">
    <?php foreach($team as $key=>$value): ?>
      <div class="bio-container" id=<?php echo "bio-container" . $key; ?> onclick="toggleBio('<?php echo "bio-expanded" . $key; ?>')" onmouseleave="removeImageEffects()">
        <img class="bio-image" id="<?php echo "bio-image" . $key; ?>" onmouseover="imageEffect('<?php echo "bio-image" . $key; ?>')" src=<?php echo $value->photo; ?> alt="Example Lawyer Photo"></img>
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- mobile -->
  <div class="mobile-carousel">
    <div class="carousel-slider" id="carousel-slider" onscroll="carouselFunction(<?php echo count($team) ?>)">
      <?php foreach($team as $key=>$value): ?>
        <div class="carousel-slides" id=<?php echo "carousel-slides" . $key; ?> onclick="toggleBio('<?php echo "bio-expanded" . $key; ?>')">
          <img src=<?php echo $value->photo; ?> alt="Example Lawyer Photo"></img>
          <span class="name"><?php echo $value->name; ?></span>
          <span class="role"><?php echo $value->role; ?></span>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="carousel-dots">
      <?php foreach($team as $key=>$value): ?>
        <div class="carousel-dot" id=<?php echo "carousel-dot" . $key; ?> onclick="scrollToSlide(<?php echo $key ?>)"></div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- bios -->
  <?php foreach($team as $key=>$value): ?>
    <div class="bio-expanded" id=<?php echo "bio-expanded" . $key; ?>>
      <div class="bio-inner">
        <button class="close-bio" onclick="toggleBio('<?php echo "bio-expanded" . $key; ?>')"></button>
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
        <span class="accreditations"><?php echo $value->accreditations; ?></span>
        <?php if ($value->bio): ?>
          <span class="bio"><?php echo $value->bio; ?></span>
        <?php endif; ?>
        <?php if ($value->contact_number): ?>
          <span class="contact_number">P / <a href="tel:<?php echo $value->contact_number ?>"><?php echo $value->contact_number; ?></a></span>
        <?php endif; ?>
        <?php if ($value->email): ?>
          <span class="email">E / <a href="mailto:<?php echo $value->email; ?>"><?php echo $value->email; ?></a></span>
        <?php endif; ?>
        <?php if ($value->linked_in): ?>
          <a class="linkedIn" href=<?php echo $value->linked_in; ?> target="_blank"><img src="wp-content/themes/sinisgallifoster/assets/images/linkedin.svg" alt="LinkedIn Logo" />Visit <?php echo $value->name; ?>'s LinkedIn</a>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
sr.reveal('.bio-container', { scale: 1, distance: '20px' });

// carousel
const dot = document.getElementById(`carousel-dot0`);
dot.className += " active";

function carouselFunction(numberOfSlides) {
  for (i = 0; i < numberOfSlides; i++) {
    const slide = document.getElementById(`carousel-slides${i}`);
    var rect = slide.getBoundingClientRect();
    const dot = document.getElementById(`carousel-dot${i}`);

    dot.className = "carousel-dot";

    if (rect.x + (window.innerWidth*(i+1) - window.innerWidth/2) >= window.innerWidth*i && rect.x <= window.innerWidth/2) {
      dot.className += " active";
    }
  }
}

function scrollToSlide(id) {
  const slider = document.getElementById("carousel-slider");
  slider.scrollLeft = window.innerWidth*(id);
}

// bios
function toggleBio(id) {
  var x = document.getElementById(id);
  if (x.className == "bio-expanded") {
    x.style.opacity = "1";
    x.className += " open";
    outsideClick(id);
  }
  else {
    x.style.opacity = "0";
    setTimeout(function() {
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
  }

  else { // desktop
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
        if (targetElement.id == `carousel-slides${index}` || targetElement.id == `bio-container${index}`) {
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
  }

  const removeListener = () => {
    document.removeEventListener("click", outsideClickListener);
  }
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
  var greyImages = Array.from(document.getElementsByClassName("bio-image greyscale"));
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
  var greyImages = Array.from(document.getElementsByClassName("bio-image greyscale"));
  var allImages = colourImages.concat(greyImages);
  for (i = 0; i < allImages.length; i += 1) {
    allImages[i].className = "bio-image";
  }
}

</script>