<?php
return array(
	'title'  => esc_html__( 'Blog Settings', 'foodchow' ),
	'id'     => 'blog_settings',
	'desc'   => '',
	'fields' => array(
		array(
			'id'      => 'blog_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show blog page banner section', 'foodchow' ),
			'default' => 1,
		),
		array(
			'id'       => 'blog_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Title', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for title in blog page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'blog_banner', '=', true ),
		),
		array(
			'id'       => 'blog_subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Subtitle', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for subtitle in blog page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'blog_banner', '=', true ),
		),
		array(
			'id'                    => 'blog_banner_bg',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background Image', 'foodchow' ),
			'desc'                  => esc_html__( 'Insert the background image for blog page banner', 'foodchow' ),
			'required'              => array( 'blog_banner', '=', true ),
			'background-color'      => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'transparent'           => false,
			'background-size'       => false,
		),
		array(
			'id'       => 'blog_breadcrumb',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Breadcrumb', 'foodchow' ),
			'desc'     => esc_html__( 'Enable to show breadcrumb on blog banner section', 'foodchow' ),
			'required' => array( 'blog_banner', '=', true ),
			'default'  => 1,
		),
		array(
			'id'       => 'blog_listing_style',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Blog Listing Style', 'foodchow' ),
			'subtitle' => esc_html__( 'Select the blog posts listing style', 'foodchow' ),
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
			'id'       => 'blog_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Blog Page Layout', 'foodchow' ),
			'subtitle' => esc_html__( 'Select blog page layout.', 'foodchow' ),
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
		'required' => array( 'blog_listing_style', '!=', '4' ),

		),
		array(
			'id'       => 'blog_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Blog Sidebar', 'foodchow' ),
			'subtitle' => esc_html__( 'Select sidebar to show at blog page', 'foodchow' ),
			'default'  => 'default-sidebar',
			'options'  => foodchow_get_sidebars(),
			'required' => array( 'blog_sidebar_layout', '!=', '4' ),
		),
		array(
			'id'      => 'blog_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show date on post', 'foodchow' ),
			'default' => 1,
		),
		array(
			'id'       => 'blog_button',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Button', 'foodchow' ),
			'desc'     => esc_html__( 'Enable to show reading continue button', 'foodchow' ),

			'default' => 1,
		),
		array(
			'id'       => 'blog_button_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'foodchow' ),
			'desc'     => esc_html__( 'Enter button label', 'foodchow' ),
			'required' => array( 'blog_button', '=', true ),
			'default'  => esc_html__( 'Read More', 'foodchow' ),
		),
		array(
			'id'      => 'blog_title_limits',
			'type'    => 'text',
			'title'   => esc_html__( 'Title Words Limit', 'foodchow' ),
			'desc'    => esc_html__( 'Enter words limit for post\'s title', 'foodchow' ),
			'default' => '10',
		),
		array(
			'id'      => 'blog_content_limits',
			'type'    => 'text',
			'title'   => esc_html__( 'Description Words Limit', 'foodchow' ),
			'desc' 	  => esc_html__( 'Enter words limit for post\'s description', 'foodchow' ),
			'default' => '100',
		),
		
		
	),
);
