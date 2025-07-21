<?php

class EtienneElatedClassAuthorInfoWidget extends EtienneElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_author_info_widget',
			esc_html__( 'Etienne Author Info Widget', 'etienne' ),
			array( 'description' => esc_html__( 'Add author info element to widget areas', 'etienne' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Custom CSS Class', 'etienne' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_bottom_margin',
				'title' => esc_html__( 'Widget Bottom Margin (px)', 'etienne' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'author_username',
				'title' => esc_html__( 'Author Username', 'etienne' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		extract( $args );
		
		$extra_class = '';
		if ( ! empty( $instance['extra_class'] ) ) {
			$extra_class = $instance['extra_class'];
		}
		
		$widget_styles = array();
		if ( isset( $instance['widget_bottom_margin'] ) && $instance['widget_bottom_margin'] !== '' ) {
			$widget_styles[] = 'margin-bottom: ' . etienne_elated_filter_px( $instance['widget_bottom_margin'] ) . 'px';
		}
		
		$authorID = 1;
		if ( ! empty( $instance['author_username'] ) ) {
			$author = get_user_by( 'login', $instance['author_username'] );
			
			if ( $author ) {
				$authorID = $author->ID;
			}
		}
		
		$social_networks       = etienne_elated_core_plugin_installed() ? etienne_elated_get_user_custom_fields() : false;
		$display_author_social = etienne_elated_options()->getOptionValue( 'blog_single_author_social' ) === 'no' ? false : true;
		$author_info = get_the_author_meta( 'description', $authorID );
		?>
		
		<div class="widget eltdf-author-info-widget <?php echo esc_attr( $extra_class ); ?>" <?php echo etienne_elated_get_inline_style( $widget_styles ); ?>>
			<div class="eltdf-aiw-inner">
				<?php if ( $author_info !== "" ) { ?>
					<h4 class="eltdf-aiw-title"><?php esc_html_e( 'About Author', 'etienne' ); ?></h4>
					<a itemprop="url" class="eltdf-aiw-image" href="<?php echo esc_url( get_author_posts_url( $authorID ) ); ?>">
						<?php echo etienne_elated_kses_img( get_avatar( $authorID, 138 ) ); ?>
					</a>
					<p itemprop="description" class="eltdf-aiw-text"><?php echo wp_kses_post( $author_info ); ?></p>
				<?php } ?>
			</div>
			
		</div>
		<?php
	}
}