<?php

if ( ! function_exists( 'etienne_elated_get_blog_list_types_options' ) ) {
	function etienne_elated_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'etienne_elated_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'etienne_elated_blog_options_map' ) ) {
	function etienne_elated_blog_options_map() {
		$blog_list_type_options = etienne_elated_get_blog_list_types_options();
		
		etienne_elated_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'etienne' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = etienne_elated_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'blog_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'etienne' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for blog post lists. Default value is large', 'etienne' ),
				'options'     => etienne_elated_get_space_between_items_array( true ),
				'parent'      => $panel_blog_lists
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'etienne' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'etienne' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'etienne' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'etienne' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => etienne_elated_get_custom_sidebars_options(),
			)
		);
		
		$etienne_custom_sidebars = etienne_elated_get_custom_sidebars();
		if ( count( $etienne_custom_sidebars ) > 0 ) {
			etienne_elated_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'etienne' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'etienne' ),
					'parent'      => $panel_blog_lists,
					'options'     => etienne_elated_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}

		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'etienne' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'etienne' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'etienne' ),
					'load-more'       => esc_html__( 'Load More', 'etienne' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'etienne' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'etienne' )
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'etienne' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'etienne' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_tags_area_blog',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Blog Tags on Standard List', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show tags on standard blog list', 'etienne' ),
				'parent'        => $panel_blog_lists
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_categories_area_blog',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Blog Categories on Standard List', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show categories on standard blog list', 'etienne' ),
				'parent'        => $panel_blog_lists
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = etienne_elated_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'blog_single_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'etienne' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for Blog Single pages. Default value is large', 'etienne' ),
				'options'     => etienne_elated_get_space_between_items_array( true ),
				'parent'      => $panel_blog_single
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'etienne' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'etienne' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => etienne_elated_get_custom_sidebars_options()
			)
		);
		
		if ( count( $etienne_custom_sidebars ) > 0 ) {
			etienne_elated_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'etienne' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'etienne' ),
					'parent'      => $panel_blog_single,
					'options'     => etienne_elated_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'etienne' ),
				'parent'        => $panel_blog_single,
				'options'       => etienne_elated_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'etienne' ),
				'parent'        => $panel_blog_single,
				'dependency' => array(
					'hide' => array(
						'show_title_area_blog' => 'no'
					)
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'etienne' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'etienne' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'etienne' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'etienne' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = etienne_elated_add_admin_container(
			array(
				'name'            => 'eltdf_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'etienne' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'etienne' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages. Author biographic info field in Users section must contain some data', 'etienne' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = etienne_elated_add_admin_container(
			array(
				'name'            => 'eltdf_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'etienne' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'etienne' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'etienne_elated_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'etienne_elated_action_options_map', 'etienne_elated_blog_options_map', etienne_elated_set_options_map_position( 'blog' ) );
}