<?php
/**
 * Services Megamenu  Shortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
?>
<?php if ( !empty($add_menu) ) :?>
	<div class="col-lg-7">
	    <?php foreach ( $add_menu as $menus ) :  ?>
	        <?php $add_menu2 = json_decode(urldecode(foodchow_set($menus, 'add_services')));?>
	       
	        <div class="mega-meta">
	            <span><?php echo esc_html(foodchow_set($menus, 'title')); ?></span>
	 
	             <?php foreach ( $add_menu2 as $menu ) : ?>
	           <?php  if( !empty ( foodchow_set( $menu, 'service_link' ) ) ){
   
                    $link = ( '||' === foodchow_set($menu, 'service_link') ) ? '' : foodchow_set($menu, 'service_link');  
                    
                    $link = vc_build_link( $link ); 
                
                } ?>
                
                <?php if ( !empty( $link ) ) : ?>
               
                	    <a href="<?php echo esc_url($link['url']); ?>" <?php echo ($link['target']) ? 'target=_blank' : ''; ?>>
                	    
                	    	<?php echo esc_html($link['title']); ?>
                	    	
                	    </a>
               
                
                <?php endif; ?>
                  <?php endforeach; ?> 
          
	             </div>
	      
		<?php endforeach; ?>
	</div>
<?php endif; ?>