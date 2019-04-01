<?php

class rc_sweet_custom_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'rc_scm_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'rc_scm_update_custom_nav_fields'), 10, 3 );

			// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'rc_scm_add_staticBlock_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'rc_scm_update_staticBlock_fields'), 10, 3 );

					// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'rc_scm_add_custom_nav_fields_position' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'rc_scm_update_custom_nav_fields_position'), 10, 3 );

		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'rc_scm_edit_walker'), 10, 2 );

	} // end constructor
	

	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_add_custom_nav_fields( $menu_item ) {

		$menu_item->megamenuEnable = get_post_meta( $menu_item->ID, '_menu_item_megamenuEnable', true );
	    //printr($menu_item);
		return $menu_item;

	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {

	    // Check if element is properly sent
		
		if ( is_array( foodchow_set($_REQUEST ,'menu-item-megamenuEnable' ) ) ) {

			$subtitle_value = foodchow_set(foodchow_set($_REQUEST ,'menu-item-megamenuEnable' ),$menu_item_db_id);
			
			update_post_meta( $menu_item_db_id, '_menu_item_megamenuEnable', $subtitle_value );
		}

	}


	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_add_custom_nav_fields_position( $menu_item ) {

		$menu_item->megamenuPosition = get_post_meta( $menu_item->ID, '_menu_item_megamenuPosition', true );
	    //printr($menu_item);
		return $menu_item;

	}

	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_update_custom_nav_fields_position( $menu_id, $menu_item_db_id, $args ) {

	    // Check if element is properly sent
		if ( is_array( foodchow_set( $_REQUEST, 'menu-item-megamenuPosition' ) ) ) {
			$subtitle_value = foodchow_set( foodchow_set( $_REQUEST, 'menu-item-megamenuPosition' ), $menu_item_db_id );

			update_post_meta( $menu_item_db_id, '_menu_item_megamenuPosition', $subtitle_value );
		}

	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_edit_walker($walker,$menu_id) {

		return 'Walker_Nav_Menu_Edit_Custom';

	}

		/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
		function rc_scm_add_staticBlock_fields( $menu_item ) {

			$menu_item->megamenuStatus = get_post_meta( $menu_item->ID, '_menu_item_megamenuStatus', true );
			return $menu_item;

		}

	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_update_staticBlock_fields( $menu_id, $menu_item_db_id, $args ) {

	    // Check if element is properly sent
		if ( is_array( foodchow_set( $_REQUEST, 'menu-item-megamenuStatus' ) ) ) {
			$megamenuStatus_value = foodchow_set( foodchow_set( $_REQUEST, 'menu-item-megamenuStatus' ), $menu_item_db_id );

			update_post_meta( $menu_item_db_id, '_menu_item_megamenuStatus', $megamenuStatus_value );
		}


	}

}

// instantiate plugin's class
$GLOBALS['sweet_custom_menu'] = new rc_sweet_custom_menu();


include_once( 'megamenu/edit_custom_walker.php' );
//include_once( 'megamenu/custom_walker.php' );
