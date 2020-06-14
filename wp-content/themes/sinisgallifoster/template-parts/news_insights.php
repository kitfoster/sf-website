<div class="news-insights-container">
  <h1>News and Insights</h1>
  <?php foreach($newsArticles as $key=>$value): ?>
    <span><?php echo $value->title; ?></span>
  <?php endforeach; ?>
</div>
