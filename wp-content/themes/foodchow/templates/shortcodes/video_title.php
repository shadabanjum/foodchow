  <?php
	
/**
 * 
 * Video Title Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */

?>
<?php  if ( !empty( foodchow_set($video, 'video_title') ) ){
    $link = ( '||' ===  foodchow_set($video, 'video_title')) ? '' :foodchow_set($video, 'video_title');   
    $link = vc_build_link( $link ); 


}
 if ( ( !empty( $link ) ) ) : ?>
     <h4><a <?php echo ($link['target']) ? 'target=_blank' : ''; ?> href="<?php echo esc_url($link['url']); ?>"> <?php echo esc_html($link['title']); ?> </a></h4>
<?php endif; ?>

