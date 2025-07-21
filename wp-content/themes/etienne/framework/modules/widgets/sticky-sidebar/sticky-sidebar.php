<?php
class EtienneElatedClassStickySidebar extends EtienneElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_sticky_sidebar',
			esc_html__('Etienne Sticky Sidebar Widget', 'etienne'),
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'etienne'))
		);
		
		$this->setParams();
	}
	
	protected function setParams() {}
	
	public function widget( $args, $instance ) {
		echo '<div class="widget eltdf-widget-sticky-sidebar"></div>';
	}
}
