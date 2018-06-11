<div class="opening-page-container" id="opening-page">
  <img src="wp-content/themes/sinisgallifoster/assets/images/sf-logo.gif" alt="Sinisgalli Foster Logo"/>
</div>

<script>
window.onload = function(e) {
  var page = document.getElementById("opening-page");
  page.className += " fade-out"
  setTimeout(() => {
    page.style.display = "none";
  }, 1000);
}

</script>