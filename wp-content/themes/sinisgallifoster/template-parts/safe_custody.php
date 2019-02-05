<div class="safe-custody-container desktop-container" id="safe-custody">
  <div class="heading_wrapper">
    <h3 class="safe-custody-heading" id="safe-custody-heading" onclick="safeCustodyToggle()">Safe Custody</h3>
    <a class="arrow-down" onclick="safeCustodyToggle()"></a>
  </div>
  <p class="safe-custody-body" onclick="safeCustodyToggle()"><?php echo $safeCustody->text; ?></p>
</div>

<script>
  sr.reveal('.heading_wrapper', {distance: '50px'});

  function safeCustodyToggle() {
    var sc_div = document.getElementById("safe-custody");
    var sc_heading = document.getElementById("safe-custody-heading");
    if (sc_div.className.includes("open")) {
      sc_div.className = "safe-custody-container desktop-container";
    } else {
      sc_div.className = "safe-custody-container desktop-container open";
    }
  }
</script>