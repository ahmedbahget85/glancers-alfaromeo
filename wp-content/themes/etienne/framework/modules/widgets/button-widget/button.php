<?php

class EtienneElatedClassButtonWidget extends EtienneElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_button_widget',
			esc_html__( 'Etienne Button Widget', 'etienne' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'etienne' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'etienne' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'etienne' ),
					'outline' => esc_html__( 'Outline', 'etienne' ),
					'simple'  => esc_html__( 'Simple', 'etienne' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'etienne' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'etienne' ),
					'medium' => esc_html__( 'Medium', 'etienne' ),
					'large'  => esc_html__( 'Large', 'etienne' ),
					'huge'   => esc_html__( 'Huge', 'etienne' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'etienne' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'etienne' ),
				'default' => esc_html__( 'Button Text', 'etienne' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'etienne' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'etienne' ),
				'options' => etienne_elated_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'etienne' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'etienne' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'etienne' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'etienne' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'etienne' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'etienne' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'etienne' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'etienne' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'etienne' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'etienne' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'etienne' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'etienne' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget eltdf-button-widget">';
			echo do_shortcode( "[eltdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}