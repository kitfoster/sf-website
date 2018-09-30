<div class="homepage-background" id="about">
  <img clas="image" src=<?php echo $homepageImage ?> id="background-image" />
  <div class="homepage-container">
    <h2>
      <?php echo $homepageParagraph ?>
    </h2>
    <a class="arrow-down" onclick="scrollToElement('statement')"></a>
  </div>
</div>

<script type="text/javascript" src="/wp-content/themes/sinisgallifoster/modernizr.js"></script>
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