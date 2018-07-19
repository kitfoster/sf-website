<?php
  $homepageParagraph = get_field("homepage_text");
  $homepageImage = get_field("homepage_image");
?>

<div class="homepage-background" id="about">
  <img src=<?php echo $homepageImage?>></img>
  <div class="homepage-container desktop-container">
    <h2>
      <?php echo $homepageParagraph ?>
    </h2>
    <a class="arrow-down" onclick="scrollToElement('statement')"></a>
  </div>
</div>