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
