<form role="search" method="get" class="eltdf-searchform searchform" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'etienne' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'etienne' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'etienne' ); ?>"/>
		<button type="submit" class="eltdf-search-submit"><?php echo etienne_elated_icon_collections()->renderIcon( 'icon_search', 'font_elegant' ); ?></button>
	</div>
</form>