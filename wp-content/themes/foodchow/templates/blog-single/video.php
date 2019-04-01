 <?php 
    /**
     * Single Video File.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */

?> 

<div class="singlee audio">

   <?php 

   		$foodchow_video = foodchow_vd_details( $video );

        
      	echo ( foodchow_set( $foodchow_video, 'embed_video' ) );

    ?>

 	<?php if( $options->get( 'small_image' ) ) : ?>

        <span><?php echo get_avatar(get_the_author_meta('ID'), 41 );  ?></span>

    <?php endif; ?>

</div>