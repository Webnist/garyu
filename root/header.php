<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package {%= title %}
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php do_action( '{%= prefix %}_before_body' ); ?>
		<div id="page" class="hfeed site">
			<?php do_action( '{%= prefix %}_before_page' ); ?>
			<header id="masthead" class="site-header" role="banner">
				<?php do_action( '{%= prefix %}_header' ); ?>
			</header><!-- #masthead -->
			<?php do_action( '{%= prefix %}_header_content' ); ?>
			<div id="content" class="site-content">
				<?php do_action( '{%= prefix %}_before_content' ); ?>
