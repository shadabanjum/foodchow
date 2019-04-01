<?php
/**
 * Best Services App Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<div class="block no-padding red-bg">
    <img class="bottom-clouds-mockup" src="<?php echo wp_get_attachment_url( $bg_image ); ?>" alt="<?php esc_attr('image Not Found', 'foodchow'); ?>" itemprop="image">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="app-sec">
                    <div class="row">
                        <?php if( $side_image ) : ?>
                            <div class="col-md-4 hidden-sm col-md-offset-1 col-sm-4 col-sm-offset-0 col-lg-4 col-lg-offset-1">
                                <div class="app-mockup text-right overlape-110 wow fadeInUp" data-wow-delay="0.2s"><?php echo wp_get_attachment_image( $side_image, 'full' ); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-6 col-md-offset-1 col-sm-12 col-sm-offset-0 col-lg-6 col-lg-offset-1">
                            <div class="app-info">
                                <h4 itemprop="headline"><?php echo esc_html($title); ?></h4>
                                <p itemprop="description"><?php echo wp_kses_post($text); ?></p>
                                <?php if( $icon_image1 || $icon_image2 ) : ?>
                                    <div class="app-download-btns">
                                        <?php if( $icon_image1 ) : ?>
                                            <?php echo esc_attr( $icon1_link ) ? '<a href="'.$icon1_link.'"  itemprop="url" target="_blank">': ''; ?><?php echo wp_get_attachment_image( $icon_image1, 'full' ); ?> <?php echo esc_attr( $icon1_link ) ? '</a>': ''; ?>
                                        <?php endif; ?>
                                        <?php if( $icon_image2 ) : ?>
                                            <?php echo esc_attr( $icon1_link ) ? '<a href="'.$icon2_link.'"  itemprop="url" target="_blank">': ''; ?><?php echo wp_get_attachment_image( $icon_image2, 'full' ); ?> <?php echo esc_attr( $icon2_link ) ? '</a>': ''; ?>
                                        <?php endif; ?>
                                   </div>
                               <?php endif; ?>
                           </div>
                       </div>
                   </div>
               </div><!-- App Section -->
           </div>
       </div>
   </div>
</div>
