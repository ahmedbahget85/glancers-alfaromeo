<?php do_action('etienne_elated_action_before_mobile_header'); ?>

<header class="eltdf-mobile-header">
	<?php do_action('etienne_elated_action_after_mobile_header_html_open'); ?>
	
	<div class="eltdf-mobile-header-inner">
		<div class="eltdf-mobile-header-holder">
			<div class="eltdf-grid">
                <?php if($fullscreen_logo_position_header_minimal == 'center') { ?>
				<div class="eltdf-vertical-align-containers">
                    <div class="eltdf-position-left"><!--
					 --><div class="eltdf-position-left-inner">
                            <?php etienne_elated_get_header_widget_area_one(); ?>
                        </div>
                    </div>
					<div class="eltdf-position-center"><!--
					 --><div class="eltdf-position-center-inner">
							<?php etienne_elated_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="eltdf-position-right"><!--
					 --><div class="eltdf-position-right-inner">
							<a href="javascript:void(0)" <?php etienne_elated_class_attribute( $fullscreen_menu_icon_class ); ?>>
								<span class="eltdf-fullscreen-menu-close-icon">
									<?php echo etienne_elated_get_icon_sources_html( 'fullscreen_menu', true ); ?>
								</span>
								<span class="eltdf-fullscreen-menu-opener-icon">
                                    <?php echo etienne_elated_get_icon_sources_html( 'fullscreen_menu' ); ?>
								</span>
							</a>
						</div>
					</div>
				</div>
                <?php } else { ?>
                    <div class="eltdf-vertical-align-containers">
                        <div class="eltdf-position-left"><!--
					 --><div class="eltdf-position-left-inner">
                                <?php etienne_elated_get_mobile_logo(); ?>
                            </div>
                        </div>
                        <div class="eltdf-position-right"><!--
					 --><div class="eltdf-position-right-inner">
                                <a href="javascript:void(0)" <?php etienne_elated_class_attribute( $fullscreen_menu_icon_class ); ?>>
								<span class="eltdf-fullscreen-menu-close-icon">
									<?php echo etienne_elated_get_icon_sources_html( 'fullscreen_menu', true ); ?>
								</span>
                                    <span class="eltdf-fullscreen-menu-opener-icon">
                                    <?php echo etienne_elated_get_icon_sources_html( 'fullscreen_menu' ); ?>
								</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
			</div>
		</div>
	</div>
	
	<?php do_action('etienne_elated_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('etienne_elated_action_after_mobile_header'); ?>