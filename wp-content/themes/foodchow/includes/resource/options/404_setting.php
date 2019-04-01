<?php
return array(

	'title'         => esc_html__( '404 Page Settings', 'foodchow' ),
	'id'            => '404_page_settings',
	'desc'          => '',
	'subsection'    => true,
	'fields'        => array(
		array(
			'id'      => 'error_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show page banner section', 'foodchow' ),
			'default' => 1,
		),
		array(
			'id'       => 'error_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Title', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for title in error page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'error_banner', '=', true ),
		),
		array(
			'id'       => 'error_subtitle',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Subtitle', 'foodchow' ),
			'desc'     => esc_html__( 'Enter some text for subtitle in error page banner leave it blank if you want to show default title.', 'foodchow' ),
			'required' => array( 'error_banner', '=', true ),
		),
		array(
			'id'                    => 'error_banner_bg',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Banner Background Image', 'foodchow' ),
			'desc'                  => esc_html__( 'Upload the background image for page banner', 'foodchow' ),
			'background-color'      => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'transparent'           => false,
			'background-size'       => false,
			'required'              => array( 'error_banner', '=', true ),
		),

		array(
			'id'       => 'error_breadcrumb',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Breadcrumb', 'foodchow' ),
			'desc'     => esc_html__( 'Enable to show breadcrumb on error page.', 'foodchow' ),
			'required' => array( 'error_banner', '=', true ),
			'default'  => 1,
		),
		array(
			'id'        			=> '404_title',
			'type'      			=> 'text',
			'title'     			=> esc_html__('Colored Title', 'foodchow'),
			'desc'      			=> esc_html__('Enter colored part for error page', 'foodchow'),
			'default'               => esc_html__( 'Oops', 'foodchow' ),
		),
		array(
			'id'        			=> '404_title2',
			'type'      			=> 'text',
			'title'     			=> esc_html__('White Title', 'foodchow'),
			'desc'      			=> esc_html__('Enter white part for error page', 'foodchow'),
			'default'               => esc_html__( 'This Page Not Found!', 'foodchow' ),
		),
		array(
			'id'        			=> '404_description',
			'type'      			=> 'textarea',
			'title'     			=> esc_html__('Description', 'foodchow'),
			'desc'      			=> esc_html__('Enter description for error page', 'foodchow'),
		),
		array(
			'id'        			=> '404_label',
			'type'      			=> 'text',
			'title'     			=> esc_html__('Button Label', 'foodchow'),
			'desc'      			=> esc_html__('Enter back to home button label to show button', 'foodchow'),
		),
		
		array(
			'id'        			=> 'show_searh',
			'type'      			=> 'switch',
			'title'     			=> esc_html__('Show Search Form', 'foodchow'),
			'desc'      			=> esc_html__('Enable to show search form on error page', 'foodchow'),
			'default'   			=>  1,
		),
		array(
			'id'                    => 'error_page_bg',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Section Background Image', 'foodchow' ),
			'desc'                  => esc_html__( 'Insert the background image for error page section', 'foodchow' ),
			'background-color'      => false,
			'background-repeat'     => false,
			'background-attachment' => false,
			'background-position'   => false,
			'transparent'           => false,
			'background-size'       => false,
		),


	),
);


