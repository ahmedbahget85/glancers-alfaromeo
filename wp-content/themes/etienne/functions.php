<?php
include_once get_template_directory() . '/theme-includes.php';

if ( ! function_exists( 'etienne_elated_styles' ) ) {
	/**
	 * Function that includes theme's core styles
	 */
	function etienne_elated_styles() {

        $modules_css_deps_array = apply_filters( 'etienne_elated_filter_modules_css_deps', array() );
		
		//include theme's core styles
		wp_enqueue_style( 'etienne-elated-default-style', ELATED_ROOT . '/style.css' );
		wp_enqueue_style( 'etienne-elated-modules', ELATED_ASSETS_ROOT . '/css/modules.min.css', $modules_css_deps_array );
		
		etienne_elated_icon_collections()->enqueueStyles();
		
		wp_enqueue_style( 'wp-mediaelement' );
		
		do_action( 'etienne_elated_action_enqueue_third_party_styles' );
		
		//is woocommerce installed?
		if ( etienne_elated_is_woocommerce_installed() && etienne_elated_load_woo_assets() ) {
			//include theme's woocommerce styles
			wp_enqueue_style( 'etienne-elated-woo', ELATED_ASSETS_ROOT . '/css/woocommerce.min.css' );
		}
		
		if ( etienne_elated_dashboard_page() || etienne_elated_has_dashboard_shortcodes() ) {
			wp_enqueue_style( 'etienne-elated-dashboard', ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/eltdf-dashboard.css' );
		}
		
		//define files after which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = apply_filters( 'etienne_elated_filter_style_dynamic_deps', array() );

		if ( file_exists( ELATED_ROOT_DIR . '/assets/css/style_dynamic.css' ) && etienne_elated_is_css_folder_writable() && ! is_multisite() ) {
			wp_enqueue_style( 'etienne-elated-style-dynamic', ELATED_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime( ELATED_ROOT_DIR . '/assets/css/style_dynamic.css' ) ); //it must be included after woocommerce styles so it can override it
		} else if ( file_exists( ELATED_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css' ) && etienne_elated_is_css_folder_writable() && is_multisite() ) {
			wp_enqueue_style( 'etienne-elated-style-dynamic', ELATED_ASSETS_ROOT . '/css/style_dynamic_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css', $style_dynamic_deps_array, filemtime( ELATED_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css' ) ); //it must be included after woocommerce styles so it can override it
		}
		
		//is responsive option turned on?
		if ( etienne_elated_is_responsive_on() ) {
			wp_enqueue_style( 'etienne-elated-modules-responsive', ELATED_ASSETS_ROOT . '/css/modules-responsive.min.css' );
			
			//is woocommerce installed?
			if ( etienne_elated_is_woocommerce_installed() && etienne_elated_load_woo_assets() ) {
				//include theme's woocommerce responsive styles
				wp_enqueue_style( 'etienne-elated-woo-responsive', ELATED_ASSETS_ROOT . '/css/woocommerce-responsive.min.css' );
			}
			
			//include proper styles
			if ( file_exists( ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) && etienne_elated_is_css_folder_writable() && ! is_multisite() ) {
				wp_enqueue_style( 'etienne-elated-style-dynamic-responsive', ELATED_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime( ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) );
			} else if ( file_exists( ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css' ) && etienne_elated_is_css_folder_writable() && is_multisite() ) {
				wp_enqueue_style( 'etienne-elated-style-dynamic-responsive', ELATED_ASSETS_ROOT . '/css/style_dynamic_responsive_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css', array(), filemtime( ELATED_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css' ) );
			}
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'etienne_elated_styles' );
}

if ( ! function_exists( 'etienne_elated_google_fonts_styles' ) ) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function etienne_elated_google_fonts_styles() {
		$font_simple_field_array = etienne_elated_options()->getOptionsByType( 'fontsimple' );
		if ( ! ( is_array( $font_simple_field_array ) && count( $font_simple_field_array ) > 0 ) ) {
			$font_simple_field_array = array();
		}
		
		$font_field_array = etienne_elated_options()->getOptionsByType( 'font' );
		if ( ! ( is_array( $font_field_array ) && count( $font_field_array ) > 0 ) ) {
			$font_field_array = array();
		}
		
		$available_font_options = array_merge( $font_simple_field_array, $font_field_array );
		
		$google_font_weight_array = etienne_elated_options()->getOptionValue( 'google_font_weight' );
		if ( ! empty( $google_font_weight_array ) ) {
			$google_font_weight_array = array_slice( etienne_elated_options()->getOptionValue( 'google_font_weight' ), 1 );
		}
		
		$font_weight_str = '300,400,500,600,700';
		if ( ! empty( $google_font_weight_array ) && $google_font_weight_array !== '' ) {
			$font_weight_str = implode( ',', $google_font_weight_array );
		}
		
		$google_font_subset_array = etienne_elated_options()->getOptionValue( 'google_font_subset' );
		if ( ! empty( $google_font_subset_array ) ) {
			$google_font_subset_array = array_slice( etienne_elated_options()->getOptionValue( 'google_font_subset' ), 1 );
		}
		
		$font_subset_str = 'latin-ext';
		if ( ! empty( $google_font_subset_array ) && $google_font_subset_array !== '' ) {
			$font_subset_str = implode( ',', $google_font_subset_array );
		}
		
		//default fonts
		$default_font_family = array(
            'Cormorant Garamond', 'Montserrat', 'Nunito Sans'
		);
		
		$modified_default_font_family = array();
		foreach ( $default_font_family as $default_font ) {
			$modified_default_font_family[] = $default_font . ':' . str_replace( ' ', '', $font_weight_str );
		}
		
		$default_font_string = implode( '|', $modified_default_font_family );
		
		//define available font options array
		$fonts_array = array();
		foreach ( $available_font_options as $font_option ) {
			//is font set and not set to default and not empty?
			$font_option_value = etienne_elated_options()->getOptionValue( $font_option );
			
			if ( etienne_elated_is_font_option_valid( $font_option_value ) && ! etienne_elated_is_native_font( $font_option_value ) ) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				
				if ( ! in_array( str_replace( '+', ' ', $font_option_value ), $default_font_family ) && ! in_array( $font_option_string, $fonts_array ) ) {
					$fonts_array[] = $font_option_string;
				}
			}
		}
		
		$fonts_array         = array_diff( $fonts_array, array( '-1:' . $font_weight_str ) );
		$google_fonts_string = implode( '|', $fonts_array );
		
		$protocol = is_ssl() ? 'https:' : 'http:';
		
		//is google font option checked anywhere in theme?
		if ( count( $fonts_array ) > 0 ) {
			
			//include all checked fonts
			$fonts_full_list      = $default_font_string . '|' . str_replace( '+', ' ', $google_fonts_string );
			$fonts_full_list_args = array(
				'family' => urlencode( $fonts_full_list ),
				'subset' => urlencode( $font_subset_str ),
			);
			
			$etienne_elated_global_fonts = add_query_arg( $fonts_full_list_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'etienne-elated-google-fonts', esc_url_raw( $etienne_elated_global_fonts ), array(), '1.0.0' );
			
		} else {
			//include default google font that theme is using
			$default_fonts_args          = array(
				'family' => urlencode( $default_font_string ),
				'subset' => urlencode( $font_subset_str ),
			);
			$etienne_elated_global_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'etienne-elated-google-fonts', esc_url_raw( $etienne_elated_global_fonts ), array(), '1.0.0' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'etienne_elated_google_fonts_styles' );
}

if ( ! function_exists( 'etienne_elated_scripts' ) ) {
	/**
	 * Function that includes all necessary scripts
	 */
	function etienne_elated_scripts() {
		global $wp_scripts;
		
		//init theme core scripts
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'wp-mediaelement' );
		
		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script( 'appear', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'modernizr', ELATED_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'hoverIntent', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-plugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', ELATED_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waypoints', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fluidvids', ELATED_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'perfect-scrollbar', ELATED_ASSETS_ROOT . '/js/modules/plugins/perfect-scrollbar.jquery.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ScrollToPlugin', ELATED_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'parallax', ELATED_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waitforimages', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'prettyphoto', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-easing-1.3', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', ELATED_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'packery', ELATED_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'swiper', ELATED_ASSETS_ROOT . '/js/modules/plugins/swiper.min.js', array( 'jquery' ), false, true );
		
		do_action( 'etienne_elated_action_enqueue_third_party_scripts' );

		if ( etienne_elated_is_woocommerce_installed() ) {
			wp_enqueue_script( 'select2' );
		}

		if ( etienne_elated_is_page_smooth_scroll_enabled() ) {
			wp_enqueue_script( 'tweenLite', ELATED_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'smoothPageScroll', ELATED_ASSETS_ROOT . '/js/modules/plugins/smoothPageScroll.js', array( 'jquery' ), false, true );
		}

		//include google map api script
		$google_maps_api_key          = etienne_elated_options()->getOptionValue( 'google_maps_api_key' );
		$google_maps_extensions       = '';
		$google_maps_extensions_array = apply_filters( 'etienne_elated_filter_google_maps_extensions_array', array() );

		if ( ! empty( $google_maps_extensions_array ) ) {
			$google_maps_extensions .= '&libraries=';
			$google_maps_extensions .= implode( ',', $google_maps_extensions_array );
		}

		if ( ! empty( $google_maps_api_key ) ) {
			wp_enqueue_script( 'etienne-elated-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ) . $google_maps_extensions, array(), false, true );
            if ( ! empty( $google_maps_extensions_array ) && is_array( $google_maps_extensions_array ) ) {
                wp_enqueue_script('geocomplete', ELATED_ASSETS_ROOT . '/js/modules/plugins/jquery.geocomplete.min.js', array('jquery', 'etienne-elated-google-map-api'), false, true);
            }
		}

		wp_enqueue_script( 'etienne-elated-modules', ELATED_ASSETS_ROOT . '/js/modules.min.js', array( 'jquery' ), false, true );
		
		if ( etienne_elated_dashboard_page() || etienne_elated_has_dashboard_shortcodes() ) {
			$dash_array_deps = array(
				'jquery-ui-datepicker',
				'jquery-ui-sortable'
			);
			
			wp_enqueue_script( 'etienne-elated-dashboard', ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/js/eltdf-dashboard.js', $dash_array_deps, false, true );
			
			wp_enqueue_script( 'wp-util' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
			wp_enqueue_script( 'wp-color-picker', admin_url( 'js/color-picker.min.js' ), array( 'iris' ), false, 1 );
			
			$colorpicker_l10n = array(
				'clear'         => esc_html__( 'Clear', 'etienne' ),
				'defaultString' => esc_html__( 'Default', 'etienne' ),
				'pick'          => esc_html__( 'Select Color', 'etienne' ),
				'current'       => esc_html__( 'Current Color', 'etienne' ),
			);
			
			wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );
		}

		//include comment reply script
		$wp_scripts->add_data( 'comment-reply', 'group', 1 );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'etienne_elated_scripts' );
}

if ( ! function_exists( 'etienne_elated_theme_setup' ) ) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function etienne_elated_theme_setup() {
		//add support for feed links
		add_theme_support( 'automatic-feed-links' );

		//add support for post formats
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );

		//add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );

		//add theme support for title tag
		add_theme_support( 'title-tag' );

        //add theme support for editor style
        add_editor_style( 'framework/admin/assets/css/editor-style.css' );

		//defined content width variable
		$GLOBALS['content_width'] = apply_filters( 'etienne_elated_filter_set_content_width', 1100 );

		//define thumbnail sizes
		add_image_size( 'etienne_elated_image_square', 650, 650, true );
		add_image_size( 'etienne_elated_image_landscape', 1300, 650, true );
		add_image_size( 'etienne_elated_image_portrait', 650, 1300, true );
		add_image_size( 'etienne_elated_image_huge', 1300, 1300, true );

		load_theme_textdomain( 'etienne', get_template_directory() . '/languages' );
	}

	add_action( 'after_setup_theme', 'etienne_elated_theme_setup' );
}

if ( ! function_exists( 'etienne_elated_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function etienne_elated_enqueue_editor_customizer_styles() {
		wp_enqueue_style( 'etienne-style-modules-admin-styles', ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/eltdf-modules-admin.css' );
		wp_enqueue_style( 'etienne-style-handle-editor-customizer-styles', ELATED_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
	}
	
	// add google font
	add_action( 'enqueue_block_editor_assets', 'etienne_elated_google_fonts_styles' );
	// add action
	add_action( 'enqueue_block_editor_assets', 'etienne_elated_enqueue_editor_customizer_styles' );
}

if ( ! function_exists( 'etienne_elated_is_responsive_on' ) ) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function etienne_elated_is_responsive_on() {
		return etienne_elated_options()->getOptionValue( 'responsiveness' ) !== 'no';
	}
}

if ( ! function_exists( 'etienne_elated_rgba_color' ) ) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function etienne_elated_rgba_color( $color, $transparency ) {
		if ( $color !== '' && $transparency !== '' ) {
			$rgba_color = '';

			$rgb_color_array = etienne_elated_hex2rgb( $color );
			$rgba_color      .= 'rgba(' . implode( ', ', $rgb_color_array ) . ', ' . $transparency . ')';

			return $rgba_color;
		}
	}
}

if ( ! function_exists( 'etienne_elated_header_meta' ) ) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function etienne_elated_header_meta() { ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

	<?php }

	add_action( 'etienne_elated_action_header_meta', 'etienne_elated_header_meta' );
}

if ( ! function_exists( 'etienne_elated_user_scalable_meta' ) ) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to etienne_elated_action_header_meta action
	 */
	function etienne_elated_user_scalable_meta() {
		//is responsiveness option is chosen?
		if ( etienne_elated_is_responsive_on() ) { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
		<?php } else { ?>
			<meta name="viewport" content="width=1200,user-scalable=yes">
		<?php }
	}

	add_action( 'etienne_elated_action_header_meta', 'etienne_elated_user_scalable_meta' );
}

if ( ! function_exists( 'etienne_elated_smooth_page_transitions' ) ) {
	/**
	 * Function that outputs smooth page transitions html if smooth page transitions functionality is turned on
	 * Hooked to etienne_elated_action_after_body_tag action
	 */
	function etienne_elated_smooth_page_transitions() {
		$id = etienne_elated_get_page_id();

		if ( etienne_elated_get_meta_field_intersect( 'smooth_page_transitions', $id ) === 'yes' && etienne_elated_get_meta_field_intersect( 'page_transition_preloader', $id ) === 'yes' ) { ?>
			<div class="eltdf-smooth-transition-loader eltdf-mimic-ajax">
				<div class="eltdf-st-loader">
					<?php etienne_elated_loading_spinners(); ?>
				</div>
			</div>
		<?php }
	}

	add_action( 'etienne_elated_action_after_body_tag', 'etienne_elated_smooth_page_transitions', 10 );
}

if ( ! function_exists( 'etienne_elated_back_to_top_button' ) ) {
	/**
	 * Function that outputs back to top button html if back to top functionality is turned on
	 * Hooked to etienne_elated_action_after_wrapper_inner action
	 */
	function etienne_elated_back_to_top_button() {
		if ( etienne_elated_options()->getOptionValue( 'show_back_button' ) == 'yes' ) { ?>
			<a id='eltdf-back-to-top' href='#'>
                <span class="eltdf-icon-stack">
                     <?php etienne_elated_icon_collections()->getBackToTopIcon( 'font_elegant' ); ?>
                </span>
			</a>
		<?php }
	}
	
	add_action( 'etienne_elated_action_after_wrapper_inner', 'etienne_elated_back_to_top_button', 30 );
}

if ( ! function_exists( 'etienne_elated_get_page_id' ) ) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see etienne_elated_is_woocommerce_installed()
	 * @see etienne_elated_is_woocommerce_shop()
	 */
	function etienne_elated_get_page_id() {
		if ( etienne_elated_is_woocommerce_installed() && etienne_elated_is_woocommerce_shop() ) {
			return etienne_elated_get_woo_shop_page_id();
		}

		if ( etienne_elated_is_default_wp_template() ) {
			return - 1;
		}

		return get_queried_object_id();
	}
}

if ( ! function_exists( 'etienne_elated_get_multisite_blog_id' ) ) {
	/**
	 * Check is multisite and return blog id
	 *
	 * @return int
	 */
	function etienne_elated_get_multisite_blog_id() {
		if ( is_multisite() ) {
			return get_blog_details()->blog_id;
		}
	}
}

if ( ! function_exists( 'etienne_elated_is_default_wp_template' ) ) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function etienne_elated_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'etienne_elated_has_shortcode' ) ) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function etienne_elated_has_shortcode( $shortcode, $content = '' ) {
		$has_shortcode = false;

		if ( $shortcode ) {
			//if content variable isn't past
			if ( $content == '' ) {
				//take content from current post
				$page_id = etienne_elated_get_page_id();
				if ( ! empty( $page_id ) ) {
					$current_post = get_post( $page_id );

					if ( is_object( $current_post ) && property_exists( $current_post, 'post_content' ) ) {
						$content = $current_post->post_content;
					}
				}
			}

			//does content has shortcode added?
			if( has_shortcode( $content, $shortcode ) ) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}

if ( ! function_exists( 'etienne_elated_get_unique_page_class' ) ) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * $params int $id is page id
	 * $params bool $allowSingleProductOption
	 * @return string
	 */
	function etienne_elated_get_unique_page_class( $id, $allowSingleProductOption = false ) {
		$page_class = '';

		if ( etienne_elated_is_woocommerce_installed() && $allowSingleProductOption ) {

			if ( is_product() ) {
				$id = get_the_ID();
			}
		}

		if ( is_single() ) {
			$page_class = '.postid-' . $id;
		} elseif ( is_home() ) {
			$page_class .= '.home';
		} elseif ( is_archive() || $id === etienne_elated_get_woo_shop_page_id() ) {
			$page_class .= '.archive';
		} elseif ( is_search() ) {
			$page_class .= '.search';
		} elseif ( is_404() ) {
			$page_class .= '.error404';
		} else {
			$page_class .= '.page-id-' . $id;
		}

		return $page_class;
	}
}

if ( ! function_exists( 'etienne_elated_page_custom_style' ) ) {
	/**
	 * Function that print custom page style
	 */
	function etienne_elated_page_custom_style() {
		$style = apply_filters( 'etienne_elated_filter_add_page_custom_style', $style = '' );

		if ( $style !== '' ) {

			if ( etienne_elated_is_woocommerce_installed() && etienne_elated_load_woo_assets() ) {
				wp_add_inline_style( 'etienne-elated-woo', $style );
			} else {
				wp_add_inline_style( 'etienne-elated-modules', $style );
			}
		}
	}

	add_action( 'wp_enqueue_scripts', 'etienne_elated_page_custom_style' );
}

if ( ! function_exists( 'etienne_elated_print_custom_js' ) ) {
	/**
	 * Prints out custom css from theme options
	 */
	function etienne_elated_print_custom_js() {
		$custom_js = etienne_elated_options()->getOptionValue( 'custom_js' );

		if ( ! empty( $custom_js ) ) {
			wp_add_inline_script( 'etienne-elated-modules', $custom_js );
		}
	}

	add_action( 'wp_enqueue_scripts', 'etienne_elated_print_custom_js' );
}

if ( ! function_exists( 'etienne_elated_get_global_variables' ) ) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function etienne_elated_get_global_variables() {
		$global_variables = array();
		
		$global_variables['eltdfAddForAdminBar']      = is_admin_bar_showing() ? 32 : 0;
		$global_variables['eltdfElementAppearAmount'] = -100;
		$global_variables['eltdfAjaxUrl']             = esc_url( admin_url( 'admin-ajax.php' ) );
		$global_variables['sliderNavPrevArrow']       = 'icon-arrows-slim-left';
		$global_variables['sliderNavNextArrow']       = 'icon-arrows-slim-right';
		
		$global_variables = apply_filters( 'etienne_elated_filter_js_global_variables', $global_variables );
		
		wp_localize_script( 'etienne-elated-modules', 'eltdfGlobalVars', array(
			'vars' => $global_variables
		) );
	}

	add_action( 'wp_enqueue_scripts', 'etienne_elated_get_global_variables' );
}

if ( ! function_exists( 'etienne_elated_per_page_js_variables' ) ) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function etienne_elated_per_page_js_variables() {
		$per_page_js_vars = apply_filters( 'etienne_elated_filter_per_page_js_vars', array() );

		wp_localize_script( 'etienne-elated-modules', 'eltdfPerPageVars', array(
			'vars' => $per_page_js_vars
		) );
	}

	add_action( 'wp_enqueue_scripts', 'etienne_elated_per_page_js_variables' );
}

if ( ! function_exists( 'etienne_elated_content_elem_style_attr' ) ) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function etienne_elated_content_elem_style_attr() {
		$styles = apply_filters( 'etienne_elated_filter_content_elem_style_attr', array() );

		etienne_elated_inline_style( $styles );
	}
}

if ( ! function_exists( 'etienne_elated_core_plugin_installed' ) ) {
	/**
	 * Function that checks if Elated Core plugin installed
	 * @return bool
	 */
	function etienne_elated_core_plugin_installed() {
		return defined( 'ETIENNE_CORE_VERSION' );
	}
}

if ( ! function_exists( 'etienne_elated_is_woocommerce_installed' ) ) {
	/**
	 * Function that checks if Woocommerce plugin installed
	 * @return bool
	 */
	function etienne_elated_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'etienne_elated_visual_composer_installed' ) ) {
	/**
	 * Function that checks if Visual Composer plugin installed
	 * @return bool
	 */
	function etienne_elated_visual_composer_installed() {
		return class_exists( 'WPBakeryVisualComposerAbstract' );
	}
}

if ( ! function_exists( 'etienne_elated_revolution_slider_installed' ) ) {
	/**
	 * Function that checks if Revolution Slider plugin installed
	 * @return bool
	 */
	function etienne_elated_revolution_slider_installed() {
		return class_exists( 'RevSliderFront' );
	}
}

if ( ! function_exists( 'etienne_elated_contact_form_7_installed' ) ) {
	/**
	 * Function that checks if Contact Form 7 plugin installed
	 * @return bool
	 */
	function etienne_elated_contact_form_7_installed() {
		return defined( 'WPCF7_VERSION' );
	}
}

if ( ! function_exists( 'etienne_elated_is_wpml_installed' ) ) {
	/**
	 * Function that checks if WPML plugin installed
	 * @return bool
	 */
	function etienne_elated_is_wpml_installed() {
		return defined( 'ICL_SITEPRESS_VERSION' );
	}
}

if ( ! function_exists( 'etienne_elated_is_gutenberg_installed' ) ) {
	/**
	 * Function that checks if Gutenberg plugin installed
	 * @return bool
	 */
	function etienne_elated_is_gutenberg_installed() {
		return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
	}
}

if ( ! function_exists( 'etienne_elated_max_image_width_srcset' ) ) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function etienne_elated_max_image_width_srcset() {
		return 1920;
	}
	
	add_filter( 'max_srcset_image_width', 'etienne_elated_max_image_width_srcset' );
}

if(!function_exists('etienne_elated_yith_wcwl_installed')) {
    function etienne_elated_yith_wcwl_installed() {
        return defined('YITH_WCWL');
    }
}


if ( ! function_exists( 'etienne_elated_has_dashboard_shortcodes' ) ) {
	/**
	 * Function that checks if current page has at least one of dashboard shortcodes added
	 * @return bool
	 */
	function etienne_elated_has_dashboard_shortcodes() {
		$dashboard_shortcodes = array();

		$dashboard_shortcodes = apply_filters( 'etienne_elated_filter_dashboard_shortcodes_list', $dashboard_shortcodes );

		foreach ( $dashboard_shortcodes as $dashboard_shortcode ) {
			$has_shortcode = etienne_elated_has_shortcode( $dashboard_shortcode );

			if ( $has_shortcode ) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('etienne_elated_add_grid_lines')) {
    /**
     * Set background lines
     *
     * @return html
     */
    function etienne_elated_add_grid_lines() {
        $id = etienne_elated_get_page_id();
        $enable_grid_lines = etienne_elated_get_meta_field_intersect('content_grid_lines',$id);

        $html = '';
        if($enable_grid_lines === 'yes'){
            $html .= '<div class="eltdf-grid-lines-holder eltdf-grid-columns-4">';
            for ($i = 1; $i <= 4; $i++) {
                $html .= '<div class="eltdf-grid-line eltdf-grid-column-4"></div>';
            }
            $html .= '</div>';
        }
	
	    echo elaine_edge_display_content_output($html);
    }

    add_filter('etienne_elated_action_after_container_open', 'etienne_elated_add_grid_lines');
}

if(!function_exists('etienne_elated_background_image_marquee')) {
    /**
     * Set background image marquee
     *
     * @return html
     */
    function etienne_elated_background_image_marquee() {
        $id = etienne_elated_get_page_id();
		$image = get_post_meta( $id, 'eltdf_background_image_marquee_meta', true );

		$html = '';
		
        if(! empty($image)){
			$html .= '<div id="eltdf-page-marquee" class="eltdf-image-marquee-holder">';
			$html .= '<div class="eltdf-image-marquee">';
			$html .= '<div class="eltdf-image eltdf-original">';
			$html .= '<img src="' .  $image . '" alt="'. get_the_title(attachment_url_to_postid($image)) .'" />';
			$html .= '</div>';
			$html .= '<div class="eltdf-image eltdf-aux">';
			$html .= '<img src="' .  $image . '" alt="'. get_the_title(attachment_url_to_postid($image)) .'" />';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
	
	    echo elaine_edge_display_content_output($html);
    }

    add_filter('etienne_elated_action_after_container_open', 'etienne_elated_background_image_marquee');
}

if( ! function_exists('etienne_elated_get_formated_output') ){

    function etienne_elated_get_formated_output($output){

        if(!empty($output)){
            return $output;
        } else{
            return '';
        }

    }
}