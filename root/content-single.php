<?php
/**
 * @package {%= title %}
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( '{%= prefix %}_before_single_entry' ); ?>
	<?php if ( has_action( '{%= prefix %}_single_entry_header' ) ) : ?>
		<header class="entry-header">
			<?php do_action( '{%= prefix %}_single_entry_header' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<?php if ( has_action( '{%= prefix %}_single_entry_content' ) ) : ?>
		<div class="entry-content">
			<?php do_action( '{%= prefix %}_single_entry_content' ); ?>
		</div><!-- .entry-summary -->
	<?php endif; ?>
	<?php if ( has_action( '{%= prefix %}_single_entry_meta' ) ) : ?>
		<footer class="entry-meta">
			<?php do_action( '{%= prefix %}_single_entry_meta' ); ?>
		</footer><!-- .entry-meta -->
	<?php endif; ?>
	<?php do_action( '{%= prefix %}_after_single_entry' ); ?>
</article><!-- #post-## -->
