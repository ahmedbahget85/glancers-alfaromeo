<?php

if ( ! function_exists( 'etienne_elated_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function etienne_elated_search_body_class( $classes ) {
		$classes[] = 'eltdf-slide-from-header-bottom';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'etienne_elated_search_body_class' );
}

if ( ! function_exists( 'etienne_elated_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function etienne_elated_get_search() {
		etienne_elated_load_search_template();
	}
	
	add_action( 'etienne_elated_action_before_page_header_html_close', 'etienne_elated_get_search' );
	add_action( 'etienne_elated_action_before_mobile_header_html_close', 'etienne_elated_get_search' );
	add_action( 'etienne_elated_action_before_header_top_html_close', 'etienne_elated_get_search' );
}

if ( ! function_exists( 'etienne_elated_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function etienne_elated_load_search_template() {
		$parameters = array(
			'search_submit_icon_class' => etienne_elated_get_search_submit_icon_class()
		);

        etienne_elated_get_module_template_part( 'types/slide-from-header-bottom/templates/slide-from-header-bottom', 'search', '', $parameters );
	}
}