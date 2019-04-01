<?php
/**
 * Blog Listing Shortcode
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
	'post_type' => 'post',
	'order' => $order,
	'posts_per_page' => $number,
);
if (!empty($cat) && foodchow_set($cat, 0) == 'all') {
	array_shift($cat);
}

if (!empty($cat) && foodchow_set($cat, 0) != '')
	$args['tax_query'] = array(array('taxonomy' => 'category', 'field' => 'slug', 'terms' => (array) $cat));
$query = new WP_Query($args);
$title_limit = $title_limit ? $title_limit : 20;
?>


<?php if($query->have_posts()) : ?>
	<div class="row">
		<?php $counter = 1; while($query->have_posts()) : $query->the_post(); ?>
		<div class="col-md-4 col-sm-6 col-lg-4">
			<div class="article-dev wow fadeIn" data-wow-delay="0.2s">
				<figure>
					<?php if ( class_exists( 'Foodchow_Resizer' ) ) : ?>
						<?php echo wp_kses_post( $img_obj->Foodchow_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ), 370, 250, true ) ); ?>

					<?php endif; ?>
				</figure>
				<div class="article-data">
					<div class="article-info-meta">
						<?php if( $date ) : ?>
							<span><?php echo get_the_date( 'D'); ?></span>
							<a href="#" title=""><?php echo get_the_date( 'd M, Y'); ?></a>
						<?php endif; ?>
						<?php if( $author ) : ?>
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title=""><?php esc_html_e('By ', 'foodchow' ); ?> <?php echo esc_html(get_the_author_meta('display_name')); ?></a>
						<?php endif; ?>
					</div>
					<div class="article-meta">
						<h3><a href="<?php the_permalink(); ?>">
							<?php echo wp_trim_words( get_the_title(), $title_limit, '...' );?>
						</a>
					</h3>
					<div class="like-meta">
						<?php if( $likes ) : ?>
							<span><i class="fa fa-heart-o"></i> 12</span>
						<?php endif; ?>
						<?php if( $comments ) : ?>
							<span><i class="fa fa-comment-o"></i> <?php comments_number( '0', '1', '%' ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $counter++; endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; ?>