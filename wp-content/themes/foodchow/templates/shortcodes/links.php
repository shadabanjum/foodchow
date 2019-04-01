  <?php
	
/**
 * 
 * Link Services Shortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */

?>
<?php  if( !empty ( foodchow_set( $link, 'serv_link' ) ) ){
   
    $link = ( '||' === foodchow_set($link, 'serv_link') ) ? '' : foodchow_set($link, 'serv_link');  
    
    $link = vc_build_link( $link ); 

} ?>

<?php if ( !empty( $link ) ) : ?>
  	<li class="half-width">  
	    <a href="<?php echo esc_url($link['url']); ?>" <?php echo ($link['target']) ? 'target=_blank' : ''; ?>>
	    
	    	<?php echo esc_html($link['title']); ?>
	    	
	    </a>
	</li>
  

<?php endif; ?>