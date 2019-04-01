<?php
/*
|--------------------------------------------------------------------------
| TypeRocket Routes
|--------------------------------------------------------------------------
|
| Manage your web routes here.
|
*/

$protocol = is_ssl() ? 'https://' : 'http://';
$base = str_replace( $protocol.$_SERVER['SERVER_NAME'], '', home_url( '/' ) );

//tr_route()->put( $base . 'wiforms/process', 'fireHook@Option' );
