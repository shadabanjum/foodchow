<?php
return array(
	'title'  => esc_html__( 'General Settings', 'foodchow' ),
	'id'     => 'general',
	'desc'   => '',
	'icon'   => 'el el-wrench',
	'fields' => array(
		array(
			'id'      => 'site_favicon',
			'type'    => 'media',
			'url'     => true,
			'title'   => esc_html__( 'Site Favicon', 'foodchow' ),
			'desc'    => esc_html__( 'Upload site favicon image with adjustable size.', 'foodchow' ),
			'default' => array(
				'url' => FOODCHOW_URL . 'assets/images/icon.png',
			),
		),
		array(
			'id'      => 'page_loader',
			'type'    => 'switch',
			'title'   => esc_html__( 'Enable Page Loader', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to show page loader.', 'foodchow' ),
			'default' => true,
		),
		array(
			'id'      => 'page_loader_type',
			'type'    => 'select',
			'title'   => esc_html__( 'Page Loader Style', 'foodchow'),                
			'desc'    => esc_html__('Select page loader style that you want to use', 'foodchow'),                
			'options' => array(
				'image_loader'    => esc_html__( 'Image Loader', 'foodchow'), 
				'creative_style'  => esc_html__( 'Creative Style Loader', 'foodchow'),

			),
			'default' => 'image_loader',
			'required'    => array( 'page_loader', '=', true ),
		),
		array(
			'id'      => 'site_loader_gif',
			'type'    => 'media',
			'url'     => true,
			'title'   => esc_html__( 'Page Loader', 'foodchow' ),
			'desc'    => esc_html__( 'Upload site page loader image with adjustable size if you want to use your custom loader image.', 'foodchow' ),
			'default' => array(
				'url' => FOODCHOW_URL . 'assets/images/loading.gif',
			),
			'required' => array( 'page_loader_type', '=', 'image_loader' ),
		),

		array(
			'id'          => 'theme_color_scheme',
			'type'        => 'color',
			'title'       => esc_html__( 'Color Scheme One', 'foodchow' ),
			'default'     => '#2088c7',
			'transparent' => false,
		),
		array(
			'id'          => 'theme_color_scheme2',
			'type'        => 'color',
			'title'       => esc_html__( 'Color Scheme Two', 'foodchow' ),
			'default'     => '#f8de60',
			'transparent' => false,
		),
		array(
			'id'     => 'layout_settings',
			'type'   => 'section',
			'title'  => esc_html__( 'Layout Settings', 'foodchow' ),
			'indent' => true,
		),
		array(
			'id'      => 'boxed_layout_status',
			'type'    => 'switch',
			'title'   => esc_html__( 'Boxed Layout', 'foodchow' ),
			'desc'    => esc_html__( 'Enable to make the site layout in boxed version', 'foodchow' ),
			'default' => false,
		),

		array(
			'id'            => 'boxed_top',
			'type'          => 'slider',
			'title'         => esc_html__( 'Top Margin', 'foodchow' ),
			'subtitle'      => esc_html__( 'Enter top margin for boxed layout', 'foodchow' ),
			'desc'          => esc_html__( 'Add value for top margin of boxed layout', 'foodchow' ),
			'required'      => array( 'boxed_layout_status', '=', '1' ),
			'default'       => 0,
			'min'           => 0,
			'step'          => 5,
			'max'           => 200,
			'display_value' => 'text',
		),
		array(
			'id'            => 'boxed_bottom',
			'type'          => 'slider',
			'title'         => esc_html__( 'Bottom Margin', 'foodchow' ),
			'subtitle'      => esc_html__( 'Enter bottom margin for boxed layout', 'foodchow' ),
			'desc'          => esc_html__( 'Add value for bottom margin of boxed layout', 'foodchow' ),
			'required'      => array( 'boxed_layout_status', '=', '1' ),
			'default'       => 0,
			'min'           => 0,
			'step'          => 5,
			'max'           => 200,
			'display_value' => 'text',
		),
		array(
			'id'            => 'boxed_shadow',
			'type'          => 'slider',
			'title'         => esc_html__( 'Boxed Shadow', 'foodchow' ),
			'subtitle'      => esc_html__( 'Enter boxed shadow for boxed layout', 'foodchow' ),
			'desc'          => esc_html__( 'Add value for boxed shadow of boxed layout', 'foodchow' ),
			'required'      => array( 'boxed_layout_status', '=', '1' ),
			'default'       => 0,
			'min'           => 0,
			'step'          => 2,
			'max'           => 60,
			'display_value' => 'text',
		),
		array(
			'id'          => 'boxed_shadow_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Select Boxed Shadow color', 'foodchow' ),
			'default'     => '#747474',
			'transparent' => false,
			'required'    => array( 'boxed_layout_status', '=', '1' ),
		),
		array(
			'id'       => 'background_settings',
			'type'     => 'section',
			'title'    => esc_html__( 'Background Settings', 'foodchow' ),
			'indent'   => true,
			'required' => array( 'boxed_layout_status', '=', '1' ),
		),
		array(
			'id'      => 'background_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Background Type', 'foodchow' ),
			'desc'    => esc_html__( 'Please select background type to show', 'foodchow' ),
			'options' => array(
				'default' => esc_html__( 'Default Patterns', 'foodchow' ),
				'custom'  => esc_html__( 'Custom Background', 'foodchow' ),
			),
			'default' => 'default',
		),
		array(
			'id'       => 'patterns',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Select Patterns', 'foodchow' ),
			'subtitle' => esc_html__( 'Select the pattern image to apply on background for boxed layout', 'foodchow' ),
			'options'  => array(
				'none' => array(
					'alt' => esc_html__( 'None', 'foodchow' ),
					'img' => get_template_directory_uri(). '/assets/images/pattern/none.png',
				),
                'pattern-1'  => array(
                    'alt' => esc_html__( 'Pattern 1', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-1.png'
                ),
                'pattern-2'  => array(
                    'alt' => esc_html__( 'Pattern 2', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-2.png'
                ),
                'pattern-3'  => array(
                    'alt' => esc_html__( 'Pattern 3', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-3.png'
                ),
                'pattern-4'  => array(
                    'alt' => esc_html__( 'Pattern 4', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-4.png'
                ),
                'pattern-5'  => array(
                    'alt' => esc_html__( 'Pattern 5', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-5.png'
                ),
                'pattern-6'  => array(
                    'alt' => esc_html__( 'Pattern 6', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-6.png'
                ),
                'pattern-7'  => array(
                    'alt' => esc_html__( 'Pattern 7', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-7.png'
                ),
                'pattern-8'  => array(
                    'alt' => esc_html__( 'Pattern 8', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-8.png'
                ),
                'pattern-9'  => array(
                    'alt' => esc_html__( 'Pattern 9', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-9.png'
                ),
                'pattern-10' => array(
                    'alt' => esc_html__( 'Pattern 10', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-10.png'
                ),
                'pattern-11' => array(
                    'alt' => esc_html__( 'Pattern 11', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-11.png'
                ),
                'pattern-12' => array(
                    'alt' => esc_html__( 'Pattern 12', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-12.png'
                ),
                'pattern-13' => array(
                    'alt' => esc_html__( 'Pattern 13', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-13.png'
                ),
                'pattern-14' => array(
                    'alt' => esc_html__( 'Pattern 14', 'foodchow' ),
                    'img' => get_template_directory_uri(). '/assets/images/pattern/pattern-14.png'
                ),
            ),
			'required' => array( 'background_type', '=', 'default' ),
			'default'  => 'none',
		),
		array(
			'id'       => 'patterns',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Select Patterns', 'foodchow' ),
			'desc'     => esc_html__( 'Select the pattern image to apply on background for boxed layout', 'foodchow' ),
			'options'  => array(
				'none'       => array(
					'alt' => esc_html__( 'None', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/none.png',
				),
				'pattern-1'  => array(
					'alt' => esc_html__( 'Pattern 1', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-1.png',
				),
				'pattern-2'  => array(
					'alt' => esc_html__( 'Pattern 2', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-2.png',
				),
				'pattern-3'  => array(
					'alt' => esc_html__( 'Pattern 3', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-3.png',
				),
				'pattern-4'  => array(
					'alt' => esc_html__( 'Pattern 4', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-4.png',
				),
				'pattern-5'  => array(
					'alt' => esc_html__( 'Pattern 5', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-5.png',
				),
				'pattern-6'  => array(
					'alt' => esc_html__( 'Pattern 6', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-6.png',
				),
				'pattern-7'  => array(
					'alt' => esc_html__( 'Pattern 7', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-7.png',
				),
				'pattern-8'  => array(
					'alt' => esc_html__( 'Pattern 8', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-8.png',
				),
				'pattern-9'  => array(
					'alt' => esc_html__( 'Pattern 9', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-9.png',
				),
				'pattern-10' => array(
					'alt' => esc_html__( 'Pattern 10', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-10.png',
				),
				'pattern-11' => array(
					'alt' => esc_html__( 'Pattern 11', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-11.png',
				),
				'pattern-12' => array(
					'alt' => esc_html__( 'Pattern 12', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-13.png',
				),
				'pattern-13' => array(
					'alt' => esc_html__( 'Pattern 13', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-13.png',
				),
				'pattern-14' => array(
					'alt' => esc_html__( 'Pattern 14', 'foodchow' ),
					'img' => get_template_directory_uri() . '/assets/images/pattern/pattern-14.png',
				),
			),
			'required' => array( 'background_type', '=', 'default' ),
			'default'  => 'none',
		),
		array(
			'id'       => 'background_options',
			'type'     => 'background',
			'title'    => esc_html__( 'Body Background', 'foodchow' ),
			'subtitle' => esc_html__( 'Body background with image, color, etc.', 'foodchow' ),
			'desc'     => esc_html__( 'Body background options to set image or color for boxed layout version.', 'foodchow' ),
			'required' => array( 'background_type', '=', 'custom' ),
			'default'  => array(
				'background-color' => '#1e73be',
			),
		),
	),
);
