<?php

if ( ! function_exists( 'etienne_elated_include_blog_shortcodes' ) ) {
	function etienne_elated_include_blog_shortcodes() {
		foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( etienne_elated_core_plugin_installed() ) {
		add_action( 'etienne_core_action_include_shortcodes_file', 'etienne_elated_include_blog_shortcodes' );
	}
}
