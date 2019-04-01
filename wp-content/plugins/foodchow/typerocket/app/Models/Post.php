<?php
namespace App\Models;

use TypeRocket\Models\WPPost;

class Post extends WPPost
{
    protected $postType = 'post';

    /*function getFieldValue( $field ) {

    	$default = $field->getSetting('default');

    	$parent = new parent;

    	$value = $parent->getFieldValue( $field );

    	if ( $value ) {
    		return $value;
    	} else {
    		return $default;
    	}
    }*/
}
