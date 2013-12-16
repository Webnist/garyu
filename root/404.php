<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package {%= title %}
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<?php do_action( '{%= prefix %}_before_primary' ); ?>
		<main id="main" class="site-main" role="main">
			<?php do_action( '{%= prefix %}_before_main' ); ?>
			<section class="error-404 not-found">
				<?php do_action( '{%= prefix %}_before_404' ); ?>
				<?php if ( has_action( '{%= prefix %}_404_header' ) ) : ?>
					<header class="page-header">
						<?php do_action( '{%= prefix %}_404_header' ); ?>
					</header><!-- .page-header -->
				<?php endif; ?>
				<?php if ( has_action( '{%= prefix %}_404_content' ) ) : ?>
					<div class="page-content">
						<?php do_action( '{%= prefix %}_404_content' ); ?>
					</div><!-- .page-summary -->
				<?php endif; ?>
				<?php if ( has_action( '{%= prefix %}_404_meta' ) ) : ?>
					<footer class="page-meta">
						<?php do_action( '{%= prefix %}_404_meta' ); ?>
					</footer><!-- .page-meta -->
				<?php endif; ?>
				<?php do_action( '{%= prefix %}_after_404' ); ?>
			</section><!-- .error-404 -->
			<?php do_action( '{%= prefix %}_after_main' ); ?>
		</main><!-- #main -->
		<?php do_action( '{%= prefix %}_after_primary' ); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>
