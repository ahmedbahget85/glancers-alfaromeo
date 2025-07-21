<?php

if ( ! function_exists( 'etienne_elated_logo_meta_box_map' ) ) {
	function etienne_elated_logo_meta_box_map() {
		
		$logo_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'etienne_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'etienne' ),
				'name'  => 'logo_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'etienne' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'etienne' ),
				'parent'      => $logo_meta_box
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'etienne' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'etienne' ),
				'parent'      => $logo_meta_box
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'etienne' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'etienne' ),
				'parent'      => $logo_meta_box
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'etienne' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'etienne' ),
				'parent'      => $logo_meta_box
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'etienne' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'etienne' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_logo_meta_box_map', 47 );
}