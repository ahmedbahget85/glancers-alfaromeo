<?php

if ( ! function_exists( 'etienne_elated_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function etienne_elated_reset_options_map() {
		
		etienne_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'etienne' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = etienne_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'etienne' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'etienne' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'etienne_elated_action_options_map', 'etienne_elated_reset_options_map', etienne_elated_set_options_map_position( 'reset' ) );
}