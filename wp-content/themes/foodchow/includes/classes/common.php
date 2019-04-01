<?php

namespace Foodchow\Includes\Classes;


/**
 * Common functions
 */
class Common {

	public static $instance;

	function __construct() {

	}

	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}	


	
	/**
	 * [data description]
	 *
	 * @param  string $emplate [description]
	 * @return [type]          [description]
	 */
	function data( $template = 'blog' ) {
		$this->template = $template;
		return $this;
	}

	/**
	 * [get description]
	 *
	 * @return [type] [description]
	 */
	function get() {

		$data = (array) $this->blog();


		switch ( $this->template ) {
			case 'blog':
			case 'author':
			case 'search':
			case 'archive':
			case 'tag':
			case 'category':
			case 'error' :
			case 'VC':
		   	case 'page':
		   	case 'gallery' :
		   	case 'galleryCat' :
		   	case 'services' :
		   	case 'servicesCat' :
				return $this->blog( $this->template );
				break;			
          
			case 'post':
			case 'galleryDetail' :
				return $this->single( $this->template );
				break;
		
			default:
				# code...
			break;
		}
	}

	/**
	 * Blog pages banner, sidebar and layout data.
	 *
	 * @param  string $template The tempalte need to return the data for.
	 * @return [type]           [description]
	 */
	function blog( $template = 'blog' ) {

		global $wp_query;
		$options = foodchow_WSH()->option();

		if ( ($wp_query->is_posts_page && 'blog' == $template) || $template == 'VC' || $template == 'gallery' || $template == 'services' || $template == 'page') {   
		
			$page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();

			$meta  = get_post_meta( $page_id, 'layout_settings', true );

			$bg = foodchow_set($meta, 'banner_image');

			$return = [

				'layout'	        => foodchow_set($meta, 'layout', 'right' ),
				'sidebar'	        => foodchow_set($meta, 'sidebar', 'default-sidebar' ),
				'enable_banner'	    => foodchow_set($meta, 'enable_banner' ),
				'breadcrumb'	    => foodchow_set($meta, 'enable_breadcrumb' ),
				'banner'	        => wp_get_attachment_url( $bg ),
				'title'	        => foodchow_set($meta, 'banner_title') ? foodchow_set($meta, 'banner_title') : foodchow_the_title( $template ),
				'subtitle'	        => foodchow_set($meta, 'banner_subtitle') ? foodchow_set($meta, 'banner_subtitle') : '',
			
			];

		} else {
			$enable_banner = esc_attr( $template ) . '_banner';
			$title         =  esc_attr( $template ) . '_title' ;
			$subtitle      =  esc_attr( $template ) . '_subtitle' ;
			$banner        = esc_attr( $template ) . '_banner_bg';
			$breadcrumb    = esc_attr( $template ) . '_breadcrumb';
			$layout        = esc_attr( $template ) . '_sidebar_layout';
			$sidebar       = esc_attr( $template ) . '_page_sidebar';

			$bg = foodchow_set( $options->get( $banner ), 'background-image' );
			$return = [
				'enable_banner' => $options->get( $enable_banner ),
				'breadcrumb'    => $options->get( $breadcrumb ),
				'title'         => $options->get( $title ) ? $options->get( $title ) : foodchow_the_title( $template ),
				'subtitle'         => $options->get( $subtitle ),
				'banner'        => $bg,
				'sidebar'       => $options->get( $sidebar, 'default-sidebar' ),
				'layout'        => $options->get( $layout, 'right' ),

			];
		}
		$return['style']            = $options->get( esc_attr( $template )   . '_listing_style' );
		$return['date'] 			= $options->get( esc_attr( $template )   . '_date' );
		$return['title_limit'] 		= $options->get( esc_attr( $template )   . '_title_limits' );
		$return['text_limit'] 		= $options->get( esc_attr( $template )   . '_content_limits' );
		$return['likes'] 			= $options->get( esc_attr( $template )   . '_likes' );
		$return['comments'] 		= $options->get( esc_attr( $template )   . '_comments' );
		$return['button'] 			= $options->get( esc_attr( $template )   . '_button' );
		$return['button_label'] 	= $options->get( esc_attr( $template )   . '_button_text' );
		$return['pagination'] 	    = $options->get( esc_attr( $template )   . '_pagination' );
//printr($return);
		return new DotNotation( $return );
	}
	
/**
	 * Post detail and custom post types datail meta.
	 *
	 * @param  string $template The template for which data is need to be returned.
	 * @return [type]           [description]
	 */
	function single( $template = 'single' ) {

		global $wp_query;

		$options = foodchow_WSH()->option();	

		$page_id = ($wp_query->is_posts_page) ? $wp_query->queried_object->ID : get_the_ID();

		$meta  = get_post_meta( $page_id, 'layout_settings', true );

		$return = [

			'layout'	        =>  foodchow_set($meta, 'layout', 'right' ),
			'sidebar'	        =>  foodchow_set($meta, 'sidebar', 'default-sidebar' ),
			'enable_banner'	    =>  foodchow_set($meta, 'enable_banner'),
			'breadcrumb'	    =>  foodchow_set($meta, 'enable_breadcrumb'),
			'banner'	        =>  wp_get_attachment_url( foodchow_set($meta, 'banner_image') ),
			'title'	            =>  foodchow_set($meta, 'banner_title') ? foodchow_set($meta, 'banner_title') : foodchow_the_title( $template ),
			'subtitle'	        => foodchow_set($meta, 'banner_subtitle') ? foodchow_set($meta, 'banner_subtitle') : '',
		];

		return new DotNotation( $return );
	}

}

