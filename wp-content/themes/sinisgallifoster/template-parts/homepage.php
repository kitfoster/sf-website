<div class="homepage-background" id="about">
  <div class="image-wrapper">
    <img class="image" src=<?php echo $homepageImage ?> id="background-image" alt="John Sinisgalli and Alan Foster"/>
  </div>
  <div class="homepage-image-overlay"></div>
  <div class="homepage-container">
    <h2>
      <?php echo $homepageParagraph ?>
    </h2>
    <a class="arrow-down" onclick="scrollToElement('statement')"></a>
  </div>
</div>

<script src="/wp-content/themes/sinisgallifoster/modernizr.js"></script>
<script>
// background image on IE
if ( Modernizr.objectfit != true ) {
  let background = document.getElementById("about");
  const backgroundImage = document.getElementById("background-image");
  const imageUrl = backgroundImage.src;

  if (imageUrl) {
    background.className += " compat-object-fit";
    background.style.backgroundImage = "url(" + imageUrl + ")";
  }
}
</script>