<li class="eltdf-bl-item eltdf-item-space clearfix">
	<div class="eltdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			etienne_elated_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
		<div class="eltdf-bli-content">
			<?php etienne_elated_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
			<?php etienne_elated_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params ); ?>
		</div>
	</div>
</li>