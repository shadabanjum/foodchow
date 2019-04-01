<?php 
/**
 * [foodchow_srvrAdd description]
 *
 * @param  [type] $obj [description]
 * @return [type]      [description]
 */
/*if ( !function_exists( 'foodchow_srvrAdd' ) ) {
*/
	function foodchow_srvrAdd() {
		return $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
	/*}*/

/**
 * [foodchow_social_profiler description]
 *
 * @param  [type] $obj [description]
 * @return [type]      [description]
 */
function foodchow_social_profiler() {
	return array(
		'adn' => 'fa-adn',
		'android' => 'fa-android',
		'apple' => 'fa-apple',
		'behance' => 'fa-behance',
		'behance_square' => 'fa-behance-square',
		'bitbucket' => 'fa-bitbucket',
		'bitcoin' => 'fa-btc',
		'css3' => 'fa-css3',
		'delicious' => 'fa-delicious',
		'deviantart' => 'fa-deviantart',
		'dribbble' => 'fa-dribbble',
		'dropbox' => 'fa-dropbox',
		'drupal' => 'fa-drupal',
		'empire' => 'fa-empire',
		'facebook' => 'fa-facebook',
		'four_square' => 'fa-foursquare',
		'git_square' => 'fa-git-square',
		'github' => 'fa-github',
		'github_alt' => 'fa-github',
		'github_square' => 'fa-github-square',
		'git_tip' => 'fa-gittip',
		'google' => 'fa-google',
		'google_plus' => 'fa-google-plus',
		'google_plus_square' => 'fa-google-plus-square',
		'hacker_news' => 'fa-hacker-news',
		'html5' => 'fa-html5',
		'instagram' => 'fa-instagram',
		'joomla' => 'fa-joomla',
		'js_fiddle' => 'fa-jsfiddle',
		'linkedIn' => 'fa-linkedin',
		'linkedIn_square' => 'fa-linkedin-square',
		'linux' => 'fa-linux',
		'MaxCDN' => 'fa-maxcdn',
		'OpenID' => 'fa-openid',
		'page_lines' => 'fa-pagelines',
		'pied_piper' => 'fa-pied-piper',
		'pinterest' => 'fa-pinterest',
		'pinterest_square' => 'fa-pinterest-square',
		'QQ' => 'fa-qq',
		'rebel' => 'fa-rebel',
		'reddit' => 'fa-reddit',
		'reddit_square' => 'fa-reddit-square',
		'ren-ren' => 'fa-renren',
		'share_alt' => 'fa-share-alt',
		'share_square' => 'fa-share-alt-square',
		'skype' => 'fa-skype',
		'slack' => 'fa-slack',
		'sound_cloud' => 'fa-soundcloud',
		'spotify' => 'fa-spotify',
		'stack_exchange' => 'fa-stack-exchange',
		'stack_overflow' => 'fa-stack-overflow',
		'steam' => 'fa-steam',
		'steam_square' => 'fa-steam-square',
		'stumble_upon' => 'fa-stumbleupon',
		'stumble_upon_circle' => 'fa-stumbleupon-circle',
		'tencent_weibo' => 'fa-tencent-weibo',
		'trello' => 'fa-trello',
		'tumblr' => 'fa-tumblr',
		'tumblr_square' => 'fa-tumblr-square',
		'twitter' => 'fa-twitter',
		'twitter_square' => 'fa-twitter-square',
		'vimeo_square' => 'fa-vimeo-square',
		'vine' => 'fa-vine',
		'vK' => 'fa-vk',
		'weibo' => 'fa-weibo',
		'weixin' => 'fa-weixin',
		'windows' => 'fa-windows',
		'wordPress' => 'fa-wordpress',
		'xing' => 'fa-xing',
		'xing_square' => 'fa-xing-square',
		'yahoo' => 'fa-yahoo',
		'yelp' => 'fa-yelp',
		'youTube' => 'fa-youtube',
		'youTube_play' => 'fa-youtube-play',
		'youTube_square' => 'fa-youtube-square',
	);
}


function wpfoodchow_Icons2() {
	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before/';
	$pattern2 = '/\.(ti-(?:\w+(?:-)?)+):before/';
	$content1 = wp_remote_get(foodchow_PLUGIN_URL . 'assets/css/font-awesome.css');
	$subject = foodchow_set($content1, 'body');


	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);

	$icons = array();

	foreach ($matches as $match) {
		$new_val = ucwords(str_replace('fa-', '', $match[1]));
		$icons['fa ' . $match[1]] = ucwords(str_replace('-', ' ', $new_val));
	}


	$icons_list = array_merge($icons);
	$icons_list = array_flip($icons_list);

	return $icons_list;
}

function wpfoodchow_register_form($post_data){

	if ( is_email( foodchow_set( $post_data, 'email' ) ) ) {

		$random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
		$user_id = wp_create_user( foodchow_set( $post_data, 'username' ), $random_password, foodchow_set( $post_data, 'user_email' ) );
		if ( is_wp_error( $user_id ) && is_array( $user_id->get_error_messages() ) ) {
			foreach ( $user_id->get_error_messages() as $message ) $return_message .= '<p>' . $message . '</p>';
		} else {
			$return_message .= ( foodchow_set( $opt, 'registration_success_message' ) ) ? '<div class="alert alert-success">' . foodchow_set( $opt, 'registration_success_message' ) . '</div>' : '<div class="alert alert-success">' . esc_html__( 'Registration Successful - An email is sent', 'foodchow' ) . '</div>';

		}

		if ( ! is_wp_error( $user_id ) ) {

			wp_new_user_notification( $user_id, null, 'both' );

			$message =esc_html__( 'Email ','foodchow' ). foodchow_set( $post_data, 'email' ).'\n';
			
			$message.=esc_html__( 'Password ','foodchow' ). $random_password;

			wp_mail(foodchow_set( $post_data, 'email' ), esc_html__( 'User Cradentials', 'foodchow' ), $message,  '' );
		}
	} else {
		$return_message .= '<div class="alert alert-danger">' . esc_html__('Please enter valid email address', 'foodchow' ) . '</div>';
	}


	echo json_encode( array( 'loggedin' => false, 'message' => $return_message ) );
	die();
}


/**
 * [foodchow_rating_average description]
 *
 * @param  $post_id [post id]
 */
function foodchow_rating_average( $post_id ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'foodchow_rating';
	$result = $wpdb->get_results( "SELECT AVG(rating) FROM $table_name WHERE post_id = '$post_id'" );
	foreach ( $result as $key => $value ) {
		$rating = foodchow_set( $value, 'AVG(rating)' );
	}

	return round( $rating, 2 );
}
function foodchow_widget_output_test($block) {
	$args = array(
		'post_type'=>'static_block',
		'p' =>  $block
	);
	$query = new WP_Query($args);

	while($query->have_posts()): $query->the_post();
		the_content();
	endwhile; wp_reset_postdata();
}