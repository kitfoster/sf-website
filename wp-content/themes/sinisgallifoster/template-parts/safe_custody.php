<div class="safe-custody-container desktop-container" id="safe_custody">
  <div class="heading_wrapper" onclick="safeCustodyToggle()">
    <h3 class="safe-custody-heading" id="safe-custody-heading">Safe Custody</h3>
    <a class="arrow-down"></a>
  </div>
  <p class="safe-custody-body" onclick="safeCustodyToggle()"><?php echo $safeCustody->text; ?></p>
</div>

<script>
  sr.reveal('.heading_wrapper');

  function safeCustodyToggle() {
    var sc_div = document.getElementById("safe_custody");
    var sc_heading = document.getElementById("safe-custody-heading");
    if (sc_div.className.includes("open")) {
      sc_div.className = "safe-custody-container desktop-container";
    } else {
      sc_div.className = "safe-custody-container desktop-container open";
    }
  }
</script>
