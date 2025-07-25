<?php

if ( ! function_exists( 'etienne_elated_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function etienne_elated_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'etienne' ),
				'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'etienne' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltdf-widget-title-holder"><h4 class="eltdf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'etienne_elated_register_sidebars', 1 );
}

if ( ! function_exists( 'etienne_elated_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates EtienneElatedClassSidebar object
	 */
	function etienne_elated_add_support_custom_sidebar() {
		add_theme_support( 'EtienneElatedClassSidebar' );
		
		if ( get_theme_support( 'EtienneElatedClassSidebar' ) ) {
			new EtienneElatedClassSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'etienne_elated_add_support_custom_sidebar' );
}