<div class="navigation-top" id="navbar">
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

  <button class="nav-hamburger" id="nav-symbol" onclick="navToggle()">
  </button>
</div>

<script>
function navToggle() {
    var nav = document.getElementById("nav");
    var symbol = document.getElementById("nav-symbol");
    if (nav.className == "navbar-items") {
        nav.className += " expand fade_out";
        symbol.className += " nav-close";
        setTimeout(() => {
            nav.className = "navbar-items expand";
        }, 1);
    } else {
        closeNav();
    }
}

function closeNav() {
    var x1 = document.getElementById("nav");
    var x2 = document.getElementById("nav-symbol");
    x1.className = "navbar-items expand fade_out";
    x2.className = "nav-hamburger";
    setTimeout(() => {
        x1.className = "navbar-items";
    }, 500);
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
    var statementSection = document.getElementById("statement");
    var statementSectionTop = statementSection.getBoundingClientRect().top;

    if (statementSectionTop <= 0) {
        navbar.className = "navigation-top minimise";
    } else {
        navbar.className = "navigation-top";
    }
}

</script>