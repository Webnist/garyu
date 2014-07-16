<?php
/**
 * Name: {%= title %} Management Scripts Styles
 * Description: Management Scripts Styles
 * Author: {%= author_name %}
 * Version: 0.7.1.0
 * @package WordPress
 * @subpackage {%= title %}
**/

function {%= prefix %}_scripts_styles() {

	// Loads JavaScript file with functionality specific to bizLady.
	if ( file_exists( get_stylesheet_directory() . '/js/{%= prefix %}.min.js' ) )
		wp_enqueue_script( 'bizLady-script', get_stylesheet_directory_uri() . '/js/{%= prefix %}.min.js', array('jquery'), {%= prefix %}_file_time_stamp( '/js/{%= prefix %}.min.js' ), true );

	// Loads our main stylesheet.
	wp_enqueue_style( 'bizLady-style', get_stylesheet_directory_uri() . '/css/{%= prefix %}.min.css', array(), {%= prefix %}_file_time_stamp( '/css/{%= prefix %}.min.css' ) );

}
add_action( 'wp_enqueue_scripts', '{%= prefix %}_scripts_styles' );
