<?php
/**
 * Page Loader File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

 ?>
 <?php 
	global $wp_query;
	$page_id = $wp_query->is_posts_page ? $wp_query->queried_object->ID : get_the_ID();
	$mod_news_letter = $options->get( 'newsletter_mode' );
	wp_enqueue_script( array( 'cookie' ) );
	$meta  = get_post_meta( $page_id, 'layout_settings', true );
?>
<?php if ( ( $mod_news_letter === 'all_pages' ) || ( $mod_news_letter === 'h_selected_pages' && is_front_page() ) || ( $mod_news_letter === 'selected_pages' && foodchow_set( $meta, 'enable_popup' ) ) ): ?>
	
 <?php if ( $options->get( 'loader_style' ) =='style2' ) : ?>

<section class="user-controle">
	<div class="popup-wraper">
		<div class="popup question top-strip">
			<a class="close-btn-popup" href="#"><i class="fa fa-close"></i></a>
			<div class="question-popup">
				<h4><?php echo esc_html( $options->get( 'faq_title' ) ); ?></h4>
				<span><?php echo wp_kses( $options->get( 'faq_text' ), true ); ?></span>
				<?php echo do_shortcode( '[wiforms id="' . $options->get( 'form_list' ) . '"]' ); ?>    
			</div>
		</div>
	</div>
</section><!-- subscribe popup -->

<?php else : ?>
	<?php $subscribe_bg = $options->get( 'subscribe_bg' ); ?>
	<section class="user-controle">
		<div class="popup-wraper">
			<div class="popup">
				<a class="close-btn-popup" href="#"><i class="fa fa-close"></i></a>
				<div class="popup-bg" style="background-image:url('<?php echo esc_url( foodchow_set( $subscribe_bg, 'background-image' ) ); ?>');"></div>
				<div class="subscribe-popup">
					<h4><?php echo esc_html( $options->get( 'subscribe_title' ) ); ?></h4>
					<span><?php echo wp_kses( $options->get( 'subscribe_text' ), true ); ?></span>
					<form id="news-ltr-loader" method="post">
						<div class="form-message-loader"></div>
						<input type="email" name="EMAIL" placeholder="<?php esc_html_e( 'Enter Your Email Address.....', 'foodchow' ); ?>" required/>
						<input type="hidden" name="thelist" value="<?php echo esc_attr( ( $options->get( 'newsltr_mc_lists' ) ) ); ?>" />
						<button class="button" type="submit"><?php echo esc_attr( $options->get( 'subscribe_btn_label' ) ) ? esc_html( $options->get( 'subscribe_btn_label' ) ) : esc_html_e( 'Subscribe', 'foodchow' ); ?></button>
						<input type="hidden"  name="_wpnonce" value="<?php echo esc_attr(wp_create_nonce(FOODCHOW_NONCE)); ?>" />
					</form>

				</div>
			</div>
		</div>
	</section><!-- subscribe popup -->
<?php endif; ?>
<?php if ( $options->get( 'loader_style' ) =='style1' ) : ?>
<?php 
	wp_enqueue_script( 'owl-carousel' );
	$custom_script = 'jQuery(document).ready(function ($) {          
 		$( "#news-ltr-loader").on( "submit", function ( e ) {                  
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
 					$(".form-message-loader").html(response);
 					$(".form-message-loader").addClass("message-alert");
 					$(".form-message-loader").fadeIn();
 					setTimeout(function(){ 
 						$(".form-message-loader").fadeOut(100); }, 3000);

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
 endif; ?>
 <?php 
	if ( $options->get( 'popup_display_time' ) ) :

		$custom_script2 = "jQuery(document).ready(function($){
			if ( $.cookie( 'noShowNewsletter' ) )
			{
				$( 'section.user-controle' ).hide();
			}
			else {
				$.cookie( 'noShowNewsletter', true );    

			}
		});";

		else :
			$custom_script2 = "jQuery(document).ready(function($){
				if ( $.cookie( 'noShowNewsletter' ) )
					$('section.user-controle').show();
				else {
					$.cookie( 'noShowNewsletter', false );    


				} });";

			endif;
			wp_add_inline_script( 'foodchow-js', $custom_script2 );

endif;
		?>
