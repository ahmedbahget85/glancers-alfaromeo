<?php

if ( ! function_exists( 'etienne_elated_map_post_gallery_meta' ) ) {
	
	function etienne_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'etienne' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		etienne_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'etienne' ),
				'description' => esc_html__( 'Choose your gallery images', 'etienne' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_post_gallery_meta', 21 );
}
