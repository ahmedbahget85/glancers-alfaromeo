<?php

if ( ! function_exists( 'etienne_elated_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function etienne_elated_register_author_info_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_author_info_widget' );
}