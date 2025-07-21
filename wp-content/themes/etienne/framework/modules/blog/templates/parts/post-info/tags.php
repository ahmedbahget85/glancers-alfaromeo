<?php
$tags = get_the_tags();
?>
<?php if($tags) { ?>
<div class="eltdf-tags-holder">
	<div class="eltdf-tags-label">
		<h5><?php
			esc_html_e( 'Tags:', 'etienne' );
			?>
		</h5>
	</div>
    <div class="eltdf-tags">
        <?php the_tags('', ' ', ''); ?>
    </div>
</div>
<?php } ?>