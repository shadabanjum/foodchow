<?php 
if ( class_exists( 'Foodchow_Resizer' ) ) {
    $img_obj = new Foodchow_Resizer();
} 
//wpfoodchow_email_coach_script();


 foreach ( $term as $s_term ) : $term_id = $s_term->term_id; ?>
	<?php 
	$coach_meta=get_option( "coaches_cat_".$term_id );
	$registered_user = foodchow_set( $coach_meta, 'registered_users');

	$img = get_user_meta( $registered_user, 'photo', true );
	$current_user = get_userdata($registered_user); ?>

	<li>

		<div class="coach-avatar">
			<?php if ( $registered_user ) : ?>

				<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
					<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( $img, 'full' ), 135, 135, true ) ); ?>
				<?php else : ?>
					<?php echo wp_get_attachment_image( $img, 'full' ); ?>
				<?php endif; ?> 

			<?php endif; ?>

		</div>
		<div class="about-coach">
			<?php if ( foodchow_set( $settings, 'rating' )  ) : ?>
				<?php echo wp_kses_post( foodchow_rating_average_stars( $term_id ) ); ?>

				
			<?php endif; ?>
			<?php $date = $current_user->user_registered; ?>
			<h4><?php echo esc_html( foodchow_set( $s_term, 'name' ) ); ?></h4>
			<?php if ( foodchow_set( $settings, 'email' ) == 'true' ) : ?>
				<span><a href="mailto:<?php echo esc_url( $current_user->user_email ); ?>"><?php echo esc_html( $current_user->user_email ); ?></a></span>
			<?php endif; ?>
			<ul class="membership">
				<?php if ( foodchow_set( $settings, 'courses' ) == 'true' ) : ?>
					<li><?php esc_html_e( ' Published Courses : ', 'foodchow' ); ?> <span><?php echo count_user_posts( $current_user->id , 'course' ); esc_html_e( ' Cources', 'foodchow' ); ?></span></li>
				<?php endif; ?>
				<?php if ( foodchow_set( $settings, 'membership' ) == 'true' ) : ?>
					<li><?php esc_html_e( 'Membership : ', 'foodchow' ); ?> <span><?php  echo wp_kses_post( human_time_diff( strtotime( $date), current_time( 'timestamp') ) ); esc_html_e( ' ago', 'foodchow' ); ?></span></li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="send-query">
			<?php if ( foodchow_set( $settings, 'email' ) == 'true' ) : ?>
				<a href="#" class="send_coach_mail" data-coach-email="<?php echo esc_html( $current_user->user_email ); ?>"><?php esc_html_e( 'send message', 'foodchow' ); ?></a>
			<?php endif; ?>
			<?php if ( foodchow_set( $settings, 'detail' ) == 'true' ) : ?>
				<a href="<?php echo esc_url( get_term_link( $term_id ) ); ?>"><?php esc_html_e( 'more detail', 'foodchow' ); ?></a>
			<?php endif; ?>
		</div>
	</li>
<?php endforeach; ?>
<?php wp_enqueue_script( array( 'sweetalert2', 'subscribe-script', 'like-script' ) ); ?>
<section>
	
	<div class="popup-wraper-coach">
		<div class="popup question top-strip">
			<a class="close-btn-popup" href="#"><i class="fa fa-close"></i></a>
			<div class="question-popup">
				<form method="post" id="coachfom2" data-action="<?php echo admin_url( 'admin-ajax.php' ) . '?action=foodchow_ajax&subaction=foodchow_coach_email_form'; ?>" >
					<div class="message-box" style="float:left;width:100%;"></div>
					
					<div class="col-sm-12">
						<input type="text" class="name" name="name" placeholder="<?php esc_html_e( 'Your Name', 'foodchow' ); ?>">
					</div>
					<div class="col-sm-12">
						<input type="text" class="emailUser" name="emailUser" placeholder="<?php esc_html_e( 'Your Email Address', 'foodchow' ); ?>">
					</div>
					<div class="col-sm-12">
						<input type="text" class="subject" name="subject" placeholder="<?php esc_html_e( 'Subject', 'foodchow' ); ?>">
					</div>
					<div class="col-sm-12">
						<textarea class="msg_cach" name="msg_cach" placeholder="<?php esc_html_e( 'Write Your Message..', 'foodchow' ); ?>"></textarea>
					</div>
					<button id="submit-coach-form"><?php esc_html_e( 'Send Message' , 'foodchow' ); ?></button>
					<?php wp_nonce_field( 'ajax-login-nonce', FOODCHOW_KEY ); ?>
				</form> 
			</div>
		</div>
	</div>
</section><!-- subscribe popup -->
<script type="text/javascript">

	jQuery('#submit-coach-form').on('click', function(e){
	
	var emails = jQuery(this).siblings('.hiddenemail').val();

	var emailUser = jQuery( ".emailUser" ).attr('value');

	var subject = jQuery( ".subject" ).attr('value');

	var name = jQuery( ".name" ).attr('value');
	var msg_cach = jQuery( ".msg_cach" ).val();

	
	var button = jQuery(this).find('button');
	
	var data = { action : 'foodchow_ajax', subaction: 'foodchow_coach_email_form',emailUser:emailUser, emails: emails, subject: subject, name:name, msg_cach:msg_cach};

	swal.showLoading();
	jQuery.ajax({
		url: foodchow_data.ajaxurl,
		type: 'POST',
		data: data,
		dataType: 'json',
		success: function( data ) {
			jQuery(button).prop('disable', false);
			jQuery("form#coachfom .message-box").removeClass("alert alert-info");
			jQuery('form#coachfom .message-box').html(data.message);
			sweetAlert(data.message);
		},
		complete: function( res ) {
            //sweetAlert('Error', 'Something wrong adding to wishlist', 'error');
        }
    });

	return false;

});

</script>