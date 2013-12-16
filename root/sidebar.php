<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package {%= title %}
 */
?>
<?php if ( has_action( '{%= prefix %}_secondary' ) ) : ?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( '{%= prefix %}_secondary' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>
