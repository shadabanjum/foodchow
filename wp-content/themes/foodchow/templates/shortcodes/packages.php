<?php
/**
 * Consulting Packages Shortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
 foreach ($packages as $package) : ?>
                            
    <div class="<?php echo esc_attr($columns); ?> fadein">
    	<div class="fadein">
        	<div class="package" style="background: <?php echo esc_attr(foodchow_set($package, 'bg_color')); ?> none repeat scroll 0 0">
            	<div class="pkg-avatar">
                	 <?php echo wp_get_attachment_image( foodchow_set($package, 'iconimage'), 'full' );  ?>
                    <span style="background: <?php echo esc_attr(foodchow_set($package, 'bg_color2')); ?> ">
                        <?php echo esc_attr( foodchow_set($package, 'price') );  ?>
                     </span>
                </div>
                <div class="package-detail">
                	<span><i class="fa fa-check-circle"></i><?php echo esc_attr( foodchow_set($package, 'tagline') );  ?></span>
                    <h3><?php echo esc_attr( foodchow_set($package, 'title') );  ?></h3>
                    <?php $features = json_decode(urldecode(foodchow_set($package, 'add_feature'))); ?>
                    <?php if($features) : ?>
                        <ul>
                            <?php foreach ($features as $feature) : ?>
                               
                        	   <li><i class="fa fa-check"></i><?php echo esc_html( foodchow_set($feature, 'feature_pricing') );  ?></li>
                            <?php endforeach; ?>
                            
                        </ul>
                    <?php endif; ?>
                    <?php if ( foodchow_set( $package, 'button' ) ) : ?>
                        <?php foodchow_template_load( 'templates/shortcodes/pricing_button.php', compact( 'package' , 'button', 'help_link') ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
    </div>
<?php endforeach; ?>