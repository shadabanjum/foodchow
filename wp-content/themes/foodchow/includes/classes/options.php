<?php

namespace Foodchow\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Options {

	public static $instance;

	/**
	 * Set this value for theme options key
	 *
	 * @var string
	 */
	private $opt_name = FOODCHOW_NAME . '_options';

	private $menu_title = '';

	private $page_title = '';

	private $menu_type = 'submenu';

	private $page_slug = FOODCHOW_NAME . '_options';

	private $customizer = false;

	private $admin_bar_icon = 'dashicons-portfolio';

	private $page_parent = 'themes.php';

	private $menu_icon = 'dashicons-settings';

	private $docs_link = 'https://docs.webinane.com';

	private $google_api_key = '';

	function init() {

		if ( ! class_exists( 'Redux' ) ) {
			return;
		}

		$this->opt_name = apply_filters( 'redux_demo/opt_name', $this->opt_name );
		$this->menu_title =  esc_html__( 'Foodchow Options', 'foodchow' );
		$this->page_title = esc_html__( 'Foodchow Options', 'foodchow' );

		$this->args();

		$this->sections();
	}
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * [args description]
	 *
	 * @return [type] [description]
	 */
	function args() {

		/**s
	     * ---> SET ARGUMENTS
	     * All the possible arguments for Redux.
	     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
	     * */

	    $theme = wp_get_theme(); // For use with some settings. Not necessary.

	    $args = array(
	    	/*TYPICAL -> Change these values as you need/desire*/
	    	'opt_name' => $this->opt_name,
	    	/*This is where your data is stored in the database and also becomes your global variable name.*/
	    	'display_name' => $theme->get('Name'),
	    	/*Name that appears at the top of your panel*/
	    	'display_version' => $theme->get('Version'),
	    	/*Version that appears at the top of your panel*/
	    	'menu_type' => $this->menu_type,
	    	/*Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)*/
	    	'allow_sub_menu' => true,
	    	/*Show the sections below the admin menu item or not*/
	    	'menu_title' => $this->menu_title,
	    	'page_title' => $this->page_title,
            /*You will need to generate a Google API key to use this feature.
            Please visit: https://developers.google.com/fonts/docs/developer_api#Auth*/
            'google_api_key' => $this->google_api_key,
            /*Set it you want google fonts to update weekly. A google_api_key value is required.*/
            'google_update_weekly' => false,
            /*Must be defined to add google fonts to the typography module*/
            'async_typography' => true,
            /*Use a asynchronous font on the front end or font string
            'disable_google_fonts_link' => true,                     Disable this in case you want to create your own google fonts loader*/
            'admin_bar' => true,
            /*Show the panel pages on the admin bar*/
            'admin_bar_icon' => $this->admin_bar_icon,
            /*Choose an icon for the admin bar menu*/
            'admin_bar_priority' => 50,
            /*Choose an priority for the admin bar menu*/
            'global_variable' => 'foodchow_opt_name',
            /*Set a different name for your global variable other than the opt_name*/
            'dev_mode' => false,
            /*Show the time the page took to load, etc*/
            'update_notice' => false,
            /*If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo*/
            'customizer' => $this->customizer,
            /*Enable basic customizer support
            'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
            'disable_save_warn' => true,                    // Disable the save warning when a user changes a field*/

            /*OPTIONAL -> Give you extra features*/
            'page_priority' => null,
            /*Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.*/
            'page_parent' => $this->page_parent,
            /*For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters*/
            'page_permissions' => 'manage_options',
            /*Permissions needed to access the options panel.*/
            'menu_icon' => '',
            /*Specify a custom URL to an icon*/
            'last_tab' => '',
            /*Force your panel to always open to a specific tab (by id)*/
            'page_icon' => 'icon-themes',
            /*Icon displayed in the admin panel next to your menu_title*/
            'page_slug' => $this->page_slug,
            /*Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided*/
            'save_defaults' => true,
            /*On load save the defaults to DB before user clicks save or not*/
            'default_show' => false,
            /*If true, shows the default value next to each field that is not the default value.*/
            'default_mark' => '',
            /*What to print by the field's title if the value shown is default. Suggested: **/
            'show_import_export' => true,
            /*Shows the Import/Export panel when not used as a field.*/
            /*CAREFUL -> These options are for advanced use only*/
            'transient_time' => 60 * MINUTE_IN_SECONDS,
            'output' => true,
            /*Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output*/
            'output_tag' => true,
            /*Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
            'footer_credit'     => '',                    Disable the footer credit of Redux. Please leave if you can help it.

            FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.*/
            'database' => 'theme_mods',
            /*possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!*/
            'use_cdn' => true,
            /*If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

            HINTS*/
            'hints' => array(
            	'icon' => 'el el-question-sign',
            	'icon_position' => 'right',
            	'icon_color' => 'lightgray',
            	'icon_size' => 'normal',
            	'tip_style' => array(
            		'color' => 'red',
            		'shadow' => true,
            		'rounded' => false,
            		'style' => '',
            	),
            	'tip_position' => array(
            		'my' => 'top left',
            		'at' => 'bottom right',
            	),
            	'tip_effect' => array(
            		'show' => array(
            			'effect' => 'slide',
            			'duration' => '500',
            			'event' => 'mouseover',
            		),
            		'hide' => array(
            			'effect' => 'slide',
            			'duration' => '500',
            			'event' => 'click mouseleave',
            		),
            	),
            ),
        );

	    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => 'http://docs.reduxframework.com/',
	'title' => esc_html__( 'Documentation', 'foodchow' ),
);

$args['admin_bar_links'][] = array(
	'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
	'title' => esc_html__( 'Support', 'foodchow' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-extensions',
	'href'  => 'reduxframework.com/extensions',
	'title' => esc_html__( 'Extensions', 'foodchow' ),
);

	    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github'
);
$args['share_icons'][] = array(
	'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
	'url'   => 'http://twitter.com/reduxframework',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter'
);
$args['share_icons'][] = array(
	'url'   => 'http://www.linkedin.com/company/redux-framework',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin'
);

	    // Panel Intro text -> before the form
if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}
	$args['intro_text'] = sprintf( '<p>'.esc_html__('Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable:', 'foodchow' ). '<strong>$%1$s</strong></p>', $v );
} else {
	$args['intro_text'] = '<p>'.esc_html__('This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'foodchow' ) .'</p>';
}

	    // Add content after the form.
$args['footer_text'] = '<p>'.esc_html__('This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'foodchow' ).'</p>';

\Redux::setArgs( $this->opt_name, $args );
}


function helpTabs() {

		/*
	     * ---> START HELP TABS
	     */

		$tabs = array(
			array(
				'id'      => 'redux-help-tab-1',
				'title'   => esc_html__( 'Theme Information 1', 'foodchow' ),
				'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'foodchow' )
			),
			array(
				'id'      => 'redux-help-tab-2',
				'title'   => esc_html__( 'Theme Information 2', 'foodchow' ),
				'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'foodchow' )
			)
		);
		Redux::setHelpTab( $opt_name, $tabs );

	    // Set the help sidebar
		$content = '<p>'. esc_html__('This is the sidebar content, HTML is allowed.', 'foodchow' ).'</p>';
		Redux::setHelpSidebar( $opt_name, $content );
	}


	function sections() {

		$sections = array(
			/*'general_setting',	
			'page_loader',	*/
			'general_setting',
			'api_key',

			'header_setting',
			'responsive_Setting',
			'footer_setting',
			
			'blog_setting',
			'author_setting',
			'archive_setting',
			'single_setting',
			/*'category_setting',
			'search_setting',
			'tag_setting',*/
			//'single_setting',
			'404_setting',
			'templates',
			'gallery_setting',
			'services_setting',
						'comingsoon_settings',
			/*'header1_setting',
			'header2_setting',
			'header3_setting',
			'header4_setting',
			'responsive_setting',
			'header1_typography',
			'header2_typography',
			'header3_typography',
			'main_menu_typography',
			'footer_setting',
			'api_key',
			'blog_setting',
			'author_setting',
			'archive_setting',
			'category_setting',
			'search_setting',
			'tag_setting',
			'single_setting',
			'404_setting',
			
			'team_setting',
			'course_setting',
			'coaches_setting',
			'comingsoon_settings',
			'service_setting',
			'cases_setting',
			'event_setting',
			'events_general_setting',
			'products_setting',
			'sidebar_setting',
			'language_setting',
			'custom_fonts_setting',

			'profileSettting',
			'teacherSetting',
			'studentSetting',

			'typography_setting',
			'body_font_settings',
			'heading_setting',
			'custom_code_setting',			
			'custom_posts_setting',
			'posts_setting',

			'course_post_setting',
			'gallery_post_setting',
			'event_post_setting',
			'services_post_setting',
			'case_post_setting',
			'staticblock_setting'*/


			
		);


		$sections_path = array();

		// Set the path for options.
		foreach( $sections as $sec ) {
			$sections_path[$sec] = get_template_directory() . '/includes/resource/options/' . $sec . '.php';
		}

		$sections_path = apply_filters( 'foodchow_redux_sections', $sections_path );

		$count = 1;


		foreach( $sections_path as $key => $file ) {

			if ( file_exists( $file ) ) {

				$options = include( $file );

				$options['priority'] = $count;

				$options = apply_filters( "foodchow_redux_sections_{$key}", $options );

				\Redux::setSection( $this->opt_name, $options );
			}

			$count++;
		}
	}
}

