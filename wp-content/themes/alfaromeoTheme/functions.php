<?php


function load_stylesheets(){
    wp_register_style('main-style',get_template_directory_uri().'/style.css' , array() ,1 ,'all');
    wp_enqueue_style('main-style');
    if (is_page ('about')) {
        wp_register_style('about-style',get_template_directory_uri().'/css/about.css' , array() ,1 ,'all');
        wp_enqueue_style('about-style');
    }
    if (is_page ('ezz-about')) {
        wp_register_style('ezz-about',get_template_directory_uri().'/css/ezz-about.css' , array() ,1 ,'all');
        wp_enqueue_style('ezz-about');
    }
    if (is_page ('general-inquiry')) {
        wp_register_style('general-inquiry',get_template_directory_uri().'/css/general-inquiry.css' , array() ,1 ,'all');
        wp_enqueue_style('general-inquiry');
    }

    wp_register_style('font',get_template_directory_uri().'/fonts/fontawesome-free-5.12.1-web/css/all.css' , array() ,1 ,'all');
    wp_enqueue_style('font');
    if (is_page ('home')) {
        wp_register_style('main',get_template_directory_uri().'/css/style.css' , array() ,1 ,'all');
        wp_enqueue_style('main');
    }
    wp_register_style('owl-main',get_template_directory_uri().'/owl/css/owl.carousel.min.css' , array() ,1 ,'all');
    wp_enqueue_style('owl-main');
    wp_register_style('owl-theme',get_template_directory_uri().'/owl/css/owl.theme.default.min.css' , array() ,1 ,'all');
    wp_enqueue_style('owl-theme');
    if (!is_page ('home') && !is_page ('about')&& !is_page ('ezz-about') ) {
        wp_register_style('internal',get_template_directory_uri().'/css/internal.css' , array() ,1 ,'all');
        wp_enqueue_style('internal');
    }
    if (is_page ('drive-form') || is_page ('brochure-form')) {
        wp_register_style('form',get_template_directory_uri().'/css/form.css' , array() ,1 ,'all');
        wp_enqueue_style('form');
    }

  

    
}

add_action('wp_enqueue_scripts','load_stylesheets');


function load_js(){ 
    //if (is_page ('home')) {
        wp_register_script('main-scripts',get_template_directory_uri().'/js/script.js',array(),1,1,1);
        wp_enqueue_script('main-scripts');
    //}

    if (is_page ('ezz-about')) {
        wp_register_script('ezz-about-scripts',get_template_directory_uri().'/js/ezz-about.js',array(),1,1,1);
        wp_enqueue_script('ezz-about-scripts');
    }
    wp_register_script('lazyLoad',get_template_directory_uri().'/js/lazysizes.min.js',array(),1,1,1);
    wp_enqueue_script('lazyLoad');


    
    wp_register_script('owl-scripts',get_template_directory_uri().'/owl/js/owl.carousel.min.js',array(),1,1,1);
    wp_enqueue_script('owl-scripts');
    if (!is_page ('home') && !is_page ('form') && !is_page ('about')&& !is_page ('ezz-about')&& !is_page ('drive-form') && !is_page ('brochure-form')   && !is_page ('general-inquiry')) {
        $mainURL = array(
            'main' => get_stylesheet_directory_uri()
        ); 
        wp_register_script('internal-scripts',get_template_directory_uri().'/js/internal.js',array(),1,1,1);
        wp_enqueue_script('internal-scripts');
        wp_localize_script( 'internal-scripts', 'php_vars', $mainURL );
    }
    if (is_page ('drive-form') || is_page ('brochure-form') ) {
        wp_register_script('form-scripts',get_template_directory_uri().'/js/form.js',array(),1,1,1);
        wp_enqueue_script('form-scripts');
    }
    if (is_page ('about')) {
        wp_register_script('about-scripts',get_template_directory_uri().'/js/about.js',array(),1,1,1);
        wp_enqueue_script('about-scripts');
    }    
            
    if (is_page ('general-inquiry') ) {
        wp_register_script('form-scripts',get_template_directory_uri().'/js/general-inquiry.js',array(),1,1,1);
        wp_enqueue_script('form-scripts');
    } 
}

add_action('wp_enqueue_scripts','load_js');


add_action('init', 'remove_editor_from_models');
function remove_editor_from_models() {
    remove_post_type_support( 'models', 'editor' );
    // remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'offers', 'editor' );
}

function my_custom_mime_types( $mimes ) {
 
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';
     
    // Optional. Remove a mime type.
    unset( $mimes['exe'] );
     
    return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );


function register_my_menu() {
    register_nav_menu('primary-menu',('primary-menu'));
}
add_action( 'init', 'register_my_menu' );

function register_footer_menu() {
    register_nav_menu('footer-menu',('footer-menu'));
}
add_action( 'init', 'register_footer_menu' );


function drive_menu() { 
 
    add_menu_page( 
        'Test Driving Requests', 
        'Test Driving Requests', 
        'edit_posts', 
        'menu_slug', 
        'page_callback_function', 
        'dashicons-media-spreadsheet' 
   
       );
  }

  add_action('admin_menu', 'drive_menu');
  function page_callback_function(){
    include(dirname(__FILE__).'/testDrivingFormRequests.php');
}

  function brochure_menu() { 
 
    add_menu_page( 
        'Brochure Requests', 
        'Brochure Requests', 
        'edit_posts', 
        'brochure_slug', 
        'brochure_page_callback_function', 
        'dashicons-media-spreadsheet' 
   
       );
  }

  add_action('admin_menu', 'brochure_menu');

  function brochure_page_callback_function(){
    include(dirname(__FILE__).'/requestBrochureForm.php');
}


function footer1_widget() {
register_sidebar( array(
    'name'          => esc_html__( 'socialLinks-footer', 'alfaromeoTheme' ),
    'id'            => 'socialLinks-footer',
    'description'   => esc_html__( 'Add widgets here.', 'alfaromeoTheme' ),
) );
}
add_action( 'widgets_init', 'footer1_widget' );

function footer2_widget() {
    register_sidebar( array(
        'name'          => esc_html__( 'links-footer', 'alfaromeoTheme' ),
        'id'            => 'links-footer',
        'description'   => esc_html__( 'Add widgets here.', 'alfaromeoTheme' ),
        'before_widget' => '<div class="list-group sitemap">',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'footer2_widget' );

function footer3_widget() {
    register_sidebar( array(
        'name'          => esc_html__( 'language-footer', 'alfaromeoTheme' ),
        'id'            => 'language-footer',
        'description'   => esc_html__( 'Add widgets here.', 'alfaromeoTheme' ),
        'before_widget' => '<div class="">',
        'after_widget'  => '</div>',
    ) );
}
add_action( 'widgets_init', 'footer3_widget' );

function sidebar_widget() {
    register_sidebar( array(
        'name'          => esc_html__( 'sidebar-footer', 'alfaromeoTheme' ),
        'id'            => 'sidbar-footer',
        'description'   => esc_html__( 'Add widgets here.', 'alfaromeoTheme' ),
        'before_widget' => '<div class="sidebar-element-container"> <div class="sidebar-content">',
        'after_widget'  => '</div> <div class="clearfix"> </div> </div>',
        'before_title'  => '<a class="widgettitle" href="#">',
        'after_title'   => '</a>'
    ) );
}
add_action( 'widgets_init', 'sidebar_widget' );



function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');




?>