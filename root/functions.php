<?php
/**
 * {%= title %} functions and definitions
 *
 * @package {%= title %}
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( '{%= prefix %}_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function {%= prefix %}_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on {%= title %}, use a find and replace
	 * to change '{%= prefix %}' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '{%= prefix %}', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '{%= prefix %}' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

}
endif; // {%= prefix %}_setup
add_action( 'after_setup_theme', '{%= prefix %}_setup' );

/**
 * load the file in the inc directory
 */
function {%= prefix %}_theme_require() {

	/* global require function */
	if ( file_exists( get_template_directory() . '/inc/') ) {
		$dir = get_template_directory() . '/inc/';
		$handle = opendir( $dir );
		while ( false !== ( $ent = readdir( $handle ) ) ) {
			if ( !is_dir( $ent ) && strtolower( substr( $ent, -4 ) ) == ".php" ) {
				require $dir . $ent;
			}
		}
		closedir( $handle );
	}

	/* Parent require function */
	if ( !is_child_theme() && file_exists( get_template_directory() . '/parent_inc/') ) {
		$dir = get_template_directory() . '/parent_inc/';
		$handle = opendir( $dir );
		while ( false !== ( $ent = readdir( $handle ) ) ) {
			if ( !is_dir( $ent ) && strtolower( substr( $ent, -4 ) ) == ".php" ) {
				require $dir . $ent;
			}
		}
		closedir( $handle );
	}

	/* Child require function */
	if( is_child_theme() && file_exists( get_stylesheet_directory() . '/child_inc/') ) {
		$dir = get_stylesheet_directory() . '/child_inc/';
		$handle = opendir( $dir );
		while ( false !== ( $ent = readdir( $handle ) ) ) {
			if ( !is_dir( $ent ) && strtolower( substr( $ent, -4 ) ) == ".php" ) {
				require $dir . $ent;
			}
		}
		closedir( $handle );
	}
}
add_action( 'after_setup_theme', '{%= prefix %}_theme_require' );

if ( !function_exists( '{%= prefix %}_file_time_stamp' ) ) :
	/**
	 * Gets the time stamp of the file
	 */
	function {%= prefix %}_file_time_stamp( $file = null, $args = array() ) {

		$default = array(
			'path'  => null,
			'child' => false,
		);
		$args    = wp_parse_args( $args, $default );
		extract($args);

		if ( !$path && $child )
			$path = get_stylesheet_directory();

		if ( !$path && !$child )
			$path = get_template_directory();

		$value = null;
		$file = $path . '/' . $file;
		if ( file_exists( $file ) ) {
			$value = filemtime( $file );
		}
		return $value;
	}
endif; // {%= prefix %}_file_time_stamp
