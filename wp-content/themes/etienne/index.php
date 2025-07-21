<?php
$eltdf_blog_type = etienne_elated_get_archive_blog_list_layout();
etienne_elated_include_blog_helper_functions( 'lists', $eltdf_blog_type );
$eltdf_holder_params = etienne_elated_get_holder_params_blog();

get_header();
etienne_elated_get_title();
do_action('etienne_elated_action_before_main_content');
?>

<div class="<?php echo esc_attr( $eltdf_holder_params['holder'] ); ?>">
	<?php do_action( 'etienne_elated_action_after_container_open' ); ?>
	
	<div class="<?php echo esc_attr( $eltdf_holder_params['inner'] ); ?>">
		<?php etienne_elated_get_blog( $eltdf_blog_type ); ?>
	</div>
	
	<?php do_action( 'etienne_elated_action_before_container_close' ); ?>
</div>

<?php do_action( 'etienne_elated_action_blog_list_additional_tags' ); ?>
<?php get_footer(); ?>