<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package {%= title %}
 */
?>
				<?php do_action( '{%= prefix %}_after_content' ); ?>
			</div><!-- #content -->
			<?php do_action( '{%= prefix %}_content_footer' ); ?>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<?php do_action( '{%= prefix %}_footer' ); ?>
			</footer><!-- #colophon -->
			<?php do_action( '{%= prefix %}_after_page' ); ?>
		</div><!-- #page -->
		<?php wp_footer(); ?>
	</body>
</html>
