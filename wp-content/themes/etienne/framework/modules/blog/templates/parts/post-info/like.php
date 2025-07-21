<?php if(etienne_elated_core_plugin_installed()) { ?>
    <div class="eltdf-blog-like">
        <?php if( function_exists('etienne_elated_get_like') ) etienne_elated_get_like(); ?>
    </div>
<?php } ?>