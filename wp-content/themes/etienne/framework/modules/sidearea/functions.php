<?php

if ( ! function_exists( 'etienne_elated_register_side_area_sidebar' ) ) {
	/**
	 * Register side area sidebar
	 */
	function etienne_elated_register_side_area_sidebar() {
		register_sidebar(
			array(
				'id'            => 'sidearea',
				'name'          => esc_html__( 'Side Area', 'etienne' ),
				'description'   => esc_html__( 'Side Area', 'etienne' ),
				'before_widget' => '<div id="%1$s" class="widget eltdf-sidearea %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltdf-widget-title-holder"><h3 class="eltdf-widget-title">',
				'after_title'   => '</h3></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'etienne_elated_register_side_area_sidebar' );
}

if ( ! function_exists( 'etienne_elated_side_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function etienne_elated_side_menu_body_class( $classes ) {
		
		if ( is_active_widget( false, false, 'eltdf_side_area_opener' ) ) {
			
			if ( etienne_elated_options()->getOptionValue( 'side_area_type' ) ) {
				$classes[] = 'eltdf-' . etienne_elated_options()->getOptionValue( 'side_area_type' );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'etienne_elated_side_menu_body_class' );
}

if ( ! function_exists( 'etienne_elated_get_side_area' ) ) {
	/**
	 * Loads side area HTML
	 */
	function etienne_elated_get_side_area() {
		
		if ( is_active_widget( false, false, 'eltdf_side_area_opener' ) ) {
			$parameters = array(
				'close_icon_classes' => etienne_elated_get_side_area_close_icon_class()
			);
			
			etienne_elated_get_module_template_part( 'templates/sidearea', 'sidearea', '', $parameters );
		}
	}
	
	add_action( 'etienne_elated_action_after_body_tag', 'etienne_elated_get_side_area', 10 );
}

if ( ! function_exists( 'etienne_elated_get_side_area_close_class' ) ) {
	/**
	 * Loads side area close icon class
	 */
	function etienne_elated_get_side_area_close_icon_class() {
		$classes = array(
			'eltdf-close-side-menu'
		);
		
		$classes[] = etienne_elated_get_icon_sources_class( 'side_area', 'eltdf-close-side-menu' );
		
		return $classes;
	}
}