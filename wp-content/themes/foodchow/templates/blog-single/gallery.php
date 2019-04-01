<?php 
/**
 * Single Gallery File.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

if ( class_exists( 'Foodchow_Resizer' ) ) {
    $img_obj = new Foodchow_Resizer();
}   
?> 

<div class="singlee gallery">

    <div class="row merged">

        <?php foreach( $gallery as $gall ) : ?>
            
            <div class="col-lg-4 col-md-4">
                
                <a href="<?php echo wp_get_attachment_url( $gall); ?>" class="html5lightbox" data-group="set2">
                    <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
                        <?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( $gall, 'full' ), 315, 215, true ) ); ?>
                    <?php else : ?>
                        <?php echo wp_get_attachment_image( $gall, 'full' ); ?>
                    <?php endif; ?> 
                </a>
            
            </div>
        
        <?php endforeach; ?>

    </div>
  
    <?php if( $options->get( 'small_image' ) ) : ?>

        <span><?php echo get_avatar(get_the_author_meta('ID'), 41 );  ?></span>

    <?php endif; ?>
    


</div>