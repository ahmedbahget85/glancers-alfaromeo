<?php
$product_image_size = 'woocommerce_thumbnail';

if(has_post_thumbnail()) {
	the_post_thumbnail(apply_filters( 'etienne_elated_filter_product_list_image_simple_size', $product_image_size));
}