<?php
/**
 * @package WordPress
 * @subpackage Sinisgalli_Foster
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div class="navigation-top">
		<div class="nav-logo-wrapper" >
			<img class="sf-nav-logo" src="wp-content/themes/sinisgallifoster/assets/images/sf_logo.png" alt="Sinisgalli Foster Logo">
				<a href="#"></a>
			</img>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'custom-nav-class' ) ); ?>
	</div>
	<?php include "template-parts/homepage.php" ?>
	<?php include "template-parts/statement.php" ?>
</div>

<?php get_footer();
