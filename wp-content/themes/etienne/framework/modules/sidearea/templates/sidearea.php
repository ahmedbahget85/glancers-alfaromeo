<section class="eltdf-side-menu">
	<a <?php etienne_elated_class_attribute( $close_icon_classes ); ?> href="#">
		<?php echo etienne_elated_get_icon_sources_html( 'side_area', true ); ?>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>