<?php if ( $promo_enable ) : ?>
	<div class="promo-box overlap-30">
		<div class="promo-vid">
			<?php if ( $main_image ) : ?>
				<figure>

					<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
						<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( $main_image, 'full' ), 334, 377, true ) ); ?>
					<?php else : ?>
						<?php echo wp_get_attachment_image( $main_image, 'full' );  ?>
					<?php endif; ?> 
					
					<?php if ( $video_title && $v_url ) : ?>
						<a href="<?php echo esc_url( $v_url ); ?>" title="" class="html5lightbox"><i class="fa fa-play-circle"></i> <em><?php echo esc_html( $video_title ); ?></em></a>
					<?php endif; ?>

				</figure>
			<?php endif; ?>
			<?php if ( $text ) : ?>
				<div class="promo-desc">

					<p><?php echo wp_kses_post( $text ); ?></p>
				</div>
			<?php endif; ?>
		</div>
		<div class="promo-data">

			<?php echo ( $form_title ) ? '<span>' . esc_html( $form_title ) . '</span>' : ''; ?>

			<?php if ( $consultantform ) : ?>
				<?php echo do_shortcode( '[wiforms id="'.$consultantform. '"]'); ?> 
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>