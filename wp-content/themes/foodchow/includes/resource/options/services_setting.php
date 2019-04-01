<?php

return array(
	'title'         => esc_html__( 'Services Settings', 'esperto' ),
	'id'            => 'templates-Service Setting',
	'desc'          => '',
	'subsection'	=> true,
	'fields'        => array(
		/*-----------------------------Gallery Listing Settings---------*/
		array(
			'id'                => 'services_listing',
			'type'              => 'section',
			'title'             => esc_html__('Services Listing Settings', 'esperto' ),
			'desc'              => esc_html__('This section is used to set services listing.', 'esperto'),
			'indent'            => true,
		),
		 array(
			'id'       			=> 'services_listing_style',
			'type'     			=> 'image_select',
			'title'      		=> esc_html__( 'Services Grids', 
				'esperto' ),
			'subtitle' 			=> esc_html__( 'Select the services posts grids style', 'esperto' ),
			'options'  			=> array(

				'6' 		=> array(
					'alt' 	=> esc_html__( '2 Columns', 'esperto' ),
					'img' 	=> get_template_directory_uri(). '/assets/images/layouts/s-2col.jpg'
				),
				'4' 		=> array(
					'alt' 		=> esc_html__( '3 Columns', 'esperto' ),
					'img' 		=> get_template_directory_uri(). '/assets/images/layouts/s-3col.jpg'
				),


			),
			'default'  			=> '4',

		),      
		array(
			'id' 				=> 'services_title_limit',
			'type' 				=> 'text',
			'title'				=> esc_html__('Title Words Limit', 'esperto'),
			'desc' 				=> esc_html__('Enter words limit for services post\'s title', 'esperto'),
			'default' 			=> '10',
		),
		
		array(
			'id' 				=> 'services_pagination',
			'type' 				=> 'switch',
			'title' 			=> esc_html__( 'Show Pagination', 'esperto' ),
			'desc' 				=> esc_html__( 'Enable to show pagination', 'esperto' ),
		),


		array(
			'id' 				=> 'services_setting_end',
			'type' 				=> 'section',
			'indent' 			=> false,
		),

		/*-----------------------------services Category Settings---------*/
		array(
			'id'                => 'servicesCat_listing',
			'type'              => 'section',
			'title'             => esc_html__('Services Category Settings', 'esperto' ),
			'desc'              => esc_html__('This section is used to set services category listing.', 'esperto'),
			'indent'            => true,
		),
		array(
			'id' 				=> 'servicesCat_banner',
			'type' 				=> 'switch',
			'title' 			=> esc_html__( 'Show Banner', 'esperto' ),
			'desc' 				=> esc_html__( 'Enable to show page banner section', 'esperto' ),
			'default'   		=> 1,
		), 
		array(
			'id' 				=> 'servicesCat_title',
			'type' 				=> 'text',
			'title' 			=> esc_html__( 'Banner Title', 'esperto' ),
			'desc' 				=> esc_html__( 'Enter some text for title in services category page banner leave it blank if you want to show default title.', 'esperto' ),
			'required' 			=> array('galleryCat_banner', '=', true),
		),
		array(
			'id' 				=> 'servicesCat_subtitle',
			'type' 				=> 'text',
			'title' 			=> esc_html__( 'Banner Subtitle', 'esperto' ),
			'desc' 				=> esc_html__( 'Enter some text for subtitle in services category page banner leave it blank if you want to show default title.', 'esperto' ),
			'required' 			=> array('servicesCat_banner', '=', true),
		),
		array(
			'id' 					=> 'servicesCat_banner_bg',
			'type' 					=> 'background',
			'title' 				=> esc_html__( 'Banner Background Image', 'esperto' ),
			'desc' 					=> esc_html__( 'Upload the background image for page banner', 'esperto' ),
			'background-color' 		=> false,
			'background-repeat' 	=> false,
			'background-attachment' => false,
			'background-position' 	=> false,
			'transparent' 			=> false,
			'background-size' 		=> false,
			'required' 				=> array('servicesCat_banner', '=', true),
		),

		array(
			'id'                => 'servicesCat_breadcrumb',
			'type'              => 'switch',
			'title'             => esc_html__('Show Breadcrumb', 'esperto'),
			'desc'              => esc_html__('Enable to show breadcrumb on services category banner section', 'esperto'),
			'required'          => array('servicesCat_banner', '=', true),
			'default'           =>  1,
		), 
	
		array(
			'id'       => 'servicesCat_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Services Category Page Layout', 'foodchow' ),
			'subtitle' => esc_html__( 'Select services category page layout.', 'foodchow' ),
			'options'  => array(
				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/2cr.png',
				),
			),
			'default'  => 'right',

		),
		array(
			'id'       => 'servicesCat_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Services Category Sidebar', 'foodchow' ),
			'subtitle' => esc_html__( 'Select sidebar to show at services category page', 'foodchow' ),
			'default'  => 'default-sidebar',
			'options'  => foodchow_get_sidebars(),
		),	
		array(
			'id'       			=> 'servicesCat_listing_style',
			'type'     			=> 'image_select',
			'title'      		=> esc_html__( 'Services Grids', 
				'esperto' ),
			'subtitle' 			=> esc_html__( 'Select the services posts grids style', 'esperto' ),
			'options'  			=> array(

				'6' 		=> array(
					'alt' 	=> esc_html__( '2 Columns', 'esperto' ),
					'img' 	=> get_template_directory_uri(). '/assets/images/layouts/s-2col.jpg'
				),
				'4' 		=> array(
					'alt' 		=> esc_html__( '3 Columns', 'esperto' ),
					'img' 		=> get_template_directory_uri(). '/assets/images/layouts/s-3col.jpg'
				),


			),
			'default'  			=> '4',

		),      
		array(
			'id' 				=> 'servicesCat_title_limit',
			'type' 				=> 'text',
			'title'				=> esc_html__('Title Words Limit', 'esperto'),
			'desc' 				=> esc_html__('Enter words limit for services post\'s title', 'esperto'),
			'default' 			=> '10',
		),
		

		array(
			'id' 				=> 'servicesCat_setting_end',
			'type' 				=> 'section',
			'indent' 			=> false,
		),
	),

);
