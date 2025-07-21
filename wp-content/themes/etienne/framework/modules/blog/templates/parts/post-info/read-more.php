<?php if ( ! etienne_elated_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="eltdf-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'etienne' ),
				'custom_class' => 'eltdf-blog-list-button'
			);
			
			echo etienne_elated_return_button_html( $button_params );
		?>
	</div>
<?php } ?>