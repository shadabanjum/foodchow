<?php
return array(
	'title'         => esc_html__( 'Tag Settings', 'esperto' ),
	'id'            => 'tag_settings',
	'desc'          => '',
	'subsection'	=> true,
	'fields'        => array(
		array(
			'id' 				=> 'tag_banner',
			'type' 				=> 'switch',
			'title' 			=> esc_html__('Show Banner', 'esperto'),
			'desc' 				=> esc_html__('Enable to show tag page banner section', 'esperto'),
			'default'   		=>  1,
		), 
		array(
			'id' 				=> 'tag_title',
			'type' 				=> 'text',
			'title' 			=> esc_html__('Banner Title', 'esperto'),
			'desc' 				=> esc_html__('Enter some text for title in tag page banner leave it blank if you want to show default title.', 'esperto'),
			'required' 			=> array('tag_banner', '=', true),
		),
		array(
			'id' 				=> 'tag_banner_bg',
			'type' 				=> 'background',
			'title' 			=> esc_html__( 'Banner Background Image', 'esperto' ),
			'desc' 				=> esc_html__( 'Insert the background image for tag page banner', 'esperto' ),
			'required' 			=> array('tag_banner', '=', true),
			'background-color' 	=> false,
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' 	=> false,
			'transparent' 		=> false,
			'background-size' 	=> false,
		),

		array(
			'id' 				=> 'tag_banner_layer',
			'type' 				=> 'color',
			'output' 			=> array('.site-title'),
			'title' 			=> esc_html__('Banner Background Image Layer', 'esperto'),
			'desc' 				=> esc_html__( 'Select the background image layer tag page banner', 'esperto' ),
			'default' 			=> '#000000',
			'transparent' 		=> false,
			'required' 			=> array('tag_banner', '=', true),
		),
		array(
			'id' 				=> 'tag_breadcrumb',
			'type' 				=> 'switch',
			'title' 			=> esc_html__('Show Breadcrumb', 'esperto'),
			'desc' 				=> esc_html__('Enable to show breadcrumb on tag banner section', 'esperto'),
			'required' 			=> array('tag_banner', '=', true),
			'default'   		=>  1,
		), 
		array(
            'id'       			=> 'tag_listing_style',
            'type'     			=> 'image_select',
            'title'    			=> esc_html__( 'Tag Listing Style', 'esperto' ),
            'subtitle' 			=> esc_html__( 'Select the blog posts listing style','esperto' ),
            'options'  			=> array(
				'col-md-12' 	=> array(
					'alt' 				=> esc_html__( 'Grid View 1 Column','esperto' ),
					'img' 				=> get_template_directory_uri(). '/assets/images/layouts/list.jpg'
				),
				'col-lg-6' 		=> array(
					'alt' 				=> esc_html__( 'Grid View 2 Columns', 'esperto' ),
					'img' 				=> get_template_directory_uri(). '/assets/images/layouts/2col.jpg'
				),
				'list' 		    => array(
					'alt' 				=> esc_html__( 'List View', 'esperto' ),
					'img' 				=> get_template_directory_uri(). '/assets/images/layouts/list_view.jpg'
				),        
			),
			'default'  			=> 'list',
           
        ),
		array(
			'id' 				=> 'tag_sidebar_layout',
			'type' 				=> 'image_select',
			'title' 			=> esc_html__('Tag Page Layout', 'esperto'),
			'subtitle' 			=> esc_html__('Select tag page layout.', 'esperto'),
			'options' => array(
				'left' => array(
					'alt' => esc_html__('2 Column Left', 'esperto'),
					'img' =>  get_template_directory_uri() . '/assets/images/2cl.png'
				),
				'full' => array(
					'alt' => esc_html__('1 Column', 'esperto'),
					'img' =>  get_template_directory_uri() . '/assets/images/1col.png'
				),
				'right' => array(
					'alt' => esc_html__('2 Column Right', 'esperto'),
					'img' =>  get_template_directory_uri() . '/assets/images/2cr.png'
				),
			),
			'default' 			=> 'right',
			'required'  		=>  array('tag_listing_style', '!=', 'col-md-6'),   
		),
		array(
			'id'                => 'tag_page_sidebar',
			'type'              => 'select', 
			'title'             => esc_html__('Tag Sidebar', 'esperto'),
			'subtitle'         	=> esc_html__('Select sidebar to show at tag page', 'esperto'),
			'default'           => 'default-sidebar',
			'options'           => esperto_get_sidebars(), 
			'required'  		=>  array('tag_sidebar_layout', '!=', 'full'),           
		),


		array(
			'id' 				=> 'tag_date',
			'type' 				=> 'switch',
			'title' 			=> esc_html__('Show Date', 'esperto'),
			'desc' 				=> esc_html__('Enable to show date on post', 'esperto'),
			'default'   		=>  1,
		),
		array(
			'id' 				=> 'tag_title_limits',
			'type' 				=> 'text',
			'title' 			=> esc_html__('Title Words Limit', 'esperto'),
			'desc' 				=> esc_html__('Enter words limit for post\'s title', 'esperto'),
			'default'  			=>  '10',
		),
		array(
			'id' 				=> 'tag_content_limits',
			'type' 				=> 'text',
			'title' 			=> esc_html__('Description Words Limit', 'esperto'),
			'desc' 				=> esc_html__('Enter words limit for post\'s description', 
				'esperto'),
			'default'   		=>  '20',
		),

		array(
			'id' 				=> 'tag_likes',
			'type' 				=> 'switch',
			'title' 			=> esc_html__('Show Likes', 'esperto'),
			'desc' 				=> esc_html__('Enable to show likes on post', 'esperto'),
		),
		array(
			'id' 				=> 'tag_comments',
			'type' 				=> 'switch',
			'title' 			=> esc_html__('Show Comments', 'esperto'),
			'desc' 				=> esc_html__('Enable to show comments on post', 'esperto'),
			'default'   		=>  1,
		),	
		array(
			'id' 				=> 'tag_button',
			'type' 				=> 'switch',
			'title' 			=> esc_html__('Show Button', 'esperto'),
			'desc' 				=> esc_html__('Enable to show button', 'esperto'),
			
		),
		array(
			'id' 				=> 'tag_button_text',
			'type' 				=> 'text',
			'title' 			=> esc_html__('Button Label', 'esperto'),
			'desc' 				=> esc_html__('Enter button label', 'esperto'),
			'default'           => esc_html__( 'Reading Continue', 'esperto' ),
			'required' 			=> array('tag_button', '=', true),
		),
	

	),
);

