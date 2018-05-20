<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sinisgalli_Foster
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<link href="<?php get_stylesheet() ?>" rel="stylesheet">

<div class="wrap">
	<header class="page-header">
		<h2 class="page-title">Sinisgalli Foster</h2>
	</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		</main>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer();
