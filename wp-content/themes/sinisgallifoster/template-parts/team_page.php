<script src="wp-content/themes/sinisgallifoster/functions/team_page.js"></script>
<div class="team-page-container desktop-container" id="our_team">
  <h3>Our Team</h3>

  <!-- desktop -->
  <div class="desktop-view">
    <?php foreach($team as $key=>$value): ?>
      <div class="bio-container" id="<?php echo "bio-container" . $key; ?>" onclick="toggleBio('<?php echo 'bio-expanded' . $key; ?>')" onmouseleave="removeImageEffects()">
        <img class="bio-image" id="<?php echo "bio-image" . $key; ?>" onmouseover="imageEffect('<?php echo 'bio-image' . $key; ?>')" src="<?php echo $value->photo; ?>" alt="<?php echo $value->name; ?>" />
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- mobile -->
  <div class="mobile-carousel">
    <div class="carousel-slider" id="carousel-slider" onscroll="carouselFunction(<?php echo count($team) ?>)">
      <?php foreach($team as $key=>$value): ?>
        <div class="carousel-slides" id=<?php echo "carousel-slides" . $key; ?> onclick="toggleBio('<?php echo 'bio-expanded' . $key; ?>')">
          <img src=<?php echo $value->photo; ?> alt="Example Lawyer Photo" />
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
        <button class="close-bio" onclick="toggleBio('<?php echo 'bio-expanded' . $key; ?>')"></button>
        <span class="name"><?php echo $value->name; ?></span>
        <span class="role"><?php echo $value->role; ?></span>
        <span class="accreditations"><?php echo $value->accreditations; ?></span>
        <?php if ($value->bio): ?>
          <span class="bio"><?php echo $value->bio; ?></span>
        <?php endif; ?>
        <?php if ($value->contact_number): ?>
          <span class="contact_number">P / <a href="tel:<?php echo str_replace(' ', '', $value->contact_number) ?>"><?php echo $value->contact_number; ?></a></span>
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
const dot = document.getElementById("carousel-dot0");
dot.className += " active";

  sr.reveal('.bio-container', {distance: '50px'});
</script>