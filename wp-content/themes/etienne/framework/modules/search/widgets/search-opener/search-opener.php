<?php

class EtienneElatedClassSearchOpener extends EtienneElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_search_opener',
			esc_html__( 'Etienne Search Opener', 'etienne' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'etienne' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {

		$search_icon_params = array(
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_color',
				'title'       => esc_html__( 'Icon Color', 'etienne' ),
				'description' => esc_html__( 'Define color for search icon', 'etienne' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_hover_color',
				'title'       => esc_html__( 'Icon Hover Color', 'etienne' ),
				'description' => esc_html__( 'Define hover color for search icon', 'etienne' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'etienne' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'etienne' )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'show_label',
				'title'       => esc_html__( 'Enable Search Icon Text', 'etienne' ),
				'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'etienne' ),
				'options'     => etienne_elated_get_yes_no_select_array()
			)
		);

		$search_icon_pack_params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_size',
				'title'       => esc_html__( 'Icon Size (px)', 'etienne' ),
				'description' => esc_html__( 'Define size for search icon', 'etienne' )
			)
		);

		if ( etienne_elated_options()->getOptionValue( 'search_icon_pack' ) == 'icon_pack' ) {
			$this->params = array_merge( $search_icon_pack_params, $search_icon_params );
		} else {
			$this->params = $search_icon_params;
		}

	}
	
	public function widget( $args, $instance ) {
		$enable_search_icon_text = etienne_elated_options()->getOptionValue( 'enable_search_icon_text' );
		
		$classes = array(
			'eltdf-search-opener',
			'eltdf-icon-has-hover'
		);
		
		$classes[] = etienne_elated_get_icon_sources_class( 'search', 'eltdf-search-opener' );
		
		$styles           = array();
		$show_search_text = $instance['show_label'] == 'yes' || $enable_search_icon_text == 'yes' ? true : false;
		
		if ( ! empty( $instance['search_icon_size'] ) ) {
			$styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
		}
		
		if ( ! empty( $instance['search_icon_color'] ) ) {
			$styles[] = 'color: ' . $instance['search_icon_color'] . ';';
		}
		
		if ( ! empty( $instance['search_icon_margin'] ) ) {
			$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
		}
		?>
		
		<a <?php etienne_elated_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php etienne_elated_inline_style( $styles ); ?> <?php etienne_elated_class_attribute( $classes ); ?> href="javascript:void(0)">
            <span class="eltdf-search-opener-wrapper">
	            <?php echo etienne_elated_get_icon_sources_html( 'search', false, array( 'search' => 'yes' ) ); ?>
	            <?php if ( $show_search_text ) { ?>
		            <span class="eltdf-search-icon-text"><?php esc_html_e( 'Search', 'etienne' ); ?></span>
	            <?php } ?>
            </span>
		</a>
	<?php }
}