<?php
return array(
	'title'         => esc_html__( 'Category Settings', 'foodchow' ),
	'id'            => 'category_settings',
	'desc'          => '',
	'subsection'	=> true,
	'fields' => array(
		array(
			'id'      => 'category_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show category page banner section', 'foodchow' ),
			'default' => 1,
		),
		array(
			'id'       => 'category_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Title', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for title in category page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'category_banner', '=', true ),
		),
		array(
			'id'       => 'category_subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Subtitle', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for subtitle in category page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'category_banner', '=', true ),
		),
		array(
			'id'                    => 'category_banner_bg',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background Image', 'foodchow' ),
			'desc'                  => esc_html__( 'Insert the background image for category page banner', 'foodchow' ),
			'required'              => array( 'category_banner', '=', true ),
			'background-color'      => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'transparent'           => false,
			'background-size'       => false,
		),
		array(
			'id'       => 'category_breadcrumb',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Breadcrumb', 'foodchow' ),
			'desc'     => esc_html__( 'Enable to show breadcrumb on category banner section', 'foodchow' ),
			'required' => array( 'category_banner', '=', true ),
			'default'  => 1,
		),
		array(
			'id'       => 'category_listing_style',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Category Listing Style', 'foodchow' ),
			'subtitle' => esc_html__( 'Select the category posts listing style', 'foodchow' ),
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
			'id'       => 'category_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Category Page Layout', 'foodchow' ),
			'subtitle' => esc_html__( 'Select category page layout.', 'foodchow' ),
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
		'required' => array( 'category_listing_style', '!=', '4' ),

		),
		array(
			'id'       => 'category_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Category Sidebar', 'foodchow' ),
			'subtitle' => esc_html__( 'Select sidebar to show at category page', 'foodchow' ),
			'default'  => 'default-sidebar',
			'options'  => foodchow_get_sidebars(),
			'required' => array( 'category_sidebar_layout', '!=', '4' ),
		),
		array(
			'id'      => 'category_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show date on post', 'foodchow' ),
			'default' => 1,
		),
		array(
			'id'       => 'category_button',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Button', 'foodchow' ),
			'desc'     => esc_html__( 'Enable to show reading continue button', 'foodchow' ),

			'default' => 1,
		),
		array(
			'id'       => 'category_button_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'foodchow' ),
			'desc'     => esc_html__( 'Enter button label', 'foodchow' ),
			'required' => array( 'category_button', '=', true ),
			'default'  => esc_html__( 'Read More', 'foodchow' ),
		),
		array(
			'id'      => 'category_title_limits',
			'type'    => 'text',
			'title'   => esc_html__( 'Title Words Limit', 'foodchow' ),
			'desc'    => esc_html__( 'Enter words limit for post\'s title', 'foodchow' ),
			'default' => '10',
		),
		array(
			'id'      => 'category_content_limits',
			'type'    => 'text',
			'title'   => esc_html__( 'Description Words Limit', 'foodchow' ),
			'desc' 	  => esc_html__( 'Enter words limit for post\'s description', 'foodchow' ),
			'default' => '100',
		),
		
		
	),
);
