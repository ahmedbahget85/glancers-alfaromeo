<?php

namespace EtienneCore\CPT\Shortcodes\ProductList;

use EtienneCore\Lib;

class ProductList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_product_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Product List', 'etienne' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list extended-custom-icon',
					'category'                  => esc_html__( 'by ETIENNE', 'etienne' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'etienne' ),
							'value'       => array(
								esc_html__( 'Standard', 'etienne' ) => 'standard',
								esc_html__( 'Masonry', 'etienne' )  => 'masonry'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Product Info Position', 'etienne' ),
							'value'       => array(
								esc_html__( 'Info On Image Hover', 'etienne' ) => 'info-on-image',
								esc_html__( 'Info Below Image', 'etienne' )    => 'info-below-image'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'etienne' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'etienne' ),
							'value'       => array_flip( etienne_elated_get_number_of_columns_array( true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'etienne' ),
							'value'       => array_flip( etienne_elated_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'etienne' ),
							'value'       => array_flip( etienne_elated_get_query_order_by_array( false, array( 'on-sale' => esc_html__( 'On Sale', 'etienne' ) ) ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'etienne' ),
							'value'       => array_flip( etienne_elated_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'etienne' ),
							'value'       => array(
								esc_html__( 'Category', 'etienne' ) => 'category',
								esc_html__( 'Tag', 'etienne' )      => 'tag',
								esc_html__( 'Id', 'etienne' )       => 'id'
							),
							'save_always' => true,
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'etienne' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'etienne' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_size',
							'heading'    => esc_html__( 'Image Proportions', 'etienne' ),
							'value'      => array(
								esc_html__( 'Default', 'etienne' )        => '',
								esc_html__( 'Original', 'etienne' )       => 'full',
								esc_html__( 'Square', 'etienne' )         => 'square',
								esc_html__( 'Landscape', 'etienne' )      => 'landscape',
								esc_html__( 'Portrait', 'etienne' )       => 'portrait',
								esc_html__( 'Medium', 'etienne' )         => 'medium',
								esc_html__( 'Large', 'etienne' )          => 'large',
								esc_html__( 'Shop Single', 'etienne' )    => 'woocommerce_single',
								esc_html__( 'Shop Thumbnail', 'etienne' ) => 'woocommerce_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'product_info_skin',
							'heading'    => esc_html__( 'Product Info Skin', 'etienne' ),
							'value'      => array(
								esc_html__( 'Default', 'etienne' ) => 'default',
								esc_html__( 'Light', 'etienne' )   => 'light',
								esc_html__( 'Dark', 'etienne' )    => 'dark'
							),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-on-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'etienne' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'etienne' ),
							'description' => esc_html__( 'Number of characters', 'etienne' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_yes_no_select_array( false, false ) ),
							'group'      => esc_html__( 'Product Info', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'etienne' ),
							'value'      => array_flip( etienne_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'etienne' ),
							'value'      => array(
								esc_html__( 'Default', 'etienne' ) => 'default',
								esc_html__( 'Light', 'etienne' )   => 'light',
								esc_html__( 'Dark', 'etienne' )    => 'dark'
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'etienne' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'etienne' ),
							'group'      => esc_html__( 'Product Info Style', 'etienne' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading'    => esc_html__( 'Product Info Text Alignment', 'etienne' ),
							'value'      => array(
								esc_html__( 'Default', 'etienne' ) => '',
								esc_html__( 'Left', 'etienne' )    => 'left',
								esc_html__( 'Center', 'etienne' )  => 'center',
								esc_html__( 'Right', 'etienne' )   => 'right'
							),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'etienne' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'info_bottom_margin',
							'heading'    => esc_html__( 'Product Info Bottom Margin (px)', 'etienne' ),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'etienne' )
						),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'enable_loading_animation',
                            'heading'     => esc_html__( 'Enable Loading Animation', 'etienne' ),
                            'value'       => array_flip( etienne_elated_get_yes_no_select_array( false ) ),
                            'description' => esc_html__( 'Enabling this option you will toggle loading animation on each shop list item.', 'etienne' ),
                            'group'       => esc_html__( 'Additional Features', 'etienne' )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'animation_type',
                            'heading'    => esc_html__( 'Animation Type', 'etienne' ),
                            'value'      => array(
                                esc_html__( 'Upwards', 'etienne' )  => 'upwards',
                                esc_html__( 'Randomize', 'etienne' )  => 'randomize',
                            ),
                            'dependency' => array( 'element' => 'enable_loading_animation', 'value' => array( 'yes' ) ),
                            'group'      => esc_html__( 'Additional Features', 'etienne' )
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                    => 'standard',
			'info_position'           => 'info-below-image',
			'number_of_posts'         => '8',
			'number_of_columns'       => 'four',
			'space_between_items'     => 'normal',
			'orderby'                 => 'date',
			'order'                   => 'ASC',
			'taxonomy_to_display'     => 'category',
			'taxonomy_values'         => '',
			'image_size'              => 'full',
			'display_title'           => 'yes',
			'product_info_skin'       => '',
			'title_tag'               => 'h4',
			'title_transform'         => '',
			'display_category'        => 'yes',
			'display_excerpt'         => 'no',
			'excerpt_length'          => '20',
			'display_rating'          => 'no',
			'display_price'           => 'yes',
			'display_button'          => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align'  => '',
			'info_bottom_margin'      => '',
            'enable_loading_animation'=> 'no',
            'animation_type'		  => 'upwards'
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['class_name']     = 'pli';
		$params['type']           = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['info_position']  = ! empty( $params['info_position'] ) ? $params['info_position'] : $default_atts['info_position'];
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = etienne_elated_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'eltdf-' . $params['type'] . '-layout' : 'eltdf-' . $default_atts['type'] . '-layout';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'eltdf-' . $params['number_of_columns'] . '-columns' : 'eltdf-' . $default_atts['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'eltdf-' . $params['space_between_items'] . '-space' : 'eltdf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'eltdf-' . $params['info_position'] : 'eltdf-' . $default_atts['info_position'];
		$holderClasses[] = ! empty( $params['product_info_skin'] ) ? 'eltdf-product-info-' . $params['product_info_skin'] : '';
        $holderClasses[] = $params['enable_loading_animation'] === 'yes' ? 'eltdf-pl-has-animation' : '';
        $holderClasses[] = !empty($params['animation_type']) ? 'eltdf-pl-animation-' . $params['animation_type'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
            $queryArray['orderby'] = 'post__in';
			$queryArray['post__in'] = $ids;
		}
		
		return $queryArray;
	}
	
	public function getItemClasses( $params ) {
		$itemClasses = array();
		
		$image_size_meta = get_post_meta( get_the_ID(), 'eltdf_product_featured_image_size', true );
		
		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = 'eltdf-fixed-masonry-item eltdf-masonry-size-' . $image_size_meta;
		}
		
		return implode( ' ', $itemClasses );
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getShaderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getTextWrapperStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}
		
		if ( $params['info_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . etienne_elated_filter_px( $params['info_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}