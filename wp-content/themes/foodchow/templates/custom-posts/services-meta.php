<?php
    /**
     * SIngle Services Template
     *
     * @package Foodchow
     * @author  Webiane
     * @version 1.0
     */
?>
<?php $meta = get_post_meta( get_the_ID(), 'servsettings' , true); ?>
                            
<div class="services-single-page">
    
    <div class="single-meta">
        
        <div class="single-avatar">
            
            <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
               <?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), $width, $height, true ) ); ?>
            <?php else : ?>
                <?php the_post_thumbnail( 'full' ); ?>
            <?php endif; ?>
            
            <?php if( $options->get( 'single_show_service_features' ) ) : ?>

                <?php foodchow_template_load( 'templates/custom-posts/single-services.php', compact('meta', 'options') ); ?>

            <?php endif; ?>

        </div>

         <?php foodchow_template_load( 'templates/custom-posts/services_social.php', compact('meta', 'options') ); ?>

            <?php the_content(); ?>
       
    </div>

</div>
