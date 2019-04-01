<?php
/**
 * @package WordPress
 * @subpackage Foodchow
 * @version 1.0
 */
/*
Plugin Name: Foodchow
Plugin URI: http://themeforest.net/user/webinane/
Description: Supported plugin for foodchow wordpress theme
Author: Webinane
Version: 1.0.2
Author URI: https://themeforest.net/user/webinane/
*/
defined( 'foodchow_PLUGIN_PATH' ) || define( 'foodchow_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
defined( 'foodchow_PLUGIN_URL' ) || define( 'foodchow_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
defined( 'FOODCHOW_NAME' ) or define( 'FOODCHOW_NAME', 'wp_foodchow' );
require_once plugin_dir_path(__FILE__) . 'file_crop.php';

function foodchow_plugin_autoloader($class) {

	$class = str_replace( '\\', '/', $class);
	$class = str_replace(array( 'WPFoodchow/', 'WPFoodchow_Core_Plugin', 'Includes/' ), '', $class );

	$filename = foodchow_PLUGIN_PATH . 'includes/' . $class . '.php';

	if ( file_exists( $filename ) ) {
		require_once $filename;
	}
}



spl_autoload_register( 'foodchow_plugin_autoloader' );
/**
 * [foodchow_set description]
 *
 * @param  array  $data [description]
 * @return [type]       [description]
 */
if ( ! function_exists( 'foodchow_set' ) ) {
	function foodchow_set( $var, $key, $def = '' ) {
		if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) return $var->$key;
		elseif( is_array( $var ) && isset( $var[$key] ) ) return $var[$key];
		elseif( $def ) return $def;
		else return false;
	}
}

if ( ! class_exists( 'Foodchow_Core_Plugin' ) ) {

	/**
	* foodchow_Core_Plugin class
	*/
	class Foodchow_Core_Plugin
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
			
			$this->defines();
			$this->loadFiles();
			$this->postTypes();

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
			add_action( 'plugins_loaded', array( $this, 'pluginLoaded' ) );

			add_action( 'tr_user_profile', array( $this, 'userProfile' ) );

			add_filter( 'woocommerce_data_stores', array( $this, 'woocommerce_data_stores' ) );

			add_filter( 'woocommerce_product_get_price', array( $this, 'woocommerce_product_get_price' ), 10, 2 );
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
			 				
			require_once foodchow_PLUGIN_PATH . 'ReduxCore/framework.php';
			require_once foodchow_PLUGIN_PATH . 'sweet-custom-menu.php';
			include_once foodchow_PLUGIN_PATH . 'functions.php';
			include_once foodchow_PLUGIN_PATH . 'visual-term-description-editor/visual-term-description-editor.php';

		}

		/**
		 * [pluginLoaded description]
		 *
		 * @return [type] [description]
		 */
		function pluginLoaded() {

			load_plugin_textdomain( 'foodchow', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/espert-ar.mo' );
			
		}

		/**
		 * [defines description]
		 *
		 * @return [type] [description]
		 */
		function defines() {
			

		}

		/**
		 * [postTypes description]
		 *
		 * @return [type] [description]
		 */
		function postTypes() {
			( new \WPFoodchow\Includes\Blocks )->register();
			( new \WPFoodchow\Includes\Gallery )->register();
			( new \WPFoodchow\Includes\Services )->register();
			( new \WPFoodchow\Includes\User );
			( new \WPFoodchow\Includes\Formats )->init();

			$this->PostBoxes();
		}

		/**
		 * [PostBoxes description]
		 *
		 */
		function PostBoxes() {

			$box = tr_meta_box( esc_html__('Layout Settings', 'foodchow' ) );
			$box2 = tr_meta_box( esc_html__('Additional Product Settings', 'foodchow' ) );
			//$box->setMainForm( array( $this, 'postLayout' ) );
			$box->addScreen(['post', 'page',  'services', 'event', 'gallery', 'team', 'cases'])->setCallback( array( $this, 'postLayout' ) );
			$box2->addScreen(['product'])->setCallback( array( $this, 'metaFields_product' ) );
			$cat = new \TypeRocket\Register\Taxonomy( 'category' );
			$cat->setMainForm( array( $this, 'postLayout' ) );
			\TypeRocket\Register\Registry::taxonomyFormContent( $cat );
		}

		/**
		 * [postLayout description]
		 *
		 * @return [type] [description]
		 */
		function postLayout() {
			$form = tr_form();
			$form->setGroup( 'layout_settings' );

			$layoutOpt = [
				'left' => get_template_directory_uri() . '/assets/images/2cl.png',
				'full' => get_template_directory_uri() . '/assets/images/1col.png',
				'right' => get_template_directory_uri() . '/assets/images/2cr.png',		
			];
			echo ( new \App\Fields\ImageSelect( esc_html__('Layout', 'foodchow'), array(), array(), $form) )
			->setOptions( array_flip( $layoutOpt ) )
			->setHelp( esc_html__( 'Choose the layout of the post. Note: This will not work with the blog grid style and services template grid 4 coloumns option.', 'foodchow' ) )
			->setSetting( 'default', 'full' );

			echo $form->select( 'Sidebar' )->setOptions( array_flip( foodchow_get_sidebars() ) )
			/*->setDepend( 'layout_settings.layout', 'full' )*/
			->setSetting( 'default', 'default-sidebar' );
			echo $form->checkbox( esc_html__( 'Enable Banner', 'foodchow' ) )
			->setName( 'enable_banner' )
			->setSetting('default', true)
			->setHelp( 'Enable to show banner.' );
			echo $form->checkbox( esc_html__( 'Enable Breadcrumb', 'foodchow' ) )
			->setName( 'enable_breadcrumb' )
			->setSetting('default', true)
			->setDepend( 'layout_settings.enable_banner', 1 )
			->setHelp( esc_html__( 'Enable to show breadcrumb.', 'foodchow' ) );
			echo $form->image( esc_html__( 'Banner Image', 'foodchow' ) )
			->setName( 'banner_image' )
			->setDepend( 'layout_settings.enable_banner', 1 )
			->setHelp( esc_html__( 'Upload full width image to show at page top on inner pages.', 'foodchow' ) );
			echo $form->text( 'Banner Title' )->setDepend( 'layout_settings.enable_banner',1 )->setHelp( 'Enter title to show at page top on inner pages.' );
				echo $form->text( 'Banner Subtitle' )->setDepend( 'layout_settings.enable_banner',1 )->setHelp( 'Enter subtitle to show at page top on inner pages.' );

			echo $form->checkbox( esc_html__( 'Enable Popup', 'foodchow' ) )
			->setName( 'enable_popup' )
			->setHelp( esc_html__( 'Enable to show popup on page load.', 'foodchow' ) );
			
			echo $form->checkbox( esc_html__( 'Enable Box Layout', 'foodchow' ) )
			->setName( 'enable_box_layout' )
			->setHelp( esc_html__( 'Enable box layout, Note: at one time only one option will work either box layout or border layout.', 'foodchow' ) );

			echo $form->checkbox( esc_html__( 'Enable Border Layout', 'foodchow' ) )
			->setName( 'enable_border_layout' )
			->setHelp( esc_html__( 'Enable border layout, Note: at one time only one option will work either box layout or border layout.', 'foodchow' ) );

			echo $form->color( esc_html__( 'Border Color', 'foodchow' ) )
			->setName( 'border_color' )
			->setDepend( 'layout_settings.enable_border_layout', 1 )->setHelp( esc_html__('Select border color.', 'foodchow' ) );

			echo $form->color( esc_html__('Color Scheme 1', 'foodchow' ) )
			->setName( 'color_scheme' )
			->setHelp( esc_html__('Select color scheme 1.', 'foodchow' ) );

			echo $form->color( esc_html__('Color Scheme 2', 'foodchow' ) )
			->setName( 'color_scheme2' )
			->setHelp( esc_html__('Select color scheme 2.', 'foodchow' ) );
		
		}


		/**
		 * [metaFields description]
		 *
		 * @return [repeater]  	[Group Field]
		 */
		function metaFields_product() {

			$form = tr_form();
			$form->setGroup( 'product_settings' );

			$headeropt = [
				'header_1' => get_template_directory_uri() . '/assets/images/header2.png',
				'header_2' => get_template_directory_uri() . '/assets/images/header1.png',
				'header_3' => get_template_directory_uri() . '/assets/images/header3.png',

			];
			echo ( new \App\Fields\ImageSelect( esc_html__('HeaderStyle', 'foodchow' ), array(), array(), $form) )
			->setOptions( array_flip( $headeropt ) )
			->setHelp( esc_html__( 'Choose the header style', 'foodchow' ) );

			$footeropt = [
				'footer_1' => get_template_directory_uri() . '/assets/images/footer1.png',
				'footer_2' => get_template_directory_uri() . '/assets/images/footer2.png',
				'footer_3' => get_template_directory_uri() . '/assets/images/footer3.png',

			];
			echo ( new \App\Fields\ImageSelect( esc_html__('Footer Style', 'foodchow' ), array(), array(), $form) )
			->setOptions( array_flip( $footeropt ) )
			->setHelp( esc_html__( 'Choose the Footer style', 'foodchow' ) );

			$layoutOpt = [
				'left' => get_template_directory_uri() . '/assets/images/2cl.png',
				'full' => get_template_directory_uri() . '/assets/images/1col.png',
				'right' => get_template_directory_uri() . '/assets/images/2cr.png',		
			];
			echo $form->checkbox( esc_html__( 'Enable Banner', 'foodchow' ) )
			->setName( 'enable_banner' )
			->setSetting('default', true)
			->setHelp( 'Enable to show banner.' );
			echo $form->checkbox( esc_html__( 'Enable Breadcrumb', 'foodchow' ) )
			->setName( 'enable_breadcrumb' )
			->setSetting('default', true)
			->setDepend( 'product_settings.enable_banner', 1 )
			->setHelp( esc_html__( 'Enable to show breadcrumb.', 'foodchow' ) );
			echo $form->image( esc_html__( 'Banner Image', 'foodchow' ) )
			->setName( 'banner_image' )
			->setDepend( 'product_settings.enable_banner', 1 )
			->setHelp( esc_html__( 'Upload full width image to show at page top on inner pages.', 'foodchow' ) );
			echo $form->text( 'Banner Title' )->setDepend( 'product_settings.enable_banner',1 )->setHelp( 'Enter title to show at page top on inner pages.' );
			
			echo $form->color( 'Banner Layer' )->setDepend( 'product_settings.enable_banner',1 )->setHelp( 'Select banner layer color.' );
			
			echo $form->checkbox( esc_html__( 'Enable Popup', 'foodchow' ) )
			->setName( 'enable_popup' )
			->setHelp( esc_html__( 'Enable to show popup on page load.', 'foodchow' ) );



			echo $form->text( esc_html__( 'Guarantee', 'foodchow' ) )->setName( 'product_guarantee' )->setHelp( esc_html__( 'Enter product guarantee that you want to show on product listing and detail page.', 'foodchow' ) );
			

		}



		/**
		 * [admin_enqueue description]
		 *
		 * @return [type] [description]
		 */
		function admin_enqueue() {

			wp_enqueue_style( 'foodchow-admin-css', foodchow_PLUGIN_URL . 'assets/css/admin.css' );
			if(is_rtl()) {
			    
			wp_enqueue_style( 'foodchow-admin-rtl', foodchow_PLUGIN_URL . 'assets/css/admin-rtl.css' );
			    
			}
		}

		function userProfile( $user ) {

			$form = tr_form();
			
			echo $form->text( 'Location' )->setHelp( esc_html__( 'Enter your location that you want to show on profile page.', 'wp-taxi' ) );
			echo $form->image( 'Photo' );
			echo $form->text( esc_html__( 'Designation', 'foodchow' ) )->setName( 'designation' )->setHelp( esc_html__( 'Enter Your designation separated by comma e.g web developer, Online Instructor', 'wp-taxi' ) );
			
			echo $form->textarea( esc_html__( 'Author Extra Info', 'foodchow' ) )->setHelp( esc_html__( 'Enter some information that you want to show on profile page.', 'wp-taxi' ) )->setName( 'extra_info' )->setHelp( esc_html__( 'Enter Your extra information', 'wp-taxi' ) ),

			$repeater = $form->repeater( 'Social' )->setHelp( esc_html__( 'Select social icons that you want to show on profile page.', 'wp-taxi' ) )->setFields([
				$form->select( esc_html__( 'icon', 'foodchow' ) )->setName( 'icons' )->setOptions( new \WPFoodchow\Includes\SocialIcons ),

				$form->text( esc_html__( 'Profile URL', 'foodchow' ) )->setName( 'profile_url' ),
				$form->color( esc_html__( 'Background Color', 'foodchow' ) )->setName( 'user_icon_bg' )->setHelp( esc_html__( 'Select social icon background color.', 'foodchow' ) ),

				$form->color( esc_html__( 'Color', 'foodchow' ) )->setName( 'user_icon_color' )->setHelp( esc_html__( 'Select social icon color.', 'foodchow' ) ),

			]);

		}

		function woocommerce_data_stores( $stores ) {
			require_once foodchow_PLUGIN_PATH . 'class-course-data-store-cpt.php';
			$stores['product'] = 'foodchow_Product_Data_Store_CPT';

			return $stores;
		}

		function woocommerce_product_get_price( $price, $product ) {
			$meta = get_post_meta( $product->get_id(), 'courseSettings', true);
			$price =(foodchow_set($meta,'course_sale_price'))?foodchow_set($meta,'course_sale_price') :$price;
			if ( $product->post_type == 'course' ) {
				$price =(foodchow_set($meta,'course_sale_price'))?foodchow_set($meta,'course_sale_price') :$price;
			}
			
			return $price;
		}
	}

}
require_once foodchow_PLUGIN_PATH . 'typerocket/init.php';


/**
 * [foodchow_CORE description]
 *
 * @return [type] [description]
 */
function foodchow_CORE() {

	return Foodchow_Core_Plugin::instance();
}

foodchow_CORE();


if ( ! function_exists( 'foodchow_shortcode' ) ) {

	/**
	 * [foodchow_shortcode description]
	 *
	 * @param  [type] $tag  [description]
	 * @param  [type] $func [description]
	 * @return [type]       [description]
	 */
	function foodchow_shortcode( $tag, $func ) {

		add_shortcode( $tag, $func );
	}
}

if ( ! function_exists( 'foodchow_plugin_vc_decde_group' ) ) {

	function foodchow_plugin_vc_decde_group( $str ) {

		$object = json_decode( urldecode( $str ) );

		$servicess = array_map( 'foodchow_plugin_array_filter', $object);
		$servicess = array_filter( $servicess );

		return $servicess;
	}
}

/**
 * [foodchow_plugin_array_filter description]
 *
 * @param  [type] $obj [description]
 * @return [type]      [description]
 */
function foodchow_plugin_array_filter( $obj ) {
	if ( (array)$obj ) 
		return $obj; 
	else return '';
}
/**
 * [foodchow_get_users description]
 */
function foodchow_get_users() {

	$blogusers = get_users();

	$register_users = array();
	$register_users[''] = esc_html__( 'select User','foodchow' );
	foreach ( $blogusers as $user ) {
		$uer_data = get_userdata( $user->ID );
		if ( foodchow_set( foodchow_set( get_userdata( $user->ID),'roles' ),'0' ) === 'coach' ) {
			$register_users[$user->ID] = esc_html( $user->display_name );
		}
	}

	return array_flip( $register_users );

}

if ( ! function_exists( 'foodchow_encrypt' ) ) {

	function foodchow_encrypt($param) {
		return base64_encode($param);
	}

}

function foodchow_additional_profile_fields($user) {
	?>
	<input type="hidden" name="updationdate" id="updationdate" value="<?php echo date("M d,y h:i a",time() );?>" class="regular-text" /><br />

	<?php
}

add_action( 'show_user_profile', 'foodchow_additional_profile_fields' );
add_action( 'edit_user_profile', 'foodchow_additional_profile_fields' );

add_action( 'personal_options_update', 'foodchow_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'foodchow_save_extra_profile_fields' );

function foodchow_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_user_meta( $user_id, 'updationdate', $_POST['updationdate'] );
}

function wpfoodchow_sever_info() {
	return $_SERVER['REQUEST_URI'];
}

/**
 * [foodchow_rating_table description]
 *
 * @param  array  $dn [description]
 */
function foodchow_post_rating( $postid, $args = false ) {
	if ( $postid ) {

		global $wpdb;
		$table_name = $wpdb->prefix.'foodchow_rating';
		$user_id = get_current_user_id();
		$loggedin = is_user_logged_in();

		$result = $wpdb->get_results( "select * from $table_name WHERE post_id='$postid' AND user_id='$user_id'", ARRAY_A );?>
		<div id='demo1' class="rating-counter rating_id rating" data-loggedin="<?php echo esc_attr( $loggedin ) ?>" data-date="<?php echo esc_attr( date('m/d/Y h:i:s a', time()) ); ?>" data-id="<?php echo esc_attr( $postid ); ?>">
			<fieldset  class="rating">
				<input class="stars" type="radio" id="star5" name="rating" value="5" <?php echo esc_attr( ! empty( $result ) && foodchow_Set( foodchow_Set( $result,'0' ),'rating' ) == '5' )?'checked="checked"' :'';  ?>/>
				<label class = "full" for="star5" title="Awesome - 5 stars"></label>
				<input class="stars" type="radio" id="star4" name="rating" value="4" <?php echo esc_attr( ! empty( $result ) && foodchow_Set( foodchow_Set( $result,'0' ),'rating' ) == '4' )?'checked="checked"' :'';  ?>/>
				<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
				<input class="stars" type="radio" id="star3" name="rating" value="3" <?php echo esc_attr( ! empty( $result ) && foodchow_Set( foodchow_Set( $result,'0' ),'rating' ) == '3' )?'checked="checked"' :'';  ?>/>
				<label class = "full" for="star3" title="Meh - 3 stars"></label>
				<input class="stars" type="radio" id="star2" name="rating" value="2" <?php echo esc_attr( ! empty( $result ) && foodchow_Set( foodchow_Set( $result,'0' ),'rating' ) == '2' )?'checked="checked"' :'';  ?>/>
				<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
				<input class="stars" type="radio" id="star1" name="rating" value="1" <?php echo esc_attr( ! empty( $result ) && foodchow_Set( foodchow_Set( $result,'0' ),'rating' ) == '1' )?'checked="checked"' :'';  ?>/>
				<label class = "full" for="star1" title="Sucks big time - 1 star"></label>

			</fieldset>
		</div>
		<?php

	}
}

/**
 * [foodchow_rating_progress description]
 * @param  $rating [rating]
 * @param  $post_id [post id]
 */
function foodchow_rating_progress( $rating, $post_id ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'foodchow_rating';
	$result1 = $wpdb->get_results( "SELECT * FROM $table_name WHERE post_id = '$post_id'" );
	$result2 =  $wpdb->get_results( "SELECT * FROM $table_name WHERE post_id = '$post_id' AND rating='$rating'" );
	if(!empty($result2)){
		$perecatge = ( count( $result2 ) / count( $result1 ) ) * 100;
		return round( $perecatge, 2 );
	}
	
}

/**
 * [foodchow_messaging_table description]
 *
 * @param  array  $dn [description]
 */
function foodchow_messaging_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . "message_inbox";
	$query = "CREATE TABLE IF NOT EXISTS $table_name (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`to_id` INT(11) NOT NULL,
	`from_id` INT(11) NOT NULL,
	`message` VARCHAR(25) NOT NULL,
	`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
);";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$wpdb->query( $query );
}

/**
 * [foodchow_rating_average_stars description]
 *
 * @param  $post_id [post id]
 */
function foodchow_rating_average_stars( $post_id ) {
	global $wpdb;

	$table_name = $wpdb->prefix . 'foodchow_rating';
	$result = $wpdb->get_results( "SELECT AVG(rating) FROM $table_name WHERE post_id = '$post_id'" );

	foreach ( $result as $key => $value ) {
		$rating = foodchow_set( $value, 'AVG(rating)' );
	}

	$rating_stars =  round( $rating ); ?>

	<div class="ratebox" data-id="1" data-rating="<?php echo esc_attr( $rating_stars);  ?>"></div>
	<?php 
}

if ( !function_exists( 'foodchow_decrypt' ) ){
	function foodchow_decrypt( $param ) {
		return base64_decode( $param );
	}
}
function wpfoodchow_email_coach() {
		$info = array();


		$info['emailUser'] = foodchow_set( $_POST, 'emailUser' );

		$info['emailcoach'] = ( foodchow_set( $_POST, 'emailcoach' ) ) ? foodchow_set( $_POST, 'emailcoach' ) : get_option( 'admin_email' );

		$info['msg_coach'] = foodchow_set( $_POST, 'msg_cach' );

		$info['name'] = foodchow_set( $_POST, 'name' );

		$info['subject'] = foodchow_set( $_POST, 'subject' );

		$emailcheck = filter_var( $info['emailUser'], FILTER_VALIDATE_EMAIL );

		$message = 'From: ' . $info['name'] . '<' . $info['emailUser'] . '>' . "\r\n";

		$message .= $info['msg_coach'];

		if ( empty( $emailcheck ) ) {
			echo json_encode( array( 'emailsend' => false, 'message' => '<div class="alert alert-danger">' . esc_html__( 'Enter Valid Email Address.', 'wpfoodchow' ) . '</div>' ) );
		}
		else {
			wp_mail( $info['emailcoach'], $info['subject'], $message );
			echo json_encode( array( 'emailsend' => true, 'message' => '<div class="alert alert-success">' . esc_html__( 'Your message has been send successfully.', 'wpfoodchow' ) . '</div>' ) );
		}
		exit;
}