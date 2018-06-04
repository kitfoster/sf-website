<?php
  class Person {
    public $name;
    public $role;
    public $imageName;

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


<div class="team-page-container desktop-container">
  <h3>Our Team</h3>

  <!-- desktop -->
  <div class="desktop-view">
    <?php foreach([$person1, $person2, $person1, $person2, $person1, $person2, $person1, $person2, $person1] as $key=>$value): ?>
      <div class="bio-container">
        <img src=<?php echo $value->photo(); ?> alt="Example Lawyer Photo"></img>
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
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
</script>