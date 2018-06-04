<div class="navigation-top">
  <h1 class="screen-reader-text">Sinisgalli Foster</h1>
  <div class="nav-logo-wrapper" >
    <img class="sf-nav-logo" src="wp-content/themes/sinisgallifoster/assets/images/sf_logo.png" alt="Sinisgalli Foster Logo">
      <a href="#"></a>
    </img>
  </div>
  <ul class="navbar-items" id="nav">
    <li class="active"><a href="#">About</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Our Team</a></li>
    <li><a href="#">Contact</a></li>
  </ul>

  <!-- mobile -->
  <button class="nav-hamburger" id="nav-symbol" onclick="navToggle()">
  </button>
</div>

<script>
function navToggle() {
    var x = document.getElementById("nav");
    if (x.className === "navbar-items") {
        x.className += " expand";
    } else {
        x.className = "navbar-items";
    }

    var x = document.getElementById("nav-symbol");
    if (x.className === "nav-hamburger") {
        x.className += " nav-close";
    } else {
        x.className = "nav-hamburger";
    }
}
</script>