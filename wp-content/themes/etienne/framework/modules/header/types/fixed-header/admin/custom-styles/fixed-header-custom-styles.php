<?php

if ( ! function_exists( 'etienne_elated_fixed_header_styles' ) ) {
	/**
	 * Generates styles for fixed haeder
	 */
	function etienne_elated_fixed_header_styles() {
		$background_color        = etienne_elated_options()->getOptionValue( 'fixed_header_background_color' );
		$background_transparency = etienne_elated_options()->getOptionValue( 'fixed_header_transparency' );
		$border_color            = etienne_elated_options()->getOptionValue( 'fixed_header_border_bottom_color' );
		
		$fixed_area_styles = array();
		if ( ! empty( $background_color ) ) {
			$fixed_header_background_color              = $background_color;
			$fixed_header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$fixed_header_background_color_transparency = $background_transparency;
			}
			
			$fixed_area_styles['background-color'] = etienne_elated_rgba_color( $fixed_header_background_color, $fixed_header_background_color_transparency ) . '!important';
		}
		
		if ( empty( $background_color ) && $background_transparency !== '' ) {
			$fixed_header_background_color              = '#fff';
			$fixed_header_background_color_transparency = $background_transparency;
			
			$fixed_area_styles['background-color'] = etienne_elated_rgba_color( $fixed_header_background_color, $fixed_header_background_color_transparency ) . '!important';
		}
		
		$selector = array(
			'.eltdf-page-header .eltdf-fixed-wrapper.fixed .eltdf-menu-area'
		);
		
		echo etienne_elated_dynamic_css( $selector, $fixed_area_styles );
		
		$fixed_area_holder_styles = array();
		
		if ( ! empty( $border_color ) ) {
			$fixed_area_holder_styles['border-bottom-color'] = $border_color;
		}
		
		$selector_holder = array(
			'.eltdf-page-header .eltdf-fixed-wrapper.fixed'
		);
		
		echo etienne_elated_dynamic_css( $selector_holder, $fixed_area_holder_styles );
		
		// fixed menu style
		
		$menu_item_styles = etienne_elated_get_typography_styles( 'fixed' );
		
		$menu_item_selector = array(
			'.eltdf-fixed-wrapper.fixed .eltdf-main-menu > ul > li > a'
		);
		
		echo etienne_elated_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = etienne_elated_options()->getOptionValue( 'fixed_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.eltdf-fixed-wrapper.fixed .eltdf-main-menu > ul > li:hover > a',
			'.eltdf-fixed-wrapper.fixed .eltdf-main-menu > ul > li.eltdf-active-item > a'
		);
		
		echo etienne_elated_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'etienne_elated_action_style_dynamic', 'etienne_elated_fixed_header_styles' );
}