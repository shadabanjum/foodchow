<?php

namespace WPFoodchow\Includes;

class Gallery {

	function register() {

		$type = tr_post_type(esc_html__('Gallery', 'foodchow'))->setIcon('images')->setArgument( 'supports', array( 'title', 'thumbnail', 'editor' ) );

		$type->setArgument('labels', $this->labels());

		$type_cat = tr_taxonomy( esc_html__('Gallery Category', 'foodchow'), esc_html__('Gallery Categories', 'foodchow'), $this->catSettings() )->setId( 'gallery_cat' )->setHierarchical()->addPostType( $type );



	}



	/**

	 * [labels description]

	 *

	 * @return [array]  [Array of translated labels]

	 */


	function labels() {

		$options = get_theme_mod(FOODCHOW_NAME . '_options-mods'); 
		$p_name = foodchow_set( $options, 'gallery_posts_name' ) ? foodchow_set( $options, 'gallery_posts_name' ) : 'Gallery';
		$course_new =  foodchow_set( $options, 'new_gallery_posts_name' )  ? foodchow_set( $options, 'new_gallery_posts_name' ) : 'Add New Gallery';
		$course_all =  foodchow_set( $options, 'all_gallery_posts_name' )  ? foodchow_set( $options, 'all_gallery_posts_name' ) : 'All Gallery';

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
		$a_new_c = foodchow_set( $options, 'new_services_cats_name' ) ? foodchow_set( $options, 'new_gallery_cats_name' ) : 'Add New Category'; 
		$p_name_c = foodchow_set( $options, 'services_cat_name' ) ? foodchow_set( $options, 'services_cat_name' ) : 'Gallery Categories'; 
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


}