<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'no-results', 'index' ); ?>
			<?php endif; ?>
			<?php do_action( '{%= prefix %}_after_main' ); ?>
		</main><!-- #main -->
		<?php do_action( '{%= prefix %}_after_primary' ); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>
