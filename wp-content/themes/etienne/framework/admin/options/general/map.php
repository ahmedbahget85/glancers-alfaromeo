<?php

if ( ! function_exists( 'etienne_elated_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function etienne_elated_general_options_map() {
		
		etienne_elated_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'etienne' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = etienne_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'etienne' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'etienne' ),
				'parent'        => $panel_design_style
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'etienne' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = etienne_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'etienne' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'etienne' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'etienne' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'etienne' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'etienne' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'etienne' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'etienne' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'etienne' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'etienne' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'etienne' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'etienne' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'etienne' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'etienne' ),
					'100i' => esc_html__( '100 Thin Italic', 'etienne' ),
					'200'  => esc_html__( '200 Extra-Light', 'etienne' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'etienne' ),
					'300'  => esc_html__( '300 Light', 'etienne' ),
					'300i' => esc_html__( '300 Light Italic', 'etienne' ),
					'400'  => esc_html__( '400 Regular', 'etienne' ),
					'400i' => esc_html__( '400 Regular Italic', 'etienne' ),
					'500'  => esc_html__( '500 Medium', 'etienne' ),
					'500i' => esc_html__( '500 Medium Italic', 'etienne' ),
					'600'  => esc_html__( '600 Semi-Bold', 'etienne' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'etienne' ),
					'700'  => esc_html__( '700 Bold', 'etienne' ),
					'700i' => esc_html__( '700 Bold Italic', 'etienne' ),
					'800'  => esc_html__( '800 Extra-Bold', 'etienne' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'etienne' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'etienne' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'etienne' )
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'etienne' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'etienne' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'etienne' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'etienne' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'etienne' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'etienne' ),
					'greek'        => esc_html__( 'Greek', 'etienne' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'etienne' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'etienne' )
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'etienne' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'etienne' ),
				'parent'      => $panel_design_style
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'etienne' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'etienne' ),
				'parent'      => $panel_design_style
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'page_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Page Background Image', 'etienne' ),
				'description' => esc_html__( 'Choose the background image for page content', 'etienne' ),
				'parent'      => $panel_design_style
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'page_background_image_repeat',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Page Background Image Repeat', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will set the background image as a repeating pattern throughout the page, otherwise the image will appear as the cover background image', 'etienne' ),
				'parent'        => $panel_design_style
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'etienne' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'etienne' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'etienne' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = etienne_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				etienne_elated_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'etienne' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'etienne' ),
						'parent'      => $boxed_container
					)
				);
				
				etienne_elated_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'etienne' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'etienne' ),
						'parent'      => $boxed_container
					)
				);
				
				etienne_elated_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'etienne' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'etienne' ),
						'parent'      => $boxed_container
					)
				);
				
				etienne_elated_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'etienne' ),
						'description'   => esc_html__( 'Choose background image attachment', 'etienne' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'etienne' ),
							'fixed'  => esc_html__( 'Fixed', 'etienne' ),
							'scroll' => esc_html__( 'Scroll', 'etienne' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'etienne' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = etienne_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				etienne_elated_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'etienne' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'etienne' ),
						'parent'      => $paspartu_container
					)
				);
				
				etienne_elated_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'etienne' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'etienne' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				etienne_elated_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'etienne' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'etienne' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				etienne_elated_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'etienne' )
					)
				);
		
				etienne_elated_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'etienne' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'etienne' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'etienne' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'etienne' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltdf-grid-1100' => esc_html__( '1100px - default', 'etienne' ),
                    'eltdf-grid-1400' => esc_html__( '1400px', 'etienne' ),
					'eltdf-grid-1300' => esc_html__( '1300px', 'etienne' ),
					'eltdf-grid-1200' => esc_html__( '1200px', 'etienne' ),
					'eltdf-grid-1000' => esc_html__( '1000px', 'etienne' ),
					'eltdf-grid-800'  => esc_html__( '800px', 'etienne' )
				)
			)
		);

        etienne_elated_add_admin_field(
            array(
                'name'          => 'content_grid_lines',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Enable grid lines in background', 'etienne' ),
                'parent'        => $panel_design_style
            )
        );

        etienne_elated_add_admin_field(
            array(
                'name'          => 'content_grid_lines_color',
                'type'          => 'color',
                'description'   => esc_html__( 'Choose grid lines color. Default color is #f6f5f4', 'etienne' ),
                'parent'        => $panel_design_style,
                'dependency' => array(
                    'show' => array(
                        'content_grid_lines'  => 'yes'
                    )
                )
            )
        );
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'etienne' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'etienne' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = etienne_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'etienne' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'etienne' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'etienne' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = etienne_elated_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				etienne_elated_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'etienne' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'etienne' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = etienne_elated_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
				
					etienne_elated_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'etienne' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = etienne_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'etienne' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'etienne' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = etienne_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					etienne_elated_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'etienne' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'svg'        			=> esc_html__( 'SVG', 'etienne' ),
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

					etienne_elated_add_admin_field(
						array(
							'type'          => 'textareasimple',
							'name'          => 'svg_html',
							'label'         => esc_html__('SVG HTML (stroke-based)', 'etienne'),
							'parent'        => $row_pt_spinner_animation,
							'dependency'    => array(
								'show' => array(
									'smooth_pt_spinner_type' => 'svg'
								)
							)
						)
					);
					
					etienne_elated_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'etienne' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					etienne_elated_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'etienne' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'etienne' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'etienne' ),
				'parent'        => $panel_settings
			)
		);

        $additional_back_button_container = etienne_elated_add_admin_container(
            array(
                'parent'          => $panel_settings,
                'name'            => 'additional_back_button_container',
                'dependency' => array(
                    'show' => array(
                        'show_back_button'  => 'yes'
                    )
                )
            )
        );

        etienne_elated_add_admin_field(
            array(
                'type'          => 'color',
                'name'          => 'back_button_bg_color',
                'default_value' => '',
                'label'         => esc_html__( 'Back To Top background color', 'etienne' ),
                'parent'        => $additional_back_button_container
            )
        );

        etienne_elated_add_admin_field(
            array(
                'type'          => 'color',
                'name'          => 'back_button_bg_hover_color',
                'default_value' => '',
                'label'         => esc_html__( 'Back To Top background hover color', 'etienne' ),
                'parent'        => $additional_back_button_container
            )
        );
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'etienne' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = etienne_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'etienne' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'etienne' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = etienne_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'etienne' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'etienne' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'etienne_elated_action_options_map', 'etienne_elated_general_options_map', etienne_elated_set_options_map_position( 'general' ) );
}

if ( ! function_exists( 'etienne_elated_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function etienne_elated_page_general_style( $style ) {
		$current_style = '';
		$page_id       = etienne_elated_get_page_id();
		$class_prefix  = etienne_elated_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = etienne_elated_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = etienne_elated_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = etienne_elated_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = etienne_elated_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltdf-boxed .eltdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= etienne_elated_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.eltdf-paspartu-enabled .eltdf-page-header .eltdf-fixed-wrapper.fixed',
			'.eltdf-paspartu-enabled .eltdf-sticky-header',
			'.eltdf-paspartu-enabled .eltdf-mobile-header.mobile-header-appear .eltdf-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.eltdf-paspartu-enabled.eltdf-fixed-paspartu-enabled .eltdf-page-header .eltdf-fixed-wrapper.fixed',
			'.eltdf-paspartu-enabled.eltdf-fixed-paspartu-enabled .eltdf-sticky-header.header-appear',
			'.eltdf-paspartu-enabled.eltdf-fixed-paspartu-enabled .eltdf-mobile-header.mobile-header-appear .eltdf-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = etienne_elated_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = etienne_elated_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( etienne_elated_string_ends_with( $paspartu_width, '%' ) || etienne_elated_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = etienne_elated_string_ends_with( $paspartu_width, '%' ) ? etienne_elated_filter_suffix( $paspartu_width, '%' ) : etienne_elated_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = etienne_elated_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.eltdf-paspartu-enabled .eltdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= etienne_elated_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= etienne_elated_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= etienne_elated_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = etienne_elated_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( etienne_elated_string_ends_with( $paspartu_responsive_width, '%' ) || etienne_elated_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = etienne_elated_string_ends_with( $paspartu_responsive_width, '%' ) ? etienne_elated_filter_suffix( $paspartu_responsive_width, '%' ) : etienne_elated_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = etienne_elated_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . etienne_elated_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . etienne_elated_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . etienne_elated_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'etienne_elated_filter_add_page_custom_style', 'etienne_elated_page_general_style' );
}