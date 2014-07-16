<?php
/**
 * Name: {%= title %} Themes Register Taxonomies
 * Description: Register Taxonomies
 * Author: {%= author_name %}
 * Version: 0.7.1.0
 * @package WordPress
 * @subpackage {%= title %}
 *
 **/
function {%= prefix %}_custom_taxonomies( $label_name = '', $slug = '', $type = '', $args = array() ) {

	$labels = array(
		'name'                       => sprintf( _x('%s', 'taxonomy general name', '{%= prefix %}' ), $label_name ),
		'singular_name'              => sprintf( _x('%s', 'taxonomy singular name', '{%= prefix %}'), $label_name ),
		'search_items'               => sprintf( __('Search %s', '{%= prefix %}'), $label_name ),
		'popular_items'              => sprintf( __('Popular %s', '{%= prefix %}'), $label_name ),
		'all_items'                  => sprintf( __('All %s', '{%= prefix %}'), $label_name ),
		'parent_item'                => sprintf( __('Parent %s', '{%= prefix %}'), $label_name ),
		'parent_item_colon'          => sprintf( __('Parent %s:', '{%= prefix %}'), $label_name ),
		'edit_item'                  => sprintf( __('Edit %s', '{%= prefix %}'), $label_name ),
		'view_item'                  => sprintf( __('View %s', '{%= prefix %}'), $label_name ),
		'update_item'                => sprintf( __('Update %s', '{%= prefix %}'), $label_name ),
		'add_new_item'               => sprintf( __('Add New %s', '{%= prefix %}'), $label_name ),
		'new_item_name'              => sprintf( __('New %s Name', '{%= prefix %}'), $label_name ),
		'separate_items_with_commas' => sprintf( __('Separate %s with commas', '{%= prefix %}'), $label_name ),
		'add_or_remove_items'        => sprintf( __('Add or remove %s', '{%= prefix %}'), $label_name ),
		'choose_from_most_used'      => sprintf( __('Choose from the most used %s', '{%= prefix %}'), $label_name ),
		'not_found'                  => sprintf( __('No %s found.', '{%= prefix %}'), $label_name ),
	);

	$defaults = array(
		'labels'       => $labels,
		'hierarchical' => true,
	);
	$r = wp_parse_args( $args, $defaults );
	register_taxonomy( $slug, $type, $r );
}

