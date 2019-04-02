<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'foodchow_setup_theme' );


function foodchow_setup_theme() {


	load_theme_textdomain( 'foodchow', get_template_directory().'/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

	add_image_size( 'foodchow_49*49', 49, 49, true );

	add_image_size( 'foodchow_106*80', 106, 80, true );

	add_image_size( 'foodchow_64*59', 64, 59, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu'	 => esc_html__( 'Main Menu', 'foodchow' ),
		'res_menu'   => esc_html__( 'Responsive Menu', 'foodchow' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'standard',
		'video',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'foodchow_admin_init', 2000000 );
}

/**
 * [foodchow_widgets_init]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */
function foodchow_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( FOODCHOW_NAME . '_options-mods' );

	register_widget( '\Foodchow\Includes\Library\Widgets\Staticblock' );

	register_sidebar(array(
		'name' => esc_html__( 'Default Sidebar', 'foodchow' ),
		'id' => 'default-sidebar',
		'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'foodchow' ),
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h3 class="title">',
		'after_title' => '</h3></div>',
	));


	if ( ! is_object( foodchow_WSH() ) ) {
		return;
	}

	$sidebars = foodchow_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( foodchow_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name' => $name,
			'id' => sanitize_title( $slug ),
			'before_widget' => '<div class="">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}
add_action( 'widgets_init', 'foodchow_widgets_init' );

/**
 * [foodchow_admin_init foodchow_widgets_init]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */


function foodchow_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/**
 * [foodchow_set description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */
if ( ! function_exists( 'foodchow_set' ) ) {
	function foodchow_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
		elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
		elseif( $def ) return $def;
		else return false;
	}
}
require_once( get_template_directory() . '/envato_setup/envato_setup.php' );
add_filter('foodchow_theme_setup_wizard_username', 'foodchow_set_theme_setup_wizard_username', 10);
if( ! function_exists('foodchow_set_theme_setup_wizard_username') ){
    function foodchow_set_theme_setup_wizard_username($username){
        return 'webinane';
    }
}

add_filter('foodchow_theme_setup_wizard_oauth_script', 'foodchow_set_theme_setup_wizard_oauth_script', 10);
if( ! function_exists('foodchow_set_theme_setup_wizard_oauth_script') ){
    function foodchow_set_theme_setup_wizard_oauth_script($oauth_url){
        return 'http://api.webinane.com/envato/api/server-script.php';
    }
}

/**
 * [foodchow_get_categories description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */

function foodchow_get_categories( $arg = FALSE, $slug = FALSE, $vp = FALSE ) {
	global $wp_taxonomies;

	$categories = get_categories( $arg );
	$cats = array();

	if ( is_wp_error( $categories ) ) {
		return array('' => 'All');
	}

	if ( foodchow_set( $arg, 'show_all' ) && $vp ) {
		$cats[] = array('value' => 'all', 'label' => esc_html__( 'All Categories', 'foodchow' ) );
	} elseif ( foodchow_set( $arg, 'show_all' ) ) {
		$cats['all'] = esc_html__( 'All Categories', 'foodchow' );
	}

	if ( ! foodchow_set( $categories, 'errors' ) ) {
		foreach ( $categories as $category ) {
			if ( $vp ) {
				$key = ( $slug ) ? $category->slug : $category->term_id;
				$cats[] = array( 'value' => $key, 'label' => $category->name );
			} else {
				$key = ($slug) ? $category->slug : $category->term_id;
				$cats[$key] = $category->name;
			}
		}
	}
	return $cats;

}

/**
 * [foodchow_custom_menu_options description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */

function foodchow_custom_menu_options() {
	$menus = wp_get_nav_menus();
	$menu = array();

	foreach ( $menus as $key => $value) {
		$slug = foodchow_set( $value, 'slug' );
		$label = str_replace( "_"," ",$slug );
		$menu[$slug] = $label;

	}
	return $menu;
}

add_filter( 'get_header', 'foodchow_under_construction' );


/**
 * [foodchow_under_construction description]
 */
function foodchow_under_construction() {

	if ( ! is_admin() && ! is_user_logged_in() ) {

		$options = foodchow_WSH()->option();

		$comming_date = strtotime( $options->get( 'comingsoon_date' ) );

		if ( $options->get( 'comingsoon_page' ) && ( $comming_date != '' && $comming_date > strtotime( date( 'y-m-d' ) ) ) ) {


			get_template_part( 'comingsoon' );

			exit;
		}
	}
}

/**
 * [foodchow_get_mc_lists description]
*/

function foodchow_get_mc_lists( $assos = true ) {

	if ( ! function_exists( 'mc4wp' ) ) {

		return array();
	}
	if ( ! class_exists( 'MC4WP_Mailchimp' ) ) {

		require_once MC4WP_PLUGIN_DIR . 'includes/class-mailchimp.php';

	}
	$mc4 = new MC4WP_Mailchimp();
	$lists = $mc4->get_cached_lists();

	if ( $assos ) {

		$return = array();

		foreach( $lists as $list ) {

			$return[$list->id] = $list->name;

		}

		return $return;

	}
	return $lists;

}

/**
 * [custom_menu_options description]
 *
 * @param  array  $taxonomy [description]
 * @return [type] $flip    [description]
 */
function foodchow_get_taxonomy( $taxonomy = 'category', $flip = false ) {

	$cats = get_terms( $taxonomy, array( 'hide_empty' => false ) );
	if(!$cats){
		return;
	}
	foreach ( $cats as $k => $r ) {
		if ( $flip ) {

			if ( isset( $return[ foodchow_set( $r, 'name' ) ] ) ) {

				$return[ foodchow_set( $r, 'name' ) . $k ] = foodchow_set( $r, 'term_id' );

			} else {
				$return[ foodchow_set( $r, 'name' ) ] = foodchow_set( $r, 'term_id' );
			}
		} else {
			$return[ foodchow_set( $r, 'name' ) ] = foodchow_set( $r, 'term_id' );
		}
	}
	return $return;
}


/**
 * [foodchow_rating_table description]
 *
 * @param  array  $dn [description]
 */
function foodchow_rating_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . "foodchow_rating";
	$query = "CREATE TABLE IF NOT EXISTS $table_name (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`post_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	`rating` INT(11) NOT NULL,
	`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
);";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$wpdb->query( $query );

}

/**
 * [foodchow_courses_filter_query description]
 *
 * @param  $settings [post id]
 */
function foodchow_courses_filter_query( $settings ) {

	$query = new WP_Query(
		array(
			'post_type' => 'course',
			'status' => 'publish',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'courses_tag',
					'field'    => 'slug',
					'terms'    => (array) foodchow_set( $settings, 'tags' ),
				),
				array(
					'taxonomy' => 'coaches_cat',
					'field'    => 'slug',
					'terms'    => (array) foodchow_set( $settings, 'cats' ),
				),
			),
		)
	);
	$data = \Foodchow\Includes\Classes\Common::instance()->data( 'course' )->get();
	if ( class_exists( 'Foodchow_Resizer' ) ) {
		$img_obj = new Foodchow_Resizer();
	}
	$options = foodchow_WSH()->option();

	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) :

			$query->the_post();
			$data = \Foodchow\Includes\Classes\Common::instance()->data( 'course' )->get();


			if ( $data->get( 'layout' ) != 'full' ) {
				$width = 356;
				$height = 356;
			} else{
				$width = 316;
				$height = 266;

			}

			$options = foodchow_WSH()->option();

			foodchow_template_load( 'templates/courses/courses.php', compact( 'options', 'data', 'width', 'height', 'img_obj' ) );

		endwhile;

		wp_reset_postdata();
	}

}


/**
 * [foodchow_courses_filter_query description]
 *
 * @param  $settings [post id]
 */
function foodchow_courses_filter_query_by_id( $settings ) {

	$args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'p' => foodchow_set( $settings, 'tags' ),
    );
    $query = new WP_Query($args);  
$args = array(
  'p'         => foodchow_set( $settings, 'tags' ),
  'post_type' => 'course'
);
$query = new WP_Query($args); 


	$data = \Foodchow\Includes\Classes\Common::instance()->data( 'course' )->get();
	if ( class_exists( 'Foodchow_Resizer' ) ) {
		$img_obj = new Foodchow_Resizer();
	}
	$options = foodchow_WSH()->option();

	if ( $query->have_posts() ) {

		while ( $query->have_posts() ) :

			$query->the_post();
			$data = \Foodchow\Includes\Classes\Common::instance()->data( 'course' )->get();


			if ( $data->get( 'layout' ) != 'full' ) {
				$width = 356;
				$height = 356;
			} else{
				$width = 316;
				$height = 266;

			}

			$options = foodchow_WSH()->option();

			foodchow_template_load( 'templates/courses/courses.php', compact( 'options', 'data', 'width', 'height', 'img_obj' ) );

		endwhile;

		wp_reset_postdata();
	}

}

/**
 * [foodchow_coaches_filter_query description]
 *
 * @param  $settings [post id]
 */
function foodchow_coaches_filter_query( $term, $settings ) {

	foodchow_template_load( 'templates/shortcodes/search_coaches.php', compact( 'term', 'settings' ) );

}

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Foodchow 1.0
 */
function foodchow_twitter_tweets( $settings ) {

	include_once(ABSPATH . 'wp-content/plugins/foodchow/codebird.php');
	$options = foodchow_WSH()->option();

	if ( class_exists( 'Codebird' ) )
		Codebird::setConsumerKey( $options->get( 'twitter_api' ), $options->get( 'twitter_api_secret' ) );
	$cb = Codebird::getInstance();

	$cb->setToken( $options->get( 'twitter_token' ), $options->get( 'twitter_token_Secret' ) );

	$params = array(
		'screen_name' => foodchow_set( $settings, 'screen_name' ),
		'count' => foodchow_set( $settings, 'count' ),
		'exclude_replies' => 0,
		'include_rts' => 0,
		'include_entities' => 0,
		'trim_user' => false,
		'contributor_details' => false,
	);
	$reply = $cb->statuses_userTimeline( $params );

	unset( $reply->httpstatus );
	echo json_encode( $reply );
}

remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);

function foodchow_blog_the_pagination($args = array(), $echo = 1) {
    global $wp_query;

    $default = array('base' => str_replace(99999, '%#%', esc_url(get_pagenum_link(99999))), 'format' => '?paged=%#%', 'show_all' => 'False', 'current' => max(1, get_query_var('paged')), 'total' => $wp_query->max_num_pages, 'prev_next' => true, 'next_text' => esc_html__('NEXT', 'foodchow' ), 'prev_text' => esc_html__('PREVIOUS', 'foodchow' ), 'type' => 'list');

    $args = wp_parse_args($args, $default);
    $pagination = ''.str_replace('<ul class=\'page-numbers\'>', '<ul class="pagination justify-content-center">', paginate_links($args)).'';

    if (paginate_links(array_merge(array('type' => 'array'), $args))) {
        if ($echo) {
            echo '<div class="pagination-wrapper text-center">'.wp_kses_post($pagination).'</div>';
        }

        return $pagination;
    }
}


function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}


function remove_quick_edit( $actions, $term ) {
    
    $current_user = wp_get_current_user();
    $user_id = foodchow_set($current_user, 'ID');
    $user_role = foodchow_set(foodchow_set($current_user, 'roles'), '0');
    
    $assigned_user = (int) foodchow_set(get_option ("coaches_cat_$term->term_id"), 'registered_users');
    
    if($assigned_user==$user_id || $user_role=='administrator') {
        $actions['edit'];
        $actions['inline hide-if-no-js'];
    }else {
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
    }
    
     return $actions;
}
add_filter('coaches_cat_row_actions','remove_quick_edit',10,2);



add_action('pre_get_posts', 'my_make_search_exact');
function my_make_search_exact($query){

    if(!is_admin() && $query->is_main_query() && is_search() ) :

        $query->set('sentence', true);
        
    endif;

}
function foodchow_getFontsData( $fontsString ) { 

	if ( ! isset( $fontsString) ){
		return;
	}  

        // Font data Extraction
	$googleFontsParam = new Vc_Google_Fonts();      
	$fieldSettings = array();
	$fontsData = strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
	return $fontsData;

}
function foodchow_googleFontsStyles( $fontsData ) {

	if ( ! isset( $fontsData) ){
		return;
	}

	if(!empty($fontsData)){
		$fontFamily = explode( ':', $fontsData['values']['font_family'] );

		$styles[] = 'font-family:' . $fontFamily[0];
		$fontStyles = explode( ':', $fontsData['values']['font_style'] );
		$styles[] = 'font-weight:' . $fontStyles[1];
		$styles[] = 'font-style:' . $fontStyles[2];

		$inline_style = '';     
		foreach( $styles as $attribute ){           
			$inline_style .= $attribute.'; ';       
		}   

		return $inline_style;
	}

}