<?php
return array(
	'title'         => esc_html__( 'Search Settings', 'foodchow' ),
	'id'            => 'search_settings',
	'desc'          => '',
	'subsection'	=> true,
	'fields' => array(
		array(
			'id'      => 'search_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show search page banner section', 'foodchow' ),
			'default' => 1,
		),
		array(
			'id'       => 'search_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Title', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for title in search page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'search_banner', '=', true ),
		),
		array(
			'id'       => 'search_subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Subtitle', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for subtitle in search page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'search_banner', '=', true ),
		),
		array(
			'id'                    => 'search_banner_bg',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background Image', 'foodchow' ),
			'desc'                  => esc_html__( 'Insert the background image for search page banner', 'foodchow' ),
			'required'              => array( 'search_banner', '=', true ),
			'background-color'      => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'transparent'           => false,
			'background-size'       => false,
		),
		array(
			'id'       => 'search_breadcrumb',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Breadcrumb', 'foodchow' ),
			'desc'     => esc_html__( 'Enable to show breadcrumb on search banner section', 'foodchow' ),
			'required' => array( 'search_banner', '=', true ),
			'default'  => 1,
		),
		array(
			'id'       => 'search_listing_style',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Search Listing Style', 'foodchow' ),
			'subtitle' => esc_html__( 'Select the search posts listing style', 'foodchow' ),
			'options'  => array(
				'12' => array(
					'alt' => esc_html__( 'One Column', 'foodchow' ),
					'img' => get_template_directory_uri(). '/assets/images/layouts/list.jpg',
				),
				'6'  => array(
					'alt' => esc_html__( 'Two Column', 'foodchow' ),
					'img' => get_template_directory_uri(). '/assets/images/layouts/2col.jpg',
				),
				'4'      => array(
					'alt' => esc_html__( 'Three Column', 'foodchow' ),
					'img' => get_template_directory_uri(). '/assets/images/layouts/list_view.jpg',
				),
			),
			'default'  => '6',
		),
		array(
			'id'       => 'search_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Search Page Layout', 'foodchow' ),
			'subtitle' => esc_html__( 'Select search page layout.', 'foodchow' ),
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
		'required' => array( 'search_listing_style', '!=', '4' ),

		),
		array(
			'id'       => 'search_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Search Sidebar', 'foodchow' ),
			'subtitle' => esc_html__( 'Select sidebar to show at search page', 'foodchow' ),
			'default'  => 'default-sidebar',
			'options'  => foodchow_get_sidebars(),
			'required' => array( 'search_sidebar_layout', '!=', '4' ),
		),
		array(
			'id'      => 'search_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show date on post', 'foodchow' ),
			'default' => 1,
		),
		array(
			'id'       => 'search_button',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Button', 'foodchow' ),
			'desc'     => esc_html__( 'Enable to show reading continue button', 'foodchow' ),

			'default' => 1,
		),
		array(
			'id'       => 'search_button_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'foodchow' ),
			'desc'     => esc_html__( 'Enter button label', 'foodchow' ),
			'required' => array( 'search_button', '=', true ),
			'default'  => esc_html__( 'Read More', 'foodchow' ),
		),
		array(
			'id'      => 'search_title_limits',
			'type'    => 'text',
			'title'   => esc_html__( 'Title Words Limit', 'foodchow' ),
			'desc'    => esc_html__( 'Enter words limit for post\'s title', 'foodchow' ),
			'default' => '10',
		),
		array(
			'id'      => 'search_content_limits',
			'type'    => 'text',
			'title'   => esc_html__( 'Description Words Limit', 'foodchow' ),
			'desc' 	  => esc_html__( 'Enter words limit for post\'s description', 'foodchow' ),
			'default' => '100',
		),

		array(
			'id' 				=> 'search_found_form',
			'type' 				=> 'switch',
			'title' 			=> esc_html__('Search Found Page Form', 'esperto'),
			'desc' 				=> esc_html__('Enable to show form on search found page. ', 'esperto'),
			'default'   		=>  1,

		),
		array(
			'id'      => 'search_found_form_title',
			'type'    => 'text',
			'title'   => esc_html__( 'Search Found Title', 'foodchow' ),
			'desc' 	  => esc_html__( 'Enter title for search found page', 'foodchow' ),
			'default' => '100',
			'required' => array( 'search_found_form', '=', true ),
		),
		array(
			'id' 				=> 'search_found_text',
			'type' 				=> 'textarea',
			'title' 			=> esc_html__('Search Found Text', 'esperto'),
			'desc' 				=> esc_html__('Enter text for search found', 'esperto'),
			'required' => array( 'search_found_form', '=', true ),
		),

		array(
			'id' 				=> 'search_notfound_text',
			'type' 				=> 'textarea',
			'title' 			=> esc_html__('Search Not Found Text', 'esperto'),
			'desc' 				=> esc_html__('Enter text for search not found', 'esperto'),

		),
		array(
			'id' 				=> 'search_notfound_text2',
			'type' 				=> 'textarea',
			'title' 			=> esc_html__('Search Not Found Bottom Text', 'esperto'),
			'desc' 				=> esc_html__('Enter text for search not found form', 'esperto'),

		),
		
		
	),
);
