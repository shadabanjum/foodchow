  <?php
	
/**
 * 
 * Get Coach Button SHortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */

?>
<?php  if(!empty('help_link') && $button){
    $link = ( '||' === $help_link ) ? '' : $help_link;  
    $link = vc_build_link( $link ); 

}

 if($button && (!empty($link))) : ?>
    <a href="<?php echo esc_url($link['url']); ?>" class="button" <?php echo ($link['target']) ? 'target=_blank' : ''; ?>>
    <?php echo esc_html($link['title']); ?></a>
<?php endif; ?>
