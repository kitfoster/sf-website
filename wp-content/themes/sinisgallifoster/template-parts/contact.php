<div class="contact-container" id="contact">
  <div class="desktop-container">
    <h3 class="contact-heading">Contact</h3>
    <blockquote class="contact-quote"><?php echo $contact->contactQuote ?></blockquote>
    <div class="contact-sections">
      <div class="contact-section">
        <h4>Business Enquiry</h4>
        <span><?php echo $contact->businessQuote ?></span>
        <span class="details"><a href="mailto:<?php echo $contact->businessEmail ?>"><?php echo $contact->businessEmail ?></a></span>
        <span class="details"><a href="tel:<?php echo $contact->phone ?>"><?php echo $contact->phone ?></a></span>
        <span class="details"><?php echo $contact->addressLine1 ?><br/><?php echo $contact->addressLine2 ?></span>
      </div>
      <div class="contact-section">
        <h4 class="employment">Employment</h4>
        <span><?php echo $contact->employmentQuote ?></span>
        <span class="details"><a href="mailto:<?php echo $contact->employmentEmail ?>"><?php echo $contact->employmentEmail ?></a></span>
      </div>
    </div>
  </div>
</div>

<script>
  sr.reveal('.contact-heading');
  sr.reveal('.contact-quote');
  sr.reveal('.contact-section');
</script>