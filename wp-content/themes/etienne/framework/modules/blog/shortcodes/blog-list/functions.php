<?php

if ( ! function_exists( 'etienne_elated_add_blog_list_shortcode' ) ) {
	function etienne_elated_add_blog_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'EtienneCore\CPT\Shortcodes\BlogList\BlogList'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'etienne_core_filter_add_vc_shortcode', 'etienne_elated_add_blog_list_shortcode' );
}

if ( ! function_exists( 'etienne_elated_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function etienne_elated_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'etienne_core_filter_add_vc_shortcodes_custom_icon_class', 'etienne_elated_set_blog_list_icon_class_name_for_vc_shortcodes' );
}