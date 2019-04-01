<?php

return array(

  'name' 			=> esc_html__('Best Services App', 'esperto'),
  'base' 			=> 'best_app',
  'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
  'category' 		=> esc_html__('Foodchow', 'esperto'),
  'params' 		=> array( 
     array(
        'type'              => 'attach_image',
        'class'             => '',
        'heading'           => esc_html__( 'Upload Background Image', 'esperto' ),

        'param_name'        => 'bg_image',
        'description'       => esc_html__( 'Upload background image to show.',  'esperto' ),
    ),  
    array(
        'type'              => 'attach_image',
        'class'             => '',
        'heading'           => esc_html__( 'Upload Side Image', 'esperto' ),

        'param_name'        => 'side_image',
        'description'       => esc_html__( 'Upload side image to show.',  'esperto' ),
    ),  
    array(
        'type'              => 'textfield',
        'class'             => '',
        'heading'           => esc_html__( 'Title', 'esperto' ),
        'param_name'        => 'title',
        'description'       => esc_html__( 'Enter title to link icons.','esperto' )
    ),
    array(
        'type'              => 'textarea',
        'class'             => '',
        'heading'           => esc_html__( 'Description', 'esperto' ),
        'param_name'        => 'text',
        
        'description'       => esc_html__( 'Enter description to show.', 'esperto' )
    ),
    array(
        'type'              => 'attach_image',
        'class'             => '',
        'heading'           => esc_html__( 'Icon Image 1', 'esperto' ),
        'param_name'        => 'icon_image1',
        'description'       => esc_html__( 'Icon image 1 to show.',  'esperto' ),
    ),
    array(
        'type'              => 'textfield',
        'class'             => '',
        'heading'           => esc_html__( 'Icon 1 Link', 'esperto' ),
        'param_name'        => 'icon1_link',
        'description'       => esc_html__( 'Enter icon link if you wants to link it.','esperto' )
    ),
    array(
        'type'              => 'attach_image',
        'class'             => '',
        'heading'           => esc_html__( 'Icon Image 2', 'esperto' ),
        'param_name'        => 'icon_image2',
        'description'       => esc_html__( 'Icon image 2 to show.',  'esperto' ),
    ),
    array(
        'type'              => 'textfield',
        'class'             => '',
        'heading'           => esc_html__( 'Icon 2 Link', 'esperto' ),
        'param_name'        => 'icon2_link',
        'description'       => esc_html__( 'Enter icon link if you wants to link it.','esperto' )
    ),

),

);
