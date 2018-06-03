<?php
  class Person {
    public $name = "first last";
    public $role = "role title";
    public function photo() {
      return get_template_directory_uri() . '/assets/images/test-portrait.jpg';
    }
  }
  $person = new Person();
  $first = true;
?>


<div class="team-page-container desktop-container">
  <!-- desktop -->
  <div class="desktop-view">
    <h3>Our Team</h3>
    <?php foreach([$person, $person, $person, $person, $person, $person, $person, $person, $person] as $key=>$value): ?>
      <div class="bio-container">
        <img src=<?php echo $value->photo(); ?> alt="Example Lawyer Photo"></img>
        <div class="name"><?php echo $value->name; ?></div>
        <div class="role"><?php echo $value->role; ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- mobile -->
  <div class="mobile-carousel">
    <h3>Our Team</h3>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <?php foreach([$person, $person, $person, $person, $person, $person, $person, $person, $person] as $key=>$value): ?>
          <div class="bio-container item <?php if ($first) {echo "active"; $first = false;} ?>">
            <img src=<?php echo $value->photo(); ?> alt="Example Lawyer Photo"></img>
            <div class="name"><?php echo $value->name; ?></div>
            <div class="role"><?php echo $value->role; ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>