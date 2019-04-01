<?php
/**
 * Theme config file.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['foodchow_main_header'][] 	= array( 'foodchow_main_header_area', 99 );

$config['default']['foodchow_sidebar'][] 	    = array( 'foodchow_sidebar', 99 );

$config['default']['foodchow_banner'][] 	    = array( 'foodchow_banner', 99 );


return $config;
