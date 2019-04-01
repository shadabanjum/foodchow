<?php
/**
 * Contact Form Shortcode
 *
 * @package WordPress
 * @subpackage Esperto
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php echo  esc_attr( $bg_select ) ? '<div class="'.$bg_select.'">' : ''; ?>
	<div class="contact-form-wrapper text-center">
		<div class="contact-form-inner">
			<div class="row">
				<h3 itemprop="headline"><?php echo wp_kses_post( $title ); ?></h3>
				<div id="contactform">
					<?php if ( $form_type == 'contact_form_type' ) : ?>

						<?php echo do_shortcode('[contact-form-7 id="'.$form7.'"]'); ?> 

					<?php else : ?>

						<?php echo do_shortcode( '[wiforms id="'.$contactform . '"]' ); ?>

					<?php endif; ?>
				</div><!-- contact form -->

			</div>
		</div>
	</div>
<?php echo  esc_attr( $bg_select ) ? '</div>' : ''; ?>