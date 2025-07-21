<?php

if ( ! function_exists( 'etienne_elated_register_widgets' ) ) {
	function etienne_elated_register_widgets() {
		$widgets = apply_filters( 'etienne_elated_filter_register_widgets', $widgets = array() );
		
		if( etienne_elated_core_plugin_installed() ) {
			foreach ( $widgets as $widget ) {
				etienne_elated_create_wp_widget( $widget );
			}
		}
	}
	
	add_action( 'widgets_init', 'etienne_elated_register_widgets' );
}