<?php

/**
 * [foodchow_WSH description]
 *
 * @return [type] [description]
 */
function foodchow_WSH() {

	return \Foodchow\Includes\Classes\Base::instance();
}

/**
 * [foodchow_dot description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */
function foodchow_dot( $data = array() ) {

	$dn = new \Foodchow\Includes\Classes\DotNotation( $data );

	return $dn;
}


function foodchowc_app( $class = 'base', $instance = true ) {

	$all = array(
		'base'		=> '\Foodchow\Includes\Classes\Base',
		'vc'		=> '\Foodchow\Includes\Classes\Visual_Composer',
		'ajax'		=> '\Foodchow\Includes\Classes\Ajax',
	);

	$dn = foodchow_dot( $all );

	$class = ( $dn->get( $class ) ) ? $dn->get( $class ) : 'base';

	if ( $dn->get( $class ) ) {

		if ( $instance ) {
			return new $dn->get( $class );
		} else {
			return $dn->get( $classs );
		}
	} else {
		exit( esc_html__( 'No class found', 'foodchow' ) );
	}
}


/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Foodchow 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function foodchow_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'foodchow_front_page_template' );


if ( ! function_exists( 'printr' ) ) {

	function printr( $arr ) {

		echo '<pre>';
		print_r( $arr );
		echo '</pre>';
		exit;
	}
}

/**
 * [foodchow_template description]
 *
 * @param  string $template_names     [description].
 * @param  boolean $load [description].
 * @param  boolean $require_once      [description].
 * @return [type]           [description]
 */
function foodchow_template( $template_names, $load = false, $require_once = true ) {
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
		} elseif ( file_exists( ABSPATH . WPINC . '/theme-compat/' . $template_name ) ) {
			$located = ABSPATH . WPINC . '/theme-compat/' . $template_name;
			break;
		}
	}

	if ( $load && '' != $located ) {
		load_template( $located, $require_once );
	}

	return $located;
}

/**
 * [foodchow_template_load description]
 *
 * @param  string $template [description]
 * @param  array  $args     [description]
 * @return [type]           [description]
 */
function foodchow_template_load( $templ = '', $args = array() ) {

	$template = foodchow_template( $templ );

	if ( file_exists( $template ) ) {
		extract( $args );
		unset( $args );

		include $template;
	}
}

/**
 * [foodchow_is_coach description]
 *
 * @param  string $template [description]
 * @param  array  $args     [description]
 */
function foodchow_is_coach() {

	if ( ! is_user_logged_in() ) {
		return false;
	}

	if ( 'coach' === get_role()->name ) {
		return true;
	}

	return false;
}


/**
 * [foodchow_is_student description]
 *
 * @param  string $template [description]
 * @param  array  $args     [description]
 * @return [type]           [description]
 */
function foodchow_is_student() {

	if ( ! is_user_logged_in() ) {
		return false;
	}

	if ( 'student' === get_role()->name ) {
		return true;
	}

	return false;
	
}

/**
 * [foodchow_get_section_title description]
 *
 * @param  string $title [description]
 * @param  array  $span     [description]
 */

function foodchow_get_section_title($title, $span = true) {
	$words_num = str_word_count($title);
	$word_num = round($words_num / 2); 
	$title_full = explode(' ', $title);

	$title_f = array_slice($title_full, 0, $word_num);
	$title_s = array_slice($title_full, $word_num);

	if ($words_num == 1){
		$title = $title;
	}else{
		if($span == true){
			$title = implode(' ', $title_f) . ' <span>' . implode(' ', $title_s).'</span>';
		}else{
			$title = implode(' ', $title_f) . '<strong>' . implode(' ', $title_s).'</strong>';
		}          
	}

	return $title;
}
/**
 * [foodchow_get_section_title2 description]
 *
 * @param  string $title [description]
 * @param  array  $span     [description]
 */

function foodchow_get_section_title2( $title, $span = true ) {
	$words_num = str_word_count( $title );
	$word_num = round( $words_num / 3 );
	$title_full = explode( ' ', $title );
	$title_f = array_slice( $title_full, 0, $word_num );
	$title_s = array_slice( $title_full, $word_num );

	if ( $words_num == 1 ){
		$title = $title;
	}else{
		if( $span == true ){
			$title = ' <span>' . implode( ' ', $title_f ) .'</span>' .' ' . implode( ' ', $title_s );
		}else{
			$title = implode( ' ', $title_f ) . '<strong>' . implode( ' ', $title_s ).'</strong>';
		}
	}

	return $title;
}

/**
 * [foodchow_get_sidebars description]
 *
 * @param  boolean $multi [description].
 * @return [type]         [description]
 */
function foodchow_get_sidebars( $multi = false ) {
	global $wp_registered_sidebars;

	$sidebars = ! ( $wp_registered_sidebars ) ? get_option( 'wp_registered_sidebars' ) : $wp_registered_sidebars;
	if ( $multi ) {
		$data[] = array( 'value' => '', 'label' => '' );
	}

	foreach ( (array) $sidebars as $sidebar ) {

		if ( $multi ) {

			$data[] = array( 'value' => foodchow_set( $sidebar, 'id' ), 'label' => foodchow_set( $sidebar, 'name' ) );

		} else {

			$data[ foodchow_set( $sidebar, 'id' ) ] = foodchow_set( $sidebar, 'name' );

		}
	}

	return $data;
}

/**
 * Suggester for autocomplete by id/name/title/sku
 * @since 4.4
 *
 * @param $query
 *
 * @return array - id's from products with title/sku.
 */
function foodchow_postCatAutocompleteSuggester( $query, $tag, $param ) {
	global $wpdb;
	
	$vc_data = WPBMap::getParam($tag, $param);
	$dn = new Foodchow\Includes\Classes\DotNotation( $vc_data );
	$post_type = ( $dn->get('query_args.post_type' ) ) ? $dn->get('query_args.post_type' ) : 'post';

	$post_meta_infos = get_posts( array( 'post_type' => $post_type, 's' => $query ) );

	$results = array();
	if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
		foreach ( $post_meta_infos as $value ) {
			$data = array();
			$data['value'] = $value->ID;
			$data['label'] = esc_html__( 'Id', 'foodchow' ) . ': ' . $value->ID . ( ( strlen( $value->post_title ) > 0 ) ? ' - ' . esc_html__( 'Title', 'foodchow' ) . ': ' . $value->post_title : '' );
			$results[] = $data;
		}
	}

	return $results;
}

/** 
 * Suggester for autocomplete by id/name/title/sku 
 * @since 4.4 
 * @param $query
 * @param  [type] $tag   [description]
 * @param  [type] $param [description]
 * @return array - id's from products with title/sku.
 */
function foodchow_TaxonomyAutocompleteSuggester( $query, $tag, $param ) { 
	global $wpdb;  $vc_data = WPBMap::getParam($tag, $param); 
	$dn = new Foodchow\Includes\Classes\DotNotation( $vc_data ); 
	$post_type = ( $dn->get('query_args.taxonomy' ) ) ? $dn->get('query_args.taxonomy' ) : 'category'; 
	$post_meta_infos = get_terms( array( 'taxonomy' => $post_type, 
		'search' => $query, 'hide_empty' => false ) ); 
	$results = array();
	if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
		foreach ( $post_meta_infos as $value ) {  
			$data = array();   

			$data['value'] = $value->slug; 
			$data['label'] = esc_html__( 'Slug', 'foodchow' ) . ': ' . $value->slug . ( ( strlen( $value->name ) > 0 ) ? ' - ' . esc_html__( 'Title', 'foodchow' ) . ': ' . $value->name : '' );  
			$results[] = $data;  
		} } 
		return $results;
	}

/**
 * [foodchow_get_posts_array description]
 *
 * @param  string $title [description]
 * @param  array  $span     [description]
 */
function foodchow_get_posts_array($post_type) {
	$result = array();
	$args = array(
		'post_type' => $post_type,
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);
	$posts = get_posts($args);

	if ($posts) {
		foreach ($posts as $post) {
			$result[] = array('value' => $post->ID, 'label' => $post->post_title);
		}
	}
	return $result;
}

add_action( 'tgmpa_register', 'foodchow_register_required_plugins' );

/**
 * [my_theme_register_required_plugins description]
 *
 * @return void [description]
 */
function foodchow_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => esc_html__( 'Foodchow Theme Support', 'foodchow' ),
			'slug'               => 'foodchow',
			'source'             => get_template_directory() . '/includes/resource/plugins/foodchow.zip',
			'required'           => true,
			'version'            => '1.0',
			'force_deactivation' => false,
			'file_path'          => ABSPATH . 'wp-content/plugins/foodchow/foodchow.php',
		),
		array(
			'name' => esc_html__( 'Webinane-Forms', 'foodchow' ),
			'slug' => 'webinane-forms',
			'source' => get_template_directory() . '/includes/resource/plugins/webinane-forms.zip',
			'required' => true,
			'version' => '1.0',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => 'http://webinane.com/',
			'file_path' => ABSPATH . 'wp-content/plugins/foodchow/webinane-forms.php',
		),
		array(
			'name' => esc_html__( 'Visual Composer', 'foodchow' ),
			'slug' => 'js_composer',
			'source' => 'https://s3.amazonaws.com/webinane-themes-plugins/js_composer.zip',
			'required' => true,
			'version' => '5.5.2',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => 'http://wpbakery.com/',
			'file_path' => ABSPATH . 'wp-content/plugins/js_composer/js_composer.php',
		),

		array(
			'name' => esc_html__( 'Revolution Slider', 'foodchow' ),
			'slug' => 'revslider',
			'source' => 'https://s3.amazonaws.com/webinane-themes-plugins/revslider.zip',
			'required' => true,
			'version' => '5.4.6.2',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => 'http://revolution.themepunch.com/',
			'file_path' => ABSPATH . 'wp-content/plugins/revslider/revslider.php'
		),
		array(
			'name' => esc_html__('Contact Form 7', 'foodchow' ),
			'slug' => 'contact-form-7',
			'required' => true,
		),
		array(
			'name' => esc_html__( 'MailChimp for WordPress', 'foodchow' ),
			'slug' => 'mailchimp-for-wp',
		),		
		array(
			'name' => esc_html__( 'Envato Market', 'foodchow' ),
			'slug' => 'envato-market',
			'source' => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' => false,
			'recommended' => true,
			'force_activation' => false,
		),
		array(
			'name'             => esc_html__('WP Classic Editor for Old Post Editor', 'wp-magup'),
			'slug'             => 'classic-editor',
			'required'         => true,
			'force_activation' => false,    

		),

		
	);

	/*Change this to your theme text domain, used for internationalising strings.*/
	$theme_text_domain = 'foodchow';

	$config   = array(
		'id'            => 'tgmpa',
		'default_path'  => '',
		'menu'          => 'tgmpa-install-plugins',
		'parent_slug'   => 'themes.php',
		'capability'    => 'edit_theme_options',
		'has_notices'   => true,
		'dismissable'   => true,
		'dismiss_msg'   => '',
		'is_automatic'  => false,
		'message'       => '',
	);

	Foodchow\Includes\Library\tgmpa( $plugins, $config );
}


/**
 * [foodchow_logo description]
 *
 * @return [type] [description]
 */
function foodchow_logo( $logo_type, $image_logo, $logo_dimension , $logo_text, $logo_typography ) {
	if ( $logo_type === 'text' ) {
		$logo = $logo_text ? $logo_text : '<span>' . esc_html__( 'Foodchow', 'foodchow' ) .'</span>';
		$logo_style = $logo_typography;
		$LogoStyle = ( foodchow_set( $logo_style, 'font-size' ) ) ? 'font-size:' . foodchow_set( $logo_style, 'font-size' ) . ';' : '';
		$LogoStyle .= ( foodchow_set( $logo_style, 'font-family' ) ) ? "font-family:'". foodchow_set( $logo_style, 'font-family' ) . "';" : '';
		$LogoStyle .= ( foodchow_set( $logo_style, 'font-weight' ) ) ? 'font-weight:' . foodchow_set( $logo_style, 'font-weight' ) . ';' : '';
		$LogoStyle .= ( foodchow_set( $logo_style, 'line-height' ) ) ? 'line-height:' . foodchow_set( $logo_style, 'line-height' ) . ';' : '';
		$LogoStyle .= ( foodchow_set( $logo_style, 'color' ) ) ? 'color:' . foodchow_set( $logo_style, 'color' ) . ';' : '';
		$LogoStyle .= ( foodchow_set( $logo_style, 'letter-spacing' ) ) ? 'letter-spacing:' . foodchow_set( $logo_style, 'letter-spacing' ) . ';' : '';
		$Logo = '<a style="' . $LogoStyle . '" href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '">' . wp_kses( $logo, true ). '</a>';
	} else {
		$LogoStyle = '';
		$LogoImageStyle = '';
		$LogoImageStyle .= foodchow_set( $logo_dimension, 'width' ) ? ' width:'. foodchow_set( $logo_dimension, 'width' ). ';' : '';
		$LogoImageStyle .= foodchow_set( $logo_dimension, 'height' ) ? ' height:'. ( foodchow_set( $logo_dimension, 'height' ) ) . ';' : '';
		if ( foodchow_set( $image_logo, 'url' ) ) {
			$Logo = '<a href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '"><img src="' . esc_url( foodchow_set( $image_logo, 'url' ) ) . '" alt="logo" style="'. $LogoImageStyle .'" /></a>';
		} else {
			$Logo = '<a href="' . home_url( '/' ) . '" title="' . get_bloginfo( 'name' ) . '"><img src="' . get_template_directory_uri(). '/assets/images/logo.png' .'" alt="logo" style="'. $LogoImageStyle .'" /></a>';
		} 
	}

	return $Logo;
}

/**
 * [foodchow_get_posts_blocks description]
 *
 * @param  string  $post_type [description].
 * @param  boolean $flip      [description].
 * @return [type]             [description]
 */
function foodchow_get_posts_blocks( $post_type = 'post', $flip = false, $choose = 'Choose' ) {

	global $wpdb;

	$res = $wpdb->get_results( $wpdb->prepare( "SELECT `ID`, `post_title` FROM `" . $wpdb->prefix . "posts` WHERE `post_type` = %s AND `post_status` = %s ", array($post_type, 'publish' ) ), ARRAY_A );

	$return = array();

	if ( $flip ) {
		$return[ $choose ] = '';
	} else {
		$return[0] = $choose;
	}

	foreach ( $res as $k => $r ) {

		if ( $flip ) {

			if ( isset( $return[ foodchow_set( $r, 'post_title' ) ] ) ) {
				$return[foodchow_set( $r, 'post_title') . $k ] = foodchow_set( $r, 'ID' );
			} else {
				$return[ foodchow_set( $r, 'post_title' ) ] = foodchow_set( $r, 'ID' );
			}
		} else {
			$return[ foodchow_set( $r, 'ID' ) ] = foodchow_set( $r, 'post_title' );
		}
	}

	return $return;
}


/**
 * [foodchow_twitter description]
 *
 * @param  string  $post_type [description].
 * @param  boolean $flip      [description].
 * @return [type]             [description]
 */

function foodchow_twitter( $args = array(), $selec = 'twitter_tweets' ) {

	$selector = foodchow_set( $args, 'selector' );

	$data = foodchow_set( $args, 'data' );

	$count = foodchow_set( $args, 'count', 3 );

	$screen = foodchow_set( $args, 'screen_name', 'WordPress' );

	$settings = array( 'count' => $count, 'screen_name' => $screen );

	ob_start(); ?>

	jQuery(document).ready(function ($) {

	$('<?php echo esc_js( $selector ); ?>').tweets(<?php echo json_encode( $settings ); ?>);
});

	<?php $jsOutput = ob_get_contents();
	ob_end_clean();
	wp_add_inline_script( $selec, $jsOutput );
}

/**
 * [foodchow_the_pagination description]
 *
 * @param  array   $args [description].
 * @param  integer $echo [description].
 * @return [type]        [description]
 */
function foodchow_the_pagination( $args = array(), $echo = 1 ) {


	global $wp_query;

	$default = array( 'base' => str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ), 'format' => '?paged=%#%', 'show_all' => 'False', 'current' => max( 1, get_query_var( 'paged' ) ), 'total' => $args, 'next_text' => '<i class="fa fa-caret-right"></i>', 'prev_text' => '<i class="fa fa-caret-left"></i>', 'type' => 'list' );



	$args = wp_parse_args( $args, $default );



	$pagination = '' . str_replace( '<ul class=\'page-numbers\'>', '<ul class="pagination justify-content-center">', paginate_links( $default ) ) . '';

	

	if ( paginate_links( array_merge( array( 'type' => 'array' ), $args ) ) ) {



		if ( $echo ) {

			echo '<div class="pagination-wrapper text-center">'.wp_kses_post( $pagination ).'</div>';

		}

		return $pagination;

	}

}

function foodchow_the_breadcrumb() {
	global $wp_query;

	$queried_object = get_queried_object();

	$breadcrumb = '';
	$delimiter = ' / ';
	$before = '<li>';
	$after = '</li>';

	if ( ! is_front_page() )
	{
		$breadcrumb .= $before . '<a href="'.home_url( '/' ).'">'.esc_html__( 'Home', 'foodchow' ).' &nbsp;</a>' . $after;
		/** If category or single post */

		if(is_category())
		{
			$cat_obj = $wp_query->get_queried_object();
			$this_category = get_category( $cat_obj->term_id );

			if ( $this_category->parent != 0 ) {
				$parent_category = get_category( $this_category->parent );
				$breadcrumb .= get_category_parents($parent_category, TRUE, $delimiter );
			}	
			$breadcrumb .= $before . '<a href="'.get_category_link(get_query_var('cat')).'">'.single_cat_title('', FALSE).'</a>' . $after;
		}
		elseif ( $wp_query->is_posts_page ) {
			$breadcrumb .= $before . $queried_object->post_title . $after;
		}
		elseif( is_tax() )
		{
			$breadcrumb .= $before . '<a href="'.get_term_link($queried_object).'">'.$queried_object->name.'</a>' . $after;
		}
		elseif(is_page()) /** If WP pages */
		{
			global $post;
			if($post->post_parent)
			{
				$anc = get_post_ancestors($post->ID);
				foreach($anc as $ancestor)
				{
					$breadcrumb .= $before . '<a href="'.get_permalink( $ancestor ).'">'.get_the_title( $ancestor ).' &nbsp;</a>' . $after;
				}
				$breadcrumb .= $before . ''.get_the_title( $post->ID ).'' . $after;
				
			}else $breadcrumb .= $before . ''.get_the_title().'' . $after;
		}
		elseif ( is_singular() )
		{
			if( $category = wp_get_object_terms( get_the_ID(), array( 'category', 'location', 'tax_feature' ) ) )
			{

				if( !is_wp_error($category) )
				{
					$breadcrumb .= $before . '<a href="'.get_term_link( foodchow_set($category, '0' ) ).'">'.foodchow_set( foodchow_set( $category, '0' ), 'name').'&nbsp;</a>' . $after;
					$breadcrumb .= $before . ''.get_the_title().'' . $after;
				} else {
					$breadcrumb .= $before . ''.get_the_title().'' . $after;
				}
			}else{
				$breadcrumb .= $before . ''.get_the_title().'' . $after;
			}

		}
		elseif(is_tag()) $breadcrumb .= $before . '<a href="'.get_term_link($queried_object).'">'.single_tag_title('', FALSE).'</a>' . $after; /**If tag template*/
		elseif(is_day()) $breadcrumb .= $before . '<a href="#">'.esc_html__('Archive for ', 'foodchow').get_the_time('F jS, Y').'</a>' . $after; /** If daily Archives */
		elseif(is_month()) $breadcrumb .= $before . '<a href="' .get_month_link(get_the_time('Y'), get_the_time('m')) .'">'.__('Archive for ', 'foodchow').get_the_time('F, Y').'</a>' . $after; /** If montly Archives */
		elseif(is_year()) $breadcrumb .= $before . '<a href="'.get_year_link(get_the_time('Y')).'">'.__('Archive for ', 'foodchow').get_the_time('Y').'</a>' . $after; /** If year Archives */
		elseif(is_author()) $breadcrumb .= $before . '<a href="'. esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) .'">'.__('Archive for ', 'foodchow').get_the_author().'</a>' . $after; /** If author Archives */
		elseif(is_search()) $breadcrumb .= $before . ''.esc_html__('Search Results for ', 'foodchow').get_search_query().'' . $after; /** if search template */
		elseif(is_404())  {

			$breadcrumb .= $before . ''.esc_html__('404 - Not Found', 'foodchow').'' . $after; /** if search template */
			

			
		}  
		elseif ( is_post_type_archive('product') ) 
		{
			
			$shop_page_id = wc_get_page_id( 'shop' );
			if( get_option('page_on_front') !== $shop_page_id  )
			{
				$shop_page    = get_post( $shop_page_id );
				
				$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
				
				if ( ! $_name ) {
					$product_post_type = get_post_type_object( 'product' );
					$_name = $product_post_type->labels->singular_name;
				}
				
				if ( is_search() ) {
					
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . esc_html__( 'Search results for &ldquo;', 'foodchow' ) . get_search_query() . '&rdquo;' . $after;
					
				} elseif ( is_paged() ) {
					
					$breadcrumb .= $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;
					
				} else {
					
					$breadcrumb .= $before . $_name . $after;
					
				}
			}
			
		}
		else $breadcrumb .= $before . '<a href="'.get_permalink().'">'.get_the_title().'</a>' . $after; /** Default value */
	}
	return $breadcrumb;
}



function foodchow_the_title( $template ) {
	global $wp_query;

	$queried_object = get_queried_object();

	$title = '';

	/** If category or single post */
	if ( $template == 'category' || $template == 'tag' || $template == 'galleryCat' || $template == 'teamCat'  || $template == 'serviceCat' || $template == 'eventCat'  || $template == 'coaches' ) {
		$current_obj = $wp_query->get_queried_object();
		$this_category = get_category( $current_obj->term_id );
		$title =  $current_obj->name;
	}
	elseif ( is_home()) {
		$title .= esc_html__( 'Home Page ', 'foodchow' );
	}
	elseif ( $template == 'page' || $template == 'post' || $template == 'VC' || $template == 'blog' || $template == 'courseDetail' || $template == 'team' || $template == 'services' || $template == 'events' || $template == 'gallery' || $template == 'shop' || $template == 'product' ) {
		$title =  get_the_title();
	}
	elseif( $template == 'archive' ) {
		$title .= esc_html__( 'Archive for ', 'foodchow' ) . get_the_time('F jS, Y');
	}
	elseif( $template == 'author' ) {
		$title .= esc_html__( 'Archive for ', 'foodchow' ) . get_the_author();
	}
	elseif( $template == 'search' ) {
		$title .= esc_html__( 'Search Results for ', 'foodchow' ) . '"' .get_search_query(). '"';
	}

	return $title;
}

/**
 * [foodchow_social_share_output_without_color description]
 *
 * @param  [type] $comment [description].
 * @param  [type] $args    [description].
 * @param  [type] $depth   [description].
 * @return void          [description]
 */

function foodchow_social_share_output_without_color($icon, $color = false) {

	$permalink = get_permalink(get_the_ID());
	$titleget = get_the_title();

	if ($icon == 'facebook') :
		$fb = ( $color == 1 ) ? 'style="color:#3b5998"' : '';
		?>
		<li>
			<a class="facebook2" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
				return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>">
				<i class="fa fa-facebook"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'twitter') :
		$twitter = ( $color == 1 ) ? 'style="color:#00aced"' : '';
		?>
		<li>
			<a class="twitter2" onClick="window.open('http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Twitter share', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
				return false;" href="http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>">
				<i class="fa fa-twitter"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'gplus') :
		$gplus = ( $color == 1 ) ? 'style="color:#dd4b39"' : '';
		?>
		<li>
			<a class="google2" onClick="window.open('https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>', 'Google plus', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + '');
				return false;" href="https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>">
				<i class="fa fa-google-plus"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'digg') :
		$digg = ( $color == 1 ) ? 'style="color:#000000"' : '';
		?>
		<li>
			<a class="digg2" onClick="window.open('http://www.digg.com/submit?url=<?php echo esc_url($permalink); ?>', 'Digg', 'width=715,height=330,left=' + (screen.availWidth / 2 - 357) + ',top=' + (screen.availHeight / 2 - 165) + '');
				return false;" href="http://www.digg.com/submit?url=<?php echo esc_url($permalink); ?>">
				<i class="fa fa-digg"></i> 
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'reddit') :
		$reddit = ( $color == 1 ) ? 'style="color:#ff5700"' : '';
		?>
		<li>
			<a  class="reddit2" onClick="window.open('http://reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Reddit', 'width=617,height=514,left=' + (screen.availWidth / 2 - 308) + ',top=' + (screen.availHeight / 2 - 257) + '');
				return false;" href="http://reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>">
				<i class="fa fa-reddit"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'linkedin') :
		$linkeding = ( $color == 1 ) ? 'style="color:#007bb6"' : '';
		?>
		<li>
			<a class="linkedin2" onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>', 'Linkedin', 'width=863,height=500,left=' + (screen.availWidth / 2 - 431) + ',top=' + (screen.availHeight / 2 - 250) + '');
				return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>">
				<i class="fa fa-linkedin"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'pinterest') :
		$pinterest = ( $color == 1 ) ? 'style="color:#cb2027"' : '';
		?>
		<li>
			<a class="pinterest2"  href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>
				<i class="fa fa-pinterest"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'stumbleupon') :
		$stumbleupon = ( $color == 1 ) ? 'style="color:#EB4823"' : '';
		?>
		<li>
			<a  class="stumbleupon2"  onClick="window.open('http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Stumbleupon', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
				return false;" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>">
				<i class="fa fa-stumbleupon"></i>
			</a>
		</li>
	<?php endif; ?>

	<?php
	if ($icon == 'tumblr') :
		$tumblr = ( $color == 1 ) ? 'style="color:#32506d"' : '';
		$str = $permalink;
		$str = preg_replace('#^https?://#', '', $str);
		?>
		<li><a class="tumblr2" onClick="window.open('http://www.tumblr.com/share/link?url=<?php echo esc_attr($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Tumblr', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
			return false;" href="http://www.tumblr.com/share/link?url=<?php echo esc_attr($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>">
			<i class="fa fa-tumblr"></i>
		</a>
	</li>
<?php endif; ?>

<?php
if ($icon == 'email') :
	$mail = ( $color == 1 ) ? 'style="color:#000000"' : '';
	?>
	<li><a class="email2" href="mailto:?Subject=<?php echo str_replace(" ", "%20", $titleget); ?>&amp;Body=<?php echo esc_url($permalink); ?>"><i class="fa fa-envelope-o"></i></a></li>
	<?php
endif;
}



/**
 * [foodchow_social_share_output description]
 *
 * @param  [type] $comment [description].
 * @param  [type] $args    [description].
 * @param  [type] $depth   [description].
 * @return void          [description]
 */

function foodchow_social_share_output($icon, $color = false) {

	$permalink = get_permalink(get_the_ID());
	$titleget = get_the_title();

	if ($icon == 'facebook') {
		$fb = ( $color == 1 ) ? 'style="color:#3b5998"' : '';
		?>
		
		<a class="facebook brd-rd2" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
			return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>">
			
			<i class="fa fa-facebook" <?php echo ($fb); ?>></i>
		</a>
		
		<?php } ?>

		<?php
		if ($icon == 'twitter') {
			$twitter = ( $color == 1 ) ? 'style="color:#00aced"' : '';
			?>
			
			<a class="twitter brd-rd2" onClick="window.open('http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Twitter share', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
				return false;" href="http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>">
				<i class="fa fa-twitter" <?php echo ($twitter); ?>></i>
			</a>
			
			<?php } ?>

			<?php
			if ($icon == 'gplus') {
				$gplus = ( $color == 1 ) ? 'style="color:#dd4b39"' : '';
				?>
				
				<a class="google brd-rd2" onClick="window.open('https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>', 'Google plus', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + '');
					return false;" href="https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>">
					<i class="fa fa-google-plus" <?php echo ($gplus); ?>></i>
				</a>
				
				<?php } ?>

				<?php
				if ($icon == 'digg') {
					$digg = ( $color == 1 ) ? 'style="color:#000000"' : '';
					?>
					
					<a class="digg brd-rd2" onClick="window.open('http://www.digg.com/submit?url=<?php echo esc_url($permalink); ?>', 'Digg', 'width=715,height=330,left=' + (screen.availWidth / 2 - 357) + ',top=' + (screen.availHeight / 2 - 165) + '');
						return false;" href="http://www.digg.com/submit?url=<?php echo esc_url($permalink); ?>">
						<i class="fa fa-digg" <?php echo ($digg); ?>></i> 
					</a>
					
					<?php } ?>

					<?php
					if ($icon == 'reddit') {
						$reddit = ( $color == 1 ) ? 'style="color:#ff5700"' : '';
						?>
						
						<a  class="reddit brd-rd2" onClick="window.open('http://reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Reddit', 'width=617,height=514,left=' + (screen.availWidth / 2 - 308) + ',top=' + (screen.availHeight / 2 - 257) + '');
							return false;" href="http://reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>">
							<i class="fa fa-reddit" <?php echo ($reddit); ?>></i>
						</a>
						
						<?php } ?>

						<?php
						if ($icon == 'linkedin') {
							$linkeding = ( $color == 1 ) ? 'style="color:#007bb6"' : '';
							?>
							
							<a class="linkedin brd-rd2" onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>', 'Linkedin', 'width=863,height=500,left=' + (screen.availWidth / 2 - 431) + ',top=' + (screen.availHeight / 2 - 250) + '');
								return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>">
								<i class="fa fa-linkedin" <?php echo ($linkeding); ?>></i>
							</a>
							
							<?php } ?>

							<?php  if ($icon == 'pinterest') {
								$pinterest = ($color == 1) ? 'style=color:#cb2027' : '';
								?>
								
								<a class="pinterest brd-rd2" href='javascript:void((function(){var e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)})())'>
									<i class="fa fa-pinterest" <?php echo esc_attr($pinterest); ?>></i></a>
									
									<?php } ?>

									<?php
									if ($icon == 'stumbleupon') {
										$stumbleupon = ( $color == 1 ) ? 'style="color:#EB4823"' : '';
										?>
										
										<a  class="stumbleupon brd-rd2" onClick="window.open('http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Stumbleupon', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
											return false;" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo str_replace(" ", "%20", $titleget); ?>">
											<i class="fa fa-stumbleupon" <?php echo ($stumbleupon); ?>></i>
										</a>
										
										<?php } ?>

										<?php
										if ($icon == 'tumblr') {
											$tumblr = ( $color == 1 ) ? 'style="color:#32506d"' : '';
											$str = $permalink;
											$str = preg_replace('#^https?://#', '', $str);
											?>
											
											<a class="tumblr brd-rd2" onClick="window.open('http://www.tumblr.com/share/link?url=<?php echo esc_attr($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Tumblr', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
												return false;" href="http://www.tumblr.com/share/link?url=<?php echo esc_attr($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>">
												<i class="fa fa-tumblr" <?php echo ($tumblr); ?>></i>
											</a>
											
											<?php } ?>

											<?php
											if ($icon == 'email') {
												$mail = ( $color == 1 ) ? 'style="color:#000000"' : '';
												?>
												<a class="email brd-rd2" href="mailto:?Subject=<?php echo str_replace(" ", "%20", $titleget); ?>&amp;Body=<?php echo esc_url($permalink); ?>"><i class="fa fa-envelope-o" <?php echo ($mail); ?>></i></a>
												<?php
											}
										}

/**
 * [foodchow_list_comments description]
 *
 * @param  [type] $comment [description].
 * @param  [type] $args    [description].
 * @param  [type] $depth   [description].
 * @return void          [description]
 */
function foodchow_list_comments( $comment, $args, $depth ) {

	wp_enqueue_script( 'comment-reply' );

	$GLOBALS['comment'] = $comment;
	$like = (int)get_comment_meta( $comment->comment_ID, 'like_it', true); ?>
	

	<div class="comment">
		<img class="brd-rd50" src="assets/images/resource/comment1.jpg" alt="comment1.jpg">
		<div class="comment-info">
			<h4 itemprop="headline"><a href="#" title="" itemprop="url">Johny Rewalt</a></h4>
			<i>17 August 2018 at 12.00pm / <a class="comment-reply-link red-clr" href="#" title="" itemprop="url">Reply</a></i>
			<p itemprop="description">Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. uni harum quidem sed rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihilares impedit quo repellendus eligendi optio cumque nihilare impedit quo minus id quod maxime.</p>
		</div>
	</div>

	<li class="byuser comment-author-admin bypostauthor" id="comment-<?php comment_ID(); ?>">
		<div class="comment">
		<?php
		/** check if this comment author not have approved comments befor this */
		if ( $comment->comment_approved == '0' ) :
			?>
			<span class="waiting_comment"><?php
			/** print message below */
			_e( 'Your comment is awaiting moderation.', 'foodchow' );
			?></span>
			<br />
		<?php endif; ?>
		<?php if ( get_avatar( $comment ) ) : ?>
			<div class="comment-avatar">
				<?php echo wp_kses_post( get_avatar( $comment, 150 ) ); ?>
			</div>
		<?php endif; ?>
		<div class="comment-info">
			<div class="comment-meta">
				<h4 itemprop="headline"><?php echo wp_kses_post( get_comment_author() ); ?></h4>
				<span><?php echo wp_kses_post( get_comment_author() ); ?></span>
				<i>17 August 2018 at 12.00pm / <a class="comment-reply-link red-clr" href="#" title="" itemprop="url">Reply</a></i>

				<i><?php esc_html_e( 'Posted ', 'foodchow' ); ?><?php echo wp_kses_post( human_time_diff( strtotime( get_comment_time() ), current_time('timestamp') ) ) . esc_html__( ' ago', 'foodchow' ); ?></i>
				<?php comment_text();/** Print our comment text */ ?>
				<?php comment_reply_link( array_merge( array( 'reply_text' => 'Reply' ), array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			</div>
		</div>
	</div>
		<?php

	}


/**
 * [comment_form description]
 *
 * @param  array  $args    [description].
 * @param  [type] $post_id [description].
 * @return void          [description]
 */
function foodchow_comment_form( $args = array(), $post_id = null ) {

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];
	$comment_field_class = is_user_logged_in() ? 'col-sm-12' : 'col-sm-6';
	$fields   = array(

		'author' => '
		<div class="col-sm-12 col-xs-12">
		<input class="brd-rd2" id="author" name="author"  placeholder="' . esc_html__('Full Name', 'foodchow').'" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' />
		</div>',
		'email'  => '<div class="col-sm-12 col-xs-12">
		<input class="brd-rd2" id="email" placeholder="' . esc_html__('Email Address', 'foodchow').'" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
		
		'url'    => '<div class="col-sm-12 col-xs-12">
		<input class="brd-rd2" id="subject" class="form-control" placeholder="'.esc_html__( 'URL', 'foodchow' ).'" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></div>',
	);

	$required_text = sprintf( ' ' . esc_html__( '%s', 'foodchow' ), '' );

	/**
	 * Filters the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $fields The default comment fields.
	 */
	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<div class="col-sm-12 col-xs-12"><textarea  placeholder="' . esc_html__('Write your comment here', 'foodchow').'"  id="comment" name="comment" class="form-control" rows="7"  required="required"></textarea></div>',
		/** This filter is documented in wp-includes/link-template.php */
		'must_log_in'          => '<p class="must-log-in">' . sprintf(
			/* translators: %s: login URL */
			esc_html__( 'You must be <a href="%s">logged in</a> to post a comment.', 'foodchow' ),
			wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
		) . '</p>',
		/** This filter is documented in wp-includes/link-template.php */
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf(
			
			'<a href="%1$s" aria-label="%2$s">'.esc_html__('Logged in as', 'foodchow').' %3$s</a>. <a href="%4$s">'.esc_html__('Log out?', 'foodchow').'</a>',
			get_edit_user_link(),
			
			esc_attr( sprintf( esc_html__( 'Logged in as %s. Edit your profile.', 'foodchow' ), $user_identity ) ),
			$user_identity,
			wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) )
		) . '</p>',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'action'               => site_url( '/wp-comments-post.php' ),
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_form'           => 'reply-form comment-form row',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => esc_html__( 'Leave A Comment', 'foodchow' ),
		'title_reply_to'       => esc_html__( 'Leave a Reply to', 'foodchow' ),
		'title_reply_before'   => '<h4 class="single-title">',
		'title_reply_after'    => '</h4>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => esc_html__( 'Cancel reply', 'foodchow' ),
		'label_submit'         => esc_html__( 'leave a comment', 'foodchow' ),
		'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s button brd-rd3 red-bg" value="%4$s">'.esc_html__( 'Submit', 'foodchow' ) .'</button>',
		'submit_field'         => '<div class="btn-send col-sm-12 col-xs-12">%1$s %2$s</div>',
		'format'               => 'xhtml',
	);

	/**
	 * Filters the comment form default arguments.
	 *
	 * Use {@see 'comment_form_default_fields'} to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	$args = array_merge( $defaults, $args );

	if ( comments_open( $post_id ) ) : ?>
	<?php
	    /**
	     * Fires before the comment form.
	     *
	     * @since 3.0.0
	     */
	    do_action( 'comment_form_before' );
	    ?>
	    <div id="respond" class="comment-respond contact-from">
	    	<?php
	    	echo wp_kses_post( $args['title_reply_before'] );

	    	comment_form_title( $args['title_reply'], $args['title_reply_to'] );

	    	echo wp_kses_post( $args['cancel_reply_before'] );

	    	cancel_comment_reply_link( $args['cancel_reply_link'] );

	    	echo wp_kses_post( $args['cancel_reply_after'] );

	    	echo wp_kses_post( $args['title_reply_after'] );

	    	if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :
	    		echo wp_kses_post( $args['must_log_in'] );
	            /**
	             * Fires after the HTML-formatted 'must log in after' message in the comment form.
	             *
	             * @since 3.0.0
	             */
	            do_action( 'comment_form_must_log_in_after' );
	            else : ?>
	            <form action="<?php echo esc_url( $args['action'] ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="<?php echo esc_attr( $args['class_form'] ); ?>"<?php echo wp_kses_post( $html5 ) ? ' novalidate' : ''; ?>>
	            	<?php
	                /**
	                 * Fires at the top of the comment form, inside the form tag.
	                 *
	                 * @since 3.0.0
	                 */
	                do_action( 'comment_form_top' );

	                if ( is_user_logged_in() ) :
	                    /**
	                     * Filters the 'logged in' message for the comment form for display.
	                     *
	                     * @since 3.0.0
	                     *
	                     * @param string $args_logged_in The logged-in-as HTML-formatted message.
	                     * @param array  $commenter      An array containing the comment author's
	                     *                               username, email, and URL.
	                     * @param string $user_identity  If the commenter is a registered user,
	                     *                               the display name, blank otherwise.
	                     */
	                    echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

	                    /**
	                     * Fires after the is_user_logged_in() check in the comment form.
	                     *
	                     * @since 3.0.0
	                     *
	                     * @param array  $commenter     An array containing the comment author's
	                     *                              username, email, and URL.
	                     * @param string $user_identity If the commenter is a registered user,
	                     *                              the display name, blank otherwise.
	                     */
	                    do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

	                else :

	                	echo wp_kses_post( $args['comment_notes_before'] );

	                endif;
	                $comment_fields = (array) $args['fields'] + array( 'comment' => $args['comment_field'] );

	                /**
	                 * Filters the comment form fields, including the textarea.
	                 *
	                 * @since 4.4.0
	                 *
	                 * @param array $comment_fields The comment fields.
	                 */
	                $comment_fields = apply_filters( 'comment_form_fields', $comment_fields );

	                $comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );

	                $first_field = reset( $comment_field_keys );
	                $last_field  = end( $comment_field_keys ); ?>

	                
	                <?php foreach ( $comment_fields as $name => $field ) {

	                	if ( 'comment' === $name ) {

		                        /**
		                         * Filters the content of the comment textarea field for display.
		                         *
		                         * @since 3.0.0
		                         *
		                         * @param string $args_comment_field The content of the comment textarea field.
		                         */
		                        echo apply_filters( 'comment_form_field_comment', $field );

		                        echo wp_kses_post( $args['comment_notes_after'] );

		                    } elseif ( ! is_user_logged_in() ) {

		                    	if ( $first_field === $name ) {
		                            /**
		                             * Fires before the comment fields in the comment form, excluding the textarea.
		                             *
		                             * @since 3.0.0
		                             */
		                            do_action( 'comment_form_before_fields' );
		                        }

		                        /**
		                         * Filters a comment form field for display.
		                         *
		                         * The dynamic portion of the filter hook, `$name`, refers to the name
		                         * of the comment form field. Such as 'author', 'email', or 'url'.
		                         *
		                         * @since 3.0.0
		                         *
		                         * @param string $field The HTML-formatted output of the comment form field.
		                         */
		                        echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

		                        if ( $last_field === $name ) {
		                            /**
		                             * Fires after the comment fields in the comment form, excluding the textarea.
		                             *
		                             * @since 3.0.0
		                             */
		                            do_action( 'comment_form_after_fields' );
		                        }
		                    }
		                } ?>
		                

		                <?php $submit_button = sprintf(
		                	$args['submit_button'],
		                	esc_attr( $args['name_submit'] ),
		                	esc_attr( $args['id_submit'] ),
		                	esc_attr( $args['class_submit'] ),
		                	esc_attr( $args['label_submit'] )
		                );

	                /**
	                 * Filters the submit button for the comment form to display.
	                 *
	                 * @since 4.2.0
	                 *
	                 * @param string $submit_button HTML markup for the submit button.
	                 * @param array  $args          Arguments passed to `comment_form()`.
	                 */
	                $submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

	                $submit_field = sprintf(
	                	$args['submit_field'],
	                	$submit_button,
	                	get_comment_id_fields( $post_id )
	                );

	                /**
	                 * Filters the submit field for the comment form to display.
	                 *
	                 * The submit field includes the submit button, hidden fields for the
	                 * comment form, and any wrapper markup.
	                 *
	                 * @since 4.2.0
	                 *
	                 * @param string $submit_field HTML markup for the submit field.
	                 * @param array  $args         Arguments passed to comment_form().
	                 */
	                echo apply_filters( 'comment_form_submit_field', $submit_field, $args );

	                /**
	                 * Fires at the bottom of the comment form, inside the closing </form> tag.
	                 *
	                 * @since 1.5.0
	                 *
	                 * @param int $post_id The post ID.
	                 */
	                do_action( 'comment_form', $post_id );
	                ?>
	            </form>
	        <?php endif; ?>
	    </div><!-- #respond -->
	    <?php
	    /**
	     * Fires after the comment form.
	     *
	     * @since 3.0.0
	     */
	    do_action( 'comment_form_after' );
	else :
	    /**
	     * Fires after the comment form if comments are closed.
	     *
	     * @since 3.0.0
	     */
	    do_action( 'comment_form_comments_closed' );
	endif;
}

/**
 * [foodchow_vd_details description]
 *
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function foodchow_vd_details($url) {
	$host = explode('.', str_replace('www.', '', strtolower(parse_url($url, PHP_URL_HOST))));
	$host = isset($host[0]) ? $host[0] : $host;
	$ssl_value = is_ssl() ? 'https' : 'http';
	$videos = array();

	switch ($host) {
		case 'vimeo':
		$video_id = substr(parse_url($url, PHP_URL_PATH), 1);
		$content = wp_remote_get("http://vimeo.com/api/v2/video/{$video_id}.json");
		$hash = json_decode(foodchow_set($content, 'body'));

		if ($hash != '') {
			return array(
				'provider' => 'Vimeo',
				'title' => $hash[0]->title,
				'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash[0]->description),
				'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash[0]->description),
				'thumbnail' => $hash[0]->thumbnail_large,
				'video' => "https://vimeo.com/" . $hash[0]->id,
				'embed_video' => '<iframe src="https://player.vimeo.com/video/' . $hash[0]->id . '"  frameborder="0" class="vimeo-video" ></iframe>',
				
				'url' => 'https://player.vimeo.com/video/'.$video_id,

			);
		}
		break;

		case 'youtube':
		$yt_api_key = 'AIzaSyBJhHvfltBxpMIV1tY3vwKK9rO3ms1H4hM';

		preg_match("/v=([^&#]*)/", parse_url($url, PHP_URL_QUERY), $video_id);
		$video_id = $video_id[1];
		$hash = '';
		$content = wp_remote_get('https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $video_id . '&key=' . $yt_api_key);
		$hash = json_decode(foodchow_set($content, 'body'));
		if (!empty(foodchow_set($hash, 'items'))) {
			$sinppet = foodchow_set(foodchow_set(foodchow_set($hash, 'items'), 0), 'snippet');
			return array(
				'host' => 'youtube',
				'provider' => 'YouTube',
				'title' => foodchow_set($sinppet, 'title'),
				'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, foodchow_set($sinppet, 'description')),
				'thumbnail' => foodchow_set(foodchow_set($sinppet, 'thumbnails'), 'high'),
				'video' => "http://www.youtube.com/" . foodchow_set(foodchow_set(foodchow_set($hash, 'items'), 0), 'id'),
				'url' =>  $ssl_value.'://www.youtube.com/watch?v='.$video_id.'',
				'embed_video' => '<iframe src="https://www.youtube.com/embed/' . foodchow_set(foodchow_set(foodchow_set($hash, 'items'), 0), 'id') . '" frameborder="0"></iframe>',
			);
		} else {
			return array(
				'embed_video' => '<iframe src="https://www.youtube.com/embed/' . $video_id . '" frameborder="0"></iframe>',
			);
		}
		break;
		case 'dailymotion':
		preg_match("/video\/([^_]+)/", $url, $video_id);
		$video_id = $video_id[1];
		$content = wp_remote_get("https://api.dailymotion.com/video/$video_id?fields=title,thumbnail_url,owner%2Cdescription%2Cduration%2Cembed_html%2Cembed_url%2Cid%2Crating%2Ctags%2Cviews_total");
		$hash = json_decode(foodchow_set($content, 'body'));
		if ($hash) {
			return array(
				'provider' => 'Dailymotion',
				'title' => $hash->title,
				'description' => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash->description),
				'thumbnail' => $hash->thumbnail_url,
				'embed_video' => $hash->embed_html,
			);
		}
		break;
	}
}

/**
 * [foodchow_fontAwesome description]
 *
 * @return [type] [description]
 */
function foodchow_fontAwesome() {

	$icons = json_decode( file_get_contents( get_template_directory() . '/includes/resource/fontawesome.json' ), true );
	
	if( $icons ){
		$icons_list = array_merge($icons);
		//$icons_list = array_flip($icons_list);
		/*printr($icons_list);*/
		return ($icons_list);
	}
}

/**
 * [foodchow_get_users_meta description]
 */
function foodchow_get_users_meta() {

	$blogusers = get_users();

	$register_users = array();

	foreach ( $blogusers as $user ) {
		$uer_data =(array) get_user_meta( $user->ID, 'subscribe', true );
		if ( in_array( get_current_user_id(), $uer_data)) {
			$register_users[$user->ID] = esc_html( $user->display_name );
		}
	}
	return array_flip( $register_users );

}

/**
 * [foodchow_validateBothPassword description]
 *
 * @param  [type] $validator [description]
 * @param  [type] $field     [description]
 * @param  [type] $value     [description]
 * @return [type]            [description]
 */
function foodchow_validateBothPassword( $validator, $field, $value ) {

	$request = new \TypeRocket\Http\Request;

	if ( $request->getFields('pass1_text') != $request->getFields('confirm_password') ) {
		return ['error' => 'Password and confirm password don\'t match'];
	}
	return ['success' => 'Success'];
}


/**
 * [foodchow_cart_dropdown description]
 *
 * @return [type] [description]
 */
function foodchow_cart_dropdown() {

	foodchow_template_load( 'templates/common/cart-dropdown.php' );

}

function foodchow_mailchimp_process( $list,$email ) {

	$mailchimp = new MC4WP_Mailchimp();
	$res = $mailchimp->list_subscribe( $list, $email );

	if ( ! $res ) {

		if ( $mailchimp->error_message instanceof MC4WP_API_Exception ) {

			$res = $mailchimp->error_message->__toString();

		} else {

			$res = $mailchimp->error_message;

		}

	}

	return $res;

}

function foodchow_boxed_layout() {

	$options = foodchow_WSH()->option();

	$settings = $options->get( 'background_options' );

	$background_style = '';

	if ( 1 == $options->get( 'boxed_layout_status' ) && 'default' == $options->get( 'background_type' ) && 'none' != $options->get( 'patterns' ) ) {

		$pattern_image = ( 'none' != $options->get( 'patterns' ) ) ? 'url( ' . get_template_directory_uri() . '/assets/images/pattern/' . $options->get( 'patterns' ) . '.png )' : '';

		$background_style .= foodchow_style_selector( 'body', 'background-image', $pattern_image );

	}

	if ( 1 == $options->get( 'boxed_layout_status' ) ) {

		$shadow_value = '0px 0px ' . $options->get( 'boxed_shadow' ) . 'px ' . $options->get( 'boxed_shadow_color' ) . ' !important';
		$background_style .= foodchow_style_selector( '.theme-layout.boxed', 'box-shadow', $shadow_value );
	}

	return $background_style;

}

function foodchow_style_selector( $selector = '', $property = '', $rule = '' ) {

	$style_selector = '';

	$style_selector .= $selector . '{';

	$style_selector .= $property . ':' . $rule . ';';

	$style_selector .= '}';

	return $style_selector;

}
function foodchow_wocommerce_currency_symbol( ) {
	global  $woocommerce;
	echo get_woocommerce_currency_symbol();
}

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 6);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 8);



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 7);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 9);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);