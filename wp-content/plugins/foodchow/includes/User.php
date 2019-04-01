<?php

namespace WPFoodchow\Includes;

/**
 * @package WordPress
 * @subpackage WP Taxi
 * @version 1.0
 */
if( ! function_exists('add_action' ) ) {
	return;
}


class User {

	function __construct() {

		add_action( 'init', array( $this, 'add_role' ) );
	}

	function add_role() {

		$result = add_role(
		    'coach',
		    __( 'Coach / Instructor', 'foodchow' ),
		    array(
		        'read'         => true,  // true allows this capability
		        'edit_posts'   => true,
		        'delete_posts' => false, // Use false to explicitly deny
		        'upload_files' => true,
		        'edit_files' => true,
		    )
		);

		$result = add_role(
		    'student',
		    __( 'Student', 'foodchow' )
		);
	}



}