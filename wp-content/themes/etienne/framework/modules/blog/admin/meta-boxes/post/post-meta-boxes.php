<?php

/*** Post Settings ***/

if ( ! function_exists( 'etienne_elated_map_post_meta' ) ) {
	function etienne_elated_map_post_meta() {
		
		$post_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'etienne' ),
				'name'  => 'post-meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'etienne' ),
				'parent'        => $post_meta_box,
				'options'       => etienne_elated_get_yes_no_select_array()
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'etienne' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'etienne' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => etienne_elated_get_custom_sidebars_options( true )
			)
		);
		
		$etienne_custom_sidebars = etienne_elated_get_custom_sidebars();
		if ( count( $etienne_custom_sidebars ) > 0 ) {
			etienne_elated_create_meta_box_field( array(
				'name'        => 'eltdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'etienne' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'etienne' ),
				'parent'      => $post_meta_box,
				'options'     => etienne_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'etienne' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'etienne' ),
				'parent'      => $post_meta_box
			)
		);

		do_action('etienne_elated_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_post_meta', 20 );
}
