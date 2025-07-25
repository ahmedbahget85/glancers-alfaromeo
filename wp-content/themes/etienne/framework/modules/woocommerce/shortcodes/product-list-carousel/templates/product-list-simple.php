<?php
$shader_styles          = $this_object->getShaderStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="eltdf-plc-holder <?php echo esc_attr( $holder_classes ) ?>">
	<div class="eltdf-plc-outer eltdf-owl-slider" <?php echo etienne_elated_get_inline_attrs( $holder_data ); ?>>
		<?php if ( $query_result->have_posts() ): while ( $query_result->have_posts() ) : $query_result->the_post(); ?>
			<div class="eltdf-plc-item">
				<div class="eltdf-grid">
					<div class="eltdf-plc-image-outer">
						<div class="eltdf-plc-image">
							<?php etienne_elated_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
						</div>
						<a class="eltdf-plc-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
					</div>
					<div class="eltdf-plc-text-wrapper">
						<div class="eltdf-plc-text">
							<div class="eltdf-plc-text-outer">
								<div class="eltdf-plc-text-inner">
									<?php etienne_elated_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>
									
									<?php etienne_elated_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
									
									<?php etienne_elated_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>
									
									<?php etienne_elated_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>
									
									<?php etienne_elated_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
									
									<?php etienne_elated_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile;
		else:
			etienne_elated_get_module_template_part( 'templates/parts/no-posts', 'woocommerce', '', $params );
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>