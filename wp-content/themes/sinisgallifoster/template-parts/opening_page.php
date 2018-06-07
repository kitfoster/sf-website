<div class="opening-page-container" id="opening-page">
  <div class="logo"></div>
</div>

<script>
window.onload = function(e) {
  var page = document.getElementById("opening-page");
  setTimeout(() => {
    page.className += " fade-out"
  }, 1000);
}

</script>