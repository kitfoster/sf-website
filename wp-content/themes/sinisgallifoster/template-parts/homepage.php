<div class="homepage-background" id="about">
  <img clas="image" src=<?php echo $homepageImage ?> id="background-image"></img>
  <div class="homepage-container desktop-container">
    <h2>
      <?php echo $homepageParagraph ?>
    </h2>
    <a class="arrow-down" onclick="scrollToElement('statement')"></a>
  </div>
</div>

<script>
if ( ! Modernizr.objectfit ) {
  let background = document.getElementById("about");
  const backgroundImage = document.getElementById("background-image");
  const imageUrl = backgroundImage.src;

  if (imageUrl) {
    background.className += " compat-object-fit";
    background.style.backgroundImage = `url("${imageUrl}")`;
  }
}
</script>