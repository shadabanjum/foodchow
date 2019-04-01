<?php
/**
 * Video Tabs Template 
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}

$video_tabs = json_decode( urldecode( $video_tabs ) ); ?>
<?php  if ( ! empty( $video_tabs ) ) : ?>
	<div class="col-lg-6 fromright">
		<div class="video-tab">
			<ul class="nav nav-tabs tab-video-btn">
				<?php $counter = 0 ; foreach ( $video_tabs as $videotab ) : ?>
				<?php $video_url = foodchow_vd_details( foodchow_set( $videotab, 'v_url' ) );  ?>
				<li class="nav-item <?php echo ($counter == 0 ) ? 'active' : ''; ?>" data-toggle="tab">
				
					<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
						<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( foodchow_set( $videotab, 'v_image' ), 'full' ), 406, 406, true ) ); ?>
					<?php else : ?>
						<?php echo wp_get_attachment_image( foodchow_set( $videotab, 'v_image' ), 'full' ); ?>
				<?php endif; ?> 
					<a href="<?php echo esc_attr( foodchow_set($video_url, 'url') ); ?>" class="html5lightbox" data-group="set2" ><i><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icon-play.png' ); ?>" alt="icon"></i></a>
					
				</li>
				<?php $counter++; endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>
