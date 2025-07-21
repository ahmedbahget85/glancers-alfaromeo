<?php

if ( ! function_exists( 'etienne_elated_map_sidebar_meta' ) ) {
	function etienne_elated_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'etienne_elated_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'etienne' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'etienne' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'etienne' ),
				'parent'      => $eltdf_sidebar_meta_box,
                'options'       => etienne_elated_get_custom_sidebars_options( true )
			)
		);
		
		$eltdf_custom_sidebars = etienne_elated_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			etienne_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'etienne' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'etienne' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_sidebar_meta', 31 );
}