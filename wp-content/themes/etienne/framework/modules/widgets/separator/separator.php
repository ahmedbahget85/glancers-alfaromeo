<?php

class EtienneElatedClassSeparatorWidget extends EtienneElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_separator_widget',
			esc_html__( 'Etienne Separator Widget', 'etienne' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'etienne' ) )
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
					'normal'     => esc_html__( 'Normal', 'etienne' ),
					'full-width' => esc_html__( 'Full Width', 'etienne' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'etienne' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'etienne' ),
					'left'   => esc_html__( 'Left', 'etienne' ),
					'right'  => esc_html__( 'Right', 'etienne' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'etienne' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'etienne' ),
					'dashed' => esc_html__( 'Dashed', 'etienne' ),
					'dotted' => esc_html__( 'Dotted', 'etienne' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'etienne' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'etienne' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'etienne' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'etienne' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'etienne' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget eltdf-separator-widget">';
			echo do_shortcode( "[eltdf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}