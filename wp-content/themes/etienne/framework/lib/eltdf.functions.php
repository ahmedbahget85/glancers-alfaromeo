<?php

/**
 * Function that checks if option has value from theme options.
 * It first checks global $etienne_elated_global_options variable and if option does'nt exists there
 * it checks default theme options
 *
 * @param $name string name of the option to retrieve
 *
 * @return bool
 */
function etienne_elated_option_has_value( $name ) {
	global $etienne_elated_global_options;
	global $etienne_elated_global_Framework;
	
	if ( array_key_exists( $name, $etienne_elated_global_Framework->eltdOptions->options ) ) {
		return isset( $etienne_elated_global_options[ $name ] ) && $etienne_elated_global_options[ $name ] !== '';
	} else {
		global $post;
		
		$value = get_post_meta( $post->ID, $name, true );
		
		return isset( $value ) && $value !== '';
	}
}

/**
 * Function that gets option by it's name.
 * It first checks if option exists in $etienne_elated_global_options global array and if it does'nt exists there
 * it checks default theme options array.
 *
 * @param $name string name of the option to retrieve
 *
 * @return mixed|void
 */
function etienne_elated_option_get_value( $name ) {
	global $etienne_elated_global_options;
	global $etienne_elated_global_Framework;
	
	if ( array_key_exists( $name, $etienne_elated_global_Framework->eltdOptions->options ) ) {
		if ( isset( $etienne_elated_global_options[ $name ] ) && $etienne_elated_global_options[ $name ] !== '' ) {
			return $etienne_elated_global_options[ $name ];
		} else {
			return $etienne_elated_global_Framework->eltdOptions->getOption( $name );
		}
	} else {
		global $post;
		
		if ( ! empty( $post ) ) {
			$value = get_post_meta( $post->ID, $name, true );
		}
		if ( isset( $value ) && $value !== '' ) {
			return $value;
		} else {
			return $etienne_elated_global_Framework->eltdMetaBoxes->getOption( $name );
		}
	}
}

/**
 * Function that gets attachment thumbnail url from attachment url
 *
 * @param $attachment_url string url of the attachment
 *
 * @return bool|string
 *
 * @see etienne_elated_get_attachment_id_from_url()
 */
function etienne_elated_get_attachment_thumb_url( $attachment_url ) {
	$attachment_id = etienne_elated_get_attachment_id_from_url( $attachment_url );
	
	if ( ! empty( $attachment_id ) ) {
		return wp_get_attachment_thumb_url( $attachment_id );
	} else {
		return $attachment_url;
	}
}

/**
 * Function that registers skin style. Wrapper around wp_register_style function,
 * it prepends $src with skin path
 *
 * @param $handle string unique key for style
 * @param $src string path inside skin folder
 * @param array $deps array of handles that style will depend on
 * @param bool|string $ver whether to add version string or not.
 * @param string $media media for which to add style. Defaults to 'all'
 *
 * @see wp_register_style()
 */
function etienne_elated_register_skin_style( $handle, $src, $deps = array(), $ver = false, $media = 'all' ) {
	global $etienne_elated_global_Framework;
	
	$src = get_template_directory_uri() . '/framework/admin/skins/' . $etienne_elated_global_Framework->getSkin() . '/' . $src;
	wp_register_style( $handle, $src, $deps = array(), $ver = false, $media = 'all' );
}

/**
 * Function that registers skin script. Wrapper around wp_register_script function,
 * it prepends $src with skin path
 *
 * @param $handle string unique key for style
 * @param $src string path inside skin folder
 * @param array $deps array of handles that style will depend on
 * @param bool|string $ver whether to add version string or not.
 * @param bool $in_footer whether to include script in footer or not.
 *
 * @see wp_register_script()
 */
function etienne_elated_register_skin_script( $handle, $src, $deps = array(), $ver = false, $in_footer = false ) {
	global $etienne_elated_global_Framework;
	
	$src = get_template_directory_uri() . '/framework/admin/skins/' . $etienne_elated_global_Framework->getSkin() . '/' . $src;
	wp_register_script( $handle, $src, $deps, $ver, $in_footer );
}

if ( ! function_exists( 'etienne_elated_generate_dynamic_css_and_js' ) ) {
	/**
	 * Function that gets content of dynamic assets files and puts that in static ones
	 */
	function etienne_elated_generate_dynamic_css_and_js() {
		global $wp_filesystem;
		WP_Filesystem();
		
		if ( etienne_elated_is_css_folder_writable() ) {
			$css_dir = ELATED_ASSETS_ROOT_DIR . '/css/';
			
			ob_start();
			include_once $css_dir . 'style_dynamic.php';
			$css = ob_get_clean();
			if ( is_multisite() ) {
				$wp_filesystem->put_contents( $css_dir . 'style_dynamic_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css', $css );
			} else {
				$wp_filesystem->put_contents( $css_dir . 'style_dynamic.css', $css );
			}
			
			ob_start();
			include_once $css_dir . 'style_dynamic_responsive.php';
			$css = ob_get_clean();
			if ( is_multisite() ) {
				$wp_filesystem->put_contents( $css_dir . 'style_dynamic_responsive_ms_id_' . etienne_elated_get_multisite_blog_id() . '.css', $css );
			} else {
				$wp_filesystem->put_contents( $css_dir . 'style_dynamic_responsive.css', $css );
			}
		}
	}
	
	add_action( 'etienne_elated_action_after_theme_option_save', 'etienne_elated_generate_dynamic_css_and_js' );
}

if ( ! function_exists( 'etienne_elated_gallery_upload_get_images' ) ) {
	/**
	 * Function that outputs single image html that is used in multiple image upload field
	 * Hooked to wp_ajax_etienne_elated_gallery_upload_get_images action
	 */
	function etienne_elated_gallery_upload_get_images() {
		$ids = sanitize_text_field($_POST['ids']);
		$ids = explode( ",", $ids );
		
		foreach ( $ids as $id ):
			$image = wp_get_attachment_image_src( $id, 'thumbnail', true );
			echo '<li class="eltdf-gallery-image-holder"><img src="' . esc_url( $image[0] ) . '"/></li>';
		endforeach;
		
		exit;
	}
	
	add_action( 'wp_ajax_etienne_elated_gallery_upload_get_images', 'etienne_elated_gallery_upload_get_images' );
}

if ( ! function_exists( 'etienne_elated_hex2rgb' ) ) {
	/**
	 * Function that transforms hex color to rgb color
	 *
	 * @param $hex string original hex string
	 *
	 * @return array array containing three elements (r, g, b)
	 */
	function etienne_elated_hex2rgb( $hex ) {
		$hex = str_replace( "#", "", $hex );
		
		if ( strlen( $hex ) == 3 ) {
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		} else {
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
		
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}
}

if ( ! function_exists( 'etienne_elated_addslashes' ) ) {
	/**
	 * Function that checks if magic quotes are turned on (for older versions of php) and returns escaped string
	 *
	 * @param $str string string to be escaped
	 *
	 * @return string escaped string
	 */
	function etienne_elated_addslashes( $str ) {
		//is magic quotes turned off in php.ini?
		if ( ! get_magic_quotes_gpc() ) {
			//apply addslashes
			$str = addslashes( $str );
		}
		
		//return escaped string
		return $str;
	}
}

if ( ! function_exists( 'etienne_elated_get_attachment_meta' ) ) {
	/**
	 * Function that returns attachment meta data from attachment id
	 *
	 * @param $attachment_id
	 * @param array $keys sub array of attachment meta
	 *
	 * @return array|mixed
	 */
	function etienne_elated_get_attachment_meta( $attachment_id, $keys = array() ) {
		$meta_data = array();
		
		//is attachment id set?
		if ( ! empty( $attachment_id ) ) {
			//get all post meta for given attachment id
			$meta_data = get_post_meta( $attachment_id, '_wp_attachment_metadata', true );
			
			//is subarray of meta array keys set?
			if ( is_array( $keys ) && count( $keys ) ) {
				$sub_array = array();
				
				//for each defined key
				foreach ( $keys as $key ) {
					//check if that key exists in all meta array
					if ( array_key_exists( $key, $meta_data ) ) {
						//assign key from meta array for current key to meta subarray
						$sub_array[ $key ] = $meta_data[ $key ];
					}
				}
				
				//we want meta array to be subarray because that is what used whants to get
				$meta_data = $sub_array;
			}
		}
		
		//return meta array
		return $meta_data;
	}
}

if ( ! function_exists( 'etienne_elated_get_attachment_id_from_url' ) ) {
	/**
	 * Function that retrieves attachment id for passed attachment url
	 *
	 * @param $attachment_url
	 *
	 * @return null|string
	 */
	function etienne_elated_get_attachment_id_from_url( $attachment_url ) {
		global $wpdb;
		$attachment_id = '';
		
		//is attachment url set?
		if ( $attachment_url !== '' ) {
			//prepare query
			
			$query = $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid=%s", $attachment_url );
			
			//get attachment id
			$attachment_id = $wpdb->get_var( $query );
		}
		
		//return id
		return $attachment_id;
	}
}

if ( ! function_exists( 'etienne_elated_get_attachment_meta_from_url' ) ) {
	/**
	 * Function that returns meta array for give attachment url
	 *
	 * @param $attachment_url
	 * @param array $keys sub array of attachment meta
	 *
	 * @return array|mixed
	 *
	 * @see etienne_elated_get_attachment_id_from_url()
	 * @see etienne_elated_get_attachment_meta()
	 *
	 * @version 0.1
	 */
	function etienne_elated_get_attachment_meta_from_url( $attachment_url, $keys = array() ) {
		$attachment_meta = array();
		
		//get attachment id for attachment url
		$attachment_id = etienne_elated_get_attachment_id_from_url( $attachment_url );
		
		//is attachment id set?
		if ( ! empty( $attachment_id ) ) {
			//get post meta
			$attachment_meta                  = etienne_elated_get_attachment_meta( $attachment_id, $keys );
			$attachment_meta['attachment_id'] = $attachment_id;
		}
		
		//return post meta
		return $attachment_meta;
	}
}

if ( ! function_exists( 'etienne_elated_get_image_dimensions' ) ) {
	/**
	 * Function that returns image sizes array. First looks in post_meta table if attachment exists in the database,
	 * if it does not than it uses getimagesize PHP function to get image sizes
	 *
	 * @param $url string url of the image
	 *
	 * @return array array of image sizes that contains height and width
	 *
	 * @see  etienne_elated_get_attachment_meta_from_url()
	 * @uses getimagesize
	 *
	 * @version 0.1
	 */
	function etienne_elated_get_image_dimensions( $url ) {
		$image_sizes = array();
		
		//is url passed?
		if ( $url !== '' ) {
			//get image sizes from posts meta if attachment exists
			$image_sizes = etienne_elated_get_attachment_meta_from_url( $url, array( 'width', 'height' ) );
			
			//image does not exists in post table, we have to use PHP way of getting image size
			if ( ! count( $image_sizes ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
				
				//can we open file by url?
				if ( ini_get( 'allow_url_fopen' ) == 1 && file_exists( $url ) ) {
					list( $width, $height, $type, $attr ) = getimagesize( $url );
				} else {
					//we can't open file directly, have to locate it with relative path.
					$image_obj           = parse_url( $url );
					$image_relative_path = rtrim( get_home_path(), '/' ) . $image_obj['path'];
					
					if ( file_exists( $image_relative_path ) ) {
						list( $width, $height, $type, $attr ) = getimagesize( $image_relative_path );
					}
				}
				
				//did we get width and height from some of above methods?
				if ( isset( $width ) && isset( $height ) ) {
					//set them to our image sizes array
					$image_sizes = array(
						'width'  => $width,
						'height' => $height
					);
				}
			}
		}
		
		return $image_sizes;
	}
}

if ( ! function_exists( 'etienne_elated_get_native_fonts_list' ) ) {
	/**
	 * Function that returns array of native fonts
	 * @return array
	 */
	function etienne_elated_get_native_fonts_list() {
		
		return apply_filters( 'etienne_elated_filter_get_native_fonts_list', array(
			'Arial',
			'Arial Black',
			'Comic Sans MS',
			'Courier New',
			'Georgia',
			'Impact',
			'Lucida Console',
			'Lucida Sans Unicode',
			'Palatino Linotype',
			'Tahoma',
			'Times New Roman',
			'Trebuchet MS',
			'Verdana'
		) );
	}
}

if ( ! function_exists( 'etienne_elated_get_native_fonts_array' ) ) {
	/**
	 * Function that returns formatted array of native fonts
	 *
	 * @uses etienne_elated_get_native_fonts_list()
	 * @return array
	 */
	function etienne_elated_get_native_fonts_array() {
		$native_fonts_list  = etienne_elated_get_native_fonts_list();
		$native_font_index  = 0;
		$native_fonts_array = array();
		
		foreach ( $native_fonts_list as $native_font ) {
			$native_fonts_array[ $native_font_index ] = array( 'family' => $native_font );
			$native_font_index ++;
		}
		
		return $native_fonts_array;
	}
}

if ( ! function_exists( 'etienne_elated_is_native_font' ) ) {
	/**
	 * Function that checks if given font is native font
	 *
	 * @param $font_family string
	 *
	 * @return bool
	 */
	function etienne_elated_is_native_font( $font_family ) {
		return in_array( str_replace( '+', ' ', $font_family ), etienne_elated_get_native_fonts_list() );
	}
}

if ( ! function_exists( 'etienne_elated_merge_fonts' ) ) {
	/**
	 * Function that merge google and native fonts
	 *
	 * @uses etienne_elated_get_native_fonts_array()
	 * @return array
	 */
	function etienne_elated_merge_fonts() {
		global $etienne_elated_global_fonts_array;
		
		if ( isset( $etienne_elated_global_fonts_array ) ) {
			$native_fonts = etienne_elated_get_native_fonts_array();
			
			if ( is_array( $native_fonts ) && count( $native_fonts ) ) {
				
				if ( etienne_elated_core_plugin_installed() ) {
					$etienne_elated_global_fonts_array = array_merge( $native_fonts, $etienne_elated_global_fonts_array );
				} else {
					$etienne_elated_global_fonts_array = $native_fonts;
				}
			}
		}
	}
	
	add_action( 'admin_init', 'etienne_elated_merge_fonts' );
}

if ( ! function_exists( 'etienne_elated_is_css_folder_writable' ) ) {
	/**
	 * Function that checks if css folder is writable
	 * @return bool
	 *
	 * @version 0.1
	 * @uses is_writable()
	 */
	function etienne_elated_is_css_folder_writable() {
		$css_dir = ELATED_ASSETS_ROOT_DIR . '/css';
		
		return is_writable( $css_dir );
	}
}

if ( ! function_exists( 'etienne_elated_is_js_folder_writable' ) ) {
	/**
	 * Function that checks if js folder is writable
	 * @return bool
	 *
	 * @version 0.1
	 * @uses is_writable()
	 */
	function etienne_elated_is_js_folder_writable() {
		$js_dir = ELATED_ASSETS_ROOT_DIR . '/js';
		
		return is_writable( $js_dir );
	}
}

if ( ! function_exists( 'etienne_elated_assets_folders_writable' ) ) {
	/**
	 * Function that if css and js folders are writable
	 * @return bool
	 *
	 * @version 0.1
	 * @see etienne_elated_is_css_folder_writable()
	 * @see etienne_elated_is_js_folder_writable()
	 */
	function etienne_elated_assets_folders_writable() {
		return etienne_elated_is_css_folder_writable() && etienne_elated_is_js_folder_writable();
	}
}

if ( ! function_exists( 'etienne_elated_writable_assets_folders_notice' ) ) {
	/**
	 * Function that prints notice that css and js folders aren't writable. Hooks to admin_notices action
	 *
	 * @version 0.1
	 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
	 */
	function etienne_elated_writable_assets_folders_notice() {
		global $pagenow;
		
		$is_theme_options_page = isset( $_GET['page'] ) && strstr( $_GET['page'], ELATED_OPTIONS_SLUG );
		
		if ( $pagenow === 'admin.php' && $is_theme_options_page ) {
			if ( ! etienne_elated_assets_folders_writable() ) { ?>
				<div class="error">
					<p><?php esc_html_e( 'Note that writing permissions aren\'t set for folders containing css and js files on your server. We recommend setting writing permissions in order to optimize your site performance. For further instructions, please refer to our documentation.', 'etienne' ); ?></p>
				</div>
			<?php }
		}
	}
	
	add_action( 'admin_notices', 'etienne_elated_writable_assets_folders_notice' );
}

if ( ! function_exists( 'etienne_elated_inline_style' ) ) {
	/**
	 * Function that echoes generated style attribute
	 *
	 * @param $value string | array attribute value
	 *
	 * @see etienne_elated_get_inline_style()
	 */
	function etienne_elated_inline_style( $value ) {
		echo etienne_elated_get_inline_style( $value );
	}
}

if ( ! function_exists( 'etienne_elated_get_inline_style' ) ) {
	/**
	 * Function that generates style attribute and returns generated string
	 *
	 * @param $value string | array value of style attribute
	 *
	 * @return string generated style attribute
	 *
	 * @see etienne_elated_get_inline_style()
	 */
	function etienne_elated_get_inline_style( $value ) {
		return etienne_elated_get_inline_attr( $value, 'style', ';' );
	}
}

if ( ! function_exists( 'etienne_elated_class_attribute' ) ) {
	/**
	 * Function that echoes class attribute
	 *
	 * @param $value string value of class attribute
	 *
	 * @see etienne_elated_get_class_attribute()
	 */
	function etienne_elated_class_attribute( $value ) {
		echo etienne_elated_get_class_attribute( $value );
	}
}

if ( ! function_exists( 'etienne_elated_get_class_attribute' ) ) {
	/**
	 * Function that returns generated class attribute
	 *
	 * @param $value string value of class attribute
	 *
	 * @return string generated class attribute
	 *
	 * @see etienne_elated_get_inline_attr()
	 */
	function etienne_elated_get_class_attribute( $value ) {
		return etienne_elated_get_inline_attr( $value, 'class', ' ' );
	}
}

if ( ! function_exists( 'etienne_elated_get_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 * @param $allow_zero_values boolean allow data to have zero value
	 *
	 * @return string generated html attribute
	 */
	function etienne_elated_get_inline_attr( $value, $attr, $glue = '', $allow_zero_values = false ) {
		if ( $allow_zero_values ) {
			if ( $value !== '' ) {
				
				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} elseif ( $value !== '' ) {
					$properties = $value;
				}
				
				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		} else {
			if ( ! empty( $value ) ) {
				
				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} elseif ( $value !== '' ) {
					$properties = $value;
				}
				
				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		}
		
		return '';
	}
}

if ( ! function_exists( 'etienne_elated_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 *
	 * @return string generated html attribute
	 */
	function etienne_elated_inline_attr( $value, $attr, $glue = '' ) {
		echo etienne_elated_get_inline_attr( $value, $attr, $glue );
	}
}

if ( ! function_exists( 'etienne_elated_get_inline_attrs' ) ) {
	/**
	 * Generate multiple inline attributes
	 *
	 * @param $attrs
	 *
	 * @return string
	 */
	function etienne_elated_get_inline_attrs( $attrs, $allow_zero_values = false ) {
		$output = '';
		
		if ( is_array( $attrs ) && count( $attrs ) ) {
			if ( $allow_zero_values ) {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . etienne_elated_get_inline_attr( $value, $attr, '', true );
				}
			} else {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . etienne_elated_get_inline_attr( $value, $attr );
				}
			}
		}
		
		$output = ltrim( $output );
		
		return $output;
	}
}

if ( ! function_exists( 'etienne_elated_get_skin_uri' ) ) {
	/**
	 * Returns current skin URI
	 * @return mixed
	 */
	function etienne_elated_get_skin_uri() {
		global $etienne_elated_global_Framework;
		
		$current_skin = $etienne_elated_global_Framework->getSkin();
		
		return $current_skin->getSkinURI();
	}
}

if ( ! function_exists( 'etienne_elated_core_plugin_message' ) ) {
	/**
	 * Function that prints a mesasge in the admin if user hides TGMPA plugin activation message
	 */
	function etienne_elated_core_plugin_message() {
		if ( get_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice', true ) && ! etienne_elated_core_plugin_installed() ) {
			echo apply_filters( 'etienne_elated_filter_core_plugin_message', '<div class="update-nag">' . esc_html__( 'Installation of the "Elated Core" plugin is essential for proper theme functioning. Please ', 'etienne' ) . '<a href="' . esc_url( admin_url( 'themes.php?page=install-required-plugins' ) ) . '">' . esc_html__( 'install', 'etienne' ) . '</a>' . esc_html__( ' this plugin and activate it', 'etienne' ) . '</div>' );
		}
	}
	
	add_action( 'admin_notices', 'etienne_elated_core_plugin_message' );
}

if ( ! function_exists( 'etienne_elated_get_theme_info_item' ) ) {
	/**
	 * Returns desired info of the current theme
	 *
	 * @param $item string info item to get
	 *
	 * @return string
	 */
	function etienne_elated_get_theme_info_item( $item ) {
		if ( $item !== '' ) {
			$current_theme = wp_get_theme();
			
			if ( $current_theme->parent() ) {
				$current_theme = $current_theme->parent();
			}
			
			if ( $current_theme->exists() && $current_theme->get( $item ) != "" ) {
				return $current_theme->get( $item );
			}
		}
		
		return '';
	}
}

if ( ! function_exists( 'etienne_elated_resize_image' ) ) {
	/**
	 * Function that generates custom thumbnail for given attachment
	 *
	 * @param null $attach_id id of attachment
	 * @param null $attach_url URL of attachment
	 * @param int $width desired height of custom thumbnail
	 * @param int $height desired width of custom thumbnail
	 * @param bool $crop whether to crop image or not
	 *
	 * @return array returns array containing img_url, width and height
	 *
	 * @see etienne_elated_get_attachment_id_from_url()
	 * @see get_attached_file()
	 * @see wp_get_attachment_url()
	 * @see wp_get_image_editor()
	 */
	function etienne_elated_resize_image( $attach_id = null, $attach_url = null, $width = null, $height = null, $crop = true ) {
		$return_array = array();
		
		//is attachment id empty?
		if ( empty( $attach_id ) && $attach_url !== '' ) {
			//get attachment id from url
			$attach_id = etienne_elated_get_attachment_id_from_url( $attach_url );
		}
		
		if ( ! empty( $attach_id ) && ( isset( $width ) && isset( $height ) ) ) {
			
			//get file path of the attachment
			$img_path = get_attached_file( $attach_id );
			
			//get attachment url
			$img_url = wp_get_attachment_url( $attach_id );
			
			//break down img path to array so we can use it's components in building thumbnail path
			$img_path_array = pathinfo( $img_path );
			
			//build thumbnail path
			$new_img_path = $img_path_array['dirname'] . '/' . $img_path_array['filename'] . '-' . $width . 'x' . $height . '.' . $img_path_array['extension'];
			
			//build thumbnail url
			$new_img_url = str_replace( $img_path_array['filename'], $img_path_array['filename'] . '-' . $width . 'x' . $height, $img_url );
			
			//check if thumbnail exists by it's path
			if ( ! file_exists( $new_img_path ) ) {
				//get image manipulation object
				$image_object = wp_get_image_editor( $img_path );
				
				if ( ! is_wp_error( $image_object ) ) {
					//resize image and save it new to path
					$image_object->resize( $width, $height, $crop );
					$image_object->save( $new_img_path );
					
					//get sizes of newly created thumbnail.
					///we don't use $width and $height because those might differ from end result based on $crop parameter
					$image_sizes = $image_object->get_size();
					
					$width  = $image_sizes['width'];
					$height = $image_sizes['height'];
				}
			}
			
			//generate data to be returned
			$return_array = array(
				'img_url'    => $new_img_url,
				'img_width'  => $width,
				'img_height' => $height
			);
		} //attachment wasn't found, probably because it comes from external source
		elseif ( $attach_url !== '' && ( isset( $width ) && isset( $height ) ) ) {
			//generate data to be returned
			$return_array = array(
				'img_url'    => $attach_url,
				'img_width'  => $width,
				'img_height' => $height
			);
		}
		
		return $return_array;
	}
}

if ( ! function_exists( 'etienne_elated_generate_thumbnail' ) ) {
	/**
	 * Generates thumbnail img tag. It calls etienne_elated_resize_image function which resizes img on the fly
	 *
	 * @param null $attach_id attachment id
	 * @param null $attach_url attachment URL
	 * @param  int $width width of thumbnail
	 * @param int $height height of thumbnail
	 * @param bool $crop whether to crop thumbnail or not
	 *
	 * @return string generated img tag
	 *
	 * @see etienne_elated_resize_image()
	 * @see etienne_elated_get_attachment_id_from_url()
	 */
	function etienne_elated_generate_thumbnail( $attach_id = null, $attach_url = null, $width = null, $height = null, $crop = true ) {
		//is attachment id empty?
		if ( empty( $attach_id ) ) {
			//get attachment id from attachment url
			$attach_id = etienne_elated_get_attachment_id_from_url( $attach_url );
		}
		
		if ( ! empty( $attach_id ) || ! empty( $attach_url ) ) {
			$img_info = etienne_elated_resize_image( $attach_id, $attach_url, $width, $height, $crop );
			$img_alt  = ! empty( $attach_id ) ? get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) : '';
			
			if ( is_array( $img_info ) && count( $img_info ) ) {
				return '<img src="' . esc_url( $img_info['img_url'] ) . '" alt="' . esc_attr( $img_alt ) . '" width="' . esc_attr( $img_info['img_width'] ) . '" height="' . esc_attr( $img_info['img_height'] ) . '" />';
			}
		}
		
		return '';
	}
}

if ( ! function_exists( 'etienne_elated_get_template_part' ) ) {
	/**
	 * Loads template part with parameters. If file with slug parameter added exists it will load that file, else it will load file without slug added.
	 * Child theme friendly function
	 *
	 * @param string $template name of the template to load without extension
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param boolean $plugin if template path should be overridden with plugin module
	 */
	function etienne_elated_get_template_part( $template, $slug = '', $params = array(), $plugin = false ) {
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$templates = array();
		
		if ( $template !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$template}-{$slug}.php";
			}
			
			$templates[] = $template . '.php';
		}
		
		$located = etienne_elated_find_template_path( $templates, $plugin );
		
		if ( $located ) {
			include( $located );
		}
	}
}

if ( ! function_exists( 'etienne_elated_get_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param boolean $plugin if template path should be overridden with plugin module
	 *
	 * @see etienne_elated_get_template_part()
	 */
	function etienne_elated_get_module_template_part( $template, $module, $slug = '', $params = array(), $plugin = false ) {
		$root          = $plugin ? apply_filters( 'etienne_elated_filter_edit_module_template_path', $root = 'framework/modules/' ) : 'framework/modules/';
		$template_path = $root . $module;
		
		etienne_elated_get_template_part( $template_path . '/' . $template, $slug, $params, $plugin );
	}
}


if ( ! function_exists( 'etienne_elated_get_html_template_part' ) ) {
	/**
	 * Loads template part with parameters. If file with slug parameter added exists it will load that file, else it will load file without slug added.
	 * Child theme friendly function
	 *
	 * @param string $template name of the template to load without extension
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param boolean $plugin if template path should be overridden with plugin module
	 *
	 * @return html
	 */
	function etienne_elated_get_html_template_part( $template, $slug = '', $params = array(), $plugin = false ) {

		$html = '';

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		$templates = array();

		if ( $template !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$template}-{$slug}.php";
			}

			$templates[] = $template . '.php';
		}

		$located = etienne_elated_find_template_path( $templates, $plugin );

		if ( $located ) {
			ob_start();
			include( $located );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'etienne_elated_get_html_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param boolean $plugin if template path should be overridden with plugin module
	 *
	 * @return html
	 */
	function etienne_elated_get_html_module_template_part( $template, $module, $slug = '', $params = array(), $plugin = false ) {
		$root          = $plugin ? apply_filters( 'etienne_elated_filter_edit_html_module_template_path', $root = 'framework/modules/' ) : 'framework/modules/';
		$template_path = $root . $module;

		return etienne_elated_get_html_template_part( $template_path . '/' . $template, $slug, $params, $plugin );
	}
}

if ( ! function_exists( 'etienne_elated_get_blog_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 * @see etienne_elated_get_template_part()
	 */
	function etienne_elated_get_blog_module_template_part( $module, $slug = '', $params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = 'framework/modules/blog/' . $module;
		
		$temp = $template_path;
		
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$templates = array();
		
		if ( $temp !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$temp}-{$slug}.php";
			}
			$templates[] = $temp . '.php';
		}
		
		$located = etienne_elated_find_template_path( $templates );
		
		if ( $located ) {
			ob_start();
			include( $located );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'etienne_elated_find_template_path' ) ) {
	/**
	 * Find template path and return it
	 *
	 * @param $template_names
	 * @param $plugin
	 *
	 * @return string
	 */
	function etienne_elated_find_template_path( $template_names, $plugin = false ) {
		$located = '';
		foreach ( (array) $template_names as $template_name ) {
			if ( ! $template_name ) {
				continue;
			}
			if ( file_exists( get_stylesheet_directory() . '/' . $template_name ) ) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				break;
			} elseif ( file_exists( get_template_directory() . '/' . $template_name ) ) {
				$located = get_template_directory() . '/' . $template_name;
				break;
			} elseif ( $plugin && file_exists( $template_name ) ) {
				$located = $template_name;
				break;
			}
		}
		
		return $located;
	}
}

if ( ! function_exists( 'etienne_elated_filter_suffix' ) ) {
	/**
	 * Removes suffix from given value. Useful when you have to remove parts of user input, e.g px at the end of string
	 *
	 * @param $value
	 * @param $suffix
	 *
	 * @return string
	 */
	function etienne_elated_filter_suffix( $value, $suffix ) {
		if ( $value !== '' && etienne_elated_string_ends_with( $value, $suffix ) ) {
			$value = substr( $value, 0, strpos( $value, $suffix ) );
		}
		
		return $value;
	}
}

if ( ! function_exists( 'etienne_elated_filter_px' ) ) {
	/**
	 * Removes px in provided value if value ends with px
	 *
	 * @param $value
	 *
	 * @return string
	 *
	 * @see etienne_elated_filter_suffix
	 */
	function etienne_elated_filter_px( $value ) {
		return etienne_elated_filter_suffix( $value, 'px' );
	}
}

if ( ! function_exists( 'etienne_elated_string_ends_with' ) ) {
	/**
	 * Checks if $haystack ends with $needle and returns proper bool value
	 *
	 * @param $haystack string to check
	 * @param $needle string with which $haystack needs to end
	 *
	 * @return bool
	 */
	function etienne_elated_string_ends_with( $haystack, $needle ) {
		if ( $haystack !== '' && $needle !== '' ) {
			return ( substr( $haystack, - strlen( $needle ), strlen( $needle ) ) == $needle );
		}
		
		return true;
	}
}

if ( ! function_exists( 'etienne_elated_dynamic_css' ) ) {
	/**
	 * Generates css based on selector and rules that are provided
	 *
	 * @param array|string $selector selector for which to generate styles
	 * @param array $rules associative array of rules.
	 *
	 * Example of usage: if you want to generate this css:
	 *      header { width: 100%; }
	 * function call should look like this: etienne_elated_dynamic_css('header', array('width' => '100%'));
	 *
	 * @return string
	 */
	function etienne_elated_dynamic_css( $selector, $rules ) {
		$output = '';
		//check if selector and rules are valid data
		if ( ! empty( $selector ) && ( is_array( $rules ) && count( $rules ) ) ) {
			if ( ELATED_THEME_ENV === 'true' ) {
				$calling_function = debug_backtrace();
				
				if ( isset( $calling_function[0]['file'] ) && isset( $calling_function[1]['function'] ) ) {
					$output .= '/* generated in ' . $calling_function[0]['file'] . ' ' . $calling_function[1]['function'] . ' function */' . "\n";
				}
			}
			
			if ( is_array( $selector ) && count( $selector ) ) {
				$output .= implode( ', ', $selector );
			} else {
				$output .= $selector;
			}
			
			$output .= ' { ';
			foreach ( $rules as $prop => $value ) {
				if ( $prop !== '' ) {
					$output .= $prop . ': ' . esc_attr( $value ) . ';';
				}
			}
			
			$output .= '}';
		}
		
		return $output;
	}
}

if ( ! function_exists( 'etienne_elated_get_formatted_font_family' ) ) {
	/**
	 * Returns formatted font family name for css usage
	 *
	 * @param $value
	 *
	 * @return mixed
	 */
	function etienne_elated_get_formatted_font_family( $value ) {
		return str_replace( '+', ' ', $value );
	}
}

if ( ! function_exists( 'etienne_elated_active_widget' ) ) {
	/**
	 * Whether widget is displayed on the front-end.
	 */
	function etienne_elated_active_widget( $callback = false, $widget_id = false, $id_base = false, $skip_inactive = true ) {
		global $wp_registered_widgets;
		
		$sidebars_widgets = wp_get_sidebars_widgets();
		$sidebars_array   = array();
		
		if ( is_array( $sidebars_widgets ) ) {
			foreach ( $sidebars_widgets as $sidebar => $widgets ) {
				if ( $skip_inactive && ( 'wp_inactive_widgets' === $sidebar || 'orphaned_widgets' === substr( $sidebar, 0, 16 ) ) ) {
					continue;
				}
				if ( is_array( $widgets ) ) {
					foreach ( $widgets as $widget ) {
						if ( ( $callback && isset( $wp_registered_widgets[ $widget ]['callback'] ) && $wp_registered_widgets[ $widget ]['callback'] == $callback ) || ( $id_base && _get_widget_id_base( $widget ) == $id_base ) ) {
							if ( ! $widget_id || $widget_id == $wp_registered_widgets[ $widget ]['id'] ) {
								$sidebars_array[] = $sidebar;
							}
						}
					}
				}
			}
			
			return $sidebars_array;
		}
		
		return false;
	}
}

if ( ! function_exists( 'etienne_elated_widget_modified_before_title' ) ) {
	/**
	 * Return modified before title html with style attribute
	 *
	 * @param $before_title string to modified
	 * @param $title_styles array title styles
	 *
	 * @return string
	 */
	function etienne_elated_widget_modified_before_title( $before_title, $title_styles ) {
		return substr( $before_title, 0, strlen( $before_title ) - 1 ) . ' ' . etienne_elated_get_inline_style( $title_styles ) . '>';
	}
}

if ( ! function_exists( 'etienne_elated_execute_shortcode' ) ) {
	/**
	 * @param $shortcode_tag - shortcode base
	 * @param $atts - shortcode attributes
	 * @param null $content - shortcode content
	 *
	 * @return mixed|string
	 */
	function etienne_elated_execute_shortcode( $shortcode_tag, $atts, $content = null ) {
		global $shortcode_tags;
		
		if ( ! isset( $shortcode_tags[ $shortcode_tag ] ) ) {
			return;
		}
		
		if ( is_array( $shortcode_tags[ $shortcode_tag ] ) ) {
			$shortcode_array = $shortcode_tags[ $shortcode_tag ];
			
			return call_user_func( array(
				$shortcode_array[0],
				$shortcode_array[1]
			), $atts, $content, $shortcode_tag );
		}
		
		return call_user_func( $shortcode_tags[ $shortcode_tag ], $atts, $content, $shortcode_tag );
	}
}

if ( ! function_exists( 'etienne_elated_is_page_smooth_scroll_enabled' ) ) {
	/**
	 * Function that check is page smooth scroll is enabled
	 */
	function etienne_elated_is_page_smooth_scroll_enabled() {
        $mac_os = strpos( getenv("HTTP_USER_AGENT"), 'Mac' );
		
		$is_enabled = false;
		
		//is smooth scroll enabled enabled and not Mac device?
		if ( etienne_elated_options()->getOptionValue( 'page_smooth_scroll' ) == 'yes' && $mac_os == false ) {
			$is_enabled = true;
		}
		
		return $is_enabled;
	}
}

if ( ! function_exists( 'etienne_elated_show_comments' ) ) {
	/**
	 * Functions which check are comments enabled on page
	 *
	 * @return boolean
	 */
	function etienne_elated_show_comments() {
		$comments = false;
		$id       = etienne_elated_get_page_id();
		
		$page_comments_meta = get_post_meta( $id, 'eltdf_page_comments_meta', true );
		
		if ( ! empty( $page_comments_meta ) ) {
			$comments = $page_comments_meta == 'no' ? false : true;
		} else {
			if ( is_page() && etienne_elated_options()->getOptionValue( 'page_show_comments' ) == 'yes' ) {
				$comments = true;
			} elseif ( is_singular( 'post' ) && etienne_elated_options()->getOptionValue( 'blog_single_comments' ) == 'yes' ) {
				$comments = true;
			} else {
				$comments = apply_filters( 'etienne_elated_filter_post_type_comments', $comments );
			}
		}
		
		return $comments;
	}
}

if ( ! function_exists( 'etienne_elated_page_comments' ) ) {
	/**
	 * Functions which show comments on page
	 *
	 * @return boolean
	 */
	function etienne_elated_page_comments() {
		$comments = etienne_elated_show_comments();
		
		if ( $comments ) {
			comments_template( '', true );
		}
	}
	
	add_action( 'etienne_elated_action_page_after_content', 'etienne_elated_page_comments' );
}

if ( ! function_exists( 'etienne_elated_page_show_pagination' ) ) {
	/**
	 * Functions which show pagination on pages
	 *
	 * @return boolean
	 */
	function etienne_elated_page_show_pagination() {
		$args_pages = array(
			'before'   => '<div class="eltdf-single-links-pages"><div class="eltdf-single-links-pages-inner">',
			'after'    => '</div></div>',
			'pagelink' => '<span>%</span>'
		);
		
		wp_link_pages( $args_pages );
	}
	
	add_action( 'etienne_elated_action_page_after_content', 'etienne_elated_page_show_pagination' );
}

if ( ! function_exists( 'etienne_elated_icon_collections' ) ) {
	/**
	 * Returns instance of EtienneElatedClassIconCollections class
	 *
	 * @return EtienneElatedClassIconCollections
	 */
	function etienne_elated_icon_collections() {
		return EtienneElatedClassIconCollections::get_instance();
	}
}

if ( ! function_exists( 'etienne_elated_get_meta_field_intersect' ) ) {
	/**
	 * @param $name
	 * @param $post_id
	 *
	 * @return bool|mixed|void
	 */
	function etienne_elated_get_meta_field_intersect( $name, $post_id = '' ) {
		$post_id = ! empty( $post_id ) ? $post_id : get_the_ID();
		
		if ( etienne_elated_is_woocommerce_installed() && etienne_elated_is_woocommerce_shop() ) {
			$post_id = etienne_elated_get_woo_shop_page_id();
		}
		
		$value = etienne_elated_options()->getOptionValue( $name );
		
		if ( $post_id !== - 1 ) {
			$meta_field = get_post_meta( $post_id, 'eltdf_' . $name . '_meta', true );
			if ( $meta_field !== '' && $meta_field !== false ) {
				$value = $meta_field;
			}
		}
		
		$value = apply_filters( 'etienne_elated_meta_field_intersect_' . $name, $value );
		
		return $value;
	}
}

if ( ! function_exists( 'etienne_elated_get_typography_styles' ) ) {
	/**
	 * Generates typography styles for global options
	 *
	 * @param $prefix - unique name of global option
	 * @param $suffix - additional name of global option
	 *
	 * @return array
	 */
	function etienne_elated_get_typography_styles( $prefix = '', $suffix = '' ) {
		$color          = etienne_elated_options()->getOptionValue( $prefix . '_color' . $suffix );
		$font_family    = etienne_elated_options()->getOptionValue( $prefix . '_google_fonts' . $suffix );
		$font_size      = etienne_elated_options()->getOptionValue( $prefix . '_font_size' . $suffix );
		$line_height    = etienne_elated_options()->getOptionValue( $prefix . '_line_height' . $suffix );
		$font_style     = etienne_elated_options()->getOptionValue( $prefix . '_font_style' . $suffix );
		$font_weight    = etienne_elated_options()->getOptionValue( $prefix . '_font_weight' . $suffix );
		$letter_spacing = etienne_elated_options()->getOptionValue( $prefix . '_letter_spacing' . $suffix );
		$text_transform = etienne_elated_options()->getOptionValue( $prefix . '_text_transform' . $suffix );
		
		$styles = array();
		
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		if ( isset( $font_family ) && $font_family !== false && $font_family !== '-1' && $font_family !== '' ) {
			$styles['font-family'] = etienne_elated_get_formatted_font_family( $font_family );
		}
		if ( ! empty( $font_size ) ) {
			if ( etienne_elated_string_ends_with( $font_size, 'px' ) || etienne_elated_string_ends_with( $font_size, 'em' ) ) {
				$styles['font-size'] = $font_size;
			} else {
				$styles['font-size'] = etienne_elated_filter_px( $font_size ) . 'px';
			}
		}
		if ( ! empty( $line_height ) ) {
			if ( etienne_elated_string_ends_with( $line_height, 'px' ) || etienne_elated_string_ends_with( $line_height, 'em' ) ) {
				$styles['line-height'] = $line_height;
			} else {
				$styles['line-height'] = etienne_elated_filter_px( $line_height ) . 'px';
			}
		}
		if ( ! empty( $font_style ) ) {
			$styles['font-style'] = $font_style;
		}
		if ( ! empty( $font_weight ) ) {
			$styles['font-weight'] = $font_weight;
		}
		if ( $letter_spacing !== '' ) {
			if ( etienne_elated_string_ends_with( $letter_spacing, 'px' ) || etienne_elated_string_ends_with( $letter_spacing, 'em' ) ) {
				$styles['letter-spacing'] = $letter_spacing;
			} else {
				$styles['letter-spacing'] = etienne_elated_filter_px( $letter_spacing ) . 'px';
			}
		}
		if ( ! empty( $text_transform ) ) {
			$styles['text-transform'] = $text_transform;
		}
		
		return $styles;
	}
}

if ( ! function_exists( 'etienne_elated_get_responsive_typography_styles' ) ) {
	/**
	 * Generates typography responsive styles for global options
	 *
	 * @param $prefix - unique name of global option
	 * @param $suffix - additional name of global option
	 *
	 * @return array
	 */
	function etienne_elated_get_responsive_typography_styles( $prefix = '', $suffix = '' ) {
		$font_size      = etienne_elated_options()->getOptionValue( $prefix . '_font_size' . $suffix );
		$line_height    = etienne_elated_options()->getOptionValue( $prefix . '_line_height' . $suffix );
		$letter_spacing = etienne_elated_options()->getOptionValue( $prefix . '_letter_spacing' . $suffix );
		
		$styles = array();
		
		if ( ! empty( $font_size ) ) {
			if ( etienne_elated_string_ends_with( $font_size, 'px' ) || etienne_elated_string_ends_with( $font_size, 'em' ) ) {
				$styles['font-size'] = $font_size;
			} else {
				$styles['font-size'] = etienne_elated_filter_px( $font_size ) . 'px';
			}
		}
		if ( ! empty( $line_height ) ) {
			if ( etienne_elated_string_ends_with( $line_height, 'px' ) || etienne_elated_string_ends_with( $line_height, 'em' ) ) {
				$styles['line-height'] = $line_height;
			} else {
				$styles['line-height'] = etienne_elated_filter_px( $line_height ) . 'px';
			}
		}
		if ( $letter_spacing !== '' ) {
			if ( etienne_elated_string_ends_with( $letter_spacing, 'px' ) || etienne_elated_string_ends_with( $letter_spacing, 'em' ) ) {
				$styles['letter-spacing'] = $letter_spacing;
			} else {
				$styles['letter-spacing'] = etienne_elated_filter_px( $letter_spacing ) . 'px';
			}
		}
		
		return $styles;
	}
}

if ( ! function_exists( 'etienne_elated_paged_home' ) ) {
	/**
	 * Set false to on paged url on homepage
	 *
	 * @return int
	 */
	function etienne_elated_paged_home() {
		global $wp_query;
		
		if ( is_page() && ! is_feed() && 'page' == get_option( 'show_on_front' ) && $wp_query->queried_object->ID == get_option( 'page_on_front' ) ) {
			$redirect_url = false;
			
			return $redirect_url;
		}
	}
	
	add_filter( 'redirect_canonical', 'etienne_elated_paged_home' );
}

if ( ! function_exists( 'etienne_elated_register_button' ) ) {
	/**
	 * Register button with shortcodes for WP editor
	 *
	 * @param $buttons
	 *
	 * @return mixed
	 */
	function etienne_elated_register_button( $buttons ) {
		array_push( $buttons, "|", "eltdf_shortcodes" );
		
		return $buttons;
	}
}

if ( ! function_exists( 'etienne_elated_add_plugin' ) ) {
	function etienne_elated_add_plugin( $plugin_array ) {
		$plugin_array['eltdf_shortcodes'] = ELATED_FRAMEWORK_ROOT . '/admin/assets/js/eltdf-ui/eltdf-shortcodes.js';
		
		return $plugin_array;
	}
}

if ( ! function_exists( 'etienne_elated_shortcodes_button' ) ) {
	/**
	 * Register Elated Shortcodes in WP Editor
	 */
	function etienne_elated_shortcodes_button() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		
		if ( get_user_option( 'rich_editing' ) == 'true' ) {
			add_filter( 'mce_external_plugins', 'etienne_elated_add_plugin' );
			add_filter( 'mce_buttons', 'etienne_elated_register_button' );
		}
	}
	
	add_action( 'after_setup_theme', 'etienne_elated_shortcodes_button' );
}

/**
 * Get size information for all currently-registered image sizes.
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
function etienne_elated_get_image_sizes() {
	global $_wp_additional_image_sizes;
	
	$sizes = array();
	
	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array( 'medium', 'large' ) ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
			);
		}
	}
	
	return $sizes;
}

/**
 * Get size information for a specific image size.
 *
 * @uses   etienne_elated_get_image_size()
 *
 * @param  string $size The image size for which to retrieve data.
 *
 * @return bool|array $size Size data about an image size or false if the size doesn't exist.
 */
function etienne_elated_get_image_size( $size ) {
	$sizes = etienne_elated_get_image_sizes();
	
	if ( isset( $sizes[ $size ] ) ) {
		return $sizes[ $size ];
	}
	
	return false;
}

if ( ! function_exists( 'etienne_elated_option_get_uploaded_file_icon' ) ) {
	function etienne_elated_option_get_uploaded_file_icon( $value ) {
		$id = etienne_elated_get_attachment_id_from_url( $value );
		
		return wp_mime_type_icon( $id );
	}
}

if ( ! function_exists( 'etienne_elated_option_get_uploaded_file_title' ) ) {
	function etienne_elated_option_get_uploaded_file_title( $value ) {
		$id = etienne_elated_get_attachment_id_from_url( $value );
		
		return get_the_title( $id );
	}
}

if ( ! function_exists( 'etienne_elated_return_button_html' ) ) {
	function etienne_elated_return_button_html( $params = array() ) {
		$html = '';
		
		$type = ! empty( $params['type'] ) ? esc_attr( $params['type'] ) : 'solid';
		$size = ! empty( $params['size'] ) ? esc_attr( $params['size'] ) : 'medium';
		$link = ! empty( $params['link'] ) ? esc_url( $params['link'] ) : '#';
		$text = ! empty( $params['text'] ) ? esc_attr( $params['text'] ) : '';
		$custom_class = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		if ( etienne_elated_core_plugin_installed() ) {
			$html .= etienne_elated_get_button_html(
				apply_filters(
					'etienne_elated_filter_blog_template_read_more_button',
					array(
						'type'         => $type,
						'size'         => $size,
						'link'         => $link,
						'text'         => $text,
						'custom_class' => $custom_class
					)
				)
			);
		} else {
			$html .= '<a itemprop="url" href="' . $link . '" class="eltdf-btn eltdf-btn-' . $size . ' eltdf-btn-' . $type . ' ' . $custom_class .'">';
				$html .= '<span class="eltdf-btn-text">' . $text . '</span>';
			$html .= '</a>';
		}
		
		return $html;
	}
}

if ( ! function_exists( 'etienne_elated_get_holder_data_for_cpt' ) ) {
	function etienne_elated_get_holder_data_for_cpt( $params, $additional_params, $additional_data = '' ) {
		$dataString = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$query_results           = $additional_params['query_results'];
		$params['max_num_pages'] = $query_results->max_num_pages;
		
		if ( ! empty( $paged ) ) {
			$params['next_page'] = $paged + 1;
		}
		
		foreach ( $params as $key => $value ) {
			if ( $value !== '' ) {
				$new_key = str_replace( '_', '-', $key );
				
				$dataString .= ' data-' . $new_key . '=' . esc_attr( str_replace( ' ', '', $value ) );
			}
		}
		
		if ( ! empty( $additional_data ) ) {
			$dataString .= ' ' . esc_attr( $additional_data );
		}
		
		return $dataString;
	}
}

if ( ! function_exists( 'etienne_elated_return_dependency_options_array' ) ) {
	function etienne_elated_return_dependency_options_array( $dependencyValues = array(), $hideContainer = false, $repeater = false ) {
		$returnArray   = array();
		$optionsValues = array();
		
		if ( ! empty( $dependencyValues ) ) {
			foreach ( $dependencyValues as $key => $values ) {

				if ( is_array( $values ) ) {
				    $dataValues[ $key ] = implode( ',', $values );

					if ( $repeater ) {
				    	$repKey = explode('[', str_replace(']', '', $key) );

				    	if ( ! empty ($repKey) && count($repKey) > 2) {
					    	$repMainOption = $repKey[0];
					    	$repKeyIndex = $repKey[1];
					    	$repMainKey = $repKey[2];

					    	if (count($repKey) === 5) {
						    	$repKeyInnerIndex = $repKey[3];
						    	$repMainInnerKey = $repKey[4];
								$repOption = etienne_elated_option_get_value( $repMainOption );

						    	if ( in_array($repOption[$repKeyIndex][$repMainKey][$repKeyInnerIndex][$repMainInnerKey], $values) ) {
						   			$optionsValues[] = true;
						    	} else {
									$optionsValues[] = false;
								}
					    	} else {
								$repOption = etienne_elated_option_get_value( $repMainOption );

						    	if ( in_array($repOption[$repKeyIndex][$repMainKey], $values) ) {
						   			$optionsValues[] = true;
						    	} else {
									$optionsValues[] = false;
								}
					    	}
				    	}
				    } else if ( in_array( etienne_elated_option_get_value( $key ), $values ) ) {
						$optionsValues[] = true;
					} else {
						$optionsValues[] = false;
					}
				} else {
				    $dataValues[ $key ] = $values;

				    if ( $repeater ) {
				    	$repKey = explode('[', str_replace(']', '', $key) );

				    	if ( ! empty ($repKey) && count($repKey) > 2) {
					    	$repMainOption = $repKey[0];
					    	$repKeyIndex = $repKey[1];
					    	$repMainKey = $repKey[2];

					    	if (count($repKey) === 5) {
						    	$repKeyInnerIndex = $repKey[3];
						    	$repMainInnerKey = $repKey[4];
								$repOption = etienne_elated_option_get_value( $repMainOption );

						    	if ($repOption[$repKeyIndex][$repMainKey][$repKeyInnerIndex][$repMainInnerKey] === $values) {
						   			$optionsValues[] = true;
						    	} else {
									$optionsValues[] = false;
								}
					    	} else {
								$repOption = etienne_elated_option_get_value( $repMainOption );

						    	if ($repOption[$repKeyIndex][$repMainKey] === $values) {
						   			$optionsValues[] = true;
						    	} else {
									$optionsValues[] = false;
								}
					    	}
				    	}
				    } else if ( etienne_elated_option_get_value( $key ) == $values ) {
						$optionsValues[] = true;
					} else {
						$optionsValues[] = false;
					}
				}
			}
			
			if ( count( array_unique( $optionsValues ) ) === 1 ) {
				if ($optionsValues[0] === true && ! $hideContainer ) {
					$hideItem = false;
				} else if ($optionsValues[0] === true && $hideContainer ) {
					$hideItem = true;
				} else if ($optionsValues[0] === false && ! $hideContainer ) {
					$hideItem = true;
				} else if ($optionsValues[0] === false && $hideContainer ) {
					$hideItem = false;
				} else {
					$hideItem = $hideContainer;
				}
			} else {
				$hideItem = $hideContainer ? false : true;
			}
			
			$returnArray = array(
				'data_values'    => $dataValues,
				'hide_container' => $hideItem
			);
		}
		
		return $returnArray;
	}
}

if ( ! function_exists( 'etienne_elated_return_repeater_dependency_options_array' ) ) {
	function etienne_elated_return_repeater_dependency_options_array( $dependencyArray = array() ) {
		$field = array();
		$repeaterName = '';
		$counter = '';
		$fieldInner = array();
		$counter2 = '';
		$newFieldDepedency = false;

		extract($dependencyArray);

		$repeaterField = ! empty($fieldInner) ? $fieldInner : $field;
		$repeaterFieldVisibility = key($repeaterField['dependency']);
		$new_dependency = array();

		//rename key to match field
	    foreach ($repeaterField['dependency'][$repeaterFieldVisibility] as $key => $value) {
	    	if (! empty ($fieldInner)) {
	    		$new_key = $repeaterName.'['.$counter.']['.$field['name'].']['.$counter2.']['.$key.']';
	    	} else {
		    	$new_key = $repeaterName.'['.$counter.']['.$key.']';
	    	}

	    	$new_dependency[$new_key] = $value;
	    }

	    $repeaterField['dependency'][$repeaterFieldVisibility] = $new_dependency;

		$show           = array_key_exists('show',$repeaterField['dependency']) ? etienne_elated_return_dependency_options_array( $repeaterField['dependency']['show'], $newFieldDepedency, !$newFieldDepedency ) : array();
		$hide           = array_key_exists('hide',$repeaterField['dependency']) ? etienne_elated_return_dependency_options_array( $repeaterField['dependency']['hide'], !$newFieldDepedency, !$newFieldDepedency ) : array();

		$showDataValues = '';
		$hideDataValues = '';
		$hideContainer  = true;
		$dataValues 	= array();

		$classes = 'eltdf-dependency-holder';

		if ( ! empty( $show ) ) {
			$showDataValues = $show['data_values'];
			$hideContainer  = $show['hide_container'];
		}

		if ( ! empty( $hide ) ) {
			$hideDataValues = $hide['data_values'];
			$hideContainer  = $hide['hide_container'];
		}
	
		$dataValues['data-show'] = ! empty( $showDataValues ) ? json_encode( $showDataValues ) : '';
		$dataValues['data-hide'] = ! empty( $hideDataValues ) ? json_encode( $hideDataValues ) : '';

		if ( $hideContainer ) {
			$classes .= ' eltdf-hide-dependency-holder';
		}

		$returnArray = array(
			'data'    => $dataValues,
			'class' => $classes
		);
		
		return $returnArray;
	}
}


if ( ! function_exists( 'etienne_elated_display_content_output' ) ) {
	function elaine_edge_display_content_output( $content = '') {
		return $content;
	}
}