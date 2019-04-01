<?php

/**
 * Hookup all the tags here.
 *
 * @package Foodchow
 * @author Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */


call_user_func( 'foodchow_load_default_hooks' );

/**
 * Load the default config
 */
function foodchow_load_default_hooks() {

	$config = foodchow_WSH()->config( 'default' );

	if ( is_array( $config ) ) {

		foreach ( $config as $key => $more ) {

			foreach( $more as $k => $value ) {
				$func = is_array( $value ) ? $value[0] : $value;

				$priority = isset( $value[1] ) ? $value[1] : 99;
				$params = isset( $value[2] ) ? $value[2] : 2;

				add_action( $key, $func, $priority, $params );
			}
		}
	}
}



/**
 * [foodchow_main_header_area description]
 *
 * @return [type] [description]
 */


function foodchow_main_header_area() {

	$options = get_theme_mod(FOODCHOW_NAME . '_options-mods'); 

    $header_style = '';

 /*   $header_style_opt = foodchow_set( $options, 'custom_header' );

    global $wp_query;

	$page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();

		if ( $page_id ) {

	
		$headermeta  = get_post_meta( $page_id, 'layout_settings', true );

		$header_style_meta = foodchow_set( $headermeta ,'headerstyle' );

		$header_style = ( $header_style_meta ) ? $header_style_meta : $header_style_opt;
	
	}
	elseif(class_exists( 'WooCommerce' ))
	{
		if( is_product() ) {

			$page_id = get_the_ID();

			$headermeta  = get_post_meta( $page_id, 'product_settings', true );

			$header_style_meta = foodchow_set( $headermeta ,'headerstyle' );

			$header_style = ( $header_style_meta ) ? $header_style_meta : $header_style_opt;

		} elseif( is_shop()  ) {

			$page_id =  wc_get_page_id( 'shop' );

			$headermeta  = get_post_meta( $page_id, 'product_settings', true );

			$header_style_meta = foodchow_set( $headermeta ,'headerstyle' );

			$header_style = ( $header_style_meta ) ? $header_style_meta : $header_style_opt;

		} 
	}


	else {

		$header_style = foodchow_set( $options, 'custom_header' );

	}
*/
	$header_style = ( $header_style ) ? $header_style : 'header_1';
	
	get_template_part( 'templates/header/'.$header_style.'/'.$header_style );

}


/**
 * [foodchow_sidebar description]
 *
 * @return [type] [description]
 */

function foodchow_sidebar( $position, $data ) {

	if ( $position === $data->get('layout') ) {

		foodchow_template_load( 'templates/sidebar.php', compact( 'data' ) );

	}
}

/**
 * [foodchow_banner description]
 *
 * @return [type] [description]
 */

function foodchow_banner($data) {

	foodchow_template_load( 'templates/banner/banner.php', compact( 'data' ) );

}