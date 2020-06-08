<div class="services-container" id="services">
  <div class="inner desktop-container">
    <h3>Services</h3>
    <?php foreach($services as $key=>$value): ?>
      <div class="service-box">
        <?php if ($value->icon): ?>
          <image class="service-icon" src="<?php echo $value->icon ?>"/>
        <?php endif; ?>
        <div class="service">
          <h4><?php echo $value->title ?></h4>
          <p><?php echo $value->description ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script>
  sr.reveal('.service', {distance: '50px'});
</script>