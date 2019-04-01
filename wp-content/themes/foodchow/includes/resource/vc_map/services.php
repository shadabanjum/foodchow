<?php

add_filter( 'vc_autocomplete_services_cat_callback', 'foodchow_TaxonomyAutocompleteSuggester', 10, 3);

return array(
	'name'          => esc_html__('Resturant Services', 'esperto'),
	'base'          => 'services',
	'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
	'category'      => esc_html__( 'Foodchow', 'esperto' ),
	'params'        => array( 
		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__('Number', 'esperto'),
			'param_name'        => 'number',
			'admin_label'       => true,
			'description'       => esc_html__('Enter number of services posts that you wants to show.','esperto'),
		),
		array(
			'type'              => 'autocomplete',
			'class'             => '',
			'heading'           => esc_html__('Select Categories', 'esperto'),
			'param_name'        => 'cat',
			'admin_label'       => true,
			'query_args'        => array( 'taxonomy' => 'service_cat' ),
			'settings'          => array( 'multiple' => true ),
			'description'       => esc_html__('Choose services categories for which posts you want to show', 'esperto')
		),

		array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Order', 'esperto' ),
			'param_name'        => 'order',
			'value'             => array( esc_html__( 'Ascending', 'esperto' ) => 'ASC',esc_html__( 'Descending', 'esperto' ) => 'DESC'  ),
			'description'       => esc_html__( 'Select sorting order ascending or descending for blog listing', 'esperto' )
		),

		array(
			'type'              => 'textfield',
			'class'             => '',
			'heading'           => esc_html__( 'Title Limit', 'esperto' ),
			'param_name'        => 'title_limit',
			'description'       => esc_html__( 'Enter title words limit that you wants to show.','esperto' ),
		),
	

	)


);
