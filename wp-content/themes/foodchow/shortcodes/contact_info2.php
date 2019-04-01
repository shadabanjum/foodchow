<?php
/**
 * Contact Information Shortcode
 *
 * @package WordPress
 * @subpackage Esperto
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php $contact_desc = json_decode(urldecode($contact_desc));?>
<?php if( $contact_desc ) : ?>
	<?php echo  esc_attr( $bg_select ) ? '<div class="'.$bg_select.'">' : ''; ?>
		<div class="contact-info-sec text-center">
			<div class="row">
				<?php foreach( $contact_desc as $contact ) : ?>
					<div class="col-md-4 col-sm-4 col-lg-4">
						<div class="contact-info-box">
							<i class="fa <?php echo esc_attr(foodchow_set($contact, 'contact_icon')); ?>"></i>
							<h5 itemprop="headline"><?php echo wp_kses_post(foodchow_set($contact, 'contact_title')); ?></h5>
							<?php echo wp_kses_post(foodchow_set($contact, 'description')); ?>
						</div>
					</div>

				<?php endforeach; ?>
			</div>
		</div>
	<?php echo  esc_attr( $bg_select ) ? '</div>' : ''; ?>
<?php endif; ?>


