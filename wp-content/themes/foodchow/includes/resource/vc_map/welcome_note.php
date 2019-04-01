<?php

return array(
    'name' 			=> esc_html__('Welcome Note With Gallery', 'esperto'),
    'base' 			=> 'welcome_note',
    
    'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('Foodchow', 'esperto'),
    'params' 		=> array( 
        array(
            'type'              => 'textfield',
            'class'             => '',
            'admin_label'       => true,
            'heading'           => esc_html__( 'Title', 'esperto' ),
            'param_name'        => 'title',
            'description'       => esc_html__( 'Enter title to show.','esperto')
        ),   
        array(
            'type'              => 'textfield',
            'class'             => '',
            'admin_label'       => true,
            'heading'           => esc_html__( 'Subtitle', 'esperto' ),
            'param_name'        => 'subtitle',
            'description'       => esc_html__( 'Enter subtitle to show.','esperto')
        ),   
        array(
            'type'              => 'textarea',
            'class'             => '',
            'admin_label'       => true,
            'heading'           => esc_html__( 'Description', 'esperto' ),
            'param_name'        => 'text',
            'description'       => esc_html__( 'Enter description to show.', 'esperto' )
        ),    
        array(
            'type'              => 'checkbox',
            'class'             => '',
            'param_name'        => 'enable_award',
            'value'             => array( 'Enable Hotel Award' => 'true' ),
            'description'       => esc_html__( 'Enable to show hotel award.', 'esperto' ),
        ),
        array(
            'type'              => 'textfield',
            'class'             => '',
            'heading'           => esc_html__( 'Award Tagline', 'esperto' ),
            'param_name'        => 'award_tagline',
            'description'       => esc_html__( 'Enter award tagline to show.','esperto' ),
            'dependency'        => array(
                'element'   => 'enable_award',
                'value'     =>  'true',
            ),
        ), 
        array(
            'type'              => 'textfield',
            'class'             => '',
            'heading'           => esc_html__( 'Award Title', 'esperto' ),
            'param_name'        => 'award_title',
            'description'       => esc_html__( 'Enter award title to show.','esperto' ),
            'dependency'        => array(
                'element'   => 'enable_award',
                'value'     =>  'true',
            ),
        ), 
        array(
            'type'              => 'attach_image',
            'class'             => '',
            'heading'           => esc_html__( 'Upload Award Image', 'esperto' ),
            'param_name'        => 'award_image',
            'description'       => esc_html__( 'Upload award image to show.',  'esperto' ),
            'dependency'        => array(
                'element'   => 'enable_award',
                'value'     =>  'true',
            ),
        ),  
        array(
            'type'              => 'attach_image',
            'class'             => '',
            'heading'           => esc_html__( 'Upload Signature Image', 'esperto' ),
            'param_name'        => 'signature_image',
            'description'       => esc_html__( 'Upload signature image to show.',  'esperto' ),
        ),  
        array(
            'type'              => 'attach_images',
            'class'             => '',
            'heading'           => esc_html__( 'Upload Side Images', 'esperto' ),
            'param_name'        => 'side_images',
            'description'       => esc_html__( 'Upload side images to show.',  'esperto' ),
        ),        



    ),

);
