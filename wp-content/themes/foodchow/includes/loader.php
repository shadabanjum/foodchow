<?php

/**
 * [foodchow_theme_autoloader description]
 *
 * @param  [type] $class [description]
 * @return [type]        [description]
 */
function foodchow_theme_autoloader( $class ) {

	if ( class_exists( $class ) ) {
		return;
	}

	$class = str_replace('\\', '/', $class);
	$class = strtolower( str_replace(array( 'Foodchow/', 'Foodchow_Core_Plugin'), '', $class ) );
	$class = strtolower( str_replace( '_', '-', $class ) );

	$filename = get_template_directory() . '/' . $class . '.php';

	if ( file_exists( $filename ) ) {
		require_once $filename;
	}

}


defined( 'FOODCHOW_NAME' ) or define( 'FOODCHOW_NAME', 'wp_foodchow' );

define( 'FOODCHOW_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/visual-composer.php';

include_once get_template_directory() . '/includes/classes/bootstrap-walker.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';

include_once get_template_directory() . '/includes/library/tgmpa.php';
include_once get_template_directory() . '/includes/library/widgets/staticblock.php';

require_once get_template_directory() . '/includes/library/hook.php';



add_action( 'after_setup_theme', 'foodchow_wp_load', 5 );

function foodchow_wp_load() {

	defined( 'FOODCHOW_URL' ) or define( 'FOODCHOW_URL', get_template_directory_uri() . '/' );
	defined( 'FOODCHOW_PATH' ) or define( 'FOODCHOW_PATH', get_template_directory() . '/' );
	define(  'FOODCHOW_KEY','!@#foodchow');
	define(  'FOODCHOW_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'FOODCHOW_NONCE' ) ) {
		define( 'FOODCHOW_NONCE', 'foodchow_wp_theme' );
	}

	( new \Foodchow\Includes\Classes\Base )->loadDefaults();
	( new \Foodchow\Includes\Classes\Visual_Composer );

	
	( new \Foodchow\Includes\Classes\Ajax )->actions();

}

if ( function_exists( 'vc_map' ) ) {

	add_action( 'vc_before_init', 'foodchow_prefix_vcSetAsTheme' );
	/**
	 * [vcSetAsTheme description]
	 */
	function foodchow_prefix_vcSetAsTheme() {
	    vc_set_as_theme( true );

	    $list = array(
		    'page',
		    'static_block',
		    'post',
		    'services',
		    'cases'
		);
		vc_set_default_editor_post_types( $list );
	}

	
}
function author_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'index.php' ) {
  
    if ( current_user_can( 'edit_published_posts' ) ) {
    echo '<div class="notice notice-info is-dismissible">
          <p>If you like Foodchow please leave us a ★★★★★ rating. A huge thanks in advance</p>
         </div>';
    }
}
}
add_action('admin_notices', 'author_admin_notice');