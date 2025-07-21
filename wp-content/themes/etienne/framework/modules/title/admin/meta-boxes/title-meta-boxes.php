<?php

if ( ! function_exists( 'etienne_elated_get_title_types_meta_boxes' ) ) {
	function etienne_elated_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'etienne_elated_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'etienne' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'etienne_elated_map_title_meta' ) ) {
	function etienne_elated_map_title_meta() {
		$title_type_meta_boxes = etienne_elated_get_title_types_meta_boxes();
		
		$title_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'etienne_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'etienne' ),
				'name'  => 'title_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'etienne' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'etienne' ),
				'parent'        => $title_meta_box,
				'options'       => etienne_elated_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = etienne_elated_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'eltdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'eltdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'etienne' ),
						'description'   => esc_html__( 'Choose title type', 'etienne' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'etienne' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'etienne' ),
						'options'       => etienne_elated_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'etienne' ),
						'description' => esc_html__( 'Set a height for Title Area', 'etienne' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'etienne' ),
						'description' => esc_html__( 'Choose a background color for title area', 'etienne' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'etienne' ),
						'description' => esc_html__( 'Choose an Image for title area', 'etienne' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'etienne' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'etienne' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'etienne' ),
							'hide'                => esc_html__( 'Hide Image', 'etienne' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'etienne' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'etienne' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'etienne' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'etienne' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'etienne' )
						)
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'etienne' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'etienne' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'etienne' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'etienne' ),
							'window-top'    => esc_html__( 'From Window Top', 'etienne' )
						)
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'etienne' ),
						'options'       => etienne_elated_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'etienne' ),
						'description' => esc_html__( 'Choose a color for title text', 'etienne' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'etienne' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'etienne' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'etienne' ),
						'options'       => etienne_elated_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'etienne' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'etienne' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'etienne_elated_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_title_meta', 60 );
}