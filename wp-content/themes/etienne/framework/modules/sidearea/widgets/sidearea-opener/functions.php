<?php

if ( ! function_exists( 'etienne_elated_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function etienne_elated_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_sidearea_opener_widget' );
}