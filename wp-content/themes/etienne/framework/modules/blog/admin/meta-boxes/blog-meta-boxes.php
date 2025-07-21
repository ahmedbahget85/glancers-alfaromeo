<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'etienne_elated_map_blog_meta' ) ) {
	function etienne_elated_map_blog_meta() {
		$eltdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'etienne' ),
				'name'  => 'blog_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'etienne' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'etienne' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'etienne' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'etienne' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'etienne' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'etienne' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'etienne' ),
					'standard'        => esc_html__( 'Standard', 'etienne' ),
					'load-more'       => esc_html__( 'Load More', 'etienne' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'etienne' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'etienne' )
				)
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'etienne' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'etienne' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_blog_meta', 30 );
}