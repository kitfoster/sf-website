<div class="homepage-background" id="about" onload="pageLoaded()">
  <div class="homepage-container desktop-container" >
    <h2>
      <?php echo $homepageParagraph ?>
    </h2>
    <div class="arrow-down"></div>
  </div>
  <div class="homepage-mobile">
    <div class="photo"></div>
    <div class="bottom">
      <h2>
        <?php echo $homepageParagraph ?>
      </h2>
      <div class="arrow-down"></div>
    </div>
  </div>
</div>

<script>
// on page load smooth fade in
document.body.className += ' fade-out';

window.onload = function(e) {
  document.body.className = '';
}
</script>