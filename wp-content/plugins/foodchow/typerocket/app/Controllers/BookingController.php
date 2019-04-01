<?php
namespace App\Controllers;

use \TypeRocket\Controllers\Controller;
use App\Models\Booking;
use \TypeRocket\Http\Response;

/**
 * Booking controller class to handle the bookings.
 */
class BookingController extends Controller
{

	/**
	 * [__construct description]
	 */
	function __construct() {

		add_action( 'foodchow_plugin_booking_submitted', array( $this, 'sendEmails' ), 10, 2 );
	}

	/**
	 * [doBooking description]
	 *
	 * @return [type] [description]
	 */
	function doBooking() {

		$request = new \TypeRocket\Http\Request();

		/**
		 * Hookup like in case recaptcha
		 */
		do_action( 'foodchow_shortcode_booking_form_submit_before', $request );
		
		$options = [
		    'email' 		=> 'required|email',
		    'name'  		=> 'required|min:6',
		    'phone'  		=> 'required|numeric|min:8|max:15',
		    'state'	 		=> 'required',
		    'city'			=> 'required',
		    'address'		=> 'required',
		    'zip'			=> 'required',
		    'form_city'		=> 'required',
		    'to_city'		=> 'required',
		    'taxi_type'		=> 'required',
		    'passengers'	=> 'required',
		    'pickup_date'	=> 'required',
		    'pickup_hour'	=> 'required',
		    'pickup_minute'	=> 'required',
		    'pickup_time'	=> 'required',
		    'pickup_address'=> 'required',
		    'drop_address'	=> 'required',
		    'payment_method'=> 'required',

		];



		$validator = tr_validator($options, $request->getFields());

		$response = new Response;

		/**
		 * Validate the request
		 */
		$this->validate( $validator, $response );

		$save = ( new Booking )->saveBooking( $this->passes );

		if ( $save ) {

			/**
			 * Generate the tracking code and update in post meta.
			 * @var string
			 */
			$tracking_code = $this->tracking_code( $save, $this->passes );			

			$response->setMessage( sprintf( esc_html__( 'Booking is done, one of the representative will contact you shortly. The tracking code is %s', 'foodchow' ), $tracking_code ) );

			do_action( 'foodchow_plugin_booking_submitted', $this->passes, $save );

			return $response->exitJson(200);
		}

	}

	/**
	 * [validate description]
	 *
	 * @param  [type] $validator [description]
	 * @param  [type] $response  [description]
	 * @return [type]            [description]
	 */
	function validate( $validator, $response ) {

		if ( ! isset( $_POST['tr']['confirm'] ) ) {
			$validator->errors['confirm'] = esc_html__( 'You need to agree to process, please tick the checkbox', 'foodchow' );
		}

		$this->errors = $validator->getErrors();
		$this->passes = $validator->getPasses();

		if($validator->getErrors() ) {
			
			$response->setErrors( $this->errors );
		    $validator->flashErrors( $response );
		    return $response->exitJson(200);
		}

	}

	/**
	 * [tracking_code description]
	 *
	 * @param  [type] $post_id [description]
	 * @param  [type] $passes  [description]
	 * @return [type]          [description]
	 */
	function tracking_code( $post_id, $passes ) {

		$this->tracking_code = md5( $passes['email'] . $post_id );

		$this->passes['tracking_code'] = $this->tracking_code;
		$this->passes['post_id'] = $post_id;

		update_post_meta( $post_id, 'foodchow_booking_tracking_code', $this->tracking_code );

		return $this->tracking_code;
	}

	/**
	 * [sendEmails description]
	 *
	 * @param  [type] $passes  [description]
	 * @param  [type] $post_id [description]
	 * @return [type]          [description]
	 */
	function sendEmails( $passes, $post_id ) {

		$passes = $this->setPasses( $passes, $post_id );

		$customer_template = foodchow_WSH()->option('booking_email_customer');
		$admin_template = foodchow_WSH()->option('booking_email_admin');

		$customer_email = isset( $passes['email'] ) ? $passes['email'] : '';
		$admin_email = apply_filters( 'foodchow_admin_eail', get_bloginfo( 'admin_email' ) );

		$tagged = $this->setTags( $passes );
		$replace = str_replace( array_keys( $tagged ), array_values( $tagged ), $customer_template );
		$headers = sprintf( 'From: %s <%s>', get_bloginfo('name'), $admin_email );

		if ( sanitize_email( $customer_email ) ) {
			
			$subject = sprintf( esc_html__( 'Booking Acknowledgement - %s', 'foodchow' ), get_bloginfo('name') );
			wp_mail( $customer_email, $subject, $replace, $headers );
		}

		$subject = sprintf( esc_html__( 'Booking Recieved - %s', 'foodchow' ), get_bloginfo('name') );
		$replace = str_replace( array_keys( $tagged ), array_values( $tagged ), $admin_template );

		wp_mail( $admin_email, $subject, $replace, $headers );
	}

	/**
	 * [setPasses description]
	 *
	 * @param [type] $passes [description]
	 */
	function setPasses( $passes ) {

		$passes['booking_link'] = get_edit_post_link( $passes['post_id'], false );

		$passes['booking_id'] = $passes['post_id'];

		$passes = apply_filters( 'foodchow_plugin_shortcode_booking_set_passes', $passes );

		return $passes;
	}

	function setTags( $passes ) {

		$passes = array_combine(
		    array_map( create_function('$k', 'return "{{".$k."}}";'), array_keys( $passes ) ),
		    $passes
		);

		return $passes;
	}
}