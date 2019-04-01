<?php
/**
 * Courses Shortcode
 *
 * @package Foodchow
 * @author  Webinane
 * @version 1.0
 */

?>

<div class="col-lg-4 col-md-4 col-xs-12" style="padding-bottom: 30px" >
	
		<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
			<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 585, 438, true ) ); ?>
		<?php else : ?>
			<?php the_post_thumbnail( 'full' ); ?>
		<?php endif; ?>


	<div class="about-course course-latest">

		<?php if ( $show_rat && function_exists( 'foodchow_rating_average' ) ) : ?>
            <div class="rating">
				<?php echo foodchow_rating_average_stars( get_the_id() ); ?>
				<span>(<?php echo foodchow_rating_average( get_the_id() ); ?>)</span>
			</div>
		<?php endif; ?>

		<?php if ( $show_price  ) : ?>

			<?php $courseSettings = get_post_meta( get_the_ID(), 'courseSettings', true );
			$regular_price = foodchow_set( $courseSettings, 'course_price' );

				$sale_price = foodchow_set( $courseSettings, 'course_sale_price' ); ?>


					<span>
						<?php if ( ! empty ( $regular_price ) ) : ?>
							<?php echo ( ! empty ( $sale_price) ) ? '<del>' : ''; ?><?php echo foodchow_wocommerce_currency_symbol(); echo esc_attr( $regular_price ); ?><?php echo ( ( ( $sale_price) ) ) ? '</del>' : ''; ?>
						<?php endif; ?>	
						<?php if ( ! empty( $sale_price) ) : ?>
							<?php echo foodchow_wocommerce_currency_symbol(); echo esc_attr( $sale_price ); ?>
						<?php endif; ?>	
				    </span>
		

		<?php endif; ?>

		<h4><a href="<?php echo the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?></a></h4>

		<p><?php echo wp_trim_words( get_the_excerpt(), $text_limit, '...' ); ?></p>

	</div>

</div>
