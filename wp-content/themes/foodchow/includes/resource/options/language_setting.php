<?php

return array(

	'title'         => esc_html__( 'Language Settings', 'foodchow' ),
    'id'            => 'language_settings',
    'desc'          => '',
    'icon'			=> 'el el-briefcase',
    'fields'        => array(          
		array(
			'id' => 'optLanguage',
			'type' => 'language',
			'desc' => esc_html__('Please upload .mo language file', 'foodchow'),
			)
	),
);
