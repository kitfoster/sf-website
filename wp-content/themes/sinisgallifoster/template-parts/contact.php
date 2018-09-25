<div class="contact-container" id="contact">
  <div class="desktop-container">
    <h3 class="contact-heading">Contact</h3>
    <div class="contact-section">
      <div class="detail-section">
        <span class="description">Phone:</span>
        <span class="details"><a href="tel:<?php echo $contact->phone ?>"><?php echo $contact->phone ?></a></span>
      </div>
      <div class="detail-section">
        <span class="description">Email:</span>
        <span class="details"><a href="mailto:<?php echo $contact->businessEmail ?>"><?php echo $contact->businessEmail ?></a></span>
      </div>
      <div class="detail-section">
        <span class="description">Address:</span>
        <span class="details"><?php echo $contact->addressLine1 ?><br/><?php echo $contact->addressLine2 ?></span>
      </div>
    </div>
  </div>
</div>

<script>
  sr.reveal('.contact-heading');
  sr.reveal('.contact-section');
</script>