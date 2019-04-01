<?php

namespace Foodchow\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Hooks {


	function __construct() {

		add_action( 'foodchow_main_header', array( $this, 'header' ) );
	}

	/**
	 * Hook up main headers with different header styles
	 *
	 * @return void This function returns nothing.
	 */
	function header() {

		
	    
	}


}

