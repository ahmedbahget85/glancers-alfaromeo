<?php

if ( ! function_exists( 'etienne_elated_footer_options_map' ) ) {
	function etienne_elated_footer_options_map() {

		etienne_elated_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'etienne' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = etienne_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'etienne' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'etienne' ),
				'parent'        => $footer_panel
			)
		);

        etienne_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'etienne' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'etienne' ),
                'parent'        => $footer_panel
            )
        );

		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'etienne' ),
				'parent'        => $footer_panel
			)
		);
		
		$show_footer_top_container = etienne_elated_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'etienne' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'etienne' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'etienne' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'etienne' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'etienne' ),
					'left'   => esc_html__( 'Left', 'etienne' ),
					'center' => esc_html__( 'Center', 'etienne' ),
					'right'  => esc_html__( 'Right', 'etienne' )
				),
				'parent'        => $show_footer_top_container
			)
		);
		
		$footer_top_styles_group = etienne_elated_add_admin_group(
			array(
				'name'        => 'footer_top_styles_group',
				'title'       => esc_html__( 'Footer Top Styles', 'etienne' ),
				'description' => esc_html__( 'Define style for footer top area', 'etienne' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		$footer_top_styles_row_1 = etienne_elated_add_admin_row(
			array(
				'name'   => 'footer_top_styles_row_1',
				'parent' => $footer_top_styles_group
			)
		);
		
			etienne_elated_add_admin_field(
				array(
					'name'   => 'footer_top_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'etienne' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			etienne_elated_add_admin_field(
				array(
					'name'   => 'footer_top_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'etienne' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			etienne_elated_add_admin_field(
				array(
					'name'   => 'footer_top_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'etienne' ),
					'parent' => $footer_top_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);

		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'etienne' ),
				'parent'        => $footer_panel
			)
		);

		$show_footer_bottom_container = etienne_elated_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'etienne' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'etienne' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container
			)
		);

        etienne_elated_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_bottom_columns_alignment',
                'default_value' => 'left',
                'label'         => esc_html__( 'Footer Bottom Columns Alignment', 'etienne' ),
                'description'   => esc_html__( 'Text Alignment in Footer Columns', 'etienne' ),
                'options'       => array(
                    ''       => esc_html__( 'Default', 'etienne' ),
                    'left'   => esc_html__( 'Left', 'etienne' ),
                    'center' => esc_html__( 'Center', 'etienne' ),
                    'right'  => esc_html__( 'Right', 'etienne' )
                ),
                'parent'        => $show_footer_bottom_container
            )
        );
		
		$footer_bottom_styles_group = etienne_elated_add_admin_group(
			array(
				'name'        => 'footer_bottom_styles_group',
				'title'       => esc_html__( 'Footer Bottom Styles', 'etienne' ),
				'description' => esc_html__( 'Define style for footer bottom area', 'etienne' ),
				'parent'      => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_row_1 = etienne_elated_add_admin_row(
			array(
				'name'   => 'footer_bottom_styles_row_1',
				'parent' => $footer_bottom_styles_group
			)
		);
		
			etienne_elated_add_admin_field(
				array(
					'name'   => 'footer_bottom_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'etienne' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			etienne_elated_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'etienne' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			etienne_elated_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'etienne' ),
					'parent' => $footer_bottom_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);
	}

	add_action( 'etienne_elated_action_options_map', 'etienne_elated_footer_options_map', etienne_elated_set_options_map_position( 'footer' ) );
}