<?php

if ( ! function_exists( 'etienne_elated_like' ) ) {
	/**
	 * Returns EtienneElatedClassLike instance
	 *
	 * @return EtienneElatedClassLike
	 */
	function etienne_elated_like() {
		return EtienneElatedClassLike::get_instance();
	}
}

function etienne_elated_get_like() {
	
	echo wp_kses( etienne_elated_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}