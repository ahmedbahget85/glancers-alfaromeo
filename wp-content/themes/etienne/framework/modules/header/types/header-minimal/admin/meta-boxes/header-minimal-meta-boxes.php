<?php

if ( ! function_exists( 'etienne_elated_get_hide_dep_for_header_minimal_meta_boxes' ) ) {
    function etienne_elated_get_hide_dep_for_header_minimal_meta_boxes() {
        $hide_dep_options = apply_filters( 'etienne_elated_filter_header_minimal_hide_meta_boxes', $hide_dep_options = array() );

        return $hide_dep_options;
    }
}

if ( ! function_exists( 'etienne_elated_header_minimal_meta_map' ) ) {
    function etienne_elated_header_minimal_meta_map( $parent ) {
        $hide_dep_options = etienne_elated_get_hide_dep_for_header_minimal_meta_boxes();

        etienne_elated_create_meta_box_field(
            array(
                'parent'          => $parent,
                'type'            => 'select',
                'name'            => 'eltdf_fullscreen_logo_position_header_minimal_meta',
                'default_value'   => '',
                'label'           => esc_html__( 'Full Screen Logo Position', 'etienne' ),
                'description'     => esc_html__( 'Select Logo position in your header', 'etienne' ),
                'options'         => array(
                    ''       => esc_html__( 'Default', 'etienne' ),
                    'left'   => esc_html__( 'Left', 'etienne' ),
                    'center' => esc_html__( 'Center', 'etienne' )
                ),
                'dependency' => array(
                    'show' => array(
                        'eltdf_header_type_meta' => array( 'header-minimal')
                    )
                )
            )
        );
    }

    add_action( 'etienne_elated_action_additional_header_area_meta_boxes_map', 'etienne_elated_header_minimal_meta_map', 10, 1 );
}