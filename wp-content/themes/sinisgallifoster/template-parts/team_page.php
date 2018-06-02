<?php
  class Person {
    public $name = "first last";
    public $role = "role title";
    public function photo() {
      return get_template_directory_uri() . '/assets/images/test-portrait.jpg';
    }
  }
  $person = new Person();
?>


<div class="team-page-container desktop-container">
  <h3>Our Team</h3>
  <?php foreach([$person, $person, $person, $person, $person, $person, $person, $person, $person] as $key=>$value): ?>
    <div class="bio-container">
      <img src=<?php echo $value->photo(); ?> alt="Example Lawyer Photo"></img>
      <div class="name"><?php echo $value->name; ?></div>
      <div class="role"><?php echo $value->role; ?></div>
    </div>
  <?php endforeach; ?>
</div>