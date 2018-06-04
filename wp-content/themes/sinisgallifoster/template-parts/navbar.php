<div class="navigation-top">
  <h1 class="screen-reader-text">Sinisgalli Foster</h1>
  <div class="nav-logo-wrapper" >
    <img class="sf-nav-logo" src="wp-content/themes/sinisgallifoster/assets/images/sf_logo.png" alt="Sinisgalli Foster Logo">
      <a href="#"></a>
    </img>
  </div>
  <ul class="navbar-items" id="nav">
    <li class="active"><a onclick="scrollToElement('about')">About</a></li>
    <li><a onclick="scrollToElement('services')">Services</a></li>
    <li><a onclick="scrollToElement('our_team')">Our Team</a></li>
    <li><a onclick="scrollToElement('contact')">Contact</a></li>
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

function closeNav() {
    var x1 = document.getElementById("nav");
    var x2 = document.getElementById("nav-symbol");
    if (x1.className === "navbar-items expand") {
        x1.className = "navbar-items";
        x2.className = "nav-hamburger";
    }
}

function scrollToElement(id) {
    var e = document.getElementById(id);
    console.log(e);
    e.scrollIntoView({
        behavior: 'smooth',
        block: "start",
        inline: "nearest"
    });
    closeNav();
}
</script>