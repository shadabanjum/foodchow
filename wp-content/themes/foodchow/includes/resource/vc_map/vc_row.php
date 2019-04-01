<?php 
return array(
	'vc_row'  => array(
		array(
			'type'       => 'dropdown',
			'class'      => '',
			'group'      => esc_html__( 'Section Settings', 'foodchow' ),
			'heading'    => esc_html__( 'Select Space', 'foodchow' ),
			'param_name' => 'gap_select',
			'value'      => array(
				esc_html__( 'From Top and Bottom', 'foodchow' ) => 'block',
				esc_html__( 'Less Space From Left', 'foodchow' ) => 'less-spacing gray-bg top-padd30',
				esc_html__( '40 PX Space From Bottom', 'foodchow' ) => 'widget-gap',
				esc_html__( 'From Top', 'foodchow' )    => 'no-bottom',
				esc_html__( 'From Bottom', 'foodchow' ) => 'no-top',
				esc_html__( 'No Space', 'foodchow' )    => 'no-padding',
			),
			'description'    => esc_html__( 'Select Space for this section.', 'foodchow' ),
		),
		array(
			'type'  => 'dropdown',
			'class'       => '',
			'group'       => esc_html__( 'Section Settings', 'foodchow' ),
			'heading'     => esc_html__( 'Select Overlap', 'foodchow' ),
			'param_name'  => 'overlap_select',
			'value'       => array(
				esc_html__( 'No Overlap', 'foodchow' )    => 'no-overlap',
				esc_html__( 'Overlap 30px', 'foodchow' )  => 'overlap-30',
				esc_html__( 'Overlap 40', 'foodchow' )    => 'overlap-40',
				esc_html__( 'Overlap 70px', 'foodchow' )  => 'overlap-70',
				esc_html__( 'Overlap 104px', 'foodchow' ) => 'overlap-2',
				esc_html__( 'Overlap 120px', 'foodchow' ) => 'overlap-120',
				esc_html__( 'Overlap 138px', 'foodchow' ) => 'overlap-138',

			),
			'description' => esc_html__( 'Select Space for this section.', 'foodchow' ),
		),
		array(
			'type'        => 'checkbox',
			'class'       => '',
			'group'       => esc_html__( 'Section Settings', 'foodchow' ),
			'param_name'  => 'show_container',
			'value'       => array( 'Enable Container' => 'true' ),
			'description' => esc_html__( 'Enable to show container.', 'foodchow' ),
		),
		/*array(
			'type'        => 'checkbox',
			'class'       => '',
			'group'       => esc_html__( 'Parallax Settings', 'foodchow' ),
			'param_name'  => 'show_parallaxx',
			'value'       => array( 'Enable Parallax' => 'true' ),
			'description' => esc_html__( 'Enable to show parallax section.', 'foodchow' ),
		),
		array(
			'type'              => 'attach_image',
			'class'             => '',
			'heading'           => esc_html__( 'Parallax Image', 'esperto' ),
			'param_name'        => 'parallax_img',
			'group'       => esc_html__( 'Parallax Settings', 'foodchow' ),
			'param_name'  => 'show_parallaxx',
			'description'       => esc_html__( 'Upload parallax image.',  'esperto' ),
			'dependency'        => array(
				'element'   => 'show_parallaxx',
				'value'     =>  'true',
			),
		),*/
		/*array(
			'type'              => 'dropdown',
			'class'             => '',
			'heading'           => esc_html__( 'Select Parallax Layer Color', 'esperto' ),
			'param_name'        => 'layer_color',
			'admin_label'       => true,
			'value'             => array( esc_html__( 'Red Layer', 'esperto' ) => 'red-bg', esc_html__( 'Black Layer', 'esperto' ) => 'black-bg', esc_html__( 'Gray Layer', 'esperto' ) => 'gray-bg'  ),
			'description'       => esc_html__( 'Select parallax layer color', 'esperto' ),
			'dependency'        => array(
				'element'   => 'show_parallax',
				'value'     =>  'true',
			),
		),*/
	),
);
