<?php

if ( ! function_exists( 'etienne_elated_logo_options_map' ) ) {
	function etienne_elated_logo_options_map() {
		
		etienne_elated_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'etienne' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = etienne_elated_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'etienne' )
			)
		);
		
		$hide_logo_container = etienne_elated_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'etienne' ),
				'parent'        => $hide_logo_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'etienne' ),
				'parent'        => $hide_logo_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'etienne' ),
				'parent'        => $hide_logo_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'etienne' ),
				'parent'        => $hide_logo_container
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'etienne' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'etienne_elated_action_options_map', 'etienne_elated_logo_options_map', etienne_elated_set_options_map_position( 'logo' ) );
}