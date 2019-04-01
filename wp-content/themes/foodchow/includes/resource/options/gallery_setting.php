<?php

return array(
	'title'         => esc_html__( 'Gallery Settings', 'esperto' ),
	'id'            => 'templates-Gallery Setting',
	'desc'          => '',
	'subsection'	=> true,
	'fields'        => array(
		/*-----------------------------Gallery Listing Settings---------*/
		array(
			'id'                => 'gallery_listing',
			'type'              => 'section',
			'title'             => esc_html__('Gallery Listing Settings', 'esperto' ),
			'desc'              => esc_html__('This section is used to set gallery 
				listing.', 'esperto'),
			'indent'            => true,
		),
		 array(
			'id'       			=> 'gallery_listing_style',
			'type'     			=> 'image_select',
			'title'      		=> esc_html__( 'Gallery Listing Style', 
				'esperto' ),
			'subtitle' 			=> esc_html__( 'Select the gallery posts listing style', 'esperto' ),
			'options'  			=> array(

				'masonry' 		=> array(
					'alt' 	=> esc_html__( 'Masonry Style', 'esperto' ),
					'img' 	=> get_template_directory_uri(). '/assets/images/layouts/masonry.jpg'
				),
				'simple' 		=> array(
					'alt' 		=> esc_html__( 'Simple Style', 'esperto' ),
					'img' 		=> get_template_directory_uri(). '/assets/images/layouts/simple.jpg'
				),


			),
			'default'  			=> 'masonry',

		),      
		array(
			'id' 				=> 'gallery_title_limit',
			'type' 				=> 'text',
			'title'				=> esc_html__('Title Words Limit', 'esperto'),
			'desc' 				=> esc_html__('Enter words limit for gallery post\'s title', 'esperto'),
			'default' 			=> '10',
		),
		
		array(
			'id' 				=> 'gallery_pagination',
			'type' 				=> 'switch',
			'title' 			=> esc_html__( 'Show Pagination', 'esperto' ),
			'desc' 				=> esc_html__( 'Enable to show pagination', 'esperto' ),
		),


		array(
			'id' 				=> 'gallery_setting_end',
			'type' 				=> 'section',
			'indent' 			=> false,
		),

		/*-----------------------------Gallery Category Settings---------*/
		array(
			'id'                => 'galleryCat_listing',
			'type'              => 'section',
			'title'             => esc_html__('Gallery Category Settings', 'esperto' ),
			'desc'              => esc_html__('This section is used to set gallery category listing.', 'esperto'),
			'indent'            => true,
		),
		array(
			'id' 				=> 'galleryCat_banner',
			'type' 				=> 'switch',
			'title' 			=> esc_html__( 'Show Banner', 'esperto' ),
			'desc' 				=> esc_html__( 'Enable to show page banner section', 'esperto' ),
			'default'   		=> 1,
		), 
		array(
			'id' 				=> 'galleryCat_title',
			'type' 				=> 'text',
			'title' 			=> esc_html__( 'Banner Title', 'esperto' ),
			'desc' 				=> esc_html__( 'Enter some text for title in event category page banner leave it blank if you want to show default title.', 'esperto' ),
			'required' 			=> array('galleryCat_banner', '=', true),
		),
		array(
			'id' 				=> 'galleryCat_subtitle',
			'type' 				=> 'text',
			'title' 			=> esc_html__( 'Banner Subtitle', 'esperto' ),
			'desc' 				=> esc_html__( 'Enter some text for subtitle in event category page banner leave it blank if you want to show default title.', 'esperto' ),
			'required' 			=> array('galleryCat_banner', '=', true),
		),
		array(
			'id' 					=> 'galleryCat_banner_bg',
			'type' 					=> 'background',
			'title' 				=> esc_html__( 'Banner Background Image', 'esperto' ),
			'desc' 					=> esc_html__( 'Upload the background image for page banner', 'esperto' ),
			'background-color' 		=> false,
			'background-repeat' 	=> false,
			'background-attachment' => false,
			'background-position' 	=> false,
			'transparent' 			=> false,
			'background-size' 		=> false,
			'required' 				=> array('galleryCat_banner', '=', true),
		),

		array(
			'id'                => 'galleryCat_breadcrumb',
			'type'              => 'switch',
			'title'             => esc_html__('Show Breadcrumb', 'esperto'),
			'desc'              => esc_html__('Enable to show breadcrumb on gallery category banner section', 'esperto'),
			'required'          => array('galleryCat_banner', '=', true),
			'default'           =>  1,
		), 
		array(
			'id'       			=> 'galleryCat_listing_style',
			'type'     			=> 'image_select',
			'title'      		=> esc_html__( 'Gallery Listing Style', 
				'esperto' ),
			'subtitle' 			=> esc_html__( 'Select the gallery posts listing style', 'esperto' ),
			'options'  			=> array(

				'masonry' 		=> array(
					'alt' 	=> esc_html__( 'Masonry Style', 'esperto' ),
					'img' 	=> get_template_directory_uri(). '/assets/images/layouts/masonry.jpg'
				),
				'simple' 		=> array(
					'alt' 		=> esc_html__( 'Simple Style', 'esperto' ),
					'img' 		=> get_template_directory_uri(). '/assets/images/layouts/simple.jpg'
				),


			),
			'default'  			=> 'masonry',

		),   

		array(
			'id' 				=> 'galleryCat_title_limit',
			'type' 				=> 'text',
			'title'				=> esc_html__('Title Words Limit', 'esperto'),
			'desc' 				=> esc_html__('Enter words limit for gallery post\'s title', 'esperto'),
			'default' 			=> '10',
		),

		array(
			'id' 				=> 'galleryCat_pagination',
			'type' 				=> 'switch',
			'title' 			=> esc_html__( 'Show Pagination', 'esperto' ),
			'desc' 				=> esc_html__( 'Enable to show pagination', 'esperto' ),
		),


		array(
			'id' 				=> 'gallery_setting_end',
			'type' 				=> 'section',
			'indent' 			=> false,
		),
	),

);
