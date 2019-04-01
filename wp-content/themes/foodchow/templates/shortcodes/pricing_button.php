 <?php
	
/**
 * 
 * We Help Button SHortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */

?>
<?php  if(!empty(foodchow_set($package, 'help_link')) && foodchow_set($package, 'button')){
    $link = ( '||' === foodchow_set($package, 'help_link') ) ? '' : foodchow_set($package, 'help_link');  
    $link = vc_build_link( $link ); 

}

 if(foodchow_set($package, 'button') && (!empty($link))) : ?>
    <a href="<?php echo esc_url($link['url']); ?>" class="button" <?php echo ($link['target']) ? 'target=_blank' : ''; ?>>
    <?php echo esc_html($link['title']); ?></a>
<?php endif; ?>