<?php
/**
 * Order Steps Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); 

$order_info = json_decode( urldecode( $order_info ) ); ?>
<?php echo  esc_attr( $bg_select ) ? '<div class="'.$bg_select.'">' : ''; ?>
<div class="block less-spacing">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <?php if( $title ) : ?>
                <div class="title2-wrapper text-center">
                    <h2 class="sudo-bottom sudo-width70 sudo-bg-yellow" itemprop="headline"><?php echo esc_html( $title );?></h2>
                </div>
            <?php endif; ?>
            <?php if( $order_info ) : ?>
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
                        <?php $counter++; endforeach;  ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php echo  esc_attr( $bg_select ) ? '</div>' : ''; ?>