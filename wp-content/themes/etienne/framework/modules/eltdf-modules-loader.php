<?php

if ( ! function_exists( 'etienne_elated_load_widget_class' ) ) {
    /**
     * Loades widget class file.
     */
    function etienne_elated_load_widget_class() {
        include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/lib/widget-class.php';
    }

    add_action( 'etienne_elated_action_before_options_map', 'etienne_elated_load_widget_class' );
}

if ( ! function_exists( 'etienne_elated_load_modules' ) ) {
	/**
	 * Loades all modules by going through all folders that are placed directly in modules folder
	 * and loads load.php file in each. Hooks to etienne_elated_action_after_options_map action
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */
	function etienne_elated_load_modules() {
		foreach ( glob( ELATED_FRAMEWORK_ROOT_DIR . '/modules/*/load.php' ) as $module_load ) {
			include_once $module_load;
		}
	}
	
	add_action( 'etienne_elated_action_before_options_map', 'etienne_elated_load_modules' );
}

if ( ! function_exists( 'etienne_elated_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to etienne_elated_action_after_options_map action
	 */
	function etienne_elated_load_widgets() {
		
		foreach ( glob( ELATED_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
			include_once $widget_load;
		}
		
		include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/lib/widget-loader.php';
	}
	
	add_action( 'etienne_elated_action_before_options_map', 'etienne_elated_load_widgets' );
}