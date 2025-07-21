<?php

if ( ! function_exists( 'etienne_elated_sticky_header_meta_boxes_options_map' ) ) {
	function etienne_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = etienne_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'eltdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'etienne' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'etienne' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$etienne_custom_sidebars = etienne_elated_get_custom_sidebars();
		if ( count( $etienne_custom_sidebars ) > 0 ) {
			etienne_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'etienne' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'etienne' ),
					'parent'      => $header_meta_box,
					'options'     => $etienne_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'eltdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'etienne_elated_action_additional_header_area_meta_boxes_map', 'etienne_elated_sticky_header_meta_boxes_options_map', 8 );
}