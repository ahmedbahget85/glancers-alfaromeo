<?php

if ( ! function_exists( 'etienne_elated_content_responsive_styles' ) ) {
	/**
	 * Generates content responsive custom styles
	 */
	function etienne_elated_content_responsive_styles() {
		$content_style = array();
		
		$padding_mobile = etienne_elated_options()->getOptionValue( 'content_padding_mobile' );
		if ( $padding_mobile !== '' ) {
			$content_style['padding'] = $padding_mobile;
		}
		
		$content_selector = array(
			'.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
			'.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
		);
		
		echo etienne_elated_dynamic_css( $content_selector, $content_style );
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_1024', 'etienne_elated_content_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_h1_responsive_styles3' ) ) {
	function etienne_elated_h1_responsive_styles3() {
		$selector = array(
			'h1'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h1_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_768_1024', 'etienne_elated_h1_responsive_styles3' );
}

if ( ! function_exists( 'etienne_elated_h2_responsive_styles3' ) ) {
	function etienne_elated_h2_responsive_styles3() {
		$selector = array(
			'h2'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h2_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_768_1024', 'etienne_elated_h2_responsive_styles3' );
}

if ( ! function_exists( 'etienne_elated_h3_responsive_styles3' ) ) {
	function etienne_elated_h3_responsive_styles3() {
		$selector = array(
			'h3'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h3_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_768_1024', 'etienne_elated_h3_responsive_styles3' );
}

if ( ! function_exists( 'etienne_elated_h4_responsive_styles3' ) ) {
	function etienne_elated_h4_responsive_styles3() {
		$selector = array(
			'h4'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h4_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_768_1024', 'etienne_elated_h4_responsive_styles3' );
}

if ( ! function_exists( 'etienne_elated_h5_responsive_styles3' ) ) {
	function etienne_elated_h5_responsive_styles3() {
		$selector = array(
			'h5'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h5_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_768_1024', 'etienne_elated_h5_responsive_styles3' );
}

if ( ! function_exists( 'etienne_elated_h6_responsive_styles3' ) ) {
	function etienne_elated_h6_responsive_styles3() {
		$selector = array(
			'h6'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h6_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_768_1024', 'etienne_elated_h6_responsive_styles3' );
}

if ( ! function_exists( 'etienne_elated_h1_responsive_styles' ) ) {
	function etienne_elated_h1_responsive_styles() {
		$selector = array(
			'h1'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h1_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680_768', 'etienne_elated_h1_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_h2_responsive_styles' ) ) {
	function etienne_elated_h2_responsive_styles() {
		$selector = array(
			'h2'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h2_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680_768', 'etienne_elated_h2_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_h3_responsive_styles' ) ) {
	function etienne_elated_h3_responsive_styles() {
		$selector = array(
			'h3'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h3_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680_768', 'etienne_elated_h3_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_h4_responsive_styles' ) ) {
	function etienne_elated_h4_responsive_styles() {
		$selector = array(
			'h4'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h4_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680_768', 'etienne_elated_h4_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_h5_responsive_styles' ) ) {
	function etienne_elated_h5_responsive_styles() {
		$selector = array(
			'h5'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h5_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680_768', 'etienne_elated_h5_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_h6_responsive_styles' ) ) {
	function etienne_elated_h6_responsive_styles() {
		$selector = array(
			'h6'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h6_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680_768', 'etienne_elated_h6_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_text_responsive_styles' ) ) {
	function etienne_elated_text_responsive_styles() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'text', '_res1' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680_768', 'etienne_elated_text_responsive_styles' );
}

if ( ! function_exists( 'etienne_elated_h1_responsive_styles2' ) ) {
	function etienne_elated_h1_responsive_styles2() {
		$selector = array(
			'h1'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h1_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680', 'etienne_elated_h1_responsive_styles2' );
}

if ( ! function_exists( 'etienne_elated_h2_responsive_styles2' ) ) {
	function etienne_elated_h2_responsive_styles2() {
		$selector = array(
			'h2'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h2_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680', 'etienne_elated_h2_responsive_styles2' );
}

if ( ! function_exists( 'etienne_elated_h3_responsive_styles2' ) ) {
	function etienne_elated_h3_responsive_styles2() {
		$selector = array(
			'h3'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h3_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680', 'etienne_elated_h3_responsive_styles2' );
}

if ( ! function_exists( 'etienne_elated_h4_responsive_styles2' ) ) {
	function etienne_elated_h4_responsive_styles2() {
		$selector = array(
			'h4'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h4_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680', 'etienne_elated_h4_responsive_styles2' );
}

if ( ! function_exists( 'etienne_elated_h5_responsive_styles2' ) ) {
	function etienne_elated_h5_responsive_styles2() {
		$selector = array(
			'h5'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h5_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680', 'etienne_elated_h5_responsive_styles2' );
}

if ( ! function_exists( 'etienne_elated_h6_responsive_styles2' ) ) {
	function etienne_elated_h6_responsive_styles2() {
		$selector = array(
			'h6'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'h6_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680', 'etienne_elated_h6_responsive_styles2' );
}

if ( ! function_exists( 'etienne_elated_text_responsive_styles2' ) ) {
	function etienne_elated_text_responsive_styles2() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = etienne_elated_get_responsive_typography_styles( 'text', '_res2' );
		
		if ( ! empty( $styles ) ) {
			echo etienne_elated_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'etienne_elated_action_style_dynamic_responsive_680', 'etienne_elated_text_responsive_styles2' );
}