<?php

namespace WPFoodchow\Includes;





class Blocks {

	function register() {


        $type = tr_post_type( esc_html__( 'Static Block', 'foodchow' ) )->setIcon( 'crosshairs' )->setArgument( 'supports', array( 'title', 'thumbnail', 'editor', 'comments' ));
		
		//$type = tr_post_type( esc_html__('Static Block', 'foodchow' ))->setArgument( 'supports', array( 'title','editor' ) );


		$type->setArgument('labels', $this->labels());



	}

	function labels() {

		$options = get_theme_mod(FOODCHOW_NAME . '_options-mods'); 
		$p_name = foodchow_set( $options, 'staticblock_posts_name' ) ? foodchow_set( $options, 'staticblock_posts_name' ) : 'Static Block';
		$n_name = foodchow_set( $options, 'new_staticblock_posts_name' ) ? foodchow_set( $options, 'new_staticblock_posts_name' ) : 'Add New';
		$a_name = foodchow_set( $options, 'all_staticblock_posts_name' ) ? foodchow_set( $options, 'all_staticblock_posts_name' ) : 'All Static Block';
		return array(

			'name'               => $p_name,

			'singular_name'      => $p_name,

			'menu_name'          => $p_name,

			'name_admin_bar'     => $p_name,

			'add_new'            => $n_name,

			'add_new_item'       => $n_name,

			'new_item'           => $n_name,

			'edit_item'          => $p_name,

			'all_items'          => $a_name,



		);



	}



}