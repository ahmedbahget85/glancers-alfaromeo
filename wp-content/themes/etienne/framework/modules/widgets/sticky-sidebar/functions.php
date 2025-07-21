<?php

if ( ! function_exists( 'etienne_elated_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function etienne_elated_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_sticky_sidebar_widget' );
}