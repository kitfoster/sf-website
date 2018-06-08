<div class="opening-page-container" id="opening-page">
  <div class="logo"></div>
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