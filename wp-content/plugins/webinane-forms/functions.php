<?php
	/**
	 * @package WordPress
	 * @subpackage WP Taxi
	 * @version 1.0
	 */
	if( ! function_exists('add_action' ) ) {
		return;
	}


function webinaneforms_set( $array, $key, $df = '' ) {
	
	if ( is_object( $array ) ) {
		return isset( $array->{$key} ) ? $array->{$key} : $df;
	}

	if ( is_array( $array ) ) {
		return isset( $array[ $key ] ) ? $array[ $key ] : $df;
	}

	return $df;
}

