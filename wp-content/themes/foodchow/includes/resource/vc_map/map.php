<?php

return array(
    'name'          => esc_html__( 'Google Map', 'esperto' ),
    'base'          => 'map',
    'icon'          => get_template_directory_uri() . '/assets/images/vc_icon.png',
    'category'      => esc_html__( 'FoodChow', 'esperto' ),
    'params'        => array( 
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
            'type'              => 'param_group',                       
            'value'             => '',
            'heading'           => esc_html__('Add Map Info', 'esperto'),
            'param_name'        => 'add_map',
            'show_settings_on_create' => true,
            'params'            => array(
                
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Latitude', 'esperto' ),
                    'param_name'        => 'latitude',
                    'group'             => 'Map Setting',
                    'admin_label'       => true,
                    'description'       => esc_html__( 'Enter latitude of google map.','esperto' ),
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Longitude', 'esperto' ),
                    'param_name'        => 'longitude',
                    'group'             => 'Map Setting',
                    'admin_label'       => true,
                    'description'       => esc_html__( 'Enter longitude of google map.', 'esperto' ),
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Title', 'esperto' ),
                    'param_name'        => 'title',
                    'group'             => 'Map Setting',

                    'description'       => esc_html__( 'Enter location title of google map if you wants to show.', 'esperto' ),
                ),
                array(
                    'type'              => 'textfield',
                    'class'             => '',
                    'heading'           => esc_html__( 'Address', 'esperto' ),
                    'param_name'        => 'address',
                    'group'             => 'Map Setting',

                    'description'       => esc_html__( 'Enter location address if you wants to show.', 'esperto' ),
                ),


            )

        ),

    )


);
