  <?php
	
/**
 * 
 * Custom Info Shortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */

?>
<?php if ( ! empty( $appointment_link ) ){
    $link = ( '||' === $appointment_link ) ? '' : $appointment_link;  
    $link = vc_build_link( $link ); 

}

 if ( (! empty( $link ) ) ) : ?>
    <a href="<?php echo esc_url( $link['url'] ); ?>" class="<?php echo esc_attr( $class ); ?>" <?php echo ( $link['target'] ) ? 'target=_blank' : ''; ?>>
    <?php echo esc_html( $link['title'] ); ?></a>
<?php endif; ?>
