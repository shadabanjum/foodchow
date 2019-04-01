<?php

namespace App\Controllers;

use App\Models\Option;
use TypeRocket\Controllers\WPOptionController;
use TypeRocket\Http\Request;

class OptionController extends WPOptionController
{
    protected $modelClass = Option::class;


    function fireHook() {

    	$path = $this->reqLocalPath( new Request );
    	do_action( 'webinane_general_form_controller_{$path}' );
    }

    private function reqLocalPath( Request $request ) {

    	$host = $request->getHost();
    	$scheme = $_SERVER['REQUEST_SCHEME'];

    	$uri = $scheme . '://' . $host . $request->getUri();

    	$path = str_replace( home_url( '/' ), '', $uri );

    	return $path;
    }
}