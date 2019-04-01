<?php

namespace WebinaneForms\Classes;

use \TypeRocket\Http\Request;
use \TypeRocket\Http\Response;

/**
 * The class to process the form builder posted 
 * data and send email if success.
 *
 * @package WordPress
 * @subpackage Form Builder
 * @author Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */

if ( ! function_exists( 'add_action' ) ) {
	exit( 'Restricted' );
}

class Process {

	/**
	 * [process description]
	 *
	 * @return [type] [description]
	 */
	var $meta = array();
	
	function process() {


		$request = new Request();

		$form_id = $request->getDataPost('form_id');
		
		do_action( 'lifecoach_shortcode_form_builder_submit_before', $request );

		$this->getForm( $form_id );

		$this->validateFields();

	}


	/**
	 * [showFlash description]
	 *
	 * @param  [type] $response [description]
	 * @return [type]           [description]
	 */
	function showFlash( $response ) {

		if( is_admin() ) {
			return;
		}

		$errors = $response->getErrors();

		if ( $errors ) {

			$this->validator->errors = $errors;
			$this->validator->flashErrors( $response );

		}

		return $response->exitJson(200);
	}

	/**
	 * Get the form post data from the form id posted in $_POST;
	 *
	 * @param  int $id The form id to get post for.
	 * @return void    This method returns nothing.
	 */
	function getForm( $id ) {

		$id = esc_attr( $id );

		$post = new \WP_Query( array( 'post_type' => 'forms', 'post__in' => array( $id ), 'posts_per_page' => 1 ) );

		if ( $post->have_posts() ) {

			// Get the meta from hooked value so we don't write duplicate code.
			$this->meta = apply_filters( 'wiforms_post_meta', $id, WIFORM_META_KEY, array() );
			$this->form_post = $post->post;

		} else {
			$response = new Response();

			$response->setError( 'error', esc_html__( 'Invalid form ID', 'webinane-forms' ) );

			$this->showFlash( $response );
		}
	}

	/**
	 * Prepare the fields for validation and form posted data.
	 * 
	 * @return void This method returns nothig
	 */
	function validateFields() {

		$dn = new DotNotation( $this->meta );
		
		$request = ( new Request );

		$posted_data = $request->getDataPost('tr');

		$validation_fields = array();
		
		$posted_fields = array();


		if ( $fields = json_decode( $dn->get( 'form_builder_data' ), true ) ) {

			foreach ( $fields as $field ) {


				
				// Set the dotnotation for easy use.
				$fdn = new DotNotation( $field );

				// Prepare the proper field name as per typerocket.
				$fname = str_replace( '-', '_', sanitize_title( $fdn->get('name') ) );



				// check if validation is enabled.
				if ( $field_validation = $fdn->get('required') ) {
					
					$field_validation = 'required';

					$field_validation = explode(" ", $field_validation);

					

					$validation_fields[ $fname ]  	= implode('|', $field_validation );
				}

				// Store the posted data in a variable so so don't need to manipulate it again.
				$posted_fields[$fname]  	= isset( $posted_data[ $fname ] ) ? $posted_data[ $fname ] : '';

			}

			// Run the form validator and Assign the validator to class property so easy access everywhere.
			$this->validator = tr_validator( $validation_fields, $request->getFields() );


			$this->validate( $this->validator, new Response );

			// Finally call for email method to send email.
			$this->email( $posted_fields );
		}
	}

	/**
	 * Runs the validation and if there are errors to flash them.
	 *
	 * @param  object $validator Typerocket Validator instance.
	 * @param  object $response  Typerocket Response instance.
	 * @return string            Returns the json encoded string or null.
	 */
	function validate( $validator, $response ) {

		$this->errors = $validator->getErrors();
		$this->passes = $validator->getPasses();

		if($validator->getErrors() ) {
			
			$response->setErrors( $this->errors );
			$validator->flashErrors( $response );
			return $response->exitJson(200);
		}

	}

	/**
	 * Finally send the email using a pre-defined email template or provided from user.
	 *
	 * @param  array $posted_data The we have prepared an array.
	 * @return string             Returns the json encoded string for response.
	 */
	function email( $posted_data ) {

		$response = new Response;

		$dn = new DotNotation( $this->meta );

		$message = '';

		$template = $this->getEmailTemplate();

		preg_match_all('/\{\{loop_start\}\}(.*?)\{\{loop_end\}\}/s', $template, $matches );
	
		foreach( $posted_data as $placeholder => $value ) {

			$placeholder = ($placeholder=='submit')? '' : str_replace(array('_','-'),' ', $placeholder);

			/*$message .= str_replace( array( '{{loop_start}}', '{{field_label}}', '{{field_value}}','{{loop_end}}','Regards,' ), array( '', $placeholder, $value, '','' ), $template );*/

			$message .= '<strong>'. $placeholder .'</strong> ' . $value .'<br/>';
		}

		$output_template = str_replace( array( '{{loop_start}}', '{{field_label}}', '{{field_value}}','{{loop_end}}','<strong>','</strong>',':' ), array( '', '', '', '','','','' ), $template );
		
		$message .= $output_template;

		$template = str_replace( array('{{loop_start}}', '{{loop_end}}'), $message, $template );		

		$headers[] = 'Content-Type: text/html; charset=UTF-8';
		//$headers[] = 'From: Me Myself <me@example.net>';
		$to = sanitize_email( $dn->get('reciever_email') );

		$subject = $dn->get('subject');

		if ( $to ) {
			$result = wp_mail( $to, $subject, $message, $headers );

			if ( ! $result ) {
				$response->setError( 'error', esc_html__( 'Failed sending email, Please check back later', 'webinane-forms' ) );
			} else {
				$success_message = esc_html__( 'Email sent successfully', 'webinane-forms' );
				$success_message = ( $this->meta['success_message'] ) ? $this->meta['success_message'] : $success_message;
				$response->setMessage( $success_message );
			}
		} else {
			$response->setError( 'error', esc_html__( 'Failed sending email, Please check back later', 'webinane-forms' ) );
		}

		$this->showFlash( $response );
		$response->exitJson(200);
	}

	function getEmailTemplate() {

		$dn = new DotNotation( $this->meta );

		$email_template = $dn->get('email_templates');

		$email_template = ( $email_template ) ? $email_template : $this->loadEmailTemplate();

		return $email_template;
	}

	function loadEmailTemplate() {

		global $wp_filesystem;

		$sample = '';

		require_once ABSPATH . 'wp-admin/includes/file.php';
		$creds = request_filesystem_credentials(site_url() . '/', '', false, false, array());

		/* initialize the API */
		if ( ! \WP_Filesystem($creds) ) {
			/* any problems and we exit */
			//return false;
		}

		if ( is_object( $wp_filesystem ) ) {

			$sample = $wp_filesystem->get_contents( WIFORMS_PLUGIN_PATH . 'templates/email.php' );
		}

		return $sample;
	}
}