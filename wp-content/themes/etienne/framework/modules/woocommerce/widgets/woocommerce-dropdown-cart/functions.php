<?php

if ( ! function_exists( 'etienne_elated_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function etienne_elated_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'etienne_elated_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function etienne_elated_get_dropdown_cart_icon_class() {
		$classes = array(
			'eltdf-header-cart'
		);
		
		$classes[] = etienne_elated_get_icon_sources_class( 'dropdown_cart', 'eltdf-header-cart' );
		
		return $classes;
	}
}