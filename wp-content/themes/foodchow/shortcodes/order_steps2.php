<?php
/**
 * Order Steps 2 Shortcode
 *
 * @package WordPress
 * @subpackage FoodChow
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>

<?php $order_info = json_decode( urldecode( $order_info ) ); ?>
<div class="block blackish low-opacity">
    <div class="fixed-bg" style="background-image: url('<?php echo wp_get_attachment_url( $banner_image ); ?>');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <?php if( $tagline || $title ) : ?>
                    <div class="title1-wrapper text-center">
                        <div class="title1-inner">
                            <span><?php echo esc_html( $tagline ); ?></span>
                            <h2 class="text-white" itemprop="headline"><?php echo esc_html( $title ); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="remove-ext text-center">
                    <div class="row">
                        <?php $counter = 1; foreach( $order_info as $order ) : ?>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="step-box wow fadeIn" data-wow-delay="0.2s">
                                    <i><?php echo wp_get_attachment_image( foodchow_set( $order, 'order_image' ), 'full' ); ?> <span class="brd-rd50 red-bg"><?php echo esc_attr( $counter ); ?></span></i>
                                    <div class="setp-box-inner">
                                        <h4 itemprop="headline"><?php echo foodchow_set( $order, 'step_title' ); ?></h4>
                                        <p itemprop="description"><?php echo foodchow_set( $order, 'step_text' ); ?></p>
                                    </div>
                                </div><!-- Step Box -->
                            </div>
                        <?php $counter++;  endforeach; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>