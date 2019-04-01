<?php
/**
 * @package WordPress
 * @subpackage Webinane Form Biulder
 * @version 1.0
 */
/*
Plugin Name: Webinane Form Builder
Plugin URI: http://themeforest.net/user/webinane/
Description: Supported plugin for lifecoach wordpress theme
Author: Webinane
Version: 1.0
Author URI: https://themeforest.net/user/webinane/
*/

defined( 'WIFORMS_PLUGIN_PATH' ) || define( 'WIFORMS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
defined( 'WIFORMS_PLUGIN_URL' ) || define( 'WIFORMS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


function webinaneforms_plugin_autoloader( $class ) {

	$class = str_replace('\\', '/', $class);

	$class = strtolower( str_replace(array( 'WebinaneForms/', 'WebinaneForms_Core_Plugin' ), '', $class ) );

    $filename = WIFORMS_PLUGIN_PATH . $class . '.php';
	
    if ( file_exists( $filename ) ) {
    	require_once $filename;
    }
}

//spl_autoload_register('webinaneforms_plugin_autoloader');



if ( ! class_exists( 'WebinaneForms_Core_Plugin' ) ) {

	/**
	* lifecoach_Core_Plugin class
	*/
	class WebinaneForms_Core_Plugin
	{
	
		/**
		 * [$instance description]
		 * @var [type]
		 */
		public static $instance;

		/**
		 * [__construct description]
		 *
		 */
		function __construct() {

			if ( ! defined('TR_APP_NAMESPACE') ) {
				return;
			}
			$this->loadFiles();
			$this->defines();
			$this->postTypes();

		}

		/**
		 * [instance description]
		 *
		 * @return [type] [description]
		 */
		public static function instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self;
			}

			return self::$instance;
		}


		/**
		 * [loadFiles description]
		 *
		 * @return [type] [description]
		 */
		function loadFiles() {
		    require_once WIFORMS_PLUGIN_PATH . 'includes/forms.php';

			require_once WIFORMS_PLUGIN_PATH . 'functions.php';
        	
        	include_once WIFORMS_PLUGIN_PATH . 'classes/ajax.php';

        	include WIFORMS_PLUGIN_PATH . 'classes/dotnotation.php';
        
        	include_once WIFORMS_PLUGIN_PATH . 'classes/forms.php';
        
        	include_once WIFORMS_PLUGIN_PATH . 'classes/process.php';
        
        	include_once WIFORMS_PLUGIN_PATH . 'classes/validation.php';
		    
		    

		}



		/**
		 * [pluginLoaded description]
		 *
		 * @return [type] [description]
		 */
		function pluginLoaded() {
			load_plugin_textdomain( 'webinane-forms', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
		}

		/**
		 * [defines description]
		 *
		 * @return [type] [description]
		 */
		function defines() {
			
			defined( 'WIFORM_KEY' ) || define( 'WIFORM_KEY', 'webinane_forms' );
			defined( 'WIFORM_META_KEY' ) || define( 'WIFORM_META_KEY', 'wiforms_settings' );
		}

		/**
		 * [postTypes description]
		 *
		 * @return [type] [description]
		 */
		function postTypes() {
			
			( new \WebinaneForms\Includes\forms )->register();

			( new \WebinaneForms\Classes\forms )->init();
		}

	}

}

/**
 * [lifecoach_CORE description]
 *
 * @return [type] [description]
 */
function webinaneforms_CORE() {

	return WebinaneForms_Core_Plugin::instance();
}

function webinaneforms_tr_route($retoures) {

	if ( function_exists('tr_route' ) ) {
		( new \WebinaneForms\Classes\Forms )->route();
	}
}

add_action( 'after_setup_theme', 'wiforms_after_plugins_loaded', 1 );

function wiforms_after_plugins_loaded() {
	webinaneforms_CORE();
}

