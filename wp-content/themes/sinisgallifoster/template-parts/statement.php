<div id="below-fold">
  <div class="statement-container" id="statement">
    <div class="border"></div>
    <h2 class="statement"><?php echo $statementText ?></h2>
    <div class="border"></div>
  </div>
</div>

<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script>
  window.sr = ScrollReveal({ duration: 1000 });
  sr.reveal('.statement', {scale: 1, distance: '50px'});
</script>
