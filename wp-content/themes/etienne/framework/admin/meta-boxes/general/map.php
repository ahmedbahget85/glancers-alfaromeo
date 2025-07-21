<?php

if ( ! function_exists( 'etienne_elated_map_general_meta' ) ) {
	function etienne_elated_map_general_meta() {
		
		$general_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'etienne_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'etienne' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'etienne' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'etienne' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'etienne' ),
				'parent'        => $general_meta_box
			)
		);
		
		$eltdf_content_padding_group = etienne_elated_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Styles', 'etienne' ),
				'description' => esc_html__( 'Define styles for Content area', 'etienne' ),
				'parent'      => $general_meta_box
			)
		);
		
			$eltdf_content_padding_row = etienne_elated_add_admin_row(
				array(
					'name'   => 'eltdf_content_padding_row',
					'parent' => $eltdf_content_padding_group
				)
			);
			
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_background_color_meta',
						'type'        => 'colorsimple',
						'label'       => esc_html__( 'Page Background Color', 'etienne' ),
						'parent'      => $eltdf_content_padding_row
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_page_background_image_meta',
						'type'          => 'imagesimple',
						'label'         => esc_html__( 'Page Background Image', 'etienne' ),
						'parent'        => $eltdf_content_padding_row
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_page_background_repeat_meta',
						'type'          => 'selectsimple',
						'default_value' => '',
						'label'         => esc_html__( 'Page Background Image Repeat', 'etienne' ),
						'options'       => etienne_elated_get_yes_no_select_array(),
						'parent'        => $eltdf_content_padding_row
					)
				);
		
			$eltdf_content_padding_row_1 = etienne_elated_add_admin_row(
				array(
					'name'   => 'eltdf_content_padding_row_1',
					'next'   => true,
					'parent' => $eltdf_content_padding_group
				)
			);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'   => 'eltdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (eg. 10px 5px 10px 5px)', 'etienne' ),
						'parent' => $eltdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'    => 'eltdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (eg. 10px 5px 10px 5px)', 'etienne' ),
						'parent'  => $eltdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'etienne' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'etienne' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'etienne' ),
                    'eltdf-grid-1400' => esc_html__( '1400px', 'etienne' ),
					'eltdf-grid-1300' => esc_html__( '1300px', 'etienne' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'etienne' ),
					'eltdf-grid-1100' => esc_html__( '1100px', 'etienne' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'etienne' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'etienne' )
				)
			)
		);

		etienne_elated_create_meta_box_field(
            array(
                'name'          => 'eltdf_background_image_marquee_meta',
                'type'          => 'image',
                'label'   => esc_html__( 'Background Image Marquee', 'etienne' ),
                'parent'        => $general_meta_box,
            )
        );

        etienne_elated_create_meta_box_field(
            array(
                'name'    => 'eltdf_content_grid_lines_meta',
                'type'    => 'select',
                'label'   => esc_html__( 'Enable grid lines in background', 'etienne' ),
                'parent'  => $general_meta_box,
                'options' => etienne_elated_get_yes_no_select_array()
            )
        );

        etienne_elated_create_meta_box_field(
            array(
                'name'          => 'eltdf_content_grid_lines_color_meta',
                'type'          => 'color',
                'description'   => esc_html__( 'Choose grid lines color. Default color is #f6f5f4', 'etienne' ),
                'parent'        => $general_meta_box,
                'dependency' => array(
                    'hide' => array(
                        'eltdf_content_grid_lines_meta' => array( '', 'no' )
                    )
                )
            )
        );
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_grid_space_meta',
				'type'        => 'select',
				'default_value' => '',
				'label'       => esc_html__( 'Grid Layout Space', 'etienne' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page', 'etienne' ),
				'options'     => etienne_elated_get_space_between_items_array( true ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		etienne_elated_create_meta_box_field(
			array(
				'name'    => 'eltdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'etienne' ),
				'parent'  => $general_meta_box,
				'options' => etienne_elated_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = etienne_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_boxed_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'etienne' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'etienne' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'etienne' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'etienne' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'etienne' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'etienne' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'etienne' ),
						'description'   => esc_html__( 'Choose background image attachment', 'etienne' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'etienne' ),
							'fixed'  => esc_html__( 'Fixed', 'etienne' ),
							'scroll' => esc_html__( 'Scroll', 'etienne' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'etienne' ),
				'parent'        => $general_meta_box,
				'options'       => etienne_elated_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = etienne_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'eltdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'etienne' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'etienne' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'etienne' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'etienne' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'etienne' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'etienne' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				etienne_elated_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'etienne' ),
						'options'       => etienne_elated_get_yes_no_select_array(),
					)
				);
		
				etienne_elated_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'etienne' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'etienne' ),
						'options'       => etienne_elated_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'etienne' ),
				'parent'        => $general_meta_box,
				'options'       => etienne_elated_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = etienne_elated_add_admin_container(
				array(
					'parent'     => $general_meta_box,
					'name'       => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'eltdf_smooth_page_transitions_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				etienne_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'etienne' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'etienne' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => etienne_elated_get_yes_no_select_array()
					)
				);
		
				$page_transition_preloader_container_meta = etienne_elated_add_admin_container(
					array(
						'parent'     => $page_transitions_container_meta,
						'name'       => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'eltdf_page_transition_preloader_meta' => array( '', 'no' )
							)
						)
					)
				);
				
					etienne_elated_create_meta_box_field(
						array(
							'name'   => 'eltdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'etienne' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = etienne_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'etienne' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'etienne' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = etienne_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					etienne_elated_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'eltdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'etienne' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'etienne' ),
								'svg'                   => esc_html__( 'SVG', 'etienne' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'etienne' ),
								'pulse'                 => esc_html__( 'Pulse', 'etienne' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'etienne' ),
								'cube'                  => esc_html__( 'Cube', 'etienne' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'etienne' ),
								'stripes'               => esc_html__( 'Stripes', 'etienne' ),
								'wave'                  => esc_html__( 'Wave', 'etienne' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'etienne' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'etienne' ),
								'atom'                  => esc_html__( 'Atom', 'etienne' ),
								'clock'                 => esc_html__( 'Clock', 'etienne' ),
								'mitosis'               => esc_html__( 'Mitosis', 'etienne' ),
								'lines'                 => esc_html__( 'Lines', 'etienne' ),
								'fussion'               => esc_html__( 'Fussion', 'etienne' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'etienne' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'etienne' )
							)
						)
					);

					etienne_elated_create_meta_box_field(
						array(
							'type'          => 'textareasimple',
							'name'          => 'eltdf_svg_html_meta',
							'label'         => esc_html__('SVG HTML (stroke-based)', 'etienne'),
							'parent'        => $row_pt_spinner_animation_meta,
							'dependency'    => array(
								'show' => array(
									'eltdf_smooth_pt_spinner_type_meta' => 'svg'
								)
							)
						)
					);
					
					etienne_elated_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'eltdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'etienne' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					etienne_elated_create_meta_box_field(
						array(
							'name'        => 'eltdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'etienne' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'etienne' ),
							'options'     => etienne_elated_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'etienne' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'etienne' ),
				'parent'      => $general_meta_box,
				'options'     => etienne_elated_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_general_meta', 10 );
}

if ( ! function_exists( 'etienne_elated_container_background_style' ) ) {
	/**
	 * Function that return container style
	 */
	function etienne_elated_container_background_style( $style ) {
		$page_id      = etienne_elated_get_page_id();
		$class_prefix = etienne_elated_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .eltdf-content'
		);
		
		$container_class        = array();
		$page_background_color  = get_post_meta( $page_id, 'eltdf_page_background_color_meta', true );
		$page_background_image  = get_post_meta( $page_id, 'eltdf_page_background_image_meta', true );
		$page_background_repeat = get_post_meta( $page_id, 'eltdf_page_background_repeat_meta', true );
		
		if ( ! empty( $page_background_color ) ) {
			$container_class['background-color'] = $page_background_color;
		}
		
		if ( ! empty( $page_background_image ) ) {
			$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			
			if ( $page_background_repeat === 'yes' ) {
				$container_class['background-repeat']   = 'repeat';
				$container_class['background-position'] = '0 0';
			} else {
				$container_class['background-repeat']   = 'no-repeat';
				$container_class['background-position'] = 'center 0';
				$container_class['background-size']     = 'cover';
			}
		}
		
		$current_style = etienne_elated_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'etienne_elated_filter_add_page_custom_style', 'etienne_elated_container_background_style' );
}

if ( ! function_exists( 'etienne_elated_container_grid_lines_style' ) ) {
    /**
     * Function that return container grid lines style
     */
    function etienne_elated_container_grid_lines_style( $style ) {
        $page_id      = etienne_elated_get_page_id();
        $class_prefix = etienne_elated_get_unique_page_class( $page_id, true );

        $grid_lines_selector = array(
            $class_prefix . ' .eltdf-grid-lines-holder .eltdf-grid-line:before'
        );

        $grid_lines_class        = array();
        $grid_lines_color  = get_post_meta( $page_id, 'eltdf_content_grid_lines_color_meta', true );

        if ( ! empty( $grid_lines_color ) ) {
            $grid_lines_class['background-color'] = $grid_lines_color;
        }

        $current_style = etienne_elated_dynamic_css( $grid_lines_selector, $grid_lines_class );
        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter( 'etienne_elated_filter_add_page_custom_style', 'etienne_elated_container_grid_lines_style' );
}