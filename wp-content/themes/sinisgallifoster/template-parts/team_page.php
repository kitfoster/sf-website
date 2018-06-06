<?php
  class Person {
    public $name;
    public $role;
    public $imageName;
    public $accreditations = "Accredited Commmercial</br>Litigation Specialist";
    public $bio = "Lorem Ipsor Dolem imet dolor sit amet, no viderer aliquam vel, fastidii mentitum deseruisse ut mel. Vis nibh veri mazim no. Quo ne aliquam fabellas consetetur.Lorem Ipsor Dolem imet dolor sit amet, no viderer aliquam vel, fastidii mentitum deseruisse ut mel. Vis nibh veri mazim no. Quo ne aliquam fabellas consetetur.Lorem Ipsor Dolem imet dolor sit amet, no viderer aliquam vel, fastidii mentitum deseruisse ut mel.</br></br> Vis nibh veri mazim no. Quo ne aliquam fabellas consetetur.Lorem Ipsor Dolem imet dolor sit amet, no viderer aliquam vel, fastidii mentitum deseruisse ut mel. Vis nibh veri mazim no. Quo ne aliquam fabellas consetetur.Lorem Ipsor Dolem imet dolor sit amet, no viderer aliquam vel, fastidii mentitum deseruisse ut mel. Vis nibh veri mazim no. Quo ne aliquam fabellas consetetur.";
    public $mobile = "0444 444 444";
    public $email = "first@sinisgallifoster.com.au";
    public $linkedIn = "https://www.linkedin.com";

    public function __construct($name, $role, $imageName) {
      $this->name = $name;
      $this->role = $role;
      $this->imageName = $imageName;
    }

    public function photo() {
      return get_template_directory_uri() . $this->imageName;
    }
  }
  $person1 = new Person("first last", "role title", "/assets/images/test-portrait.jpg");
  $person2 = new Person("first last other", "role title other", "/assets/images/test-portrait-2.jpg");
?>


<div class="team-page-container desktop-container" id="our_team">
  <h3>Our Team</h3>

  <!-- desktop -->
  <div class="desktop-view">
    <?php foreach([$person1, $person2, $person1, $person2, $person1, $person2, $person1, $person2, $person1] as $key=>$value): ?>
      <div class="bio-container" onclick="toggleBio(<?php echo $key; ?>)">
        <img src=<?php echo $value->photo(); ?> alt="Example Lawyer Photo"></img>
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
      </div>
      <div class="bio-expanded" id=<?php echo "bio-expanded" . $key; ?>>
        <div class="bio-inner">
          <button class="close-bio" onclick="toggleBio(<?php echo $key; ?>)"></button>
          <span class="name"><?php echo $value->name; ?></span>
          <span class="role"><?php echo $value->role; ?></span>
          <span class="accreditations"><?php echo $value->accreditations; ?></span>
          <span class="bio"><?php echo $value->bio; ?></span>
          <span class="mobile">M / <?php echo $value->mobile; ?></span>
          <span class="email">E / <?php echo $value->email; ?></span>
          <a class="linkedIn" href=<?php echo $value->linkedIn; ?>><img src=<?php echo get_template_directory_uri() . "/assets/images/linkedin.svg"?> alt="LinkedIn Logo" />visit <?php echo $value->name; ?>'s LinkedIn</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- mobile -->
  <div class="mobile-carousel">
    <?php foreach([$person1, $person2, $person1, $person2, $person1, $person2, $person1, $person2, $person1] as $key=>$value): ?>
      <div class="carousel-slides">
        <img src=<?php echo $value->photo(); ?> alt="Example Lawyer Photo"></img>
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
      </div>
    <?php endforeach; ?>
    <button class="carousel-button left" onclick="plusDivs(-1)"></button>
    <button class="carousel-button right" onclick="plusDivs(1)"></button>
  </div>
</div>

<script>
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

function toggleBio(index) {
  var x = document.getElementsByClassName('bio-expanded')[index];
  if (x.style.display == "none" || x.style.display == "") {
    x.style.display = "flex";
  }
  else {
    closeAllBios();
  }

  var x = document.getElementById(`bio-expanded${index}`);
  if (x.className == "bio-expanded") {
    x.className += " open";
  }
  else {
    x.className = "bio-expanded";
  }
}

// transition
// &.closed {
//         max-height: 0;
//         padding: 0;
//         margin: 0;
//       }

function closeAllBios() {
  var x = document.getElementsByClassName('bio-expanded');
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
}

// close the bio when user presses escape
document.onkeydown = function(evt) {
    evt = evt || window.event;
    var isEscape = false;
    if ("key" in evt) {
        isEscape = (evt.key == "Escape" || evt.key == "Esc");
    } else {
        isEscape = (evt.keyCode == 27);
    }
    if (isEscape) {
        closeAllBios();
    }
};
</script>