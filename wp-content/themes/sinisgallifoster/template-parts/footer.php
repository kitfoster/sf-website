<div class="footer-container">
  <div class="footer-logo">
    <img class="sf-footer-logo" src="/wp-content/themes/sinisgallifoster/assets/images/sf-sml-logo.png" alt="Sinisgalli Foster Logo" />
  </div>
  <div class="footer-text">
    <span class="phone">P / <a href="tel:<?php echo str_replace(' ', '', $contact->phone) ?>"><?php echo $contact->phone ?></a></span>
    <span class="email">E / <a href="mailto:<?php echo $contact->businessEmail ?>"><?php echo $contact->businessEmail ?></a></span>
    <span class="address"><img src="/wp-content/themes/sinisgallifoster/assets/images/sf-map-marker.png" alt="Map marker icon" /><a href="https://goo.gl/maps/ckaDVogEZZn" target="_blank"><?php echo $contact->addressLine1 . ", " . $contact->addressLine2 ?></a></span>
    <span class="copy">Liability limited by a scheme approved under Professional Standards Legislation<br>&copy; Sinisgalli Foster 2019</span>
  </div>
</div>
