<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>

<body>
	<div class="wrap">
		<?php include "details.php" ?>

		<?php include "template-parts/navbar.php" ?>
		<?php include "template-parts/homepage.php" ?>
		<?php include "template-parts/statement.php" ?>
		<?php include "template-parts/services.php" ?>
		<?php include "template-parts/team_page.php" ?>
		<?php include "template-parts/contact.php" ?>
		<?php include "template-parts/map.php" ?>
		<?php include "template-parts/footer.php" ?>
	</div>
</body>

<?php get_footer();
