<?php
  class Person {
    public $name;
    public $role;
    public $photo;
    public $accreditations;
    public $bio;
    public $contact_number;
    public $email;
    public $linked_in;

    public function __construct($name, $role, $photo, $accreditations, $bio, $contact_number, $email, $linked_in) {
      $this->name = $name;
      $this->role = $role;
      $this->photo = $photo;
      $this->accreditations = $accreditations;
      $this->bio = $bio;
      $this->contact_number = $contact_number;
      $this->email = $email;
      $this->linked_in = $linked_in;
    }
  }

  $team = array();
  while ( have_posts() ) :
    the_post();

    $isEmployeePost = false;
    foreach((get_the_category()) as $category){
      if($category->name == "Employee") {
        $isEmployeePost = true;
      }
    }

    if ($isEmployeePost) {
      $name = get_field("name");
      $role = get_field("role");
      $photo = get_field("photo");
      $accreditations = get_field("accreditations");
      $bio = get_field("bio");
      $contact_number = get_field("contact_number");
      $email = get_field("email");
      $linked_in = get_field("linked_in");

      $employee = new Person($name, $role, $photo, $accreditations, $bio, $contact_number, $email, $linked_in);
      array_push($team, $employee);
    }

  endwhile;
?>

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
    <?php foreach($team as $key=>$value): ?>
    <div class="carousel-slides" id=<?php echo "carousel-slides" . $key; ?> onclick="toggleBio('<?php echo "bio-expanded" . $key; ?>')">
      <img src=<?php echo $value->photo; ?> alt="Example Lawyer Photo"></img>
      <span class="name"><?php echo $value->name; ?></span>
      <span class="role"><?php echo $value->role; ?></span>
    </div>
    <?php endforeach; ?>
    <button class="carousel-button left" onclick="plusDivs(-1)"></button>
    <button class="carousel-button right" onclick="plusDivs(1)"></button>
  </div>

  <!-- bios -->
  <?php foreach($team as $key=>$value): ?>
    <div class="bio-expanded" id=<?php echo "bio-expanded" . $key; ?>>
      <div class="bio-inner">
        <button class="close-bio" onclick="toggleBio('<?php echo "bio-expanded" . $key; ?>')"></button>
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
        <span class="accreditations"><?php echo $value->accreditations; ?></span>
        <span class="bio"><?php echo $value->bio; ?></span>
        <span class="contact_number">P / <?php echo $value->contact_number; ?></span>
        <span class="email">E / <?php echo $value->email; ?></span>
        <a class="linkedIn" href=<?php echo $value->linkedIn; ?>><img src="wp-content/themes/sinisgallifoster/assets/images/linkedin.svg" alt="LinkedIn Logo" />Visit <?php echo $value->name; ?>'s LinkedIn</a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
sr.reveal('.bio-container', { scale: 1, distance: '20px' });

// carousel
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("carousel-slides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
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