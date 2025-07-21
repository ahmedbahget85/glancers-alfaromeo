<?php

if ( ! function_exists( 'etienne_elated_map_post_audio_meta' ) ) {
	function etienne_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'etienne' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'etienne' ),
				'description'   => esc_html__( 'Choose audio type', 'etienne' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'etienne' ),
					'self'            => esc_html__( 'Self Hosted', 'etienne' )
				)
			)
		);
		
		$eltdf_audio_embedded_container = etienne_elated_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'eltdf_audio_embedded_container'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'etienne' ),
				'description' => esc_html__( 'Enter audio URL', 'etienne' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'etienne' ),
				'description' => esc_html__( 'Enter audio link', 'etienne' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_post_audio_meta', 23 );
}