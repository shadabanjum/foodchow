<?php
/**
 * Video Lectures Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); 

$videos = json_decode(urldecode($video_add));  ?>

<?php if($videos) : ?> 
<?php
if ( class_exists( 'Foodchow_Resizer' ) ) {
    $img_obj = new Foodchow_Resizer();
} ?>   

	<div class="video-lectures">
		<?php if($button) : ?>
			<?php foodchow_template_load( 'templates/shortcodes/see_all_button.php', compact( 'see_all') ); ?>
		<?php endif; ?>
		<?php foreach ($videos as $video ) : ?>


			<?php $video_url = foodchow_vd_details( foodchow_set($video, 'v_url') );  ?>
			<div class="lecture-avatar fadein">
		
<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
			<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url(  foodchow_set($video, 'v_image'), 'full' ), 457, 184, true ) ); ?>
		<?php else : ?>
			<?php wp_get_attachment_url(  foodchow_set($video, 'v_image'), 'full' ); ?>
		<?php endif; ?>
				<div class="lecture-meta">
					<a href="<?php echo esc_attr( foodchow_set($video_url, 'url') ); ?>" class="html5lightbox" data-group="set2" title=""><i class="fa fa-play-circle-o"></i></a>
					<?php if ( foodchow_set($video, 'video_title') ) : ?>

						<?php foodchow_template_load( 'templates/shortcodes/video_title.php', compact( 'video_title' , 'video') ); ?>
					<?php endif; ?>
					<span><i class="fa fa-clock-o"></i> <?php echo foodchow_set($video, 'v_date'); ?></span>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>	
