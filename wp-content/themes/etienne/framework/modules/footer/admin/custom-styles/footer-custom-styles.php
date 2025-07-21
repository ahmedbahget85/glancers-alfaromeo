<?php

if ( ! function_exists( 'etienne_elated_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function etienne_elated_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = etienne_elated_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo etienne_elated_dynamic_css( '.eltdf-page-footer .eltdf-footer-top-holder', $item_styles );
	}
	
	add_action( 'etienne_elated_action_style_dynamic', 'etienne_elated_footer_top_general_styles' );
}

if ( ! function_exists( 'etienne_elated_footer_top_inner_general_styles' ) ) {
    /**
     * Generates general custom styles for footer top inner area
     */
    function etienne_elated_footer_top_inner_general_styles() {
        $item_styles      = array();
        $border_color     = etienne_elated_options()->getOptionValue( 'footer_top_border_color' );
        $border_width     = etienne_elated_options()->getOptionValue( 'footer_top_border_width' );

        if ( ! empty( $border_color ) ) {
            $item_styles['border-color'] = $border_color;

            if ( $border_width === '' ) {
                $item_styles['border-width'] = '1px';
            }
        }

        if ( $border_width !== '' ) {
            $item_styles['border-width'] = etienne_elated_filter_px( $border_width ) . 'px';
        }

        echo etienne_elated_dynamic_css( '.eltdf-page-footer .eltdf-footer-top-holder .eltdf-footer-top-inner', $item_styles );
    }

    add_action( 'etienne_elated_action_style_dynamic', 'etienne_elated_footer_top_inner_general_styles' );
}

if ( ! function_exists( 'etienne_elated_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function etienne_elated_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = etienne_elated_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo etienne_elated_dynamic_css( '.eltdf-page-footer .eltdf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'etienne_elated_action_style_dynamic', 'etienne_elated_footer_bottom_general_styles' );
}

if ( ! function_exists( 'etienne_elated_footer_bottom_inner_general_styles' ) ) {
    /**
     * Generates general custom styles for footer bottom inner area
     */
    function etienne_elated_footer_bottom_inner_general_styles() {
        $item_styles      = array();
        $border_color     = etienne_elated_options()->getOptionValue( 'footer_bottom_border_color' );
        $border_width     = etienne_elated_options()->getOptionValue( 'footer_bottom_border_width' );

        if ( ! empty( $border_color ) ) {
            $item_styles['border-color'] = $border_color;

            if ( $border_width === '' ) {
                $item_styles['border-width'] = '1px';
            }
        }

        if ( $border_width !== '' ) {
            $item_styles['border-width'] = etienne_elated_filter_px( $border_width ) . 'px';
        }

        echo etienne_elated_dynamic_css( '.eltdf-page-footer .eltdf-footer-bottom-holder .eltdf-footer-bottom-inner', $item_styles );
    }

    add_action( 'etienne_elated_action_style_dynamic', 'etienne_elated_footer_bottom_inner_general_styles' );
}