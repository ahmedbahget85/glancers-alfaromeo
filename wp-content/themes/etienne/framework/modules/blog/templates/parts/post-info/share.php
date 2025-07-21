<?php
$share_type = isset( $share_type ) ? $share_type : 'list';
?>
<?php if ( etienne_elated_core_plugin_installed() && etienne_elated_options()->getOptionValue( 'enable_social_share' ) === 'yes' && etienne_elated_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="eltdf-blog-share">
		<?php echo etienne_elated_get_social_share_html( array( 'type' => 'dropdown', 'dropdown_behavior' => 'left', 'title' => false ) ); ?>
	</div>
<?php } ?>