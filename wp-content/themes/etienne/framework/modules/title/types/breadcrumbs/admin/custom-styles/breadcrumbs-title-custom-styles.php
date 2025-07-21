<?php

if ( ! function_exists( 'etienne_elated_breadcrumbs_title_area_typography_style' ) ) {
	function etienne_elated_breadcrumbs_title_area_typography_style() {
		
		$item_styles = etienne_elated_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.eltdf-title-holder .eltdf-title-wrapper .eltdf-breadcrumbs'
		);
		
		echo etienne_elated_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = etienne_elated_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.eltdf-title-holder .eltdf-title-wrapper .eltdf-breadcrumbs a:hover'
		);
		
		echo etienne_elated_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'etienne_elated_action_style_dynamic', 'etienne_elated_breadcrumbs_title_area_typography_style' );
}