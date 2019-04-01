<?php


return 		array(
	'name' 			=> esc_html__( 'Contact Form', 'esperto' ),
	'base' 			=> 'contact_form',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'FoodChow', 'esperto' ),
	'params' 		=> array( 

		array(
			'type'              => 'textarea',
			'class'             => '',
			'admin_label'       => true,
			'heading'           => esc_html__( 'Title', 'esperto' ),
			'param_name'        => 'title',
			'group'             => esc_html__( 'Text', 'esperto' ),
			'description'       => esc_html__( 'Enter title to show.', 'esperto' )
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Form Type', 'esperto' ),
			'param_name'        => 'form_type',
			'value'             => array( esc_html__( 'Form Builder Type', 'esperto' ) => 'form_builder_type', esc_html__( 'Contact Form Type', 'esperto' ) => 'contact_form_type' ),
			'description'       => esc_html__( 'Select form type that you wants to use.', 'esperto' )
		),
		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Form', 'esperto' ),
			'param_name'        => 'contactform',
			'admin_label'       => true,
			'value'             => foodchow_get_posts_array( 'forms' ),
			'description'       => esc_html__( 'Select form to show in these  section', 'esperto' ),
			'dependency'        => array(
				'element'   => 'form_type',
				'value'     =>  'form_builder_type',
			),
		),

		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => esc_html__( 'Select Contact Form 7', 'esperto' ),
			'param_name'  => 'form7',
			'value'       => array_flip(foodchow_get_posts_blocks( 'wpcf7_contact_form' ) ),
			'description' => esc_html__( 'Choose contact form 7 which you want to display in this section', 'esperto' ),
			'dependency'        => array(
				'element'   => 'form_type',
				'value'     =>  'contact_form_type',
			),
		),   
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


	),

);
