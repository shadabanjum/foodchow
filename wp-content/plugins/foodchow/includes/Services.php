<?php
namespace WPFoodchow\Includes;


class Services {

	function register() {

		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );

		$type = tr_post_type( esc_html__('Services', 'foodchow' ))->setIcon( 'folder' )->setArgument( 'supports', array( 'title','editor', 'thumbnail' ) );

		$type->setArgument( 'labels', $this->labels() );
		$type_cat = tr_taxonomy( 'Service Category', 'Services Categories',  $this->catSettings() )->setId( 'service_cat' )->setHierarchical();

		$typeBox = tr_meta_box( 'Services Details')->setCallback( array( $this, 'metaFieldsmeta' ) );

		$type->apply( $type_cat, $typeBox );

	}
	/**
	 * [labels description]
	 *
	 * @return [array]  [Array of translated labels]
	 */

	function labels() {


		$options = get_theme_mod(FOODCHOW_NAME . '_options-mods'); 
		$p_name = foodchow_set( $options, 'services_posts_name' ) ? foodchow_set( $options, 'services_posts_name' ) : 'Service';
		$course_new =  foodchow_set( $options, 'new_services_posts_name' )  ? foodchow_set( $options, 'new_services_posts_name' ) : 'Add New Service';
        $course_all =  foodchow_set( $options, 'all_services_posts_name' )  ? foodchow_set( $options, 'all_services_posts_name' ) : 'All Services';


		return array(

			'name'               => $p_name,

			'singular_name'      => $p_name,

			'menu_name'          => $p_name,

			'name_admin_bar'     => $p_name,

			'add_new'            => $course_new,

			'add_new_item'       => $course_new,

			'new_item'           => $course_new,

			'edit_item'          => $p_name,

			'all_items'          => $course_all,

		);


	}

	function catSettings() {

		$options = get_theme_mod(FOODCHOW_NAME . '_options-mods'); 
		$a_new_c = foodchow_set( $options, 'new_services_cats_name' ) ? foodchow_set( $options, 'new_services_cats_name' ) : 'Add New Category'; 
		$p_name_c = foodchow_set( $options, 'services_cat_name' ) ? foodchow_set( $options, 'services_cat_name' ) : 'Services Categories'; 
		$a_name_c = foodchow_set( $options, 'all_services_cats_name' ) ? foodchow_set( $options, 'all_services_cats_name' ) : 'All Categories'; 
		$labels = [

			'add_new_item'               => $a_new_c,

			'all_items'                  => $a_name_c,

			'name'                       => $p_name_c,

			'menu_name'                  => $p_name_c,

		];
		return [
			'labels'			=> $labels,
			'show_admin_column'	=> true,
		];

	}
	/**
	 * [metaFields description]
	 *
	 * @return [repeater]  	[Group Field]
	 */
	function metaFieldsmeta() {

		$form = tr_form();
		$form->setGroup( 'servsettings' );

		echo $form->text( 'Subtitle' )->setName( 'subtitle' )->setHelp(esc_html__( 'Enter subtitle.', 'foodchow' ) );
		$options = [
		    'Icon Type' => [
		        esc_html__( 'Image Icon', 'webinanefb' )           => 'image',
		        esc_html__( 'FontAwesome Icon', 'webinanefb' )     => 'fontawesome',
		    ]
		];
		echo $form->select( 'Icon Type' )
			 ->setName( 'icon_type' )
			 ->setAttribute( 'class', 'select2' )
			 ->setOptions( $options )->setHelp( esc_html__( 'Select icon type which you want to show.', 'foodchow' ) );
		echo $form->image( 'Upload Icon Image' )->setDepend( 'servsettings.icon_type', 'image' )->setName( 'icon_image' )->setHelp( esc_html__( 'Please upload icon image in adjustable size.', 'foodchow' ) );
		echo ( new \App\Fields\FontIcons( 'Icon', [], [], $form ) )
		     ->setName( 'icon_ico' )
		     ->setOptions( wpfoodchow_Icons2() )
		     ->setDepend( 'servsettings.icon_type', 'fontawesome' )
		     ->setHelp( esc_html__( 'Please select an icon that you want to show.', 'foodchow' ) );
		echo $form->text( 'Subtitle' )->setName( 'serv_subtitle' )->setHelp( esc_html__( 'Enter service subtitle that you wants to show in services shortcode and listing page.', 'foodchow' ) );
		
	}
	function enqueue( $hook ) {

		global $post_type;

		if ( $post_type == 'services' && $hook == 'edit.php' ) {
			wp_enqueue_style( 'fontAwesome', foodchow_PLUGIN_URL . '/assets/css/font-awesome.css' );
		}
	}
}

