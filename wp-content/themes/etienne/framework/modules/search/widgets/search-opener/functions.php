<?php

if ( ! function_exists( 'etienne_elated_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function etienne_elated_register_search_opener_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_search_opener_widget' );
}