<?php

return array(
    
    'name' 			=> esc_html__('Contact Info', 'esperto'),
    'base' 			=> 'contact_info2',
    
    'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category' 		=> esc_html__('FoodChow', 'esperto'),
    'params' 		=> array( 
        array(
            'type'       => 'dropdown',
            'class'      => '',
            'group'      => esc_html__( 'Shortcode Settings', 'foodchow' ),
            'heading'    => esc_html__( 'Select Background Color', 'foodchow' ),
            'param_name' => 'bg_select',
            'value'      => array(
                esc_html__( 'White Background', 'foodchow' ) => 'sec-box',
                
            ),
            'description'    => esc_html__( 'Select Ba for this section.', 'foodchow' ),
        ),      
        array(
            'type' 				=> 'param_group',                       
            'value' 			=> '',
            'heading' 			=> esc_html__( 'Add Contact Info', 'esperto' ),
            'param_name' 		=> 'contact_desc',
            'group'             => 'Contact Info Setting',
            'show_settings_on_create' => true,
            'params' 			=> array(
             
               
                array(
                    'type'              => 'iconpicker',
                    'class'             => '',
                    'heading'           => esc_html__( 'Contact Icon', 'esperto' ),
                    'param_name'        => 'contact_icon',
                    'description'       => esc_html__( 'Select fontawesome icon.', 'esperto' ),
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Contact Info Title', 'esperto' ),
                    'param_name'        => 'contact_title',
                    'description'       => esc_html__( 'Enter contact info to show.','esperto' )
                ),
                array(
                    'type' 				=> 'textarea',
                    'class' 			=> '',
                    'heading' 			=> esc_html__( 'Contact Info Description', 'esperto' ),
                    'param_name' 		=> 'description',
                    'description' 		=> esc_html__( 'Enter description of contact info to show.', 'esperto' )
                ),
                

            )

        ),


    ),

);
