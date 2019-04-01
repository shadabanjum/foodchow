<?php
/**
 * Simple Banner Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); 


?>
<?php echo  esc_attr( $bg_select ) ? '<div class="'.$bg_select.'">' : ''; ?>
	<div class="about-feat text-center wow fadeIn" data-wow-delay="0.2s">
		<h2 class="title3" itemprop="headline"><?php echo wp_kses_post( $title ); ?></h2>
		<?php echo wp_get_attachment_image( $banner_image, 'full' ); ?>
	</div>
<?php echo  esc_attr( $bg_select ) ? '</div>' : ''; ?>