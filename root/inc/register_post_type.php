<?php
/**
 * Name: {%= title %} Themes Register Post Type
 * Description: Register Post Type
 * Author: {%= author_name %}
 * Version: 0.7.1.0
 * @package WordPress
 * @subpackage {%= title %}
 *
 **/
function {%= prefix %}_custom_post_type( $label_name, $slug, $args = array() ) {

	$labels = array(
		'name'               => sprintf( _x('%s', 'post type general name', '{%= prefix %}'), $label_name ),
		'singular_name'      => sprintf( _x('%s', 'post type singular name', '{%= prefix %}'), $label_name ),
		'add_new'            => sprintf( _x('Add New', '%s', '{%= prefix %}'), $label_name ),
		'add_new_item'       => sprintf( __('Add New %s', '{%= prefix %}'), $label_name ),
		'edit_item'          => sprintf( __('Edit %s', '{%= prefix %}'), $label_name ),
		'new_item'           => sprintf( __('New %s', '{%= prefix %}'), $label_name ),
		'view_item'          => sprintf( __('View %s', '{%= prefix %}'), $label_name ),
		'search_items'       => sprintf( __('Search %s', '{%= prefix %}'), $label_name ),
		'not_found'          => sprintf( __('No %s found.', '{%= prefix %}'), $label_name ),
		'not_found_in_trash' => sprintf( __('No %s found in Trash.', '{%= prefix %}'), $label_name ),
		'parent_item_colon'  => sprintf( __('Parent %s:', '{%= prefix %}'), $label_name ),
		'all_items'          => sprintf( __( 'All %s', '{%= prefix %}' ), $label_name ),
		'name_admin_bar'     => sprintf( _x( '%s', 'add new on admin bar', '{%= prefix %}' ), $label_name ),
	);

	$defaults = array(
		'labels'   => $labels,
		'public'   => true,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'page-attributes', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
	);
	$r = wp_parse_args( $args, $defaults );
	extract($args);
	register_post_type( $slug, $r );
}
