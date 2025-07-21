<?php

if ( ! function_exists( 'etienne_elated_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function etienne_elated_register_icon_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_icon_widget' );
}