<div class="services-container" id="services">
  <div class="inner desktop-container">
    <h3>Services</h3>
    <?php foreach($services as $key=>$value): ?>
      <div class="service-box">
        <div class="service">
          <h4><?php echo $value->title ?></h4>
          <p><?php echo $value->description ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
