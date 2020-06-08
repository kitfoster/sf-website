<div class="navigation-top" id="navbar">
  <h1 class="screen-reader-text">Sinisgalli Foster Melbourne Law Firm</h1>
  <?php if ($pageForEmployee): ?>
    <h2 class="screen-reader-text" id="page-for-employee"><?php echo $pageForEmployee->name . " Lawyer"; ?></h2>
  <?php endif; ?>

  <div class="nav-logo-wrapper" >
    <a href="">
      <img class="sf-nav-logo" src="/wp-content/themes/sinisgallifoster/assets/images/sf_logo.png" alt="Sinisgalli Foster Logo" />
    </a>
  </div>

    <button class="menu-button" id="nav-symbol" onclick="navToggle()">
    </button>

  <ul class="navbar-items" id="nav">
    <li><a onclick="scrollToElement('services')">Services</a></li>
    <li><a onclick="scrollToElement('our_team')">Our Team</a></li>
    <li><a onclick="scrollToElement('safe_custody')">Safe Custody</a></li>
    <li><a onclick="scrollToElement('contact')">Contact</a></li>
  </ul>
</div>

<script src="/wp-content/themes/sinisgallifoster/functions/navbar.js"></script>
<script>
var pageForEmployee = "<?php if ($pageForEmployee) {echo $pageForEmployee->name;}; ?>";
if (pageForEmployee) {
  setTimeout(function() {
      scrollToElement('our_team');
      setTimeout(function() {
        var bioId = "bio-name " + pageForEmployee;
        var bio =  document.getElementById(bioId);
        if (bio) {
          bio.click();
        }
      }, 700)
  }, 3000);
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
