<?php

if ( ! function_exists( 'etienne_elated_map_post_quote_meta' ) ) {
	function etienne_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'etienne' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'etienne' ),
				'description' => esc_html__( 'Enter Quote text', 'etienne' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'etienne' ),
				'description' => esc_html__( 'Enter Quote author', 'etienne' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_post_quote_meta', 25 );
}