<?php

class Ajax {

	function actions() {
		add_action( 'wp_ajax_lifecoach_ajax', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv_lifecoach_ajax', array( $this, 'ajax_handler' ) );
	}

	function ajax_handler() {

		$method = lifecoach_set( $_REQUEST, 'subaction' );
		if ( method_exists( $this, $method ) ) {
			$this->$method();
		}
		exit;

	}

	 /**
	 * [lifecoach_login_form description]
	 *
	 * @param  [type] $obj [description]
	 * @return [type]      [description]
	 */

    function lifecoach_form_builder() {
        if (!count($_POST))
            return;
        echo Lifecoach_Forms::get_instance()->post();
    }


     
}
