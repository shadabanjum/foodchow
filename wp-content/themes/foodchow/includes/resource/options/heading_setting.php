<?php

return array(

	'title'         => esc_html__( 'Heading Settings', 'foodchow' ),
    'id'            => 'heading_setting',
    'desc'          => '',
    'subsection'	=> true,
    'fields'        => array(

		array(

			'id' => 'use_custom_heading_style_h1',

			'type' => 'switch',

			'title' => esc_html__('Use H1 Custom Font', 'foodchow'),

			'desc' => esc_html__('Enable to customize the theme heading h1 tag font', 'foodchow'),

			),

		array(

			'id' => 'h1_typography',

			'type' => 'typography',

			'title' => esc_html__('H1 Font Typography', 'foodchow'),

			'google' => true,

			'font-backup' => true,

			'output' => array('h1', '.main-heading > h1', '.video-sec-meta > h1', '.video-sec-meta > h1 span', '.couch-info > h1', '.consult-sec > h1', '.video-sec-meta.style2 > h1,.video-sec-meta.style2 > h1 span', '.banner-info > h1', '.single-meta > h1', '.services > h1', '.buyer-single-page .single-meta > h1', '.coming-meta > h1' ),

			'units' => 'px',

			'subtitle' => esc_html__('Apply options to customize the h1 heading font for the theme', 'foodchow'),

			'default' => array(

				'color' => '',

				'font-style' => '',

				'font-family' => '',

				'google' => true,

				'font-size' => '',

				'line-height' => ''

				),

				'required' => array('use_custom_heading_style_h1', '=', true),

			),

		array(

			'id' => 'use_custom_heading_style_h2',

			'type' => 'switch',

			'title' => esc_html__('Use H2 Custom Font', 'foodchow'),

			'desc' => esc_html__('Enable to customize the theme heading h2 tag font', 'foodchow'),

			),

		array(

			'id' => 'h2_typography',

			'type' => 'typography',

			'title' => esc_html__('H2 Font Typography', 'foodchow'),

			'google' => true,

			'font-backup' => true,

			'output' => array('h2', '.blog-meta > h2', '.col-heading > h2', '.happy-client > h2', '.funfact-info > h2', '.blog-list-sec .blog-meta h2', '.rating-sec h2', '.appoint-form > h2', '.upper-meta > h2', '.blog-meta > h2', '.cross-sells h2', '.woocommerce .products .product a h2.woocommerce-loop-product__title' ),

			'units' => 'px',

			'subtitle' => esc_html__('Apply options to customize the h2 heading font for the theme', 'foodchow'),

			'default' => array(

				'color' => '',

				'font-style' => '',

				'font-family' => '',

				'google' => true,

				'font-size' => '',

				'line-height' => ''

				),


			'required' => array('use_custom_heading_style_h2', '=', true),

			),

		array(

			'id' => 'use_custom_heading_style_h3',

			'type' => 'switch',

			'title' => esc_html__('Use H3 Custom Font', 'foodchow'),

			'desc' => esc_html__('Enable to customize the theme heading h3 tag font', 'foodchow'),

			),

		array(

			'id' => 'h3_typography',

			'type' => 'typography',

			'title' => esc_html__('H3 Font Typography', 'foodchow'),

			'google' => true,

			'font-backup' => true,

			'output' => array('h3', '.lecture-meta > h3 a','.package-detail > h3', '.coach-info h3','.event-info > h3', '.prodct-avatar > h3', '.prod-sale:hover .prodct-avatar > h3', '.contact-us > h3', '.contact-us > h3 span', '.search-area > h3,.search-area > h3 span', '.feature-text > h3', '.feature-text > h3', '.event-info > h3', '.prodct-avatar > h3', '.woocommerce-Address-title h3' ),

			'units' => 'px',

			'subtitle' => esc_html__('Apply options to customize the h3 heading  for the theme', 'foodchow'),

			'default' => array(

				'color' => '',

				'font-style' => '',

				'font-family' => '',

				'google' => true,

				'font-size' => '',

				'line-height' => ''

				),


			'required' => array('use_custom_heading_style_h3', '=', true),

			),

		array(

			'id' => 'use_custom_heading_style_h4',

			'type' => 'switch',

			'title' => esc_html__('Use H4 Custom Font', 'foodchow'),

			'desc' => esc_html__('Enable to customize the theme heading h4 tag font', 'foodchow'),

			),

		array(

			'id' => 'h4_typography',

			'type' => 'typography',

			'title' => esc_html__('H4 Font Typography', 'foodchow'),

			'google' => true,

			'font-backup' => true,

			'output' => array('h4', '.lecture-meta > h4', '.funfact > h4', '.appoint-meta > h4', '.about-instructor > h4', '.team-info > h4', '.subscribe-popup > h4', '.login-area > h4', '.video-meta > h4', '.video-meta > h4', '.question-popup > h4', '.message-title > h4', '.profiel-meta > h4', '.skills > h4', '.about-coach > h4','.coach-detail > h4','.about-course > h4'),

			'units' => 'px',

			'subtitle' => esc_html__('Apply options to customize the h4 heading font for the theme', 'foodchow'),

			'default' => array(

				'color' => '',

				'font-style' => '',

				'font-family' => '',

				'google' => true,

				'font-size' => '',

				'line-height' => ''

				),


			'required' => array('use_custom_heading_style_h4', '=', true),

		),

		array(

			'id' => 'use_custom_heading_style_h5',

			'type' => 'switch',

			'title' => esc_html__('Use H5 Custom Font', 'foodchow'),

			'desc' => esc_html__('Enable to customize the theme heading h5 tag font', 'foodchow'),

			),

		array(

			'id' => 'h5_typography',

			'type' => 'typography',

			'title' => esc_html__('H5 Font Typography', 'foodchow'),

			'google' => true,

			'font-backup' => true,

			'output' => array('h5','.recent-info h5', '.twitter-meta > h5', '.why-coach > h5', '.little-info > h5', 'aside .widget .twitter-meta > h5', '.single-meta > h5','.sender > h5', '.coach-detail > h5'),

			'units' => 'px',

			'subtitle' => esc_html__('Apply options to customize the h5 heading font for the theme', 'foodchow'),

			'default' => array(

				'color' => '',

				'font-style' => '',

				'font-family' => '',

				'google' => true,

				'font-size' => '',

				'line-height' => ''

				),


			'required' => array('use_custom_heading_style_h5', '=', true),

			),

		array(

			'id' => 'use_custom_heading_style_h6',

			'type' => 'switch',

			'title' => esc_html__('Use H6 Custom Font', 'foodchow'),

			'desc' => esc_html__('Enable to customize the theme heading h6 tag font', 'foodchow'),

			),

		array(

			'id' => 'h6_typography',

			'type' => 'typography',

			'title' => esc_html__('H6 Font Typography', 'foodchow'),

			'google' => true,

			'font-backup' => true,

			'output' => array('h6', ''),

			'units' => 'px',

			'subtitle' => esc_html__('Apply options to customize the h6 heading font for the theme', 'foodchow'),

			'default' => array(

				'color' => '',

				'font-style' => '',

				'font-family' => '',

				'google' => true,

				'font-size' => '',

				'line-height' => ''

				),


			'required' => array('use_custom_heading_style_h6', '=', true),

			)
	)
);

