<div class="contact-container" id="contact">
  <div class="desktop-container">
    <h3 class="contact-heading">Contact</h3>
    <blockquote class="contact-quote"><?php echo $contact->contactQuote ?></blockquote>
    <div class="contact-sections">
      <div class="contact-section">
        <h4>Business Enquiry</h4>
        <span><?php echo $contact->businessQuote ?></p>
        <span class="details"><?php echo $contact->businessEmail ?></p>
        <span class="details"><?php echo $contact->phone ?></p>
        <span class="details"><?php echo $contact->addressLine1 ?><br/><?php echo $contact->addressLine2 ?></p>
      </div>
      <div class="contact-section">
        <h4 class="employment">Employment</h4>
        <span><?php echo $contact->employmentQuote ?></p>
        <span class="details"><?php echo $contact->employmentEmail ?></>
      </div>
    </div>
  </div>
</div>

<script>
  sr.reveal('.contact-heading');
  sr.reveal('.contact-quote');
  sr.reveal('.contact-section');
</script>