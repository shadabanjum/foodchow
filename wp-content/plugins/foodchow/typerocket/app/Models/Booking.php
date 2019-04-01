<?php
namespace App\Models;

use \TypeRocket\Models\Model;

use TypeRocket\Models\WPPost;

class Booking extends WPPost
{
    protected $postType = 'booking';

    function saveBooking( $passed ) {

    	$fields['post_title'] =  $passed['name'];
    	$fields['post_status'] = 'pending';
    	$fields['post_content'] = esc_html__( 'Taxi Booking', 'foodchow' );
    	$fields['booking_data'] = $passed;
    	$post_id = $this->create( $fields )->getID();
    	return $post_id;
    }
}