<?php
/**
 * Services Shortcode
 *
 * @package WordPress
 * @subpackage Foodchow
 * @author Webinane
 * @version 1.0
 */
$atts = vc_map_get_attributes( $tag, $atts );

extract( $atts ); ?>
<?php
if ( class_exists( 'Foodchow_Resizer' ) ) {
	$img_obj = new Foodchow_Resizer();
}


$cat = explode(',', $cat);
$args = array(
	'post_type' => 'services',
	'order' => $order,
	'posts_per_page' => $number,
);
if (!empty($cat) && foodchow_set($cat, 0) == 'all') {
	array_shift($cat);
}

if (!empty($cat) && foodchow_set($cat, 0) != '')
	$args['tax_query'] = array(array('taxonomy' => 'service_cat', 'field' => 'slug', 'terms' => (array) $cat));
$query = new WP_Query($args);
$title_limit = $title_limit ? $title_limit : 10;

?>


<?php if($query->have_posts()) : ?>
	<div class="resturent-services remove-ext">
		<?php $counter = 1; while($query->have_posts()) : $query->the_post(); ?>
		<div class="col-md-4 col-sm-6">
			<div class="servise-box wow fadeIn" data-wow-delay="0.2s">
				<figure>
					<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
						<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 370, 250, true ) ); ?>
					<?php endif; ?>
				</figure>
				<div class="uper-meta">
					<?php $meta = get_post_meta( get_the_ID(), 'servsettings' , true); ?>
					<?php if( foodchow_set( $meta, 'icon_type' ) == 'image' && foodchow_set( $meta, 'icon_image' )  ) : ?>
						<i><?php echo wp_get_attachment_image( foodchow_set( $meta, 'icon_image' ), 'full' ); ?></i>
					<?php endif; ?>
					<?php if( foodchow_set( $meta, 'icon_type' ) == 'icon' && foodchow_set( $meta, 'icon_icon' )  ) : ?>
						<i class="newicon <?php echo esc_attr( foodchow_set( $meta, 'icon_icon' ) ); ?>"></i>
					<?php endif; ?>
					<h4><a href="<?php the_permalink(); ?>">
						<?php echo wp_trim_words( get_the_title(), $title_limit, '...' ); ?>			
					</a></h4>
					<?php echo esc_attr( foodchow_set( $meta, 'subtitle' ) ) ? '<span>'.foodchow_set( $meta, 'subtitle' ).'</span>' : ''; ?>
				</div>
			</div>
		</div>


		<?php $counter++; endwhile; wp_reset_postdata(); ?>
	</div>
<?php endif; ?>