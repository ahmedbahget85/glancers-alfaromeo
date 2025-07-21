<?php

if ( ! function_exists( 'etienne_elated_map_woocommerce_meta' ) ) {
	function etienne_elated_map_woocommerce_meta() {
		
		$woocommerce_meta_box = etienne_elated_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'etienne' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'etienne' ),
				'description' => esc_html__( 'Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'etienne' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'etienne' ),
					'small'              => esc_html__( 'Small', 'etienne' ),
					'large-width'        => esc_html__( 'Large Width', 'etienne' ),
					'large-height'       => esc_html__( 'Large Height', 'etienne' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'etienne' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'etienne' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'etienne' ),
				'options'       => etienne_elated_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		etienne_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'etienne' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'etienne_elated_action_meta_boxes_map', 'etienne_elated_map_woocommerce_meta', 99 );
}