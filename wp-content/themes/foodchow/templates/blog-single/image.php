 <?php 
    /**
     * Single Image File.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */

?> 
<?php if ( class_exists( 'Foodchow_Resizer' ) ) {
    $img_obj = new Foodchow_Resizer();
}
?>
<?php if ( has_post_thumbnail( ) ) : ?>
<div class="blog-detail-thumb wow fadeIn" data-wow-delay="0.2s">
    <?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
       <?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 1100, 460, true ) ); ?>
    <?php else : ?>
        <?php the_post_thumbnail( 'full' ); ?>
    <?php endif; ?>
    

</div>
<?php endif; ?>