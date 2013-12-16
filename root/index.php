<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package {%= title %}
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<?php do_action( '{%= prefix %}_before_primary' ); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action( '{%= prefix %}_before_main' ); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'no-results', 'index' ); ?>
			<?php endif; ?>
			<?php do_action( '{%= prefix %}_after_main' ); ?>
		</main><!-- #main -->
		<?php do_action( '{%= prefix %}_after_primary' ); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>
