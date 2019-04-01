<?php
/**
 * About Us Shortcode
 *
 * @package WordPress
 * @subpackage Esperto
 * @author Webinane
 * @version 1.0
 */

$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); 

if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}

?>


<?php $food_caro = json_decode( urldecode( $food_slidess ) ); ?>
<?php if( $food_caro ) : ?>
	<div class="featured-restaurant-food text-center bottom-padd80">
		<div class="featured-restaurant-food-thumb">
			<ul class="featured-restaurant-food-img-carousel">
				<?php foreach( $food_caro as $food ) : ?>
					<li>
						
						<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
							<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( foodchow_set( $food, 'slide_image' ), 'full' ), 1080, 420, true ) ); ?>
						<?php endif; ?>
						<?php if( foodchow_set( $food, 'show_viddddeo_' ) && foodchow_set( $food, 'text' ) ) : ?>
							<a class="brd-rd50 vimeo" data-fancybox href="<?php echo esc_url( foodchow_set( $food, 'text' ) ); ?>" title="<?php esc_attr( 'Click To play', 'foodchow' ); ?>" itemprop="url">
								<i class="fa fa-vimeo"></i>
							</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>

			</ul>
			<ul class="featured-restaurant-food-thumb-carousel">
				<?php foreach( $food_caro as $food ) : ?>
					<li>
						
						<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
							<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( foodchow_set( $food, 'slide_image' ), 'full' ), 75, 80, true ) ); ?>
						<?php endif; ?>

					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>