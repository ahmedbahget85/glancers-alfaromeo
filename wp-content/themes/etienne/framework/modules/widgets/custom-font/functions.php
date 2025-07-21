<?php

if ( ! function_exists( 'etienne_elated_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function etienne_elated_register_custom_font_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_custom_font_widget' );
}