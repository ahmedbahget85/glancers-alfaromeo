<?php
if(!function_exists('etienne_elated_add_product_categories_shortcode')) {
	function etienne_elated_add_product_categories_shortcode($shortcodes_class_name) {
		$shortcodes = array(
			'EtienneCore\CPT\Shortcodes\ProductCategories\ProductCategories'
		);

		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

		return $shortcodes_class_name;
	}

	if(etienne_elated_core_plugin_installed()) {
		add_filter('etienne_core_filter_add_vc_shortcode', 'etienne_elated_add_product_categories_shortcode');
	}
}


if ( ! function_exists( 'etienne_elated_add_product_categories_shortcodes_list' ) ) {
    function etienne_elated_add_product_categories_shortcodes_list( $woocommerce_shortcodes ) {
        $woocommerce_shortcodes[] = 'eltdf_product_categories';

        return $woocommerce_shortcodes;
    }

    add_filter( 'etienne_elated_filter_woocommerce_shortcodes_list', 'etienne_elated_add_product_categories_shortcodes_list' );
}