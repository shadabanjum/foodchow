<?php
namespace Foodchow\Includes\Classes;

class Ajax {

	function actions() {
		add_action( 'wp_ajax_foodchow_ajax', array( $this, 'ajax_handler' ) );
		add_action( 'wp_ajax_nopriv_foodchow_ajax', array( $this, 'ajax_handler' ) );
	}

	function ajax_handler() {

		$method = foodchow_set( $_REQUEST, 'subaction' );
		if ( method_exists( $this, $method ) ) {
			$this->$method();
		}
		exit;

	}

	/**
	 * [foodchow_login_form description]
	 *
	 */
	function foodchow_login_form() {
		check_ajax_referer( 'ajax-login-nonce', FOODCHOW_KEY );

		$info = array();

		$info['user_login'] = foodchow_set( $_POST, 'log' );

		$info['user_password'] = foodchow_set( $_POST, 'pwd' );
		$info['remember'] = foodchow_set( $_POST, 'rememberme' );

		
	    $user_signon = wp_signon($info, false);
		if ( is_wp_error( $user_signon ) ) {
			echo json_encode( array( 'loggedin' => false, 'message' => '<div class="alert alert-danger">' . esc_html__('Wrong username or password.', 'foodchow') . '</div>'));
		} else {
			echo json_encode( array( 'loggedin' => true, 'message' => '<div class="alert alert-success">' . esc_html__('Login successful, redirecting...', 'foodchow') . '</div>'));
		}
		exit;

	}

	/**
	 * New user registration through ajax.
	 *
	 * @return [type] [description]
	 */
	function foodchow_register_form() {

		check_ajax_referer( 'ajax-login-nonce', FOODCHOW_KEY );

		if ( function_exists( 'wpfoodchow_register_form' ) )

			echo wpfoodchow_register_form( $_POST );

		
	}
	/**
	 * User likes
	 * @return [type] [description]
	 */
	function foodchow_like_it() {

		$post_id = foodchow_set( $_POST, 'id' );
		$type = foodchow_set( $_POST, 'type' );
		$nonce = foodchow_set( $_POST, 'nonce' );

		$current_user = wp_get_current_user();

		if ( ! wp_verify_nonce( $nonce, FOODCHOW_NONCE ) ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}
		if ( ! $post_id ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Something wrong you can not like this', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}

		if ( ! $current_user ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Something wrong you can not like this', 'foodchow' ), 'title' => esc_html__( 'Login', 'foodchow' ) ) );
		}

		$meta       = (array) get_user_meta( $current_user->ID, 'wishlist', true );
		$post_meta  = (int) get_post_meta( $post_id, 'post_favorite_count', true );

		if ( 'unlike' === $type ) {
			foreach ( array_keys( $meta, $post_id ) as $value ) {
				unset( $meta[$value] );
			}
			$newmeta = $meta;
			if ( $post_meta > 0 ) {
				$post_meta--;
			}
		} else {
			array_push( $meta, $post_id );
			$newmeta = $meta;
			$post_meta++;
		}

		$newmeta = array_filter( $newmeta );
		$newmeta = array_unique( $newmeta );
		update_user_meta( $current_user->ID, 'wishlist', $newmeta );

		update_post_meta( $post_id, 'post_favorite_count', $post_meta );

		$message = ( $type == 'unlike' ) ? esc_html__( 'unlike', 'foodchow' ) : esc_html__( 'like', 'foodchow' );

		wp_send_json( array( 'type' => 'success', 'message' => sprintf( esc_html__( 'Successfully %s this post', 'foodchow' ), $message ), 'title' => esc_html__( 'Success', 'foodchow' ), 'count' => $post_meta ) );
	}

	/**
	 * Subscribe a student for specific coach for updates.
	 *
	 * @return [type] [description]
	 */
	function foodchow_subscribe_it() {

		$postID = foodchow_set( $_POST, 'id' );

		
		$coach_meta=get_option( "coaches_cat_".$postID );
	
		$post_id = foodchow_set( $coach_meta, 'registered_users' );

		$type = foodchow_set( $_POST, 'type' );

		$nonce = foodchow_set( $_POST, 'nonce' );

		$current_user = wp_get_current_user();

		if ( ! wp_verify_nonce( $nonce, FOODCHOW_NONCE ) ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}
		if ( ! $post_id ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'There is an errors occurred adding to subscribe.', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}

		if ( empty( $current_user->ID ) ) {
			

			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'There is an errors occurred adding to subscribe.', 'foodchow' ), 'title' => esc_html__( 'Login', 'foodchow' ) ) );
		}
		$meta   = (array) get_user_meta( $current_user->ID, 'subscribe', true );
		$coach_meta   = (array) get_user_meta( $post_id, 'subscribe', true );
		if ( 'unsubscribe' === $type ) {
			foreach ( array_keys( $meta, $post_id ) as $value ) {
				unset( $meta[$value] );
			}
			$newmeta = $meta;
			foreach ( array_keys( $coach_meta, $current_user->ID ) as $value ) {
				unset( $coach_meta[$value] );
			}
			$newcoach_meta= $coach_meta;
		}else{
			array_push( $meta, $post_id );
			array_push( $coach_meta, $current_user->ID );
			$newcoach_meta= $coach_meta;
			$newmeta = $meta;

		}

		$newmeta = array_filter( $newmeta );
		$newmeta = array_unique( $newmeta );
		update_user_meta( $current_user->ID, 'subscribe', $newmeta );
		update_user_meta( $post_id, 'subscribe', $newcoach_meta );

		$message = ( $type == 'subscribe' ) ? esc_html__( 'added to', 'foodchow' ) : esc_html__( 'removed from', 'foodchow' );

		wp_send_json( array( 'type' => $type, 'message' => sprintf( esc_html__( '%s Subscribed', 'foodchow' ), $message ), 'title' => esc_html__( 'Success', 'foodchow' ), 'count' => $post_meta ) );
	}

	/**
	 * Subscribe user for newsletter to mailchimp service.
	 *
	 * @return [type] [description]
	 */
	function foodchow_newsletter() {
		if ( ! $_POST ) {

			return;
		}

		$dn = foodchow_dot( $_POST );

		if ( ! wp_verify_nonce( $dn->get( "_wpnonce" ), FOODCHOW_NONCE ) ) {

			echo  '<div class="alert alert-danger">'.esc_html__('Unable to verify security check, try again after reloading the page', 'foodchow' ).'</div>';

			exit;

		}
		if ( ! is_email( $dn->get( 'EMAIL' ) ) ) {

			echo '<div class="alert alert-danger">'.esc_html__('Invalid email provide, please provide a valid email.', 'foodchow' ).'</div>';

			exit;

		}
		if ( ! $dn->get( 'thelist' ) ) {

			echo '<div class="alert alert-danger">'.esc_html__( 'Subscription error. Please contact administrator.', 'foodchow' ).'</div>';

			exit;

		}
		$mc_lists = foodchow_get_mc_lists();
		$list = '';
		foreach ( $mc_lists as $m_list => $m_list_val ) {

			if ( $m_list === $dn->get( 'thelist' ) ) {

				$list = $m_list;
				break;

			}

		}
		if ( ! $list ) {

			echo '<div class="alert alert-danger">'.esc_html__( 'Subscription error. Please contact administrator.', 'foodchow').'</div>';

			exit;

		}
		$res = '';

		if ( ! class_exists( 'MC4WP_Mailchimp' ) ) {

			include_once MC4WP_PLUGIN_DIR . 'includes/class-mailchimp.php';

		}

		if ( $list && $dn->get( 'EMAIL' ) && class_exists( 'MC4WP_Mailchimp' ) ) {
			$res = foodchow_mailchimp_process( $list, $dn->get( 'EMAIL' ) );
		
		}
		if ( ! $res ) {

			printf( '<div class="alert alert-danger">'.esc_html__('Subscription Error:', 'foodchow' ).' %s</div>',  $res );

			exit;

		}
		echo '<div class="alert alert-success">'.esc_html__( 'Subscription Succesful. Please check your email.', 'foodchow' ).'</div>';

		exit;

	}

	/**
	 * Twitter feed ajax callback.
	 *
	 * @return [type] [description]
	 */
	function foodchow_twitter_ajax_callback() {

		foodchow_twitter_tweets( $_POST );
		exit;
	}

	/**
	 * A tab in user profile "inbox", ajax request to send users list while typing in search box.
	 *
	 * @return array Returns the users list.
	 */
	function foodchow_inbox_user_search() {

		if ( ! is_user_logged_in() ) {
			wp_send_json( ['type' => 'error', 'message' => esc_html__( 'Please login first', 'foodchow' ) ] );
		}
		if ( class_exists( 'Foodchow_Resizer' ) ) {
			$img_obj = new \Foodchow_Resizer();
		}

		$query = ( isset( $_POST['query'] ) && esc_attr( $_POST['query'] ) ) ? $_POST['query'] : '';

		$users = get_users( array( 'search' => $query ) );

		$nonce = foodchow_set( $_POST, 'nonce' );

		$output = '';

		if ( ! wp_verify_nonce( $nonce, FOODCHOW_NONCE ) ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}

		if ( $users ) {
			foreach ( $users as $user ) {
				$img = get_user_meta( $user, 'photo', true );

				$img = ( $img && class_exists( 'Foodchow_Resizer' ) ) ? wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( $img, 'full' ), 161, 159, true ) ) : '';
				$output .= '
				<li data-name="' . esc_attr( $user->user_login ) . '">
				<span>
				' . $img . '
				<i class="fa fa-check-circle"></i>
				</span>
				<div class="sender">
				<h5>' . $user->data->display_name . '</h5>
				</div>
				</li>
				';
			}
		}

		wp_send_json( ['type' => 'success', 'data' => $output ] );
	}

	/**
	 * Returns a single message detail.
	 *
	 * @return [type] [description]
	 */
	function foodchow_inbox_message_detail() {

		global $wpdb;

		if ( ! is_user_logged_in() ) {
			wp_send_json( ['type' => 'error', 'message' => esc_html__( 'Please login first', 'foodchow' ) ] );
		}

		$nonce = foodchow_set( $_POST, 'nonce' );

		$user = ( isset( $_POST['user'] ) && esc_attr( $_POST['user'] ) ) ? $_POST['user'] : '';

		$to_user = get_user_by( 'login', $user );

		

		if ( ! wp_verify_nonce( $nonce, FOODCHOW_NONCE ) ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}


		$output = '';
		if ( $to_user ) {
			$IN = implode(',', array( $to_user->ID, get_current_user_id() ) );
			$res = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}message_inbox WHERE ( to_id = %s OR to_id = %s) AND ( from_id = %s OR from_id = %s   )", $to_user->ID, get_current_user_id() , $to_user->ID, get_current_user_id()) );
		?>
		<?php
			ob_start();

			foodchow_template_load( 'templates/my-account/parts/message_box.php', compact( 'to_user', 'res' ) );

			$output = ob_get_clean();
		}

		wp_send_json( ['type' => 'success', 'data' => $output ] );
	}

	/**
	 * Inbox compose a message and save to database via ajax.
	 *
	 * @return [type] [description]
	 */
	function inbox_new_message() {

		global $wpdb;

		$table_name = $wpdb->prefix . "message_inbox";

		$nonce = foodchow_set( $_POST, 'nonce' );

		if ( ! is_user_logged_in() ) {
			wp_send_json( ['type' => 'error', 'message' => esc_html__( 'Please login first', 'foodchow' ) ] );
		}

		if ( ! wp_verify_nonce( $nonce, FOODCHOW_NONCE ) ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}

		$dn = foodchow_dot( $_POST );

		$to_user = get_user_by( 'login', $dn->get( 'user' ) );

		if ( $dn->get('msg') && $to_user ) {
			$wpdb->insert($table_name, array(
				'to_id'		=> $to_user->ID,
				'from_id'	=> get_current_user_id(),
				'message'	=> $dn->get( 'msg' ),
				'date'		=> date( 'Y-m-d h:i:s' )
			) );

			$this->foodchow_inbox_message_detail();
		} else {
			wp_send_json( ['type' => 'error', 'message' => esc_html__( 'There is something wrong, try again after reloading the page', 'foodchow' ) ] );
		}
	}

	/**
	 * Save the rating on posts.
	 *
	 * @return [type] [description]
	 */
	function foodchow_post_rating() {

		$post_id = foodchow_set( $_POST, 'id' );
		$rating = foodchow_set( $_POST, 'rating' );
		$date = date( "Y-m-d h:i:s" );
		$user_id = get_current_user_id();
		$nonce = foodchow_set( $_POST, 'nonce' );
		global $wpdb;

		if ( ! wp_verify_nonce( $nonce, FOODCHOW_NONCE ) ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}
		if ( ! $post_id ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'There is an errors occurred saving to rating', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}

		if ( ! $user_id ) {
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Please login first to add rating.', 'foodchow' ), 'title' => esc_html__( 'Login', 'foodchow' ) ) );
		}
		$table_name = $wpdb->prefix . 'foodchow_rating';

		if ( $rating ) {

			$query =  $wpdb->get_results( $wpdb->prepare ( "select * from $table_name WHERE post_id='$post_id' AND user_id='$user_id'", ARRAY_A ) );		
			if(!empty($query)){
				$query1 = "UPDATE $table_name SET rating='$rating' WHERE post_id='$post_id' AND user_id='$user_id'";	

				$wpdb->query($wpdb->prepare($query1));
				$wpdb->show_errors();

				$message = ( $rating ) ? $rating.esc_html__( 'Star rating Update', 'foodchow' ) : '';
			}
			else{
				$wpdb->insert(  $table_name, array(
					'post_id' => $post_id,
					'rating'  => $rating,
					'user_id' => $user_id,
					'date'    => $date,
				));
				$wpdb->show_errors();
				$message = ( $rating ) ? $rating.esc_html__( 'Star rating added', 'foodchow' ) : '';
			}
		}

		wp_send_json( array( 'type' => 'success', 'message' => sprintf( esc_html__( 'Successfully %s', 'foodchow' ), $message ), 'title' => esc_html__( 'Success', 'foodchow' ) ) );
	}

	/**
	 * Courses filtration ajax callback.
	 *
	 * @return [type] [description]
	 */
	function foodchow_courses_filtering_box() {
	    wp_enqueue_script( array( 'sweetalert2', 'like-script' ) );

		$cats = foodchow_set( $_POST, 'cats' );
		$tags = foodchow_set( $_POST, 'tags' );
		if ( $cats || $tags ) {

			ob_start();
			foodchow_courses_filter_query($_POST);
			$output=ob_get_contents();
			ob_clean();
			if(!empty($output)){
				wp_send_json( ['type' => 'success', 'data' => $output ] );
			}else{
				wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
			}


		}

	}



	/**
	 * Courses filtration ajax callback.
	 *
	 * @return [type] [description]
	 */
	function foodchow_filtering_box_by_courses() {
	    wp_enqueue_script( array( 'sweetalert2', 'like-script' ) );

		$tags = foodchow_set( $_POST, 'tags' );

		
		if ( $tags ) {

			ob_start();
			foodchow_courses_filter_query_by_id($_POST);
			$output=ob_get_contents();
			ob_clean();
			if(!empty($output)){
				wp_send_json( ['type' => 'success', 'data' => $output ] );
			}else{
				wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Security verification failed, try again after reloading the page', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
			}


		}

	}

	/**
	 * Coaches filteration ajax callback.
	 *
	 * @return [type] [description]
	 */
	function foodchow_coaches_filtering_box() {

		$cats = foodchow_set( $_POST, 'search' );

		$settings = $_POST;
		$term = get_terms( array('taxonomy' => 'coaches_cat', 'search' => $cats ) );
		if ( $term ) {
			ob_start();
			foodchow_coaches_filter_query( $term, $settings );
			$output = ob_get_contents();

			ob_clean();
			if ( ! empty( $output ) ){
				wp_send_json( ['type' => 'success', 'data' => $output ] );
			}

		}
		else{
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Please Enter something about coach in search box.', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}

	}


	function foodchow_coach_filtering_box() {

		$cats = foodchow_set( $_POST, 'search' );

		$settings = $_POST;

$term = get_term_by('name', $cats, 'coaches_cat');


		if ( $term ) {
			ob_start();
			foodchow_coaches_filter_query( $term, $settings );
			$output = ob_get_contents();

			ob_clean();
			if ( ! empty( $output ) ){
				wp_send_json( ['type' => 'success', 'data' => $output ] );
			}

		}
		else{
			wp_send_json( array( 'type' => 'error', 'message' => esc_html__( 'Please Enter something about coach in search box.', 'foodchow' ), 'title' => esc_html__( 'Error', 'foodchow' ) ) );
		}

	}


	/**
	 * [foodchow_login_form description]
	 *
	*/
	function foodchow_coach_email_form() {

	
		if(function_exists('wpfoodchow_email_coach')){
			echo wpfoodchow_email_coach();
		}
	}

	function foodchow_load_more_posts() {
		if (isset( $_POST['action']) && $_POST['action'] == 'foodchow_load_more_posts') {
			Common::get_instance()->foodchow_load_more_posts($_POST);
			exit;
		}
	}

	function foodchow_wishlist() {

		$data = $_POST;

		if ( foodchow_set( $data, 'del_subaction' ) == 'foodchow_wishlist_del' )
			self::foodchow_wishlist_del( $data );
		$current_user = wp_get_current_user();

		if ( is_user_logged_in() ) {

			$meta    = get_user_meta( $current_user->ID, '_sh_add_to_wishlist', true );

			$data_id = foodchow_set( $_POST, 'data_id' );

			if ( $meta && is_array( $meta ) ) {

				if ( in_array( $data_id, $meta ) ) {

					exit( json_encode( array( 'code' => 'exists', 'msg' => esc_html__( 'You have already added this product to wishlist', 'foodchow' ) ) ) );

				}

				$newmeta = array_merge( array( foodchow_set( $_POST, 'data_id' ) ), $meta );

				update_user_meta( $current_user->ID, '_sh_add_to_wishlist', $newmeta );

				exit( json_encode( array('code' => 'success', 'msg' => esc_html__( 'Successfully added to wishlist', 'foodchow' ) ) ) );

			} else {

				update_user_meta( $current_user->ID, '_sh_add_to_wishlist', array( foodchow_set( $_POST, 'data_id' ) ) );

				exit( json_encode( array( 'code' => 'success', 'msg' => esc_html__( 'Successfully added to wishlist', 'foodchow' ) ) ) );

			}

		} else

		exit( json_encode( array( 'code' => 'fail', 'msg' => esc_html__( 'Please login first to add the product to your wishlist', 'foodchow' ) ) ) );

	}

	static public function foodchow_wishlist_del( $data ) {
		$current_user = wp_get_current_user();

		if ( is_user_logged_in() ) {
			$meta    = get_user_meta( $current_user->ID, '_sh_add_to_wishlist', true );

			$data_id = foodchow_set( $_POST, 'data_id' );

			if ( $meta && is_array( $meta ) ) {

				$searched = array_search( $data_id, $meta );

				if ( isset( $meta[$searched] ) ) {

					unset( $meta[$searched] );

					update_user_meta( $current_user->ID, '_sh_add_to_wishlist', array_unique( $meta ) );

					exit( json_encode( array( 'code' => 'success', 'msg' => esc_html__( 'Product is successfully deleted from wishlist', 'foodchow' ) ) ) );

				} else

				exit( json_encode( array('code' => 'fail', 'msg' => esc_html__( 'Unable to find this product into wishlist', 'foodchow' ) ) ) );

			}else {

				update_user_meta( $current_user->ID, '_sh_add_to_wishlist', array( foodchow_set( $_POST, 'data_id' ) ) );

				exit( json_encode( array('code' => 'fail', 'msg' => esc_html__( 'Unable to retrieve your wishlist', 'foodchow' ) ) ) );

			}

		} else

		exit(json_encode( array( 'code' => 'fail', 'msg' => esc_html__( 'Please login first to add/delete product in your wishlist', 'foodchow' ) ) ) );

	}

}
