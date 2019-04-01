<?php
namespace WPFoodchow\Includes;

/**
 * 	Post formats
 */
class Formats {

	function init() {
		global $pagenow;

		if ( ! is_admin() ) {
			return;
		}

		$hooks = array( 'post.php', 'post-new.php' );
		if ( ! in_array( $pagenow, $hooks )  ) {
			return;
		}


		$box = tr_meta_box( esc_html__( 'Video', 'foodchow' ) )->setId('foodchow_format_video');
		//$box->setMainForm( array( $this, 'postLayout' ) );
		$box->addScreen(['post'])->setCallback( array( $this, 'formatVideo' ) );

		$box = tr_meta_box( esc_html__( 'Audio', 'foodchow' ) )->setId('foodchow_format_audio');

		$box->addScreen(['post'])->setCallback( array( $this, 'formatAudio' ) );

		$box = tr_meta_box( esc_html__( 'Gallery', 'foodchow' ) )->setId('foodchow_format_gallery');

		$box->addScreen(['post'])->setCallback( array( $this, 'formatGallery' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ) );
	}

	function formatVideo() {

		global $post_type;

		
		if( $post_type !== 'post' ) {
			return;
		}


	
		$form = tr_form();

		echo $form->text(esc_html__('Video URL', 'foodchow'))->setHelp(esc_html__('Enter youtube, vimeo or dailymotion video URL that you want to show.', 'foodchow'));
		
	}

	function formatAudio() {

		global $post_type;

		
		if( $post_type !== 'post' ) {
			return;
		}


		$options = [
		     'Audio Type' => [
					esc_html__('SoundCloud', 'foodchow')    => 'soundcloud',
				    esc_html__('Own Audio',  'foodchow')    => 'ownaudio',
				    
				]
		];
			$form = tr_form();
			
		echo $form->select(esc_html__('Audio Type', 'foodchow'))->setOptions($options)->setHelp( esc_html__('Select audio type which you want to show.', 'foodchow'));



		echo $form->text(esc_html__('SoundCloud ID', 'foodchow' ) )->setName('soundcloud_track')->setHelp( esc_html__('Enter soundcloud ID that you want to show.', 'foodchow') );

		echo $form->text(esc_html__('Own Audio', 'foodchow'))->setHelp( esc_html__('Enter own audio URL that you want to show.', 'foodchow') );


		
	}


	function formatGallery() {

		global $post_type;

		
		if( $post_type !== 'post' ) {
			return;
		}


	
		$form = tr_form();

		echo $form->gallery(esc_html__('Gallery', 'foodchow'))->setName( 'gallery' )->setHelp(esc_html__('Upload Gallery Images.', 'foodchow' ));
		
	}

	function admin_enqueue() {

		global $post_type;


		if ( post_type_supports( $post_type, 'post-formats' ) && current_theme_supports( 'post-formats' ) ) {
			wp_enqueue_script( 'wst-post-formats-ui', foodchow_PLUGIN_URL . 'assets/js/format-metaboxes/format_script.js');
			wp_enqueue_script( 'wst-post-formats-select', foodchow_PLUGIN_URL . 'assets/js/select2.min.js');
			wp_enqueue_style( 'wst-post-formats-ui2', foodchow_PLUGIN_URL . 'assets/css/format-metaboxes/post_format.css' );
			wp_enqueue_style( 'wst-gallery-formats-ui', foodchow_PLUGIN_URL . 'assets/css/format-metaboxes/gallery.css');

			
		}
	}

	
}