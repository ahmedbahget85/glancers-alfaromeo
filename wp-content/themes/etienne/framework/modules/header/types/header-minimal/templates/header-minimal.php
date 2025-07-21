<?php do_action('etienne_elated_action_before_page_header'); ?>

<header class="eltdf-page-header">
	<?php do_action('etienne_elated_action_after_page_header_html_open'); ?>
	
	<?php if($show_fixed_wrapper) : ?>
		<div class="eltdf-fixed-wrapper">
	<?php endif; ?>
			
	<div class="eltdf-menu-area">
		<?php do_action('etienne_elated_action_after_header_menu_area_html_open'); ?>
		
		<?php if($menu_area_in_grid) : ?>
			<div class="eltdf-grid">
		<?php endif; ?>

            <?php if($fullscreen_logo_position_header_minimal == 'center') { ?>
				
			<div class="eltdf-vertical-align-containers">
                <div class="eltdf-position-left"><!--
				 --><div class="eltdf-position-left-inner">
                        <?php etienne_elated_get_header_widget_area_one(); ?>
                    </div>
                </div>
				<div class="eltdf-position-center"><!--
				 --><div class="eltdf-position-center-inner">
						<?php if(!$hide_logo) {
							etienne_elated_get_logo();
						} ?>
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
                            <?php if(!$hide_logo) {
                                etienne_elated_get_logo();
                            } ?>
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
				
		<?php if($menu_area_in_grid) : ?>
			</div>
		<?php endif; ?>
	</div>
			
	<?php if($show_fixed_wrapper) { ?>
		</div>
	<?php } ?>
	
	<?php if($show_sticky) {
		etienne_elated_get_sticky_header('minimal', 'header/types/header-minimal');
	} ?>
	
	<?php do_action('etienne_elated_action_before_page_header_html_close'); ?>
</header>