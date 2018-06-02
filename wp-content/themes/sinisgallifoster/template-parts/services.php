<div class="services-container desktop-container">
  <h3>Services</h3>
  <?php foreach(["Property", "Commercial", "Wills", "service 4", "service 5", "service 6"]
    as $key=>$value): ?>
    <div class="service-box">
      <div class="service">
        <h4><?php echo $value?></h4>
        <p>Lorem ipsum dolor sit amet, consectetuer
        adipiscing elit, sed diam nonummy nibh
        euismod tincidunt ut laoreet dolore magna
        aliquam erat volutpat.
        </p>
      </div>
    </div>
  <?php endforeach; ?>
</div>