<?php
return array(
	'name'     => esc_html__( 'Useful Link', 'esperto' ),
	'base'     => 'useful_links',
	'icon'     => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' => esc_html__( 'FoodChow Widgets', 'esperto' ),
	'params'   => array(
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'esperto' ),
			'param_name'        => 'title',
			'admin_label'       =>  true,
			'description'       => esc_html__( 'Enter title.', 'esperto' ),
		),
		
		array(
			'type'       => 'param_group',
			'value'      => '',
			'heading'    => esc_html__( 'Add Links', 'esperto' ),
			'param_name' => 'add_link',
			'group'      => 'Links Setting',
			'show_settings_on_create' => true,
			'params'     => array(
				array(
					'type'        => 'vc_link',
					'class'       => '',
					'heading'     => esc_html__( 'Label And Link', 'esperto' ),
					'param_name'  => 'serv_link',
					'description' => esc_html__( 'Enter  label and link.','esperto' ),		
				),
			),

		),
	),

);
