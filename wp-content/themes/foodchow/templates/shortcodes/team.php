<?php
/**
 * Team Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
?>
<?php while($query->have_posts()) : $query->the_post();  ?>

    <?php $meta = get_post_meta( get_the_ID(), 'team_settings' , true); ?> 

     <div class="<?php echo esc_attr($columns); ?> col-sm-6">
        <div class="ourteam fadein">
            <div class="team-avatar">
                <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
                    <?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 370, 370, true ) ); ?>
                <?php else : ?>
                    <?php the_post_thumbnail( 'full' ); ?>
                <?php endif; ?>
                <div class="team-info">
                    <h4>
                        <a href="<?php echo the_permalink(); ?>">
                            <?php echo the_title(); ?>
                        </a>
                    </h4>
                    <?php if ( $enable_subtitle && foodchow_set( $meta, 'designation' ) ) : ?>

                            <span><?php echo esc_html( foodchow_set( $meta, 'designation' ) ); ?></span>

                    <?php endif; ?>
                </div>
            </div>
            <?php 
                $social_icons = foodchow_set( $meta, 'social' );
            if ( $enable_social && $social_icons ) : 
               
            ?>
                <ul class="team-social">
                    
                    <?php foreach  ( $social_icons as $key => $value) : ?> 
                        <li>
                            <a href="<?php echo esc_url(foodchow_set($value, 'profile_url')); ?>" style="color:<?php echo esc_attr(foodchow_set($value, 'icon_color')); ?>; background-color:<?php echo esc_attr(foodchow_set($value, 'icon_bg')); ?>">
                                <i class="<?php echo esc_attr(foodchow_set($value, 'icons')); ?>">
                                    
                                </i>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    
                </ul>
             <?php endif; ?>
        </div>
    </div>
<?php endwhile; wp_reset_postdata(); ?>