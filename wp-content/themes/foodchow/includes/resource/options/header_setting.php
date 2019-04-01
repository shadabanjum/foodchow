<?php
return array(
    'title'         => esc_html__( 'Header  Setting', 'foodchow' ),
    'id'            => 'general-header_setting',
    'desc'          => '',
    
    'fields'        => array(

        array(
            'id'                => 'header1_sticky',
            'type'              => 'switch',
            'title'             => esc_html__( 'Show Sticky Header', 'foodchow' ),
            'desc'              => esc_html__( 'Enable to show sticky Header.', 'foodchow' ),
        ),
        array(
            'id'                => 'header1_topbar',
            'type'              => 'switch',
            'title'             => esc_html__( 'Header Top Bar', 'foodchow' ),
            'desc'              => esc_html__( 'Enable to show header top bar section.', 'foodchow' ),
        ),
        array(
            'id'         => 'topbar_bg_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Top Bar Background Color', 'foodchow' ),
            'default'    => '#161616',
            'transparent' => false,
            'required'          =>  array(
                array( 'header1_topbar','equals', true ),
            ),
        ),
        array(
            'id'                => 'topbar1_settng',
            'type'              => 'section',
            'title'             => esc_html__( 'Top Bar Settings', 'foodchow' ),
            'desc'              => esc_html__( 'This section is used to set top bar.', 'foodchow' ),
            'required'          =>  array(
                array( 'header1_topbar','equals', true ),
            ),
            'indent'            => true,
        ),
        array(
            'id'                => 'topbar_menu',
            'type'              => 'switch',
            'title'             => esc_html__( 'Enable Top Bar Menu', 'foodchow' ),
            'desc'              => esc_html__( 'Enable to show header top bar menu.', 'foodchow' ),
        ),
        array(
            'id'                => 'show_topbar_sharing',
            'type'              => 'switch',
            'title'             => esc_html__( 'Show Share Icon', 'foodchow' ),
            'desc'              => esc_html__( 'Enable to show top bar sharing icon', 'foodchow' ),

        ),
        array(
            'id'       => 'topbar_social_share',
            'type'     => 'social_media',
            'title'    => esc_html__( 'Social Profiles', 'foodchow' ),
            'desc'     => esc_html__( 'Click an icon to activate social profile icons in top bar.', 'foodchow' ),
            'required' => array( 'show_topbar_sharing', '=', true ),
        ),
        array(
            'id'    => 'show_topbar_login',
            'type'  => 'switch',
            'title' => esc_html__( 'Show Top Bar Login', 'foodchow' ),
            'desc'  => esc_html__( 'Enable to show login button in topbar.', 'foodchow' ),
        ),
        array(
            'id'       => 'login_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Login Label', 'foodchow' ),
            'desc'     => esc_html__( 'Enter login button label that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_login', '=', true ),
            'default'  => esc_html__( 'Login', 'foodchow' ),
        ),

        array(
            'id'       => 'login_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Login Title', 'foodchow' ),
            'desc'     => esc_html__( 'Enter login button title that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_login', '=', true ),
            'default'  => esc_html__( 'SIGN IN', 'foodchow' ),
        ),

        array(
            'id'       => 'login_subtitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Login Subtitle', 'foodchow' ),
            'desc'     => esc_html__( 'Enter login button subtitle that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_login', '=', true ),
            'default'  => esc_html__( 'with your social network', 'foodchow' ),
        ),
        
        array(
            'id'    => 'show_topbar_social',
            'type'  => 'switch',
            'title' => esc_html__( 'Show Top Bar Social Login', 'foodchow' ),
            'desc'  => esc_html__( 'Enable to show social login buttons.', 'foodchow' ),
        ),
        array(
            'id'       => 'signin_btn_subtitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Sign In Button Label', 'foodchow' ),
            'desc'     => esc_html__( 'Enter sign in button label that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_login', '=', true ),
            'default'  => esc_html__( 'Sign In', 'foodchow' ),
        ),
        array(
            'id'       => 'login_bottom_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Bottom Sign Up Label', 'foodchow' ),
            'desc'     => esc_html__( 'Enter bottom sign up label that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_login', '=', true ),
            'default'  => esc_html__( 'Not a member? Sign up', 'foodchow' ),
        ),
        

        array(
            'id'    => 'show_topbar_register',
            'type'  => 'switch',
            'title' => esc_html__( 'Show Top Bar Register', 'foodchow' ),
            'desc'  => esc_html__( 'Enable to show register button in topbar.', 'foodchow' ),
        ),
        array(
            'id'       => 'register_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Register Label', 'foodchow' ),
            'desc'     => esc_html__( 'Enter register button label that you want to show.', 'foodchow' ),
            'required' => array( 'show_register_login', '=', true ),
            'default'  => esc_html__( 'Register', 'foodchow' ),
        ),

        array(
            'id'       => 'register_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Register Title', 'foodchow' ),
            'desc'     => esc_html__( 'Enter register button title that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_register', '=', true ),
            'default'  => esc_html__( 'SIGN IN', 'foodchow' ),
        ),

        array(
            'id'       => 'register_subtitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Register Subtitle', 'foodchow' ),
            'desc'     => esc_html__( 'Enter register button subtitle that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_register', '=', true ),
            'default'  => esc_html__( 'with your social network', 'foodchow' ),
        ),
        
        array(
            'id'       => 'signin_btn_subtitle',
            'type'     => 'text',
            'title'    => esc_html__( 'Sign Up Button Label', 'foodchow' ),
            'desc'     => esc_html__( 'Enter sign Up button label that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_register', '=', true ),
            'default'  => esc_html__( 'Sign Up', 'foodchow' ),
        ),
        array(
            'id'       => 'register_bottom_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Bottom Sign Up Label', 'foodchow' ),
            'desc'     => esc_html__( 'Enter bottom sign up label that you want to show.', 'foodchow' ),
            'required' => array( 'show_topbar_login', '=', true ),
            'default'  => esc_html__( 'Not a member? Sign up', 'foodchow' ),
        ),



        array(
            'id'     => 'topbar1_setting_end',
            'type'   => 'section',
            'indent' => false,
        ),
        array(
            'id'     => 'header1_logo',
            'type'   => 'section',
            'title'  => esc_html__( 'Logo Settings', 'foodchow' ),
            'desc'   => esc_html__( 'This section is used to set logo settings', 'foodchow' ),
            'indent' => true,
        ),
        array(
            'id'      => 'logo1_type',
            'type'    => 'button_set',
            'title'   => esc_html__( 'Logo Style', 'foodchow' ),
            'desc'    => esc_html__( 'Select anyone logo style to show in header', 'foodchow' ),
            'options' => array(
                'image' => esc_html__( 'Image Logo', 'foodchow' ),
                'text'  => esc_html__( 'Text Logo', 'foodchow' ),
            ),
            'default'   => 'image',
        ),
        array(
            'id'       => 'image1_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Logo', 'foodchow' ),
            'subtitle' => esc_html__( 'Insert site logo image with adjustable size for the logo section', 'foodchow' ),
            'default'  => array( 'url'=> FOODCHOW_URL.'assets/images/logo.png' ),
            'required' =>  array( array( 'logo1_type','equals','image' ) ),
        ),
        array(
            'id'       => 'logo1_dimension',
            'type'     => 'dimensions',
            'title'    => esc_html__( 'Logo Dimentions', 'foodchow' ),
            'subtitle' => esc_html__( 'Select Logo Dimentions', 'foodchow' ),
            'units'    => array( 'em', 'px', '%' ),
            'default'  => array( 'Width' => '', 'Height' => '' ),
            'required' =>  array(
                array( 'logo1_type','equals','image' ),

            ),
        ),
        array(
            'id'       => 'logo1_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Logo Text', 'foodchow' ),
            'subtitle' => esc_html__( 'Enter Logo Text', 'foodchow' ),
            'required'          =>  array(
                array( 'logo1_type','equals','text' ),
            ),
        ),
        array(
            'id'          => 'logo1_typography',
            'type'        => 'typography', 
            'title'       => esc_html__( 'Typography', 'foodchow' ),
            'google'      => true,
            'font-backup' => false,
            'text-align'  =>  false,
            'line-height' =>  false,
            'output'      => array( 'h2.site-description' ),
            'units'       =>'px',
            'subtitle'    => esc_html__( 'Select Styles for text logo', 'foodchow' ),
            'default'     => array(
                'color'       => '#333',
                'font-style'  => '700',
                'font-family' => 'Abel',
                'google'      => true,
                'font-size'   => '33px',
            ),
            'required'    =>  array(
                array( 'logo1_type','equals','text' ),
            ),
        ),
        array(
            'id'     => 'header1_logo_end',
            'type'   => 'section',
            'indent' => false,
        ),


        array(
            'id'    => 'header1_button',
            'type'  => 'switch',
            'title' => esc_html__( 'Show "REGISTER RESTAURANT" Button', 'foodchow' ),
            'desc'  => esc_html__( 'Enable to show button in header', 'foodchow' ),
        ),

        array(
            'id'       => 'appointment_label',
            'type'     => 'text',
            'title'    => esc_html__( 'Button Label', 'foodchow' ),
            'subtitle' => esc_html__( 'Enter button label to show.', 'foodchow' ),
            'required' =>  array(
                array( 'header1_button','equals', true ),
            ),
        ),
        array(
            'id'               => 'appointment1_page',
            'type'             => 'select',
            'data'             => 'pages',
            'title'            => esc_html__( '"REGISTER RESTAURANT" Page', 'foodchow' ),
            'desc'             => esc_html__( 'Select page to link.', 'foodchow' ),
            'required'         => array(
                array( 'header1_button','equals', true ),
            ),
        ),
        array(
            'id'         => 'menubar_bg_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Menu Bar Background Color', 'foodchow' ),
            'transparent' => false,
        ),
    )
);
