<?php

return array(
	'name' 			=> esc_html__('Food Carousel', 'foodchow'),
	'base' 			=> 'food_carousel',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__('Foodchow', 'foodchow'),
	'params' 		=> array(
		array(
			'type'              => 'param_group',                       
			'value'             => '',
			'heading'           => esc_html__('Add Food Slides', 'foodchow'),
			'param_name'        => 'food_slidess',
			'group'             => esc_html__('Food Slider Setting', 'foodchow'),
			'show_settings_on_create' => true,
			'params'            => array(
				array(
					'type'              => 'checkbox',
					'class'             => '',
					'param_name'        => 'show_viddddeo_',	
					'value'             => array( 'Enable Video' => 'true' ),
					'description'       => esc_html__( 'Enable to show food video on image.', 'esperto' ),
				),
				array(
					'type'              => 'textarea',
					'class'             => '',
					'admin_label'       => true,
					'heading'           => esc_html__( 'Video Link', 'esperto' ),
					'param_name'        => 'text',
					'group'             => esc_html__( 'Text', 'esperto' ),
					'description'       => esc_html__( 'Enter vimeo video link like "https://vimeo.com/49674259" to show video.', 'esperto' ),
					'dependency'        => array(
						'element'   	=> 'show_viddddeo_',
						'value'     	=>  'true',
					),
				),

				array(
					'type'              => 'attach_image',
					'class'             => '',
					'heading'           => esc_html__('Slide Image', 'foodchow'),
					'param_name'        => 'slide_image',
					'description'       => esc_html__('Upload Slide image','foodchow'),
				),

			)
		),


	),

);
