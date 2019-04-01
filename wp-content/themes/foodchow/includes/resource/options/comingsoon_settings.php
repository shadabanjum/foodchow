<?php

return array(
	'title'      => esc_html__( 'Coming Soon Settings', 'esperto' ),
	'id'         => 'comingsoon_settings',
	'desc'       => '',

	'fields'     => array(
		array(
			'id'    => 'comingsoon_page',
			'type'  => 'switch',
			'title' => esc_html__( 'Coming Soon Page Settings', 'esperto' ),
			'desc'  => esc_html__( 'Enable coming soon page', 'esperto' ),
		),
		array(
			'id'       => 'header3_logo',
			'type'     => 'section',
			'title'    => esc_html__( 'Coming Soon Logo Settings', 'esperto' ),
			'desc'     => esc_html__( 'This section is used to set logo settings', 'esperto' ),
			'indent'   => true,
			'required' => array( 'comingsoon_page', '=', true ),
		),
		array(
			'id'      => 'logo3_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Logo Style', 'esperto' ),
			'desc'    => esc_html__( 'Select anyone logo style to show in coming soon header', 'esperto' ),
			'options' => array(
				'image' => esc_html__( 'Image Logo', 'esperto' ),
				'text'  => esc_html__( 'Text Logo', 'esperto' ),
			),
			'default' => 'image',
		),
		array(
			'id'       => 'image3_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'esperto' ),
			'subtitle' => esc_html__( 'Insert site logo image with adjustable size for the logo section', 'esperto' ),
			'default'  => array(
				'url' => FOODCHOW_URL . 'assets/images/logo.png',
			),
			'required' => array(
				array( 'logo3_type', 'equals', 'image' ),
			),
		),
		array(
			'id'       => 'logo3_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'esperto' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'esperto' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array(
				array( 'logo3_type', 'equals', 'image' ),
				array( 'custom_header', 'equals', 'header_1' ),
			),
		),
		array(
			'id'       => 'logo3_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Logo Text', 'esperto' ),
			'subtitle' => esc_html__( 'Enter Logo Text', 'esperto' ),
			'required' => array(
				array( 'logo3_type', 'equals', 'text' ),
			),
		),
		array(
			'id'          => 'logo3_typography',
			'type'        => 'typography',
			'title'       => esc_html__( 'Typography', 'esperto' ),
			'google'      => true,
			'font-backup' => false,
			'text-align'  => false,
			'line-height' => false,
			'output'      => array( 'h2.site-description' ),
			'units'       => 'px',
			'subtitle'    => esc_html__( 'Select Styles for text logo', 'esperto' ),
			'default'     => array(
				'color'       => '#333',
				'font-style'  => '700',
				'font-family' => 'Abel',
				'google'      => true,
				'font-size'   => '33px',
			),
			'required'    => array(
				array( 'logo3_type', 'equals', 'text' ),
				array( 'custom_header', 'equals', 'header_1' ),
			),
		),
		array(
			'id'     => 'header1_logo_end',
			'type'   => 'section',
			'indent' => false,
		),
		array(
			'id'       => 'comingsoon_page_tagline',
			'type'     => 'text',
			'title'    => esc_html__( 'Coming Soon Page Tagline', 'esperto' ),
			'desc'     => esc_html__( 'Enter the coming soon page tagline', 'esperto' ),
			'default'  => esc_html__( 'We\'re Coming!', 'esperto' ),
			'required' => array( 'comingsoon_page', '=', true ),
		),
		array(
			'id'       => 'comingsoon_page_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Coming Soon Page Title', 'esperto' ),
			'desc'     => esc_html__( 'Enter the coming soon page title', 'esperto' ),
			'default'  => esc_html__( 'We\'re Coming!', 'esperto' ),
			'required' => array( 'comingsoon_page', '=', true ),
		),
		array(
			'id'       => 'comingsoon_page_text',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Coming Soon Page Description', 'esperto' ),
			'desc'     => esc_html__( 'Enter the coming soon page description', 'esperto' ),
			'default'  => esc_html__( 'all right. we will, take care yourself. i guess that\'s what you\'re best, presence old master? A tremor in the force.', 'esperto' ),
			'required' => array( 'comingsoon_page', '=', true ),
		),
		array(
			'id'       => 'show_comingsoon_sharing',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Share Icon', 'esperto' ),
			'desc'     => esc_html__( 'Enable to show post sharing icon', 'esperto' ),
			'required' => array( 'comingsoon_page', '=', true ),

		),
		array(
			'id'       => 'comingsoon_share_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Coming Soon Social Label', 'esperto' ),
			'desc'     => esc_html__( 'Enter social icons label to show', 'esperto' ),
			'default'  => esc_html__( 'Follow Us:', 'esperto' ),
			'required' => array( 'show_comingsoon_sharing', '=', true ),
		),
		array(
			'id'       => 'comingsoon_social_share',
			'type'     => 'social_media',
			'title'    => esc_html__( 'Social Icons', 'esperto' ),
			'subtitle' => esc_html__( 'Select icons to activate social icons in coming soon  page', 'esperto' ),
			'required' => array( 'show_comingsoon_sharing', '=', true ),
		
		),
		
		array(
			'id'          => 'comingsoon_date',
			'type'        => 'date',
			'title'       => esc_html__( 'Coming Date', 'esperto' ),
			'desc'        => esc_html__( 'Select the date when Website will reopen', 'esperto' ),
			'placeholder' => 'Click to enter a date',
			'date-format' => 'dd/mm/yy',
			'required'    => array( 'comingsoon_page', '=', true ),
		),
	
		array(
			'id'       => 'comingsoon_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'esperto' ),
			'desc'     => esc_html__( 'Insert background Image for coming soon', 'esperto' ),
			'default'  => array(
				'url' => FOODCHOW_URL . 'assets/images/coming-soon-bg.jpg',
			),
			'required' => array( 'comingsoon_page', '=', true ),

		),
		array(
			'id'      => 'c_footer_copyright',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Copyright', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show footer copyright bar', 'foodchow' ),
			'required' => array( 'comingsoon_page', '=', true ),
		),
		array(
			'id'       => 'c_copyright_text',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Copyright Text', 'foodchow' ),
			'desc'     => esc_html__( 'Enter the copyright text', 'foodchow' ),
			'default'  => esc_html__( 'Copyright @2019 Foodchow by webinane. All right reserved', 'foodchow' ),
			'required' => array( 'c_footer_copyright', '=', true ),
		),
	),

);
