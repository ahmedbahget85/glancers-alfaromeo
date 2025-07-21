<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-info-top">
                    <?php etienne_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php etienne_elated_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
	                <div class="eltdf-post-mark">
		                <span aria-hidden="true" class="eltdf-icon-font-elegant icon_chat_alt eltdf-icon-element" style=""></span>
	                </div>
                </div>
            </div>
        </div>
    </div>
</article>