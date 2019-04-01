<?php
	/**
	 * Mailchimp Shortcode
	 *
	 * @package WordPress
	 * @subpackage Foodchow
	 * @author Webinane
	 * @version 1.0
	 */
	?>

	<div class="subscriber">
		<div class="form-message-service"></div>
		<form method="post" class="news-ltr">

			<input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Subcribe email', 'foodchow' ); ?>" required>

			<input type="hidden" name="thelist" value="<?php echo esc_attr( ( $newsltr_mc_lists2 ) ); ?>" />

			<button type="submit"><?php esc_html_e( 'send', 'foodchow' ); ?></button>

			<input type="hidden"  name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce(FOODCHOW_NONCE)); ?>" />

		</form>

	</div>


	<?php
	$custom_script = 'jQuery(document).ready(function ($) {          
		$( "form.news-ltr").on( "submit", function ( e ) {                  
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
					$(".form-message-service").html(response);
					$(".form-message-service").addClass("message-alert");
					$(".form-message-service").fadeIn();
					setTimeout(function(){ 
						$(".form-message-service").fadeOut(100); }, 3000);

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
		?>
