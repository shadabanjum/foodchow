<?php
/**
 * About Us Shortcode
 *
 * @package WordPress
 * @subpackage Esperto
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>

<?php $contact_desc = json_decode( urldecode( $contact_icons ) ); ?>

 <div class="widget about_widget wow fadeIn" data-wow-delay="0.1s">

		<?php if ( $logo_image ) : ?>
			<div class="logos">
				<a href="<?php echo esc_url( home_url('/') ); ?>" ><h1><?php echo wp_get_attachment_image( $logo_image, 'full' );  ?></h1></a>
			</div>
		<?php endif; ?>
		

		<p><?php echo wp_kses( $text , true ); ?></p>


		<div class="social2">
			<?php foreach ( $contact_desc as $contact ) : ?>
				<a class="brd-rd50" href="<?php echo esc_url( foodchow_set( $contact, 'social_icon_link' ) ); ?>" itemprop="url" target="_blank"><i class="<?php echo esc_attr( foodchow_set( $contact, 'social_icon' ) ); ?>"></i></a>
			<?php endforeach; ?>

		</div>



	</div>
