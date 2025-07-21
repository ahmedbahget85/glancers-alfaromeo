<?php

if ( ! function_exists( 'etienne_elated_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function etienne_elated_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_image_gallery_widget' );
}