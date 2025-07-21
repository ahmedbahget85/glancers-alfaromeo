<?php

if ( etienne_elated_contact_form_7_installed() ) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'etienne_elated_filter_register_widgets', 'etienne_elated_register_cf7_widget' );
}

if ( ! function_exists( 'etienne_elated_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function etienne_elated_register_cf7_widget( $widgets ) {
		$widgets[] = 'EtienneElatedClassContactForm7Widget';
		
		return $widgets;
	}
}