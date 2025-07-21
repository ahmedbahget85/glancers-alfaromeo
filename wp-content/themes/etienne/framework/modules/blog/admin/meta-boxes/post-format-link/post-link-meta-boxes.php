<?php

if ( ! function_exists( 'etienne_elated_map_post_link_meta' ) ) {
	function etienne_elated_map_post_link_meta() {
		$link_post_format_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'etienne' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'etienne' ),
				'description' => esc_html__( 'Enter link', 'etienne' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_post_link_meta', 24 );
}