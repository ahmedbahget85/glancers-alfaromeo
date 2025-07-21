<?php

if ( ! function_exists( 'etienne_elated_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function etienne_elated_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'EtienneElatedNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'etienne_elated_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function etienne_elated_init_register_header_standard_type() {
		add_filter( 'etienne_elated_filter_register_header_type_class', 'etienne_elated_register_header_standard_type' );
	}
	
	add_action( 'etienne_elated_action_before_header_function_init', 'etienne_elated_init_register_header_standard_type' );
}