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
    var nav = document.getElementById("nav");
    var symbol = document.getElementById("nav-symbol");
    if (nav.className == "navbar-items") {
        nav.className += " expand";
        symbol.className += " nav-close";
    } else {
        closeNav();
    }
}

function closeNav() {
    var x1 = document.getElementById("nav");
    var x2 = document.getElementById("nav-symbol");
    x1.className += " fade";
    x2.className = "nav-hamburger";
    setTimeout(() => {
        x1.className = "navbar-items";
    }, 500);
}

function scrollToElement(id) {
    console.log(id);
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