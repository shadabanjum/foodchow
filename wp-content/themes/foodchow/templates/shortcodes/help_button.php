<?php
/**
 * We Help Button SHortcode Template
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane <webinane@gmail.com>
 * @version 1.0
 */


?>
<?php if ( ! empty( foodchow_set( $spons, 'help_link' ) ) && foodchow_set( $spons, 'button' ) ) {
	$link = ( '||' === foodchow_set( $spons, 'help_link' ) ) ? '' : foodchow_set( $spons, 'help_link' );
	$link = vc_build_link( $link );

}


if ( foodchow_set( $spons, 'button' ) && ( ! empty( $link ) ) ) : ?>

<a onMouseOver="this.style.background='<?php echo esc_attr( foodchow_set( $spons, 'btn_bg_hover' ) ); ?>'; this.style.color='<?php echo esc_attr( foodchow_set( $spons, 'btn_color_hover' ) ); ?>'" 
	onMouseOut="this.style.background='<?php echo esc_attr( foodchow_set( $spons, 'btn_bg' ) ); ?>'; this.style.color='<?php echo esc_attr( foodchow_set( $spons, 'btn_color' ) ); ?>'" href="<?php echo esc_url( $link['url'] ); ?>" class="button" <?php echo ( $link['target'] ) ? 'target=_blank' : ''; ?>>
<?php echo esc_html( $link['title'] ); ?></a>
<?php endif; ?>
