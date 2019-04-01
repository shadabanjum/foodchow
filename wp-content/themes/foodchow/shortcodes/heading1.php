<?php
/**
 * Heading Style 1 Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>

<div class="col-md-12">
	<div class="title1-wrapper text-center">
		<div class="title1-inner">
			<span><?php echo wp_kses_post($tagline); ?></span>
			<h2 itemprop="headline"><?php echo wp_kses_post($title); ?></h2>
		</div>
	</div>
</div> 
