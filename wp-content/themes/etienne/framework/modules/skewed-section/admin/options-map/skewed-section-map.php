<?php

if ( ! function_exists( 'etienne_elated_skewed_section_options_map' ) ) {
	function etienne_elated_skewed_section_options_map() {
		
		etienne_elated_add_admin_page(
			array(
				'slug'  => '_skewed_section_page',
				'title' => esc_html__( 'Skewed Section', 'etienne' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$skewed_section_panel = etienne_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Skewed Section', 'etienne' ),
				'name'  => 'skewed_section',
				'page'  => '_skewed_section_page'
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'      => $skewed_section_panel,
				'type'        => 'textarea',
				'name'        => 'skewed_section_general_svg_path',
				'label'       => esc_html__( 'Skewed Section SVG', 'etienne' ),
				'description' => esc_html__( 'Enter your Skewed Section SVG here. Please remove version and id attributes from your SVG because of HTML validation', 'etienne' ),
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'      => $skewed_section_panel,
				'type'        => 'textarea',
				'name'        => 'skewed_section_row_top_svg_path',
				'label'       => esc_html__( 'Skewed Section On Row Top Edge SVG', 'etienne' ),
				'description' => esc_html__( 'Enter your Skewed Section SVG here. Please remove version and id attributes from your SVG because of HTML validation', 'etienne' ),
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'      => $skewed_section_panel,
				'type'        => 'textarea',
				'name'        => 'skewed_section_row_bottom_svg_path',
				'label'       => esc_html__( 'Skewed Section On Row Bottom Edge SVG', 'etienne' ),
				'description' => esc_html__( 'Enter your Skewed Section Bottom SVG here. Please remove version and id attributes from your SVG because of HTML validation', 'etienne' ),
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'disable_skewed_section_on_mobile',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Skewed Section On Row on Mobile Devices', 'etienne' ),
				'description'   => esc_html__( 'This option will disable Row Skew Section on Mobile Devices', 'etienne' ),
				'parent'        => $skewed_section_panel
			)
		);
	}
	
	add_action( 'etienne_elated_action_options_map', 'etienne_elated_skewed_section_options_map', etienne_elated_set_options_map_position( 'skewed-section' ) );
}

if ( ! function_exists( 'etienne_elated_skewed_section_title_options_map' ) ) {
	function etienne_elated_skewed_section_title_options_map( $show_title_area_container ) {
		
		etienne_elated_add_admin_section_title(
			array(
				'parent' => $show_title_area_container,
				'name'   => 'skewed_section_container',
				'title'  => esc_html__( 'Skewed Section', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'enable_skewed_section_on_title_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Skewed Section', 'etienne' ),
				'description'   => esc_html__( 'This option will enable/disable Skew Section on Title Area', 'etienne' ),
				'parent'        => $show_title_area_container
			)
		);
		
		$show_skewed_section_title_area_container = etienne_elated_add_admin_container(
			array(
				'parent'     => $show_title_area_container,
				'name'       => 'show_skewed_section_title_area_container',
				'dependency' => array(
					'show' => array(
						'enable_skewed_section_on_title_area' => 'yes'
					)
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'title_area_skewed_section_type',
				'type'          => 'select',
				'default_value' => 'outline',
				'label'         => esc_html__( 'Position', 'etienne' ),
				'description'   => esc_html__( 'Specify skewed section position', 'etienne' ),
				'parent'        => $show_skewed_section_title_area_container,
				'options'       => array(
					'outline' => esc_html__( 'Outline', 'etienne' ),
					'inset'   => esc_html__( 'Inset', 'etienne' )
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'      => $show_skewed_section_title_area_container,
				'type'        => 'textarea',
				'name'        => 'title_area_skewed_section_svg_path',
				'label'       => esc_html__( 'Skewed Section On Title Area SVG', 'etienne' ),
				'description' => esc_html__( 'Enter your Section On Title Area SVG here. Please remove version and id attributes from your SVG because of HTML validation', 'etienne' ),
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'      => $show_skewed_section_title_area_container,
				'type'        => 'color',
				'name'        => 'title_area_skewed_section_svg_color',
				'label'       => esc_html__( 'Skewed Section Color', 'etienne' ),
				'description' => esc_html__( 'Choose a background color for Skewed Section', 'etienne' ),
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'disable_title_skewed_section_on_mobile',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Title Skewed Section on Mobile Devices', 'etienne' ),
				'description'   => esc_html__( 'This option will disable Title Skew Section on Mobile Devices', 'etienne' ),
				'parent'        => $show_skewed_section_title_area_container
			)
		);
	}
	
	add_action( 'etienne_elated_action_additional_title_area_options_map', 'etienne_elated_skewed_section_title_options_map', 10, 1 );
}

if ( ! function_exists( 'etienne_elated_skewed_section_header_options_map' ) ) {
	function etienne_elated_skewed_section_header_options_map( $show_header_area_container ) {
		
		etienne_elated_add_admin_section_title(
			array(
				'parent' => $show_header_area_container,
				'name'   => 'skewed_section_container',
				'title'  => esc_html__( 'Skewed Section', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'enable_skewed_section_on_header_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Skewed Section', 'etienne' ),
				'description'   => esc_html__( 'This option will enable/disable Skew Section on Header Area', 'etienne' ),
				'parent'        => $show_header_area_container
			)
		);
		
		$show_skewed_section_header_area_container = etienne_elated_add_admin_container(
			array(
				'parent'     => $show_header_area_container,
				'name'       => 'show_skewed_section_header_area_container',
				'dependency' => array(
					'show' => array(
						'enable_skewed_section_on_header_area' => 'yes'
					)
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'      => $show_skewed_section_header_area_container,
				'type'        => 'textarea',
				'name'        => 'header_area_skewed_section_svg_path',
				'label'       => esc_html__( 'Skewed Section On Header Area SVG', 'etienne' ),
				'description' => esc_html__( 'Enter your Section On Header Area SVG here. Please remove version and id attributes from your SVG because of HTML validation', 'etienne' ),
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'      => $show_skewed_section_header_area_container,
				'type'        => 'color',
				'name'        => 'header_area_skewed_section_svg_color',
				'label'       => esc_html__( 'Skewed Section Color', 'etienne' ),
				'description' => esc_html__( 'Choose a background color for Skewed Section', 'etienne' ),
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'disable_header_skewed_section_on_mobile',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Skewed Section on Touch Devices', 'etienne' ),
				'description'   => esc_html__( 'This option will disable Header Skew Section on Touch Devices', 'etienne' ),
				'parent'        => $show_skewed_section_header_area_container
			)
		);
	}
	
	add_action( 'etienne_elated_action_header_additional_options_map', 'etienne_elated_skewed_section_header_options_map', 10, 1 );
}