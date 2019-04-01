<?php
/**
 * Welcome Note Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts );  
if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}

?>

<div class="row">
	<div class="welcome-sec">
		<div class="col-md-6 col-sm-6 col-lg-6">
			<div class="welcome-secinfo">
				<h2><?php echo esc_html( $title ); ?></h2>
				<?php echo( $subtitle ) ? '<span>'.$subtitle.'</span>' : ''; ?>
				<p><?php echo wp_kses_post( $text ); ?></p>
				<?php if ( $enable_award ) : ?>
					<div class="award">
						<?php echo wp_get_attachment_image( $award_image, 'full' ); ?>
						<span><em><?php echo esc_html( $award_tagline ); ?></em><i><?php echo esc_html( $award_title ); ?></i></span>
					</div>
				<?php endif; ?>
				<?php if ( $signature_image ) : ?>
					<span class="sign">
						<?php echo wp_get_attachment_image( $signature_image, 'full' ); ?>
					</span>
				<?php endif; ?>
			</div>
		</div>
		<?php $gallery = explode(',', $side_images); 
		
		if( $gallery ) : 
			$counter = 0;
			$height = array(195, 300, 195 );
			$width = array(365,270, 365 );
			?>

			<div class="col-md-6 col-sm-6 col-lg-6">
				<div class="welcome-gallery ">
					<?php  foreach ( $gallery as $gall ) : ?>
						<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
							<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( $gall, 'full' ), $width[$counter], $height[$counter], true ) ); ?>
						<?php endif; ?>
						<?php $counter++; if($counter == 3 ){
							$counter = 0;
						} endforeach; ?>
					</div>
				</div>
			<?php endif; ?>