<?php 
    /**
     * Services Icon Type.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */
?>
<?php   
	
	$meta = get_post_meta( get_the_ID(), 'servsettings' , true);
	$icon_image =  foodchow_set($meta, 'icon_image'); 
	$icon_type  =  foodchow_set($meta, 'icon_type'); 
	

?>


    <?php if( $icon_type == 'fontawesome' ) : ?>

		<i class="<?php echo esc_attr( foodchow_set($meta, 'icon_ico') ); ?>"></i>

	<?php else : ?>

		<i class="image-icon"><?php echo wp_get_attachment_image( $icon_image, 'full' );  ?></i>

	<?php endif; ?>
	
