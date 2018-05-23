<div class="team-page-container">
  <?php foreach(["p1", "p2", "p3", "p4", "p5", "p6"] as $key=>$value): ?>
    <div class="bio-container">
      <div class="photo"></div>
      <div class="name"><?php echo $value; ?></div>
    </div>
  <?php endforeach; ?>
</div>