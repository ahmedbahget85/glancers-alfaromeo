<?php do_action('etienne_elated_action_before_mobile_header'); ?>

<header class="eltdf-mobile-header">
	<?php do_action('etienne_elated_action_after_mobile_header_html_open'); ?>
	
	<div class="eltdf-mobile-header-inner">
		<div class="eltdf-mobile-header-holder">
			<div class="eltdf-grid">
				<div class="eltdf-vertical-align-containers">
					<div class="eltdf-vertical-align-containers">
						<div class="eltdf-position-left"><!--
						 --><div class="eltdf-position-left-inner">
								<?php etienne_elated_get_mobile_logo(); ?>
							</div>
						</div>
						<div class="eltdf-position-right"><!--
						 --><div class="eltdf-position-right-inner">
								<?php if ( is_active_sidebar( 'eltdf-right-from-mobile-logo' ) ) {
									dynamic_sidebar( 'eltdf-right-from-mobile-logo' );
								} ?>
								<?php if ( $show_navigation_opener ) : ?>
									<div <?php etienne_elated_class_attribute( $mobile_icon_class ); ?>>
										<a href="javascript:void(0)">
											<?php if ( ! empty( $mobile_menu_title ) ) { ?>
												<h5 class="eltdf-mobile-menu-text"><?php echo esc_attr( $mobile_menu_title ); ?></h5>
											<?php } ?>
											<span class="eltdf-mobile-menu-icon">
												<?php echo etienne_elated_get_icon_sources_html( 'mobile' ); ?>
											</span>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php etienne_elated_get_mobile_nav(); ?>
	</div>
	
	<?php do_action('etienne_elated_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('etienne_elated_action_after_mobile_header'); ?>