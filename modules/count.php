<?php
/**
 * @package CF7BS
 * @version 1.2.0
 * @author Felix Arntz <felix-arntz@leaves-and-love.net>
 */

remove_action( 'wpcf7_init', 'wpcf7_add_shortcode_count' );
add_action( 'wpcf7_init', 'cf7bs_add_shortcode_count' );

function cf7bs_add_shortcode_count() {
	wpcf7_add_shortcode( 'count', 'cf7bs_count_shortcode_handler', true );
}

function cf7bs_count_shortcode_handler( $tag ) {
	$tag_obj = new WPCF7_Shortcode( $tag );

	if ( empty( $tag_obj->name ) ) {
		return '';
	}

	$field = new CF7BS_Form_Field( array(
		'name'				=> wpcf7_count_shortcode_handler( $tag ),
		'type'				=> 'custom',
		'label'				=> $tag_obj->content,
		'form_layout'		=> cf7bs_get_form_property( 'layout' ),
		'form_label_width'	=> cf7bs_get_form_property( 'label_width' ),
		'form_breakpoint'	=> cf7bs_get_form_property( 'breakpoint' ),
		'tabindex'			=> false,
		'wrapper_class'		=> '',
	) );

	$html = $field->display( false );

	return $html;
}
