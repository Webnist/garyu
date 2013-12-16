<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package {%= title %}
 */
?>
<section class="no-results not-found">
	<?php do_action( '{%= prefix %}_before_no_results' ); ?>
	<?php if ( has_action( '{%= prefix %}_no_results_header' ) ) : ?>
		<header class="page-header">
			<?php do_action( '{%= prefix %}_no_results_header' ); ?>
		</header><!-- .page-header -->
	<?php endif; ?>
	<?php if ( has_action( '{%= prefix %}_no_results_content' ) ) : ?>
		<div class="page-content">
			<?php do_action( '{%= prefix %}_no_results_content' ); ?>
		</div><!-- .page-summary -->
	<?php endif; ?>
	<?php if ( has_action( '{%= prefix %}_no_results_meta' ) ) : ?>
		<footer class="page-meta">
			<?php do_action( '{%= prefix %}_no_results_meta' ); ?>
		</footer><!-- .page-meta -->
	<?php endif; ?>
	<?php do_action( '{%= prefix %}_after_no_results' ); ?>
</section><!-- .no-results -->
