<?php

if ( ! function_exists( 'etienne_elated_sidebar_options_map' ) ) {
	function etienne_elated_sidebar_options_map() {
		
		etienne_elated_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'etienne' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = etienne_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'etienne' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		etienne_elated_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'etienne' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'etienne' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => etienne_elated_get_custom_sidebars_options()
		) );
		
		$etienne_custom_sidebars = etienne_elated_get_custom_sidebars();
		if ( count( $etienne_custom_sidebars ) > 0 ) {
			etienne_elated_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'etienne' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'etienne' ),
				'parent'      => $sidebar_panel,
				'options'     => $etienne_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'etienne_elated_action_options_map', 'etienne_elated_sidebar_options_map', etienne_elated_set_options_map_position( 'sidebar' ) );
}