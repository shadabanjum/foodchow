<?php
/**
 * Blog Thumbnail Template.
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */
?>
<?php if( has_post_thumbnail() ) : ?>
	<div class="news-thumb">
		<a href="<?php the_permalink(); ?>" class="brd-rd2">
			<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
				<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), $width, $height, true ) ); ?>
			
			<?php endif; ?>
		</a>

		<div class="news-btns">
			<?php if( $data->get( 'date' ) ) : ?>
				<a class="post-date red-bg" href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"  itemprop="url"><?php echo get_the_date( 'F j' ); ?></a>
			<?php endif; ?>
			<?php if ( $data->get( 'button' ) && $data->get( 'button_label' ) ) : ?>	
				<a class="read-more" href="<?php the_permalink(); ?>" itemprop="url"><?php echo esc_html( $data->get( 'button_label' ) ); ?></a>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>