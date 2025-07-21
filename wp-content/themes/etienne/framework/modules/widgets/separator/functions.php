<?php

if ( ! function_exists( 'etienne_elated_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function etienne_elated_register_separator_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_separator_widget' );
}