<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php etienne_elated_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-info-top">
                    <?php etienne_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php etienne_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php
                    if(etienne_elated_options()->getOptionValue('show_categories_area_blog') === 'yes') {
	                    etienne_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params);
                    } ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php etienne_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php etienne_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('etienne_elated_action_single_link_pages'); ?>
                    <?php
                    if(etienne_elated_options()->getOptionValue('show_tags_area_blog') === 'yes') {
	                    etienne_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
                    } ?>
                    <?php etienne_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>