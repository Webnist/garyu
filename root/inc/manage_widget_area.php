<?php
/**
 * Name: {%= title %} Management Widget Area
 * Description: Management Widget Area
 * Author: {%= author_name %}
 * Version: 0.7.1.0
 * @package WordPress
 * @subpackage {%= title %}
**/

function {%= prefix %}_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sideber', '{%= prefix %}' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

}
add_action( 'widgets_init', '{%= prefix %}_widgets_init' );
