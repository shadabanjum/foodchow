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


<div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
	<h4 class="widget-title"><?php echo wp_kses( $title, true ); ?></h4>
	<p>
		<?php echo esc_html($text); ?>
	</p>
	<?php if ( $contact_desc ) : ?>
		<?php foodchow_template_load( 'templates/shortcodes/contact_info.php', compact( 'contact_desc') ); ?>
	<?php endif; ?>
</div>

