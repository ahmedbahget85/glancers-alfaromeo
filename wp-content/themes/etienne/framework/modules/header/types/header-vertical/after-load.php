<?php

if ( ! function_exists( 'etienne_elated_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function etienne_elated_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( etienne_elated_check_is_header_type_enabled( 'header-vertical', etienne_elated_get_page_id() ) ) {
		add_filter( 'etienne_elated_filter_allow_sticky_header_behavior', 'etienne_elated_disable_behaviors_for_header_vertical' );
		add_filter( 'etienne_elated_filter_allow_content_boxed_layout', 'etienne_elated_disable_behaviors_for_header_vertical' );
	}
}