<?php

if ( ! function_exists( 'etienne_elated_map_post_video_meta' ) ) {
	function etienne_elated_map_post_video_meta() {
		$video_post_format_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'etienne' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'etienne' ),
				'description'   => esc_html__( 'Choose video type', 'etienne' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'etienne' ),
					'self'            => esc_html__( 'Self Hosted', 'etienne' )
				)
			)
		);
		
		$eltdf_video_embedded_container = etienne_elated_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'eltdf_video_embedded_container'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'etienne' ),
				'description' => esc_html__( 'Enter Video URL', 'etienne' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'etienne' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'etienne' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'etienne' ),
				'description' => esc_html__( 'Enter video image', 'etienne' ),
				'parent'      => $eltdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_post_video_meta', 22 );
}