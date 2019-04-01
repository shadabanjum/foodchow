 <?php 
    /**
     * Single Audio File.
     *
     * @package Foodchow
     * @author  Webinane
     * @version 1.0
     */

?> 

	<?php
    	$soundcloud  = get_post_meta( $page_id, 'soundcloud_track', true );
    	$own_audio   = get_post_meta( $page_id, 'own_audio', true );
    ?>
    
<div class="singlee audio">
  		
  	<?php if( $soundcloud && $audio_type == 'soundcloud' ) : ?>

        <?php $protocol =  is_ssl() ? 'https' : 'http'; ?>
        	
        	<iframe src="<?php echo esc_attr( $protocol ); ?>://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo esc_attr( $soundcloud ) ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
       	

		<?php elseif( $own_audio && $audio_type == 'ownaudio' ) :
			
      wp_enqueue_script( array( 'wp-mediaelement' ) );

			
      echo do_shortcode( '[audio src="' . esc_url( $own_audio ) . '"]' );
		
    ?>
	   
    <?php endif; ?>

    <?php if( $options->get( 'small_image' ) ) : ?>

      <span><?php echo get_avatar(get_the_author_meta('ID'), 41 );  ?></span>

    <?php endif; ?>

</div>