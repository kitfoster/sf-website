<?php get_header(); ?>
	<body>
		<script src="/wp-content/themes/sinisgallifoster/functions/ie.js"></script>

		<?php include "wp_posts.php" ?>

		<?php include "template-parts/navbar.php" ?>

		<?php
			$newsInsightsPage;
			preg_match('/news-insights/', $_SERVER['REQUEST_URI'], $newsInsightsPage);
		?>

		<?php if (isset($newsInsightsPage[0])): ?>
			<!-- News and Insights page -->
			<?php include "template-parts/news-insights/top_banner.php" ?>
			<?php include "template-parts/news-insights/articles.php" ?>
		<?php else: ?>
			<!-- All other pages -->
			<?php include "template-parts/opening_page.php" ?>
			<?php include "template-parts/homepage.php" ?>
			<?php include "template-parts/statement.php" ?>
			<?php include "template-parts/services.php" ?>
			<?php include "template-parts/team_page.php" ?>
			<?php include "template-parts/safe_custody.php" ?>
			<?php include "template-parts/contact.php" ?>
			<?php include "template-parts/map.php" ?>
		<?php endif; ?>

		<?php include "template-parts/footer.php" ?>

		<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
		<!-- @glidejs/glide used for articles carousels -->
		<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
		<script src="/wp-content/themes/sinisgallifoster/functions/reveal.js"></script>
	</body>
</html>
