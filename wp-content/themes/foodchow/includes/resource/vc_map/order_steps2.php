<?php

return array(

    'name' 			=> esc_html__('Food Order Steps 2', 'esperto'),
    'base' 			=> 'order_steps2',
    
    'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('FoodChow', 'esperto'),
    'params' 		=> array( 
        array(
            'type'              => 'attach_image',
            'class'             => '',
            'heading'           => esc_html__( 'Upload Image', 'esperto' ),
            'param_name'        => 'banner_image',
            'description'       => esc_html__( 'Upload Background image to show.',  'esperto' ),
        ),
        array(
            'type'              => 'textfield',
            'class'             => '',
            'heading'           => esc_html__( 'Tagline', 'esperto' ),
            'param_name'        => 'tagline',
            'description'       => esc_html__( 'Enter tagline to show.','esperto' )
        ),
        array(
            'type'              => 'textfield',
            'class'             => '',
            'heading'           => esc_html__( 'Title', 'esperto' ),
            'param_name'        => 'title',
            'description'       => esc_html__( 'Enter title to show.','esperto' )
        ),
        array(
            'type' 				=> 'param_group',                       
            'value' 			=> '',
            'heading' 			=> esc_html__( 'Add Order Info', 'esperto' ),
            'param_name' 		=> 'order_info',
            'group'             => esc_html__('Order Info Setting', 'esperto' ),
            'show_settings_on_create' => true,
            'params' 			=> array(
                array(
                    'type'              => 'attach_image',
                    'class'             => '',
                    'heading'           => esc_html__( 'Order Step Image', 'esperto' ),
                    'param_name'        => 'order_image',
                    'description'       => esc_html__( 'Upload order step image to show.',  'esperto' ),
                ),

                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Order Step Title', 'esperto' ),
                    'param_name'        => 'step_title',
                    'description'       => esc_html__( 'Enter order step title to show.','esperto' )
                ),
                array(
                    'type' 				=> 'textarea',
                    'class' 			=> '',
                    'heading' 			=> esc_html__( 'Order Step Description', 'esperto' ),
                    'param_name' 		=> 'step_text',
                    'description' 		=> esc_html__( 'Enter order step description to show.', 'esperto' )
                ),
                

            )

        ),


    ),

);
