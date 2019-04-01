<?php
return array(
	'title'      => esc_html__( 'Blog Detail Settings', 'esperto' ),
	'id'         => 'blog_detail_settings',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		
		array(
			'id'      => 'single_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'esperto' ),
			'desc'    => esc_html__( 'Enable to show date on post', 'esperto' ),
			'default' => 1,
		),
		array(
			'id'      => 'single_views',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show views', 'esperto' ),
			'desc'    => esc_html__( 'Enable to show post number of post views.', 'esperto' ),
			'default' => 1,
		),
		array(
			'id'      => 'single_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'esperto' ),
			'desc'    => esc_html__( 'Enable to show post comments number', 'esperto' ),
			'default' => 1,
		),
		array(
			'id'      => 'show_single_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Share Icon', 'esperto' ),
			'desc'    => esc_html__( 'Enable to show post sharing icon', 'esperto' ),
			'default' => 0,
		),
		array(
			'id'       => 'single_post_social_share',
			'type'     => 'sortable',
			'title'    => esc_html__( 'Post Sharing Icons', 'esperto' ),
			'subtitle' => esc_html__( 'Select icons to activate social sharing icons in post detail page', 'esperto' ),
			'required' => array( 'show_single_sharing', '=', true ),
			'mode'     => 'checkbox',
			'options'  => array(
				'facebook'    => esc_html__( 'Facebook', 'esperto' ),
				'twitter'     => esc_html__( 'Twitter', 'esperto' ),
				'gplus'       => esc_html__( 'Google Plus', 'esperto' ),
				'digg'        => esc_html__( 'Digg Digg', 'esperto' ),
				'reddit'      => esc_html__( 'Reddit', 'esperto' ),
				'linkedin'    => esc_html__( 'Linkedin', 'esperto' ),
				'pinterest'   => esc_html__( 'Pinterest', 'esperto' ),
				'stumbleupon' => esc_html__( 'Sumbleupon', 'esperto' ),
				'tumblr'      => esc_html__( 'Tumblr', 'esperto' ),
				'email'       => esc_html__( 'Email', 'esperto' ),
			),
		),
		array(
			'id'      => 'show_next_prev',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Next Previous Post Button', 'esperto' ),
			'desc'    => esc_html__( 'Enable to show next previous post button.', 'esperto' ),
			'default' => 0,
		),
		
		array(
			'id'       => 'blog_author_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Author Box Title', 'esperto' ),
			'desc'     => esc_html__( 'Enter author box title.', 'esperto' ),
		),
		
	),
);

