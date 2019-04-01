<?php


return array(

	'title'         => esc_html__( 'API Key', 'foodchow' ),
    'id'            => 'api_key',
    'desc'          => '',
    'icon'			=> 'el el-file-new-alt',
    'fields'        => array(
		array(
			'id' 			=> 'twitter_section',
			'type' 			=> 'section',
			'title' 		=> esc_html__( 'Twitter APIs Configuration Section', 'foodchow'  ),
			'desc' 			=> esc_html__('This section is used to configure twitter API settings', 'foodchow' ),
			'indent' 		=> true,
		),
		array(
			'id' 			=> 'twitter_api',
			'type' 			=> 'text',
			'title' 		=> esc_html__('API Key', 'foodchow' ),
			'desc' 			=> esc_html__('Enter Twitter API key Here.', 'foodchow' ),
		),
		array(
			'id' 			=> 'twitter_api_secret',
			'type' 			=> 'text',
			'title' 		=> esc_html__('API Secret', 'foodchow' ),
			'desc' 			=> esc_html__('Enter Twitter API Secret Here.', 'foodchow' ),
		),
		array(
			'id' 			=> 'twitter_token',
			'type' 			=> 'text',
			'title' 		=> esc_html__('Twitter API Token', 'foodchow' ),
			'desc' 			=> esc_html__('Enter Twitter API Token here.', 'foodchow' ),
		),
		array(
			'id' 			=> 'twitter_token_Secret',
			'type' 			=> 'text',
			'title' 		=> esc_html__('Twitter Token Secret', 'foodchow' ),
			'desc' 			=> esc_html__('Enter Twitter Token Secret', 'foodchow' ),
		),
		array(
			'id' 			=> 'twitter_section_end',
			'type' 			=> 'section',                
			'indent' 		=> false,
		),
		array(
			'id' 			=> 'map_api_key',
			'type' 			=> 'text',
			'title' 		=> esc_html__('Google Map Api Key', 'foodchow' ),
			'desc' 			=> sprintf( esc_html__('Enter google map API key. You can get it %s', 'foodchow' ), 
							'<a target="__blank" href="https://developers.google.com/maps/documentation/geocoding/get-api-key">'.esc_html__('(click here)', 'foodchow' ).'</a>'),

		),
	
	)

);

