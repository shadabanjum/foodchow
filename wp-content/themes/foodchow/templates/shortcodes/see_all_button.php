  <?php
	
/**
 * 
 * See All Button SHortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */

?>
<?php  if ( !empty($see_all ) ){
    $link = ( '||' ===  $see_all) ? '' : $see_all;   
    $link = vc_build_link( $link ); 

}

 if ( ( !empty( $link ) ) ) : ?>
    <a href="<?php echo esc_url($link['url']); ?>" class="seemore" <?php echo ($link['target']) ? 'target=_blank' : ''; ?>>
    <?php echo esc_html($link['title']); ?> <i class="fa fa-arrows-h"></i></a>
<?php endif; ?>
