<div class="navigation-top" id="navbar">
  <h1 class="screen-reader-text">Sinisgalli Foster Melbourne Law Firm</h1>

  <div class="nav-logo-wrapper" >
    <a href="">
      <img class="sf-nav-logo" src="wp-content/themes/sinisgallifoster/assets/images/sf_logo.png" alt="Sinisgalli Foster Logo" />
    </a>
  </div>

    <button class="menu-button" id="nav-symbol" onclick="navToggle()">
    </button>

  <ul class="navbar-items" id="nav">
    <li><a onclick="scrollToElement('services')">Services</a></li>
    <li><a onclick="scrollToElement('our_team')">Our Team</a></li>
    <li><a onclick="scrollToElement('safe-custody')">Safe Custody</a></li>
    <li><a onclick="scrollToElement('contact')">Contact</a></li>
  </ul>
</div>

<script>
function navToggle() {
    var nav = document.getElementById("nav");
    var symbol = document.getElementById("nav-symbol");
    if (nav.className == "navbar-items") {
        nav.className += " expand fade";
        symbol.className += " nav-open";
        window.setTimeout(function() {
            nav.className = "navbar-items expand";
        }, 1);
    } else {
        closeNav();
    }
}

function closeNav() {
    var navbar = document.getElementById("navbar");
    var width = window.innerWidth || document.body.clientWidth
    if (navbar.className == "navigation-top" && width > 700) {
        return;
    }

    var x1 = document.getElementById("nav");
    var x2 = document.getElementById("nav-symbol");
    x1.className = "navbar-items expand fade";
    x2.className = "menu-button";
    window.setTimeout(function() {
        x1.className = "navbar-items";
    }, 300);
}

function scrollToElement(id) {
    var e = document.getElementById(id);
    e.scrollIntoView({
        behavior: 'smooth',
        block: "start",
        inline: "nearest"
    });
    closeNav();
}

window.onscroll = function changeNav() {
    var navbar = document.getElementById("navbar");

    var homepageSection = document.getElementById("homepage-image");
    var homepageSectionBottom = homepageSection.getBoundingClientRect().bottom;

    var contactSection = document.getElementById("contact-section");
    var contactSectionTop = contactSection.getBoundingClientRect().top;

    var mapSection = document.getElementById("googleMap");
    var mapSectionTop = mapSection.getBoundingClientRect().top;

    if (mapSectionTop <= 80) {
        navbar.className = "navigation-top sticky clear";
    } else if (contactSectionTop <= 80) {
        navbar.className = "navigation-top sticky grey";
    } else if (homepageSectionBottom <= 0) {
        navbar.className = "navigation-top sticky"
    } else {
        navbar.className = "navigation-top";
    }
}


</script>