<?php

return array(
    
		'name' 			=> esc_html__('About Us', 'esperto'),
        'base' 			=> 'about_us',
        'icon' 		    => get_template_directory_uri() . '/assets/images/vc_icon.png',
        'category' 		=> esc_html__('FoodChow Widgets', 'esperto'),
        'params' 		=> array( 
            array(
                'type'              => 'dropdown',
                'class'             => '',
                'heading'           => esc_html__( 'content Position', 'esperto' ),
                'param_name'        => 'text_position',
                'value'             => array( esc_html__( 'Left', 'esperto' )  => 'left', esc_html__( 'Center', 'esperto' ) => 'center',  esc_html__( 'Right', 'esperto' )  => 'right', esc_html__( 'Justify', 'esperto' )  => 'justify'),
                'description'       => esc_html__( 'Select content position of this section', 'esperto' )
            ),
            array(
                'type'              => 'attach_image',
                'class'             => '',
                'heading'           => esc_html__( 'Upload Logo', 'esperto' ),
                 'group'            => esc_html__( 'Logo Setting', 'esperto' ),
                'param_name'        => 'logo_image',
                'description'       => esc_html__( 'Upload logo image to show.',  'esperto' ),
            ),  
            array(
                'type'              => 'textarea',
                'class'             => '',
                'admin_label'       => true,
                'heading'           => esc_html__( 'Description', 'esperto' ),
                'param_name'        => 'text',
                 'group'       => esc_html__( 'Text', 'esperto' ),
                'description'       => esc_html__( 'Enter description to show.', 'esperto' )
            ),

            array(
                'type' 				=> 'param_group',                       
                'value' 			=> '',
                'heading' 			=> esc_html__( 'Add Social', 'esperto' ),
                'param_name' 		=> 'contact_icons',
                'group'             =>  esc_html__( 'About Social Icons', 'esperto' ),
                'show_settings_on_create' => true,
                'params' 			=> array(
                    array(
                        'type'              => 'iconpicker',
                        'class'             => '',
                        'heading'           => esc_html__( 'Social Icon', 'esperto' ),
                        'param_name'        => 'social_icon',
                        'description'       => esc_html__( 'Select social icon.', 'esperto' ),
                    ),
                     array(
                        'type'              => 'textfield',
                        'class'             => '',
                        'heading'           => esc_html__( 'Social Icon Link', 'esperto' ),
                        'param_name'        => 'social_icon_link',
                        'description'       => esc_html__( 'Enter social link to link icons.','esperto' )
                    ),
                    
             )

        ),

     ),

);
