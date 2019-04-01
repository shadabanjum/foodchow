<?php 

namespace Foodchow\Includes\Classes;

/**
 * Visual Composer array mapper and render the output.
 */
class Visual_Composer {

	/**
	 * [$maps description]
	 * @var array
	 */
	protected $maps = array(
		'about_us',
		'useful_links',
		'contact_info',
		'map',
		'contact_info2',
		'contact_form',
		'simple_banner',
		'order_steps',
		'accordions',
		'food_carousel',
		'order_steps2',
		'blog',
		'heading1',
		'best_app',
		'blog2',
		'services',
		'welcome_note'
		/*'we_help',

		'transform_life',

		'get_coach',

		'consulting_package',

		'vidoe_lectures',

		'testimonials',

		'consultant_form',

		'clients',

		'faqs',

		'stats',

		'events',

		'heading1',

		'heading2',

		'coaching',

		'secrets_life',

		'simple_gallery',

		'coaching_grid',

		'team',

		'login',

		'register',

		'our_courses',

		'map',

		'contact_info',

		'contact_form',

		'megamenu',

		'contact_megamenu',

		'services',

		'image_carousel',

		'banner_carousel',

		'about_us',

		'latest_news',

		'link_services',

		'twitter',

		'subscribe',

		'services_faqs',

		'appointment',

		'appointment2',

		'search_coaches',

		'image_banner',
		'our_blogs',
		'video_banner',
		'custom_coaches',
		'useful_links',*//*
		'social_info',
		'newsletter',
		'featured_carousel',
		'custom_info',
		'promo_box',
		'features',
		'testimonials2',
		'pricing_plans',
		'professional_guidance',
		'cases',
		'courses',
		'branches',
		'subscribe_banner',
		'subscribe_footer',
		'featured_carousel2',
		'welcome_note',
		'latest_courses',
		'latest_events',
		'blog_new',
		'new_banner',
		'latest_tweets',
		'students_testimonials',
		'guideline_tabs'*/
	);
	/**
	 * [__construct description]
	 */
	function __construct() {

		if ( ! function_exists( 'vc_map' ) ) {
			return;
		}

		
		vc_set_default_editor_post_types( array( 'page', 'static_block' ) );


		add_action( 'vc_before_init', array( $this, 'init' ) );
	}

	/**
	 * VC Map main init
	 * @return void [description]
	 */
	function init() {

		// set vc as theme.
		vc_set_as_theme();

		if ( function_exists( 'vc_addshortcode_param' ) ) {
			vc_addshortcode_param( 'toggle', array( $this, 'toggle' ) );
		}

		$dir = get_stylesheet_directory() . '/shortcodes'; // First, set new directory for templates
		vc_set_shortcodes_templates_dir( $dir );

		// Map the params of existing elements.
		$this->map_params();

		$maps = apply_filters( 'foodchow_vc_map', $this->maps );

		foreach ( $maps as $value) {
			
			$file = $this->get_file( $value );

			if ( file_exists( $file ) ) {

				$data = include $file;

				vc_map( $data );

				if ( function_exists( 'foodchow_shortcode' ) ) {
					$tag = esc_attr( foodchow_set( $data, 'base' ) );
					foodchow_shortcode( $tag, array( $this, 'output' ) );
				}
			}
		}
	}

	function output( $atts, $content = null, $tag ) {

		$params = $this->shortcodeParams( $tag );

		ob_start();

		foodchow_template_load( 'shortcodes/' . $tag . '.php', compact( 'atts', 'content', 'tag' ) );

		return ob_get_clean();	

	}

	function get_file( $tag ) {

		$file = foodchow_template( 'includes/resource/vc_map/'.$tag . '.php' );
		$file = apply_filters( "foodchow_vc_map_file_{$tag}", $file );

		return $file;
	}

	/**
	 * shortcode params from vc array.
	 *
	 * @param  string $tag shortcode tag
	 * @return array      params
	 */
	function shortcodeParams( $tag ) {

		$file = $this->get_file( $tag );

		if ( file_exists( $file ) ) {
			$data = include $file;

			return foodchow_set( $data, 'params' );
		}

		return array();
	}

	function map_params() {

		$array = array(
			'vc_row',
		);

		foreach( $array as $file ) {

			$file = $this->get_file( $file );

			if ( file_exists( $file ) ) {
				$data = include $file;

				foreach ( $data as $key => $value) {
					
					foreach( $value as $param )	{
						vc_add_param( $key, $param );
					}
				}
			}
		}
	}


	/**
	 * Checkbox shortcode attribute type generator.
	 *
	 * @param $settings
	 * @param string $value
	 *
	 * @since 4.4
	 * @return string - html string.
	 */
	function toggle( $settings, $value ) {
		$output = '';
		if ( is_array( $value ) ) {
			$value = '';
		}
		$current_value = strlen( $value ) > 0 ? explode( ',', $value ) : array();
		$values = isset( $settings['value'] ) && is_array( $settings['value'] ) ? $settings['value'] : array( esc_html__( 'Yes', 'foodchow' ) => 'true' );
		if ( ! empty( $values ) ) {
			foreach ( $values as $label => $v ) {
				$checked = count( $current_value ) > 0 && in_array( $v, $current_value ) ? ' checked' : '';
				$output .= ' <label class="vc_checkbox-label"><input id="'
				           . $settings['param_name'] . '-' . $v . '" value="'
				           . $v . '" class="wpb_vc_param_value tgl tgl-ios '
				           . $settings['param_name'] . ' ' . $settings['type'] . '" type="checkbox" name="'
				           . $settings['param_name'] . '"'

				           . $checked . '> '
				           . '<span class="tgl-btn" for="cb2"></span>'
				           . $label . '</label>';
			}
		}

		return $output;
	}
}