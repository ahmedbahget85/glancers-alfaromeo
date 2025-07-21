<div class="eltdf-product-category <?php echo esc_attr($item_classes) ?>">

    <div class="eltdf-product-category-inner">
        <a class="eltdf-link" href="<?php echo esc_url($link); ?>"></a>

        <?php
        if (isset($img_url) && $img_url !== '') { ?>

            <div class="eltdf-product-category-img-wrapper">
                <div class="eltdf-pcw-inner">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                </div>
            </div>

        <?php }
        ?>

        <div class="eltdf-product-category-content">

            <a href="<?php echo esc_url($link); ?>">
                <h3 class="eltdf-category-title">
                    <?php
                    echo esc_attr($term->name);
                    ?>
                </h3>
            </a>
            <a itemprop="url" class="eltdf-pcli-text-link eltdf-btn eltdf-btn-medium eltdf-btn-simple" href="<?php echo esc_url($link); ?>">
                <span class="eltdf-btn-text"><?php esc_html_e( 'View More', 'etienne' ); ?></span>
            </a>
        </div>

    </div>
</div>
