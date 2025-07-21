<?php

if ( ! function_exists( 'etienne_elated_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function etienne_elated_register_blog_list_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_blog_list_widget' );
}