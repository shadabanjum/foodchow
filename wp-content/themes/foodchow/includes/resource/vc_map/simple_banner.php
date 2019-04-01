<?php
return array(

	'name'          => esc_html__('Title With Banner', 'foodchow'),
	'base'          => 'simple_banner',
	'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category'      => esc_html__('Foodchow', 'foodchow'),
	'params'        => array( 
		array(
			'type'       => 'dropdown',
			'class'      => '',
			'group'      => esc_html__( 'Shortcode Settings', 'foodchow' ),
			'heading'    => esc_html__( 'Select Background Color', 'foodchow' ),
			'param_name' => 'bg_select',
			'value'      => array(
				esc_html__( 'White Background', 'foodchow' ) => 'sec-box',
				
			),
			'description'    => esc_html__( 'Select Ba for this section.', 'foodchow' ),
		),  
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__('Title', 'foodchow'),
			'param_name'        => 'title',
			'admin_label'       =>  true,
			'description'       => esc_html__('Enter title that you want to show.','foodchow')
		),   
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Upload Image', 'esperto' ),
			'param_name'        => 'banner_image',
			'description'       => esc_html__( 'Upload image to show.',  'esperto' ),
		), 
	),

);
