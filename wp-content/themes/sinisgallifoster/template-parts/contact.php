
<div class="contact-container" id="contact">
  <div class="desktop-container">
    <h3 class="contact-heading">Contact</h3>
    <div class="inner-container">
      <div class="contact-section">
        <h4>Enquiries</h4>
        <span class="copy"><?php echo $contact->enquiriesText ?></span>
        <span class="details"><a href="mailto:<?php echo $contact->businessEmail ?>"><?php echo $contact->businessEmail ?></a></span>
        <span class="details"><a href="tel:<?php echo $contact->phone ?>"><?php echo $contact->phone ?></a></span>
        <span class="details"><?php echo $contact->addressLine1 ?><br/><?php echo $contact->addressLine2 ?></span>
      </div>
      <img class="image" src=<?php echo $contact->contactImage; ?>></img>
    </div>
  </div>
</div>

<script>
  sr.reveal('.contact-heading');
  sr.reveal('.contact-section');
  sr.reveal('.image');
</script>