<?php

return array(
	'name' 			=> esc_html__( 'Heading Style 1', 'esperto' ),
	'base' 			=> 'heading1',
	'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category' 		=> esc_html__( 'Foodchow', 'esperto' ),
	'params' 		=> array( 
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Tagline', 'esperto' ),
			'param_name'        => 'tagline',
			'description'       => esc_html__( 'Enter tagline that you wants to show.','esperto' ),
		),
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title', 'esperto' ),
			'param_name'        => 'title',
			'description'       => esc_html__( 'Enter title that you wants to show.','esperto' ),
		),



	)


);
