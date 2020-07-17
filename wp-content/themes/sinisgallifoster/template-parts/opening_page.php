<div class="opening-page-container" id="opening-page">
  <img src="/wp-content/themes/sinisgallifoster/assets/images/sf-logo.gif" alt="Sinisgalli Foster Logo"/>
</div>

<script>

var page = document.getElementById("opening-page");
const urlHasHashRoute = window.location.hash;

if (urlHasHashRoute) {
  page.style.display = "none";
} else {
  setTimeout(function() {
  page.className += " fade-out"
  }, 2000);
  setTimeout(function() {
    page.style.display = "none";
  }, 3000);
}

</script>
