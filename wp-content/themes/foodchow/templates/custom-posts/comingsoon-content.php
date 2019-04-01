<?php
/**
 * Coming Soon Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */

?>
<div class="coming-meta">

	<h1><?php echo ( $options->get( 'comingsoon_page_title' ) ) ? wp_kses( $options->get( 'comingsoon_page_title' ), true ) : esc_html_e( 'We are Coming!', 'foodchow' ); ?></h1>

	<p><?php echo wp_kses( $options->get( 'comingsoon_page_text' ), true ); ?></p>

	<div class="count">
		<div id="countdown2" class="ClassyCountdownDemo" data-curret="<?php echo strtotime( current_time( 'Y-m-d' ) ); ?>" data-end="<?php echo esc_attr( strtotime( $options->get( 'comingsoon_date' ) ) ); ?>"></div>
	</div>

	<?php if ( $options->get( 'show_comingsoon_subscribe_form' ) ) : ?>
		<form id="comingSoon" method="post">
			<div id="messages" class="container"></div>
			<input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'submit your email', 'foodchow' ); ?>" required/>

			<input type="hidden" name="thelist" value="<?php echo esc_attr( ( $options->get( 'newsltr_mc_lists_comingsoon' ) ) ); ?>" />

			<button type="submit"><i class="fa fa-arrow-right"></i></button>

			<input type="hidden"  name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce(FOODCHOW_NONCE)); ?>" />

		</form>


	<?php endif; ?>

</div>

<?php if ( $options->get( 'show_comingsoon_subscribe_form' ) ) : ?>

	<?php

	$custom_script = 'jQuery(document).ready(function ($) {          
		$( "form#comingSoon").on( "submit", function ( e ) {                  
			e.preventDefault();
			var thisform = this,
			button = $(this).find("button[type=submit]"),
			button_txt = button.text();

			button.html( button_txt + " <i class=\'fa fa-refresh fa-spin\'></i>").attr(\'disabled\', \'disabled\');

			var fields = $(thisform).serialize();
			$.ajax({
				type: "POST",

				data: fields + "&action=foodchow_ajax&subaction=foodchow_newsletter",
				url: foodchow_data.ajaxurl,

				success : function(response) {
					$("#messages").html(response);
					$("#messages").addClass("message-alert");
					$("#messages").fadeIn();
					setTimeout(function(){ 
						$("#messages").fadeOut(100); }, 3000);

						button.text(button_txt).removeAttr(\'disabled\');
					},
					fail: function(res) {
						button.text(button_txt).removeAttr(\'disabled\');
					}
				});
				return false;          
			});            
		});';
		wp_add_inline_script( 'foodchow-js', $custom_script );

	endif;

	?>

<?php wp_enqueue_script( array( 'jquery-knob', 'jquery-downCount', 'classycountdown', 'jquery-throttle', 'silk-countdown' ) ); ?>
