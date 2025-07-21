<?php

if ( ! function_exists( 'etienne_elated_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function etienne_elated_register_button_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_button_widget' );
}