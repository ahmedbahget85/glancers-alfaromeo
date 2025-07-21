<?php

if ( ! function_exists( 'etienne_elated_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function etienne_elated_woocommerce_options_map() {
		
		etienne_elated_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'etienne' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = etienne_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'name'        => 'woo_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'etienne' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for main shop page', 'etienne' ),
				'options'     => etienne_elated_get_space_between_items_array( true ),
				'parent'      => $panel_product_list
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'etienne' ),
				'default_value' => 'eltdf-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'etienne' ),
				'options'       => array(
					'eltdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'etienne' ),
					'eltdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'etienne' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'etienne' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'etienne' ),
				'default_value' => 'normal',
				'options'       => etienne_elated_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'etienne' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'etienne' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'etienne' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'etienne' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'etienne' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'etienne' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'etienne' ),
				'default_value' => 'h4',
				'options'       => etienne_elated_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'woo_enable_percent_sign_value',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Percent Sign', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show percent value mark instead of sale label on products', 'etienne' ),
				'parent'        => $panel_product_list
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = etienne_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'etienne' )
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'etienne' ),
				'parent'        => $panel_single_product,
				'options'       => etienne_elated_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_single_product_title_tag',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'etienne' ),
				'options'       => etienne_elated_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'etienne' ),
				'options'       => array(
                    '5' => esc_html__( 'Five', 'etienne' ),
					'4' => esc_html__( 'Four', 'etienne' ),
					'3' => esc_html__( 'Three', 'etienne' ),
					'2' => esc_html__( 'Two', 'etienne' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'on-left-side',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'etienne' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'etienne' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'etienne' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'etienne' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'etienne' ),
				'parent'        => $panel_single_product,
				'options'       => etienne_elated_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'etienne' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'etienne' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'etienne' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		etienne_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'etienne' ),
				'default_value' => 'eltdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'etienne' ),
				'options'       => array(
					'eltdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'etienne' ),
					'eltdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'etienne' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('etienne_elated_woocommerce_additional_options_map');
	}
	
	add_action( 'etienne_elated_action_options_map', 'etienne_elated_woocommerce_options_map', etienne_elated_set_options_map_position( 'woocommerce' ) );
}