<div class="contact-container" id="contact">
  <div class="desktop-container">
    <h3 class="contact-heading">Contact</h3>
    <div class="contact-section">
      <span class="details copy"><?php echo $contact->enquiryText ?></span>
      <span class="details"><a href="tel:<?php echo str_replace(' ', '', $contact->phone) ?>"><?php echo $contact->phone ?></a></span>
      <span class="details"><a href="mailto:<?php echo $contact->businessEmail ?>"><?php echo $contact->businessEmail ?></a></span>
      <span class="details"><?php echo $contact->addressLine1 ?><br/><?php echo $contact->addressLine2 ?></span>
    </div>
  </div>
</div>