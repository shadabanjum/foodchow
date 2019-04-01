<?php

return array(
	'title'  => esc_html__( 'Footer Settings', 'foodchow' ),
	'id'     => 'general-Footer Setting',
	'desc'   => '',
	'icon'   => 'el el-chevron-down',
	'fields' => array(
		array(
			'id'      => 'show_main_footer',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Footer', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show widget area footer', 'foodchow' ),
			'default' => 0,
		),

		array(
			'id'          => 'footer_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Footer Style 1 Background Color', 'foodchow' ),
			'default'     => '#1b1b1b',
			'required' => array('show_main_footer', 'equals', true),
			'transparent' => false,
		),

		array(
			'id'       => 'footer_post',
			'type'     => 'select',
			'data'     => 'post',
			'args'     => array( 'post_type' => 'static_block' ),
			'title'    => esc_html__( 'Select Form', 'foodchow' ),
			'desc'     => sprintf("Select Static Block post which you want to show in footer. Note: you can create footer post by using %s post type.", '<a target="_blank" href="'.get_home_url().'/wp-admin/post-new.php?post_type=static_block">Static Block</a>'), //esc_html__( 'Select form which you want to show. Note you can create form by using form builder.', 'foodchow' ),
			'required' => array('show_main_footer', 'equals', true),
		),
		
		array(
			'id'      => 'footer_copyright',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Copyright', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show footer copyright bar', 'foodchow' ),
			'default' => true,
		),
		array(
			'id'       => 'copyright_text',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Copyright Text', 'foodchow' ),
			'desc'     => esc_html__( 'Enter the copyright text', 'foodchow' ),
			'default'  => esc_html__( 'Copyright @2019 Foodchow by webinane. All right reserved', 'foodchow' ),
			'required' => array( 'footer_copyright', 'equals', true ),
		),
		array(
			'id'          => 'copyrigt_bg',
			'type'        => 'color',
			'title'       => esc_html__( 'Copyright Background Color', 'foodchow' ),
			'default'     => '#1b1b1b',
			'transparent' => false,
			'required'          => array('footer_copyright', 'equals', true),
		),
		array(
			'id'          		=> 'copyright_color',
			'type'        		=> 'color',
			'title'       		=> esc_html__( 'Copyright Text Color', 'foodchow' ),
			'default'     		=> '#999',
			'output'             => array('.bottombar span'),
			'transparent' 		=> false,
			'required'          => array('footer_copyright', 'equals', true),
		),
		
	),
);
