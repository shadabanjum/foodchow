<?php

namespace Foodchow\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Header_Enqueue {
	


	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Gets the arrays from method scripts and styles and process them to load.
	 * Styles are being loaded by default while scripts only enqueue and can be loaded where required.
	 *
	 * @return void This function returns nothing.
	 */
	public static function enqueue() {

		self::scripts();

		self::styles();

	}

	/**
	 * The major scripts loader to load all the scripts of the theme. Developer can hookup own scripts.
	 * All the scripts are being load in footer.
	 * 
	 * @return array Returns the array of scripts to load
	 * 
	 */
	public static function scripts() {
		$options = get_theme_mod( FOODCHOW_NAME . '_options-mods' );

		$map_api = foodchow_set( $options, 'map_api_key' );
		$ssl = is_ssl() ? 'https' : 'http';

		$scripts = array(
			'foodchow-bootstrap'     => 'asssets/js/bootstrap.min.js',
			'foodchow-jmobile' 	     => 'assets/js/jquery.mobile-1.4.5.min.js',
			'foodchow-g-map' 	     => 'assets/js/g-map.js',
			'foodchowhtml5lightbox'	 => 'assets/js/html5lightbox.js',
			'foodchow-wow'	         => 'assets/js/wow.min.js',
			'foodchow-plugin'	     => 'assets/js/plugins.js',
			'foodchow-js'	         => 'assets/js/main.js',
			'google-api'	         => $ssl.'://maps.googleapis.com/maps/api/js?key='.$map_api,
		);

		$scripts = apply_filters( 'Foodchow/includes/classes/header_enqueue/scripts', $scripts );

		/*if ( is_rtl() ) {

			$scripts['foodchow-js'] = 'assets/js/rtl-script.js';
		}
        else {

        	$scripts['foodchow-js'] = 'assets/js/min.js';
        }
*/
		/**
	     * Enqueue the scripts
	     * @var array
	     */
		foreach ( $scripts as $name => $js ) {

			if ( strstr( $js, 'http' ) || strstr( $js, 'https' ) || strstr( $js, 'googleapis.com' ) ) {

				wp_register_script( $name, $js, '', '', true );
			} else {
				wp_register_script( $name, get_template_directory_uri() .'/'. $js, '', '', true );
			}
		}

		wp_enqueue_script( array( 'jquery', 'foodchow-bootstrap', 'foodchow-plugin', 'foodchow-wow', 'foodchow-js') );

		$succes_label = esc_html__( 'Success!', 'foodchow' );
		$error_label = esc_html__( 'Error!', 'foodchow' );

		$header_data = array( 'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ), 'nonce' => wp_create_nonce( FOODCHOW_NONCE ), 'success' => $succes_label, 'error' => $error_label );

		$ajax = 'var foodchow_data = '.wp_json_encode( $header_data ).';';

		wp_add_inline_script( 'bootstrap', $ajax );

		 if ( foodchow_set($options,'footer_js') ) {
            wp_add_inline_script('foodchow-js', foodchow_set($options,'footer_js') );
        }


	}

	/**
	 * The major styles loader to load all the styles of the theme. Developer can hookup own styles.
	 * All the styles are being load in head.
	 * 
	 * @return array Returns the array of styles to load
	 */
	public static function styles() {

		$styles = array(

			'google-fonts'			=>  self::fonts_url(),
			'bootstrap' 			=> 'assets/css/bootstrap.min.css',
			'animate-min'		    => 'assets/css/animate.min.css',
			'font-awesome'			=> 'assets/css/font-awesome.min.css',
			'classycountdown'		=> 'assets/css/jquery.classycountdown.css',
			'nice-select'		    => 'assets/css/nice-select.css',
			'perfect-scrollbar'		=> 'assets/css/perfect-scrollbar.min.css',
			'owl-carousel'		    => 'assets/css/owl.carousel.css',
			'slick-css'			    => 'assets/css/slick.css',
			'sweetalert2'			=> 'assets/sweetalert2/dist/sweetalert2.min.css',
			'chosen'			=> 'assets/css/chosen.min.css',
			'YTPlayer'			=> 'assets/css/jquery.mb.YTPlayer.min.css',
			'rating-css'			    => 'assets/css/rating.css',
			'custom-css'			=> 'assets/css/custom.css',
			'theme-style'			=> 'assets/css/main.css',
			//'color'			        => 'assets/css/color.css',
			//'color2'			    => 'assets/css/color2.css',
		);
		$options = foodchow_WSH()->option();
		$styles = apply_filters( 'Foodchow/includes/classes/header_enqueue/styles', $styles );
		

		  if ( is_rtl() ) {
            $styles['bootstrap-rtl'] = 'assets/css/bootstrap-rtl.css';
            $styles['Foodchow_rtl'] =  'assets/css/rtl.css';
        }
        
        $styles['responsive-css'] =  'assets/css/responsive.css';
           
        if ( is_rtl() ) {

            $styles['Foodchow_rtl-responsive'] =  'assets/css/rtl-responsive.css';
        }

		/**
		 * Enqueue the styles
		 * @var array
		 */
		foreach ( $styles as $name => $style ) {

			if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) || strstr( $style, 'fonts.googleapis' ) ) {
				wp_enqueue_style( $name, $style );
			} else {
				wp_enqueue_style( $name, get_template_directory_uri() . '/'. $style );
			}
		}

		$custom_style = '';
		$custom_style .= foodchow_boxed_layout();
		$header_meta = get_post_meta( get_the_ID(), 'layout_settings', true ); 

		$themeOption_color =  $options->get( 'theme_color_scheme' );
		$metaColor  = foodchow_set( $header_meta, 'color_scheme' );
		$mainColor = $metaColor ? $metaColor : $themeOption_color;

		if ( $mainColor  && '#2e8ece' != $mainColor  ) {
			
			$color_content = wp_remote_get( get_template_directory_uri() . '/assets/css/color.css' );

			$replace = str_replace( '#2e8ece', $mainColor, foodchow_set( $color_content, 'body' ) );
			$custom_color1 = $replace;
			wp_add_inline_style( 'theme-style', $custom_color1 );
		} else {
			wp_enqueue_style( 'color', get_template_directory_uri() . '/assets/css/color.css' );
		}

		$themeOption_color2 =  $options->get( 'theme_color_scheme2' );
		$metaColor2  = foodchow_set( $header_meta, 'color_scheme2' );
		$mainColor2 = $metaColor2 ? $metaColor2 : $themeOption_color2;


		if ( $options->get( 'theme_color_scheme2' ) && '#f8de60' != $options->get( 'theme_color_scheme2' ) ) {
			$color_content2 = wp_remote_get( get_template_directory_uri() . '/assets/css/color2.css' );
			$replace2 = str_replace( '#f8de60', $options->get( 'theme_color_scheme2' ), foodchow_set( $color_content2, 'body' ) );
			$custom_color2 = $replace2;
			wp_add_inline_style( 'theme-style', $custom_color2 );
		} else {
			wp_enqueue_style( 'color2', get_template_directory_uri() . '/assets/css/color2.css' );
		}
		if ( $options->get( 'header_code' ) ) {
			$custom_style .= $options->get( 'header_code' );
		}
		wp_add_inline_style( 'theme-style', $custom_style );

		$header_styles = self::header_styles();

		wp_add_inline_style( 'custom-css', $header_styles );

	}

	/**
	 * Register custom fonts.
	 */
	public static function fonts_url() {
		$fonts_url = '';

		$font_families['Lato'] 			    = 'Lato:400,400i';
		$font_families['Nunito'] 			= 'Nunito:300,400,600,700';
		$font_families['Roboto'] 			= 'Roboto:300,400,600,700';
		$font_families['Open+Sans'] 			= 'Open Sans:300,400,600,700';
		$font_families['Montserrat'] 		= 'Montserrat:400,700';
		$font_families['Noto+Serif'] 		= 'Noto Serif';
		$font_families['Poppins'] 		    = 'Poppins: 300,400,500,600,700';
		$font_families['Prata'] 		    = 'Prata';	
		// Hookup more google font families.
		$font_families = apply_filters( 'Foodchow/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw( $fonts_url );
	}


	/**
	 * Add preconnect for Google Fonts.
	 *
	 * @since Foodchow 1.0
	 *
	 * @param array  $urls           URLs to print for resource hints.
	 * @param string $relation_type  The relation type the URLs are printed.
	 * @return array $urls           URLs to print for resource hints.
	 */
	public static function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'foodchow-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * header_styles
	 *
	 * @since Foodchow 1.0
	 *
	 * @param array  $urls           URLs to print for resource hints.
	 * 
	 * 
	 */
	public static function header_styles() {

		$data = \Foodchow\Includes\Classes\Common::instance()->data('blog')->get();

		$options = foodchow_WSH()->option();

		$styles = '';
		$blockquote_bg = $options->get( 'blockquote_bg_event' );

		$blockquote_color = $options->get( 'blockquote_bg_color' );

		$styles .= ".eventpage blockquote::before {
			background: " . $blockquote_color . ";
			opacity : 0.6;
		}";
		$styles .= ".eventpage blockquote{
			color: ".$options->get( 'event_blockquote_color' ).";
			background-image: url(" . foodchow_set( $blockquote_bg, 'url' ) . ");
			background-repeat: no-repeat;

		}";

		$blockquote_bg_single = $options->get( 'blockquote_bg_image' );

		$blockquote_color_single = $options->get( 'blockquote_layer' );

		$styles .= ".blog-single-page .single-blockquote blockquote::before, .page blockquote::before {
			background: ".$blockquote_color_single.";
			opacity : 0.6;
		}";

		$styles .= ".blog-single-page .single-blockquote blockquote {
			background-image: url('".foodchow_set( $blockquote_bg_single, 'background-image')."' )!important;
			background-repeat: no-repeat;

		}";
		$styles .= ".single-meta.single-blockquote blockquote p, .page .single-meta blockquote p {
			color: ".$options->get( 'blockquote_color' ).";

		}";
		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) ." !important;

			}";

		endif;
		if ( $options->get( 'topbar2_dropdown_hover_color' ) ) {
			$styles .= ".language > ul li:hover, .branches > ul li:hover {
				background-color: ".$options->get( 'topbar2_dropdown_hover_color' ).";

			}";
		}
		if ( $options->get( 'topbar2_dropdown_hover_color' ) ) {
			$styles .= ".language > ul li:hover, .branches > ul li:hover {
				background-color: ".$options->get( 'topbar2_dropdown_hover_color' ).";

			}";
		}

		if ( $options->get( 'header2_menu_bg_color_submenu' ) ) {
			$styles .= ".main-menu > ul > li ul {
				background-color: ".$options->get( 'header2_menu_bg_color_submenu' ).";

			}";
		}
		if ( $options->get( 'header2_menu_color_hover' ) ) {
			$styles .= ".main-menu > ul > li ul li a:hover {
				background-color: ".$options->get( 'header2_menu_bg_color_hover' ).";
				color: ".$options->get( 'header2_menu_color_hover' ).";

			}";
		}
		if ( $options->get( 'responsive_menu_hover_color' ) ) {
			$styles .= ".responsive-menu ul ul li a:hover {
				color: ".$options->get( 'responsive_menu_hover_color' ).";

			}";

			$styles .= ".responsive-menu > ul > li.menu-item-has-children.active > a {
				border-color: ".$options->get( 'responsive_menu_hover_color' ).";

			}";
		}


		
		return $styles;
	}




}

