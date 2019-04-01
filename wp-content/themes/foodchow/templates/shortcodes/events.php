<?php
/**
 * Our Events Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */

?>
<?php $options = foodchow_WSH()->option(); ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
<?php

$meta = get_post_meta( get_the_ID(), 'event_settings', true );
$start_date = foodchow_set( $meta, 'start_date' );

$end_date = foodchow_set( $meta, 'end_date' );

$start_time = foodchow_set( $meta, 'start_time' );

$end_time = foodchow_set( $meta, 'end_time' );
?>

	<div class="<?php echo esc_attr( $columns ); ?> col-sm-6">

		<div class="event-post fadein">

			<div class="event-avatar">

				<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
					<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), $width, $height, true ) ); ?>
				<?php else : ?>
					<?php the_post_thumbnail( 'full' ); ?>
				<?php endif; ?>

				<?php if ( $enable_date ) : ?>

					<div class="event-date-box">

						<span><?php echo get_the_date( 'd' ); ?></span>

						<i> <?php echo get_the_date( 'M' ); ?>,  

							<?php echo get_the_date( 'Y' ); ?></i>

					</div>

				<?php endif; ?>

			</div>

			<div class="event-info">

				<h3>

					<a href="<?php echo the_permalink(); ?>">

						<?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?>

					</a>

				</h3>

				<?php if ( $enable_event ) : ?>

					<ul class="likes event">
						<?php 
							$time1 = ( $options->get( 'event_date_general_view' ) == 'cutom_date_option' ) ? date( get_option( 'time_format' ),strtotime( $start_time )) :  foodchow_set($meta, 'start_time');
							$time2 = ( $options->get( 'event_date_general_view' ) == 'cutom_date_option' ) ? date( get_option( 'time_format' ),strtotime( $end_time )) :  foodchow_set($meta, 'end_time');
							$date = ( $options->get( 'event_date_general_view' ) == 'cutom_date_option' ) ? date(get_option( 'date_format' ), strtotime( $start_date ) ) :  date("M d", strtotime( $start_date ) );

							$date2 = ( $options->get( 'event_date_general_view' ) == 'cutom_date_option' ) ? date(get_option( 'date_format' ), strtotime( $end_date ) ) :  date("M d", strtotime( $end_date ) );
						?>
						<?php echo ( $start_date ) ? '<li>' . $date . ' @ ' . $time1 . '</li>' : ''; ?>

						<?php echo ( $end_date ) ? '<li>' . $date2  . ' @ ' .  $time2 . '</li>' : ''; ?>

					</ul>

				<?php endif; ?>

			</div>

		</div>

	</div>

<?php endwhile;
	wp_reset_postdata(); ?>
