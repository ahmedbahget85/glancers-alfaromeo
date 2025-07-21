<?php

if ( ! function_exists( 'etienne_elated_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function etienne_elated_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'etienne_elated_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'etienne_elated_header_standard_meta_map' ) ) {
	function etienne_elated_header_standard_meta_map( $parent ) {
		$hide_dep_options = etienne_elated_get_hide_dep_for_header_standard_meta_boxes();
		
		etienne_elated_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'etienne' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'etienne' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'etienne' ),
					'left'   => esc_html__( 'Left', 'etienne' ),
					'right'  => esc_html__( 'Right', 'etienne' ),
					'center' => esc_html__( 'Center', 'etienne' )
				),
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'etienne_elated_action_additional_header_area_meta_boxes_map', 'etienne_elated_header_standard_meta_map' );
}