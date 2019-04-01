<?php

return array(
	'name'     => esc_html__( 'Accordions', 'actavista' ),
	'base'     => 'accordions',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'FoodChow', 'actavista' ),
	'params'   => array(
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
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Accordions', 'actavista' ),
			'param_name' => 'add_accordions',
			'group'      => esc_html__( 'Accordions Setting', 'actavista' ),
			'show_settings_on_create' => true,
			'params'     => array(
				
				array(
					'type'              => 'textfield',
					'class'             => '',
					'heading'           => esc_html__( 'Accordion Title', 'actavista' ),
					'param_name'        => 'title',
					'description'       => esc_html__( 'Enter accordion title to show.','actavista')
				),   
				array(
					'type'              => 'textarea',
					'class'             => '',
					'heading'           => esc_html__( 'Accordion Text', 'actavista' ),
					'param_name'        => 'text',
					'description'       => esc_html__( 'Enter accordion text to show.','actavista')
				),   
			),

		),


	),

);
