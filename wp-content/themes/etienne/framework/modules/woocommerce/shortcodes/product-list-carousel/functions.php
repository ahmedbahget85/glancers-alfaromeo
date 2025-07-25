<?php

if ( ! function_exists( 'etienne_elated_add_product_list_carousel_shortcode' ) ) {
	function etienne_elated_add_product_list_carousel_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'EtienneCore\CPT\Shortcodes\ProductListCarousel\ProductListCarousel',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'etienne_core_filter_add_vc_shortcode', 'etienne_elated_add_product_list_carousel_shortcode' );
}

if ( ! function_exists( 'etienne_elated_set_product_list_carousel_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for product list carousel shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function etienne_elated_set_product_list_carousel_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list-carousel';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'etienne_core_filter_add_vc_shortcodes_custom_icon_class', 'etienne_elated_set_product_list_carousel_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'etienne_elated_add_product_list_carousel_into_shortcodes_list' ) ) {
	function etienne_elated_add_product_list_carousel_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'eltdf_product_list_carousel';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'etienne_elated_filter_woocommerce_shortcodes_list', 'etienne_elated_add_product_list_carousel_into_shortcodes_list' );
}