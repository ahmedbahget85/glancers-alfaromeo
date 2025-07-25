<?php do_action('etienne_elated_action_before_page_title'); ?>

<div class="eltdf-title-holder <?php echo esc_attr($holder_classes); ?>" <?php etienne_elated_inline_style($holder_styles); ?> <?php echo etienne_elated_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="eltdf-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="eltdf-title-wrapper" <?php etienne_elated_inline_style($wrapper_styles); ?>>
		<div class="eltdf-title-inner">
			<div class="eltdf-grid">
				<?php if(!empty($title)) { ?>
					<<?php echo esc_attr($title_tag); ?> class="eltdf-page-title entry-title" <?php etienne_elated_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
				<?php } ?>
				<?php if(!empty($subtitle)){ ?>
					<<?php echo esc_attr($subtitle_tag); ?> class="eltdf-page-subtitle" <?php etienne_elated_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
				<?php } ?>
			</div>
	    </div>
	</div>
</div>

<?php do_action('etienne_elated_action_after_page_title'); ?>
